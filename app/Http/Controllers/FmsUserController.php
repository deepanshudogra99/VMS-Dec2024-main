<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FmsUserController extends Controller
{
  public function addvc()
  {
    return view('fmsuser.addvc');
  }
}
