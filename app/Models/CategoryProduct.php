<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    protected $table = 'category_product';

    protected $fillable = ['title', 'slug', 'parent_id', 'status'];

    public function product()
    {
        return $this->hasMany(Product::class, 'id', 'id');
    }
}
