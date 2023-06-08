<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paykey extends Model
{
    use HasFactory;

    protected $fillable = [
        'paystack_test_secret_key',
        'paystack_test_public_key',
        'paystack_live_secret_key',
        'paystack_live_public_key',
        'devotion_price',
        'devotion_usd_price',
        'naira_monthly_price',
        'usd_monthly_price',
        'naira_yearly_price',
        'usd_yearly_price',
    ];
}
