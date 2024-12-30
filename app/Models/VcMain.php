<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VcMain extends Model
{
  protected $fillable = [
    'vcid',
    'name',
    'designation',
    'mobile',
    'userid',
  ];
}
