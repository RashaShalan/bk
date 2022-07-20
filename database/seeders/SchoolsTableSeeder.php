<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SchoolsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        App\Models\school::create([
            'name' => 'Primary school 1'
        ]);

        App\Models\school::create([
            'name' => 'Secondary school 1'
            
        ]);
    }
}
