<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VcMaster extends Model
{
  protected $fillable = [
    'statecode',
    'districtcode',
    'officecode',
    'vcid',
    'vcdate',
    'purpose',
    'timein',
    'timeout',
    'userid'
  ];
}
