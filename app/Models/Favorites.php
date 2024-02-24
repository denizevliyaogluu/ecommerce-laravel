<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorites extends Model
{
    protected $fillable = ['user_id', 'product_id'];

    public function product()
    {
        return $this->belongsTo(Products::class, 'id','product_id');
    }
}
