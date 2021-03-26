<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesManagement extends Model
{
    use HasFactory;
    protected $fillable = [ 'product_id',
           'user_id',
            'distributor_id',
            'cost_price',
            'selling_price',
            'quantity',
            'selling_date',
    ];

    public function salesmen()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function distributor()
    {
        return $this->belongsTo('App\Models\Distributor');
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}
