<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Uid\Ulid;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('admins')->insert([
            'id' => strtolower(Ulid::generate()),
            'username' => 'admin1',
            'email' => 'admin1@gmail.com',
            'password' => bcrypt('admin123')
        ]);
    }
}
