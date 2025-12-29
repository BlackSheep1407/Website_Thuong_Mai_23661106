<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id','customer_name','shipping_address','total','status'];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    // Note: No user relationship since foreign key was removed
    // to handle mismatched data types between orders.user_id (bigint) and user.user_id (int)
}
