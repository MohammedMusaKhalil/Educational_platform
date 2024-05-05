<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;
class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1;$i<=3;$i++){
            for ($j=1;$j<=6;$j++){
                Course:: created([
                    'cat_id' =>$i,
                'trainer_id'=> rand(1,5),
                'name'=>"course num $j cat num $j",
                    'small_desc'=>'First recorded in 1200–50; Middle English stori(e), store, “(written or oral) narrative; history,” from Anglo-French (e)storie (Old French estoire), from Latin historia history',
                    'price'=>rand(100,300),
                    'img'=>"$i$j.jpg",
                ]);
            }
        }
    }
}
