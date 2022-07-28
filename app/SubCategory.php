<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
   public function categories()
   {
       return $this->belongsTo('App\Category', 'cat_id', 'id');
   }

   public function contents()
   {
       return $this->hasMany('App\Content', 'subCategory_id', 'id');
   }

   
}
