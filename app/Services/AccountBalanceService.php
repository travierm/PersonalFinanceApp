<?php
namespace App\Services;

use DB;
use App\Models\UserConfig;
use App\Models\Transaction;
use App\Models\UserTransactionSource;

class AccountBalanceService {
    public static function getCurrentAccountBalance($userId)
    {

        $userConfig = UserConfig::where('user_id', $userId)
            ->first();

        $transactionSum = Transaction::where('user_id', $userId)
            ->sum('amount');

        if(isset($userConfig->current_account_balance)) {
            $transactionSum += $userConfig->current_account_balance;
        }

        return $transactionSum;
    }

    public static function getSpendingPerTag($userId)
    {
         return DB::select("
            SELECT
                name as tagName,
                SUM(amount) as total
            FROM
                user_transaction_tags
            JOIN transaction_tags
            ON
                user_transaction_tags.id = transaction_tags.tag_id
            JOIN transactions
            ON
                transactions.id = transaction_tags.transaction_id
            WHERE
                type = 'expense'
                AND
                user_transaction_tags.user_id = $userId
            GROUP BY tag_id
            ORDER BY total ASC
            LIMIT 0,5
         ");
    }

    public static function getSpendingPerSource($userId)
    {
        $totalsBySource = Transaction::select(DB::raw('SUM(amount) as total, source_id'))
            ->where('user_id', $userId)
            ->where('type', 'expense')
            ->groupBy('source_id')
            ->orderBy('total', 'ASC')
            ->limit(5)
            ->get();

        return $totalsBySource;
    }
}

?>
