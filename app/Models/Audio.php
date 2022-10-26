<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audio extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'audio',
        'thumbnail',
        'audioserie_id',
    ];
    
    //belongs to Audioseries
    public function audioserie()
    {
        return $this->belongsTo(Audioserie::class);
    }
}
