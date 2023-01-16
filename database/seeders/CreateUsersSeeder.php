<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
               'name'=>'SuNandi',
               'email'=>'sunandi@gmail.com',
                'is_admin'=>'1',
               'password'=> bcrypt('123456'),
            ],
            [
                'name'=>'Sellie',
                'email'=>'sellie@gmail.com',
                 'is_admin'=>'1',
                'password'=> bcrypt('123456'),
             ],
        ];

        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
