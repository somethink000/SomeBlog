<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Memeber extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'about',
        'image',
    ];
}
