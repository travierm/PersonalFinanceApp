<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Services\TransactionService;
use App\Services\AccountBalanceService;
use App\Http\Charts\TagExpensePieChart;
use App\Http\Charts\SourceExpensePieChart;

class DashboardController extends Controller
{
    public static function getIndex()
    {
        $userId = Auth::user()->id;

        $totalTransactions = TransactionService::getCount($userId);
        $currentAccountBalance = AccountBalanceService::getCurrentAccountBalance($userId);

        $sourcePieChart = SourceExpensePieChart::createChart($userId);
        $tagPieChart = TagExpensePieChart::createChart($userId);

        return view('pages.dashboard', compact(
            'tagPieChart',
            'sourcePieChart',
            'totalTransactions',
            'currentAccountBalance'
        ));
    }
}
