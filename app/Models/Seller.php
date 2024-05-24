<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;

    protected $table = 'sellers';

    protected $primarykey = 'seller_id';

    protected $guarded = [];

    public function allitem(){
        return $this->hasMany(AllItem::class);
    }

    public function alluser(){
        return $this->belongsTo(AllUser::class,'alluser','alluser_id');
    }
}
