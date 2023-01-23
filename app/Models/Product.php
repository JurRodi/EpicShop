<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductOrder;

class Product extends Model
{
    use HasFactory;

    protected $with = ['orders'];
    
    public function orders()
    {
        return $this->hasMany(ProductOrder::class);
    }
}
