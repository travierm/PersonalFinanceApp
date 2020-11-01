<?php

namespace App\Http\Controllers\User;

use Auth;
use App\Services\UserConfigService;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserConfigController extends Controller
{
    public function getConfig()
    {
        $config = UserConfigService::getConfig(Auth::user()->id);

        return view('pages.user.config', compact('config'));
    }

    public function updateConfig(Request $request)
    {
        $currentAccountBalance = $request->current_account_balance;

        UserConfigService::updateCurrentAccountBalance(Auth::user()->id, $currentAccountBalance);

        return redirect()->back();
    }
}
