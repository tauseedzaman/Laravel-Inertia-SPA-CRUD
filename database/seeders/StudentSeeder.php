<?php

namespace Database\Seeders;

use App\Models\student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => "tauseedzaman",
                'rollno' => "17",
                'city' => "Dargai",
                'class' => "B.Com",
            ],
            [
                'name' => "shahidzaman",
                'rollno' => "71",
                'city' => "Malakand",
                'class' => "BSCS",
            ],
        ];
        if (student::count() == 0) {
            foreach ($data as $student) {
                student::create($student);
            }
        }
    }
}
