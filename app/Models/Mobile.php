<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobile extends Model
{
    use HasFactory;

    protected $table = 'mobiles';

    protected $primarykey = 'mobile_id';

    protected $guarded = [];

    public function subcategory(){
        return $this->belongsTo(SubCategory::class,'subcategory','subcategory_id');
    }

    public function battery(){
        return $this->belongsTo(Battery::class,'battery','battery_id');
    }

    public function brand(){
        return $this->belongsTo(Brand::class,'brand','brand_id');
    }

    public function itemmodel(){
        return $this->belongsTo(ItemModel::class,'itemmodel','model_id');
    }

    public function itemcamera(){
        return $this->belongsTo(ItemCamera::class,'itemcamera','camera_id');
    }

    public function processor(){
        return $this->belongsTo(Processor::class,'processor','processor_id');
    }

    public function ram(){
        return $this->belongsTo(RAM::class,'ram','ram_id');
    }

    public function storage(){
        return $this->belongsTo(Storage::class,'storage','storage_id');
    }

    public function screen(){
        return $this->belongsTo(Screen::class,'screen','screen_id');
    }

    public function rating(){
        return $this->belongsTo(Rating::class,'rating','rating_id');
    }
}
