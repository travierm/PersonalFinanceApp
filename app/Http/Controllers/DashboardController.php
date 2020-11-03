<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Services\TransactionService;
use App\Services\AccountBalanceService;
use App\Http\Charts\ExpenseTypePieChart;

class DashboardController extends Controller
{
    public static function getIndex()
    {
        $userId = Auth::user()->id;

        $totalTransactions = TransactionService::getCount($userId);
        $currentAccountBalance = AccountBalanceService::getCurrentAccountBalance($userId);

        $chart = ExpenseTypePieChart::createChart($userId);

        return view('pages.dashboard', compact('chart', 'totalTransactions', 'currentAccountBalance'));
    }
}
