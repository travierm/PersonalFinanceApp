<?php

namespace App\Http\Controllers;

use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Services\TransactionService;
use App\Services\AccountBalanceService;
use App\Services\UserTransactionTagService;
use App\Services\UserTransactionSourceService;

class TransactionController extends Controller
{
    public function getList()
    {
        $userId = Auth::user()->id;

        $transactions = TransactionService::getAll($userId);
        $currentAccountBalance = AccountBalanceService::getCurrentAccountBalance($userId);

        return view('pages.transaction.list', compact('transactions', 'currentAccountBalance'));
    }
    public function getCreate()
    {
        $userId = Auth::user()->id;
        $tags = UserTransactionTagService::getAll($userId);
        $sources = UserTransactionSourceService::getAll($userId);
        $currentAccountBalance = AccountBalanceService::getCurrentAccountBalance($userId);

        return view('pages.transaction.create', compact('tags', 'sources', 'currentAccountBalance'));
    }

    public function postCreate(Request $request)
    {
        $type = $request->type;
        $date = Carbon::parse($request->date);
        $tagId = $request->tag_id;
        $sourceId = $request->source_id;
        $description = $request->description;

        $validatedData = $request->validate([
            'date' => 'required',
            'amount' => 'required',
        ]);

        $transaction = TransactionService::createTransaction(
            Auth::user()->id,
            $type,
            $validatedData['amount'],
            $description,
            $date,
            $sourceId
        );

        if(!$transaction) {
            return redirect()->back()->withErrors([
                'transaction' => "Failed to create new Transaction"
            ]);
        }

        if($tagId) {
            TransactionService::createTransactionTag($transaction->id, $tagId);
        }

        return redirect()->back()->with('success', 'Successfully created Transaction!');
    }
}
