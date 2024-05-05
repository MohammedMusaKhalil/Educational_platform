<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Trainer;

class TrainerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Trainer::created([
            'name'=>'Mohamad khalil',
            'spec'=>'backend Developer',
            'img'=>'1.jpg'
        ]);
        Trainer::created([
            'name'=>'Mohamad kutaine',
            'spec'=>'frontend Developer',
            'img'=>'2.jpg'
        ]);
        Trainer::created([
            'name'=>'Musa khalil',
            'spec'=>'dentist',
            'img'=>'3.jpg'
        ]);
        Trainer::created([
            'name'=>'allam kutaine',
            'spec'=>'English teacher',
            'img'=>'4.jpg'
        ]);
    }
}
