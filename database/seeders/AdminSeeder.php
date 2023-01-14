<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
          'name' => 'Admin Warung Bu Putri',
          'username' => 'admin',
          'email' => 'admin@gmail.com',
          'isAdmin' => 1,
          'address' => 'Sidoarjo',
          'password' => 'admin123'
        ]);
    }
}
