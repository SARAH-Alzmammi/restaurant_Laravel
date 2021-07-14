<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dishes extends Model
{

    protected $fillable = [
        'name',
        'description',
        'price',
        'image_path'

    ];
    use HasFactory;
}
