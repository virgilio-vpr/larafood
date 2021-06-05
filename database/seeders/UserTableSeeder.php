<?php

namespace Database\Seeders;

use App\Models\Tenant;
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
        $tenant = Tenant::first();

        $tenant->users()->create([
            'name' => 'Virgilio Rosa',
            'email' => 'virgilio.vpr@gmail.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
