<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    protected $table = 'category';
    public $timestamps = false;
    protected $primaryKey = 'category_id'; // Khóa chính là category_id


    // ⬅️ PHƯƠNG THỨC products() BỊ THIẾU GÂY RA LỖI
    // Khắc phục lỗi: Chỉ định KHÓA NGOẠI là 'product_category'
    public function products()
    {
        // hasMany(Related Model, Foreign Key, Local Key)
        return $this->hasMany(ProductModel::class, 'product_category', 'category_id');
    }
}
