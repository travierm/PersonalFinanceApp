<?php
namespace App\Services;

use App\Models\UserTransactionTag;

class UserTransactionTagService {
    public static function getAll(Int $userId)
    {
        return UserTransactionTag::where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public static function createTag(Int $userId, String $tagName)
    {
        $tagName = strtolower($tagName);

        return UserTransactionTag::firstOrCreate([
            'user_id' => $userId,
            'name' => $tagName
        ]);
    }

    public static function userOwnsTag(Int $userId, Int $tagId)
    {
        return UserTransactionTag::where([
            'id' => $tagId,
            'user_id' => $userId
        ])->exists();
    }

    public static function deleteTag(Int $tagId)
    {
        return UserTransactionTag::where([
            'id' => $tagId
        ])->delete();
    }
}
?>
