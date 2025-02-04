<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@myjavalearningcenter.com',
            'password' => bcrypt('password'),
            'phone' => '9878767654',
            'address' => 'Banglore',
            'active' => 1,
        ]);

        $user->assignRole('admin');
    }
}
