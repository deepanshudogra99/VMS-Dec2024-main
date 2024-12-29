<?php

namespace Database\Seeders;
use App\Models\Office;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
class OfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get(path:'database/json/office.json');
        $offices = collect(json_decode($json));

        $offices->each(function($office){
            office::create([
                'officecode'=>$office->officecode,
                'officename'=>$office->officename
            ]);
        });
    }
}
