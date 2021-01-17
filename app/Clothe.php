<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clothe extends Model
{
    protected $fillable = [
        'ImageFile', 'email', 'WearType'
    ];
}

