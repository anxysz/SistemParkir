<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'nama'=>'Mas Admin',
                'email'=>'admin@gmail.com',
                'role'=>'Admin',
                'password'=>bcrypt('polinesAdmin1')
            ],
            [
                'nama'=>'Mas Satpam',
                'email'=>'satpam@gmail.com',
                'role'=>'Satpam',
                'password'=>bcrypt('polinesSatpam2')
            ],
        ];

        foreach ($userData as $key => $val){
            User::create($val);
        }
    }
}
