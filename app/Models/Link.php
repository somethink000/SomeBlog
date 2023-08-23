<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;

    public $linkicons=[
        'github.svg',
        'artstation.svg',
        'sketchfab.svg',
        'steam.svg',
        'youtube.svg',
    ];

    protected $fillable = [
        'image',
        'link'
    ];


}
