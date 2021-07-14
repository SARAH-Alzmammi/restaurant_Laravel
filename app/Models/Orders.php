<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'user_id ',
        'cart ',
        'table_number'

    ];

    public static function create(array $array)
    {
    }

    // public function Dishes(){
    //     return $this->hasMany(Dishes::class);
    // }
    public function user(){
        return $this->belongsTo(User::Class);
    }
}
