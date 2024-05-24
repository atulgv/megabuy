<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MegaDeal extends Model
{
    use HasFactory;

    protected $table = 'megadeals';

    protected $primarykey = 'deal_id';

    protected $guarded = [];

    public function allitem(){
        return $this->belongsTo(AllItem::class,'allitem','allitem_id');
    }
}
