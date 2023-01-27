<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ([
            [
                'Fname' => 'Coordinator',
                'Lname' => 'c',
                'email' => 'coordinator@gmail.com',
                'password' => Hash::make('12345678'),
                'confirmPass' => Hash::make('12345678'),
                'category' => 'Coordinator'
            ],
            [
                'Fname' => 'Student',
                'Lname' => 's',
                'email' => 'student@gmail.com',
                'password' => Hash::make('12345678'),
                'confirmPass' => Hash::make('12345678'),
                'category' => 'Student'
            ],
            [
                'Fname' => 'Lecturer',
                'Lname' => 'l',
                'email' => 'lecturer@gmail.com',
                'password' => Hash::make('12345678'),
                'confirmPass' => Hash::make('12345678'),
                'category' => 'Lecturer'
            ],
            [
                'Fname' => 'Committee',
                'Lname' => 'c',
                'email' => 'committee@gmail.com',
                'password' => Hash::make('12345678'),
                'confirmPass' => Hash::make('12345678'),
                'category' => 'Committee'
            ],
            [
                'Fname' => 'HOSD',
                'Lname' => 'h',
                'email' => 'hosd@gmail.com',
                'password' => Hash::make('12345678'),
                'confirmPass' => Hash::make('12345678'),
                'category' => 'HOSD'
            ],
            [
                'Fname' => 'Dean',
                'Lname' => 'd',
                'email' => 'dean@gmail.com',
                'password' => Hash::make('12345678'),
                'confirmPass' => Hash::make('12345678'),
                'category' => 'Dean'
            ],

        ]);

        User::insert($data);
    }
}
