<?php
namespace App\Services;

use App\Models\Transaction;
use App\Models\TransactionTag;

class TransactionService {
    public static function getAll($userId)
    {
        return Transaction::where('user_id', $userId)
            ->orderBy('date', 'DESC')
            ->get();
    }

    public static function getCount($userId)
    {
        return Transaction::where('user_id', $userId)
            ->orderBy('date', 'DESC')
            ->count();
    }

    public static function createTransaction($userId, $type, $amount, $description = "", $date, $sourceId)
    {
        return Transaction::firstOrCreate([
            'user_id' => $userId,
            'type' => $type,
            'amount' => self::convertAmount($type, $amount),
            'description' => $description,
            'date' => $date,
            'source_id' => $sourceId
        ]);
    }

    public static function createTransactionTag(Int $userId, Int $transactionId, Int $tagId)
    {
        return TransactionTag::firstOrCreate([
            'tag_id' => $tagId,
            'user_id' => $userId,
            'transaction_id' => $transactionId
        ]);
    }

    public static function deleteTransactionTag(Int $transactionTagId)
    {
        return TransactionTag::where([
            'id' => $transactionTagId
        ])->delete();
    }

    public static function updateTransactionSource(Int $transactionId, Int $sourceId)
    {
        return Transaction::where('id', $transactionId)
            ->update([
                'source_id' => $sourceId
            ]);
    }

    private static function convertAmount($type, $amount)
    {
        $amount = floatval($amount);

        if($type == 'expense') {
            if($amount < 0) {
                return $amount;
            }

            return -abs($amount);
        }else{
            if($amount < 0) {
                return abs($amount);
            }
        }

        return $amount;
    }
}

?>
