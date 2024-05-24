<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $primarykey = 'category_id';

    protected $guarded = [];

    public function subcategory(){
        return $this->hasMany(SubCategory::class,'category','category_id');
    }


}
