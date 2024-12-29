<?php

namespace Database\Seeders;
use App\Models\State;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StateSeeder extends Seeder
{
    public function run(): void
    {
        $json = File::get(path:'database/json/state.json');
        $states = collect(json_decode($json));

        $states->each(function($state){
            state::create([
                'statecode'=>$state->statecode,
                'statename'=>$state->statename,
                'stateabbr'=>$state->stateabbr
            ]);
        });
    }
}
