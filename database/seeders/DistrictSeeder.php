<?php

namespace Database\Seeders;
use App\Models\District;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get(path:'database/json/district.json');
        $districts = collect(json_decode($json));

        $districts->each(function($district){
            district::create([
                'statecode'=>$district->statecode,
                'districtcode'=>$district->districtcode,
                'districtname'=>$district->districtname,
                'districtabbr'=>$district->districtabbr,
                // 'districtkey'=>$district->districtkey,
                // 'totaloffices'=>$district->totaloffices
            ]);
        });
    }
}
