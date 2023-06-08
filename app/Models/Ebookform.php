<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ebookform extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'book_name',
        'book_type',
    ];
}
