<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        App\Models\student::create([
            'name' => 'Ahmed Ahmed',
            'school_id'=>'1',
            'order'=>'1'
        ]);

        App\Models\student::create([
            'name' => 'Salem Salem',
            'school_id'=>'1',
            'order'=>'2'
        ]); 
        App\Models\student::create([
            'name' => 'Nour Nour',
            'school_id'=>'2',
            'order'=>'1'
        ]);
    }
}
