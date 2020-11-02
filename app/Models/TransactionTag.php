<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionTag extends Model
{
    use HasFactory;

    protected $fillable = [
        'tag_id',
        'user_id',
        'transaction_id'
    ];
}
