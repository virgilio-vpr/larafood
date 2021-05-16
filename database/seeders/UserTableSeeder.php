<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Carlos Ferreira',
            'email' => 'carlos@gmail.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
