<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Department;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
     
        Department::create([
            'name' => 'medicine',
             ]);
             Department::create([
                'name' => 'kidney',
                 ]);
                 Department::create([
                    'name' => 'heart',
                     ]);
    }
}
