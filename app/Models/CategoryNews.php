<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryNews extends Model
{
    protected $table = 'category_news';

    protected $fillable = ['title', 'slug', 'parent_id', 'status'];

    public function news()
    {
        return $this->hasMany(News::class, 'id', 'id');
    }
}
