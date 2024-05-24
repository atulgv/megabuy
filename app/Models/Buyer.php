<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
    use HasFactory;

    protected $table = 'buyers';

    protected $primarykey = 'buyer_id';

    protected $guarded = [];

    public function wishlist(){
        return $this->hasMany(Wishlist::class);
    }

    public function cart(){
        return $this->hasMany(Cart::class);
    }

    public function alluser(){
        return $this->belongsTo(AllUser::class,'alluser','alluserid');
    }

}
