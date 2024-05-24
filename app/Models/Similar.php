<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Similar extends Model
{
    use HasFactory;

    protected $table = 'similars';

    protected $primarykey = 'similar_id';

    protected $guarded = [];
}
