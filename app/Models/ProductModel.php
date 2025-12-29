<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    protected $table = 'product';
    public $timestamps = false;
    protected $primaryKey = 'product_id'; // Khóa chính là product_id
    protected $fillable = ['product_name', 'product_price', 'product_img', 'product_description', 'product_category'];

    // Khắc phục lỗi: Chỉ định KHÓA NGOẠI là 'product_category'
    public function category()
    {
        // belongsTo(Parent Model, Foreign Key, Owner Key)
        return $this->belongsTo(CategoryModel::class, 'product_category', 'category_id');
    }

}
