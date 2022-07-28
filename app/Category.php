<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $with = ['subCategories'];
    public function subCategories()
    {
        return $this->hasMany('App\SubCategory', 'cat_id', 'id');
    }

    public function contents()
    {
        return $this->hasMany('App\Content', 'category_id', 'id');
    }
    
}
