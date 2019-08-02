<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';

    protected $fillable =  ['title', 'slug', 'cate_id', 'description', 'content', 'thumbnail', 'author', 'status', 'hot'];

    public function categoryNews()
    {
        return $this->belongsTo(CategoryNews::class, 'cate_id', 'id');
    }
}
