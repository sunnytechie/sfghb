<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newspapercomment extends Model
{
    use HasFactory;

    //belongs to user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //belongs to Newspaper
    public function newspaper()
    {
        return $this->belongsTo(Newspaper::class);
    }
}
