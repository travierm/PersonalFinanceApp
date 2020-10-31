<?php
namespace App\Http\Services;

use App\Models\Transaction;
use App\Models\TransactionTag;

class TransactionService {
    public static function createTransaction($userId, $type, $amount, $description = "", $date, $sourceId)
    {
        return Transaction::firstOrCreate([
            'user_id' => $userId,
            'type' => $type,
            'amount' => $amount,
            'description' => $description,
            'date' => $date,
            'source_id' => $sourceId
        ]);
    }

    public static function createTransactionTag(Int $transactionId, Int $tagId)
    {
        return TransactionTag::firstOrCreate([
            'tag_id' => $tagId,
            'transaction_id' => $transactionId
        ]);
    }
}

?>