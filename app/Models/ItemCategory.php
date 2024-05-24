<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemCategory extends Model
{
    use HasFactory;

    protected $table = 'itemcategories';

    protected $primarykey = 'itemcategory_id';

    protected $guarded = [];

    public function mobile(){
        return $this->belongsTo(Mobile::class,'subcategory','mobile_id');
    }
}
