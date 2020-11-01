<?php
namespace App\Services;

use App\Models\UserConfig;

class UserConfigService {
    public static function getConfig(Int $userId) {
        return UserConfig::firstOrCreate([
            'user_id' => $userId,
        ]);
    }

    public static function updateCurrentAccountBalance(Int $userId, Float $currentAccountBalance) {
        $config = self::getConfig($userId);

        if($currentAccountBalance === $config->current_account_balance) {
            return false;
        }

        $config->current_account_balance = $currentAccountBalance;
        $config->current_account_balance_updated_at = now();

        return $config->save();
    }
}
?>
