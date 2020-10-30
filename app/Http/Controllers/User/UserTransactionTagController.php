<?php

namespace App\Http\Controllers\User;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Services\UserTransactionTagService;

class UserTransactionTagController extends Controller
{
    public function showTags()
    {
        $tags = UserTransactionTagService::getAll(Auth::user()->id);

        return view('pages.user.tags', compact('tags'));
    }

    public function createTag(Request $request)
    {
        $userId = Auth::user()->id;
        $tagName = $request->tag_name;

        if($tagName) {
            UserTransactionTagService::createTag($userId, $tagName);
        }
        
        return redirect()->back();
    }

    public function deleteTag(Int $tagId)
    {
        $userId = Auth::user()->id;

        if(UserTransactionTagService::userOwnsTag($userId, $tagId)) {
            UserTransactionTagService::deleteTag($tagId);

            return redirect()->back();
        }

        return redirect()->back();
    }
}
