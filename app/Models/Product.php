<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'detail','image','price',
    ];

    public function sell()
    {
        return $this->hasMany('App\Models\SalesManagement');
    }
}
