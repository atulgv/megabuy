<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllItem extends Model
{
    use HasFactory;

    protected $table = 'allitems';

    protected $primarykey = 'allitem_id';

    protected $guarded = [];

    public function megadeal(){
        return $this->hasMany(MegaDeal::class);
    }

    public function subcategory(){
        return $this->belongsTo(SubCategory::class,'subcategory','subcategory_id');
    }

    public function category(){
        return $this->belongsTo(Category::class,'category','category_id');
    }
}
