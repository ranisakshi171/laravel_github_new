<?php

namespace App\Http\Controllers;

use App\Models\Stock;

class HomeController extends Controller
{
    public function index()
    {
        $trendingStocks = Stock::trending()->take(6)->get();
        $topGainers = Stock::gainers()->take(4)->get();
        return view('home.index', compact('trendingStocks', 'topGainers'));
    }
}
