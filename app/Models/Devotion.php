<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Devotion extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'thumbnail',
        'body',
        'reading',
        'read_date',
        'published',
    ];

    public function devotioncomments()
    {
        return $this->hasMany(Devotioncomment::class);
    }
}
