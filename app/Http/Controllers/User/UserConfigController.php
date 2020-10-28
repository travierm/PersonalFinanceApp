<?php

namespace App\Http\Controllers\User;

// Services 
use App\Http\Services\UserConfigService;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserConfigController extends Controller
{
    public function getConfig()
    {

        return view('pages.user.config');
    }

    public function updateConfig()
    {

    }
}
