<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Content extends Model
{
    use SoftDeletes;
    public $guarded = [''];
    public $with = ['categories','sub_categories'];
    public function categories()
     {
       return $this->belongsTo('App\Category', 'category_id', 'id');
    }

    public function sub_categories()
     {
       return $this->belongsTo('App\SubCategory', 'subCategory_id', 'id');
    }
}
