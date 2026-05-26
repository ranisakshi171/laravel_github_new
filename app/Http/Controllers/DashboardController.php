<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $investments = $user->investments()->with('stock')->latest()->take(5)->get();
        $transactions = $user->transactions()->with('stock')->latest()->take(5)->get();
        $watchlistItems = $user->watchlists()->with('stock')->latest()->get();
        $trendingStocks = Stock::trending()->take(4)->get();

        $totalInvested = $user->investments()->where('status', 'active')->sum('amount');
        $totalCurrentValue = $user->investments()->where('status', 'active')->sum('current_value');
        $totalReturns = $user->investments()->where('status', 'active')->sum('returns');
        $totalTransactions = $user->transactions()->count();
        $profitLoss = $totalCurrentValue - $totalInvested;

        // Calculate portfolio distribution
        $stocksCount = $user->investments()->where('type', 'stock')->count();
        $mutualFundsCount = $user->investments()->where('type', 'mutual_fund')->count();
        $sipCount = $user->investments()->where('type', 'sip')->count();

        return view('dashboard.index', compact(
            'user',
            'investments',
            'transactions',
            'watchlistItems',
            'trendingStocks',
            'totalInvested',
            'totalCurrentValue',
            'totalReturns',
            'totalTransactions',
            'profitLoss',
            'stocksCount',
            'mutualFundsCount',
            'sipCount'
        ));
    }
}
