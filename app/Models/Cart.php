<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'carts';

    protected $primarykey = 'cart_id';

    protected $guarded = [];

    public function buyer(){
        return $this->belongsTo(Buyer::class,'buyer','buyer_id');
    }
}
