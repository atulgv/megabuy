<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    protected $table = 'wishlists';

    protected $primarykey = 'wishlist_id';

    protected $guarded = [];

    public function buyer(){
        return $this->belongsTo(Buyer::class,'buyer','buyer_id');
    }

}
