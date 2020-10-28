<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Services\UserSettings;
use Illuminate\Http\Request;

class UserSettingsController extends Controller
{
    public function getSettings()
    {
        // $settings = UserSettings::getById(Auth::user()->id);

        return view('pages.user.settings');
    }

    public function postSettings()
    {

    }
}
