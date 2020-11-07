<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'type',
        'amount',
        'user_id',
        'source_id',
        'description'
    ];

    protected $dates = [
        'date'
    ];

    public function source()
    {
        return $this->hasOne('App\Models\UserTransactionSource', 'source_id');
    }

    public function getTags()
    {
        $attachedTags = collect(TransactionTag::where('transaction_id', $this->id)->get());

        $tags = UserTransactionTag::whereIn('id', $attachedTags->pluck('tag_id'))
            ->orderBy('name', 'DESC')
            ->get();

        foreach($tags as &$tag) {
            $transactionTag = $attachedTags->where('tag_id', $tag->id)
                ->where('transaction_id', $this->id)
                ->first();

            $tag->transaction_tag_id = $transactionTag->id;
        }

        return $tags;
    }
}
