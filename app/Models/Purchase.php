<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'no_copy',
        'for_who',
        'thumbnail',
        'currency',
        'amount',
        'method',
        'tx_ref',
    ];
}
