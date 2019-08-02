<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    protected $table = 'products';

    protected $fillable =  ['name', 'price_old', 'cate_id', 'sale', 'price_new', 'author', 'publishing_company', 'number_page', 'total', 'status', 'detail', 'class', 'subjects', 'thumbnail', 'hot'];

    public function categoryProduct()
    {
        return $this->belongsTo(CategoryProduct::class, 'cate_id', 'id');
    }
}
