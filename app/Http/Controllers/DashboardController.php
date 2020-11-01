<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Services\AccountBalanceService;

class DashboardController extends Controller
{
    public static function getIndex()
    {
        $userId = Auth::user()->id;

        $currentAccountBalance = AccountBalanceService::getCurrentAccountBalance($userId);

        return view('pages.dashboard', compact('currentAccountBalance'));
    }
}
