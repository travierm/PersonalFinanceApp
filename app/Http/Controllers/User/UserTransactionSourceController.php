<?php

namespace App\Http\Controllers\User;

use App\Services\UserTransactionSourceService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class UserTransactionSourceController extends Controller
{
    public function showSources()
    {
        $sources = UserTransactionSourceService::getAll(Auth::user()->id);

        return view('pages.user.sources', compact('sources'));
    }

    public function createSource(Request $request)
    {
        $userId = Auth::user()->id;
        $sourceName = $request->source_name;

        if($sourceName) {
            UserTransactionSourceService::createSource($userId, $sourceName);
        }

        return redirect()->back()->with('success', "Created new source: $sourceName");
    }

    public function deleteSource($sourceId)
    {
        $userId = Auth::user()->id;

        if(UserTransactionSourceService::userOwnsSource($userId, $sourceId)) {
            UserTransactionSourceService::deleteSource($sourceId);

            return redirect()->back();
        }

        return redirect()->back();
    }
}
