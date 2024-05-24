<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllUser extends Model
{
    use HasFactory;

    protected $table = 'allusers';

    protected $primarykey = 'alluserid';

    protected $guarded = [];

    public function admin(){
        return $this->hasMany(Admin::class);
    }

    public function seller(){
        return $this->hasMany(Seller::class);
    }

    public function buyer(){
        return $this->hasMany(Buyer::class);
    }
}
