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
        'audio',
        'anchor_bible_text',
        'anchor_bible_chapter_verse',
        'bible_reading_chapter_verse',
        'prayer',
        'further_reading',
    ];

    public function devotioncomments()
    {
        return $this->hasMany(Devotioncomment::class);
    }
}
