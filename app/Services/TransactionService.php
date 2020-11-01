<?php
namespace App\Services;

use App\Models\Transaction;
use App\Models\TransactionTag;

class TransactionService {
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

    public static function getAll($userId)
    {
        return Transaction::where('user_id', $userId)
            ->orderBy('date', 'DESC')
            ->get();
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

    public static function createTransactionTag(Int $transactionId, Int $tagId)
    {
        return TransactionTag::firstOrCreate([
            'tag_id' => $tagId,
            'transaction_id' => $transactionId
        ]);
    }
}

?>
