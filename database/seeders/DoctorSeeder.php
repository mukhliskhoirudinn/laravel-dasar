<?php

namespace Database\Seeders;

use App\Models\Doctor;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Doctor::insert([
            [
                'uuid' => Str::uuid(),
                'name' => 'Dr. Ridho',
                'email' => 'q5Fp7@example.com',
                'phone' => '081234567890',
                'gender' => 'male',
            ],
            [
                'uuid' => Str::uuid(),
                'name' => 'Dr. Jihan',
                'email' => 'qsdsd7@example.com',
                'phone' => '081234356743',
                'gender' => 'female',
            ],
        ]);
    }
}
