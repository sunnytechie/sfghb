<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Devotioncomment extends Model
{
    use HasFactory;

    //belongs to user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //belongs to user
    public function devotion()
    {
        return $this->belongsTo(Devotion::class);
    }
}
