<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductOrder;

class Order extends Model
{
    use HasFactory;

    protected $with = ['products'];

    public function products()
    {
        return $this->hasMany(ProductOrder::class);
    }
}
