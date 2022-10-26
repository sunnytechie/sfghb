<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audioserie extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
    ];

    public function audio()
    {
        return $this->hasMany(Audio::class);
    }
}
