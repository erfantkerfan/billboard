<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Config extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name', 'attribute'
    ];
    protected $dates = ['deleted_at'];
}
