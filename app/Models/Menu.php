<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menus';

    protected $fillable =  ['title', 'slug', 'link', 'parent_id', 'status'];
}