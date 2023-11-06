<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;



class TasksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            DB::table('tasks')->insert([
                'name'=>fake()->realText(20),
                'detail'=>fake()->realText(40),
                'created_at' => now(),
                'updated_at' => now(),
                'completion_flag'=> false,
                'game_id'=>1
            ]);
    }
}
