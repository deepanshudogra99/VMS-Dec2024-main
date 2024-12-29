<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get(path:'database/json/user.json');
        $user = collect(json_decode($json));

        $user->each(function($user){
            user::create([
                "statecode"=>$user->statecode,
                "districtcode"=>$user->districtcode,
                "officecode"=>$user->officecode,
                "usertypecode"=>$user->usertypecode,
                "userid"=>$user->userid,
                "userrole"=>$user->userrole,
                "name"=>$user->name,
                "email"=>$user->email,
                "password"=>$user->password,
                "status"=>$user->status,
                "activationdate"=>$user->activationdate,
                "deactivationdate"=>$user->deactivationdate
            ]);
        });
    }
}
