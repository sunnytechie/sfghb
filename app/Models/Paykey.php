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
    ];
}
