<?php
namespace App\Services;

use DB;
use App\Models\Transaction;
use App\Models\UserTransactionSource;

class AccountBalanceService {
    public static function getCurrentAccountBalance($userId)
    {
        return Transaction::where('user_id', $userId)
            ->sum('amount');
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
