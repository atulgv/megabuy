<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $table = 'admins';

    protected $primarykey = 'admin_id';

    protected $guarded = [];

    public function approval(){
        return $this->hasMany(Approval::class);
    }

    public function alluser(){
        return $this->belongsTo(AllUser::class,'alluser','alluserid');
    }
}
