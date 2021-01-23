<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favolist extends Model
{
    protected $fillable = [
        'email', 'TopFile', 'BottomFile','created_at','updated_at'
    ];
}