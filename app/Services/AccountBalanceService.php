<?php
namespace App\Services;

use App\Models\Transaction;

class AccountBalanceService {
    public static function getCurrentAccountBalance($userId)
    {
        return Transaction::where('user_id', $userId)
            ->sum('amount');
    }
}

?>
