<?php

// app/Models/Order.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['customer_name', 'total_amount', 'status'];

    /**
     * Get the order details associated with the order.
     */
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}

