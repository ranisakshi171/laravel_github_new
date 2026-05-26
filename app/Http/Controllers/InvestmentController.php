<?php

namespace App\Http\Controllers;

use App\Models\Investment;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvestmentController extends Controller
{
    public function index()
    {
        $stocks = Stock::orderBy('market_cap', 'desc')->take(8)->get();
        $topFunds = [
            ['name' => 'Axis Bluechip Fund', 'category' => 'Large Cap', 'return_rate' => 14.5, 'risk' => 'Moderate'],
            ['name' => 'SBI Small Cap Fund', 'category' => 'Small Cap', 'return_rate' => 18.2, 'risk' => 'High'],
            ['name' => 'HDFC Mid-Cap Fund', 'category' => 'Mid Cap', 'return_rate' => 16.8, 'risk' => 'High'],
            ['name' => 'ICICI Prudential Value', 'category' => 'Value', 'return_rate' => 12.3, 'risk' => 'Moderate'],
            ['name' => 'Mirae Asset Large Cap', 'category' => 'Large Cap', 'return_rate' => 13.7, 'risk' => 'Low'],
            ['name' => 'Kotak Emerging Equity', 'category' => 'Mid Cap', 'return_rate' => 17.5, 'risk' => 'High'],
        ];

        if (Auth::check()) {
            $userInvestments = Auth::user()->investments()->with('stock')->latest()->get();
        } else {
            $userInvestments = collect([]);
        }

        return view('investments.index', compact('stocks', 'topFunds', 'userInvestments'));
    }

    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to invest');
        }

        $validated = $request->validate([
            'type' => 'required|in:stock,mutual_fund,sip,fd',
            'amount' => 'required|numeric|min:100',
            'stock_id' => 'required_if:type,stock|exists:stocks,id',
            'fund_name' => 'required_if:type,mutual_fund,sip|string|max:255',
        ]);

        $investment = Auth::user()->investments()->create([
            'stock_id' => $validated['stock_id'] ?? null,
            'type' => $validated['type'],
            'amount' => $validated['amount'],
            'units' => 0,
            'purchase_price' => 0,
            'current_value' => $validated['amount'],
            'returns' => 0,
            'status' => 'active',
            'fund_name' => $validated['fund_name'] ?? null,
        ]);

        return back()->with('success', 'Investment created successfully!');
    }
}
