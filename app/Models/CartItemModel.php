<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItemModel extends Model
{
    protected $fillable = ['cart_id', 'product_id', 'qty'];

    public function product()
    {
        return $this->belongsTo(ProductModel::class, 'product_id');
    }
}
