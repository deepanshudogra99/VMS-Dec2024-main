<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use App\Models\UserType;


class UserTypesSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $json = File::get(path: 'database/json/usertype.json');
    $usertypes = collect(json_decode($json));

    $usertypes->each(function ($usertype) {
      usertype::create([
        'usertypecode' => $usertype->usertypecode,
        'usertypename' => $usertype->usertypename,
      ]);
    });
  }
}
