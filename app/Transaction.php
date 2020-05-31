<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';
    protected $fillable = [
        'name',
        'customer_id',
        'currency_id',
        'buy_amount',
        'buy_rate',
        'buy_total',
        'sell_amount',
        'sell_rate',
        'paid_by_client',
        'return_to_client',
        'description',
        'profit',
        'type',
        'last_avg_rate',
        'current_balance',
        'created_at',
        'updated_at'
    ];
}
