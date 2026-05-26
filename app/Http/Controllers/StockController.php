<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Watchlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StockController extends Controller
{
    public function index(Request $request)
    {
        $query = Stock::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('company_name', 'like', "%{$search}%")
                  ->orWhere('symbol', 'like', "%{$search}%");
            });
        }

        if ($request->filled('filter')) {
            switch ($request->filter) {
                case 'gainers':
                    $query->orderBy('change_percentage', 'desc');
                    break;
                case 'losers':
                    $query->orderBy('change_percentage', 'asc');
                    break;
                case 'trending':
                    $query->where('is_trending', true);
                    break;
                default:
                    $query->orderBy('market_cap', 'desc');
                    break;
            }
        } else {
            $query->orderBy('market_cap', 'desc');
        }

        $stocks = $query->paginate(12);
        $watchlistIds = [];
        if (Auth::check()) {
            $watchlistIds = Auth::user()->watchlists()->pluck('stock_id')->toArray();
        }

        return view('stocks.index', compact('stocks', 'watchlistIds'));
    }

    public function show(Stock $stock)
    {
        return view('stocks.show', compact('stock'));
    }

    public function toggleWatchlist(Request $request, Stock $stock)
    {
        if (!Auth::check()) {
            return response()->json(['error' => 'Please login first'], 401);
        }

        $user = Auth::user();
        $watchlist = $user->watchlists()->where('stock_id', $stock->id)->first();

        if ($watchlist) {
            $watchlist->delete();
            $inWatchlist = false;
            $message = 'Removed from watchlist';
        } else {
            $user->watchlists()->create(['stock_id' => $stock->id]);
            $inWatchlist = true;
            $message = 'Added to watchlist';
        }

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => $message,
                'in_watchlist' => $inWatchlist,
            ]);
        }

        return back()->with('success', $message);
    }

    public function buy(Request $request, Stock $stock)
    {
        if (!Auth::check()) {
            return response()->json(['error' => 'Please login first'], 401);
        }

        $validated = $request->validate([
            'quantity' => 'required|integer|min:1|max:100000',
        ]);

        $user = Auth::user();
        $quantity = $validated['quantity'];
        $totalAmount = $stock->price * $quantity;
        $brokerage = round($totalAmount * 0.001, 2);

        $investment = $user->investments()->create([
            'stock_id' => $stock->id,
            'type' => 'stock',
            'amount' => $totalAmount,
            'units' => $quantity,
            'purchase_price' => $stock->price,
            'current_value' => $totalAmount,
            'returns' => 0,
            'status' => 'active',
        ]);

        $user->transactions()->create([
            'stock_id' => $stock->id,
            'type' => 'buy',
            'quantity' => $quantity,
            'price_per_unit' => $stock->price,
            'total_amount' => $totalAmount,
            'brokerage' => $brokerage,
        ]);

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => "Successfully bought {$quantity} shares of {$stock->symbol}",
            ]);
        }

        return back()->with('success', "Successfully bought {$quantity} shares of {$stock->company_name}");
    }
}
