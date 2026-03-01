<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name', 'price','description','category_id', 'image1', 'image2', 'image3'
    ];

    protected $appends = ['category_name'];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function product_orders(){
        return $this->hasMany(ProductOrder::class, 'product_id', 'id');
    }

    public function getCategoryNameAttribute(){
        return $this->category->name;
    }

}
