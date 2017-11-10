<?php

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
        DB::table('users')->insert([[ 'username' => 'admin', 'password' => '$2y$10$0Dtx5qV3itypbSIMWisQc.nGNnEjukQmpNOZ4bz8EMO61Qs/dso0K']]);
    }
}
