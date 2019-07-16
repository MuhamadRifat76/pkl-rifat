<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    protected $fillable = ['nama', 'slug'];

    public $timestamps = 'true';
}
