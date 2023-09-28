<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
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
            'name'=>'Saiful',
            'email'=>'saiful@gmail.com',
            'password'=>bcrypt('password')
          ],
          [
            'name'=>'Raihan',
            'email'=>'raihan@gmail.com',
            'password'=>bcrypt('password')
          ],
          [
            'name'=>'Ashiq',
            'email'=>'ashiq@gmail.com',
            'password'=>bcrypt('password')
          ],
        ];

        foreach($users as $user){
            User::create($user);
        }
    }
}
