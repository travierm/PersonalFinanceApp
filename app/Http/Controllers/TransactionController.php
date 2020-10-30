<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Http\Services\UserTransactionTagService;
use App\Http\Services\UserTransactionSourceService;

class TransactionController extends Controller
{
    public function getCreate()
    {
        $tags = UserTransactionTagService::getAll(Auth::user()->id);
        $sources = UserTransactionSourceService::getAll(Auth::user()->id);

        return view('pages.transaction.create', compact('tags', 'sources'));
    }

    public function postCreate(Request $request)
    {

    }
}
