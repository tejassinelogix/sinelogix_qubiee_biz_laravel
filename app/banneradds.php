<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class banneradds extends Model
{
    protected $casts = [
    'name' => 'array',
    ];
    protected $fillable = ['name','url','image','section','role_id','status'];
}
