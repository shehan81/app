<?php

use Illuminate\Database\Seeder;

class ResourceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('resources')->insert([
            ['name' => 'document', 'type' => 'doc'],
            ['name' => 'photo', 'type' => 'image']
        ]);
    }
}
