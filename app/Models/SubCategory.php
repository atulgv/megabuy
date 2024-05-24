<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubCategory extends Model
{
    use HasFactory;

    protected $table = 'subcategories';

    protected $primarykey = 'subcategory_id';

    protected $guarded = [];

    public function allitems(){
        return $this->hasMany(AllItem::class,'subcategory','subcategory_id');
    }

    public function category(){
        return $this->belongsTo(Category::class,'category','category_id');
    }

}
