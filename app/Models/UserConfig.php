<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserConfig extends Model
{
    use HasFactory;

    protected $primaryKey = 'user_id';
    
    protected $fillable = [
        'user_id',
        'current_account_balance',
        'current_account_balance_updated_at'
    ];

    protected $dates = [
        'current_account_balance_updated_at'
    ];
}
