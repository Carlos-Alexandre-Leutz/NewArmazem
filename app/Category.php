<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'code';
    public $incrementing = false;
    public $timestamps = false;

    public function subcategories()
    {
        return $this->hasMany(Category::class, 'category');
    }
}
