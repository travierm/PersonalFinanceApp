<?php
namespace App\Services;

use App\Models\UserTransactionSource;

class UserTransactionSourceService {
    public static function getAll(Int $userId)
    {
        return UserTransactionSource::where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public static function createSource(Int $userId, String $sourceName)
    {
        $sourceName = strtolower($sourceName);

        return UserTransactionSource::firstOrCreate([
            'user_id' => $userId,
            'name' => $sourceName
        ]);
    }

    public static function userOwnsSource(Int $userId, Int $sourceId)
    {
        return UserTransactionSource::where([
            'id' => $sourceId,
            'user_id' => $userId
        ])->exists();
    }

    public static function deleteSource(Int $sourceId)
    {
        return UserTransactionSource::where([
            'id' => $sourceId
        ])->delete();
    }
}
?>
