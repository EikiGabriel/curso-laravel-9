<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{

    public function run(): void
    {
        User::create([
            'name' => 'Roberto Carlos',
            'email' => 'robertincarlin@gmail.com',
            'password' => bcrypt('carlinreidelas'),
        ]);
    }
}
