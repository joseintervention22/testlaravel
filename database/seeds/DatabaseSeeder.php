<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Jose ruiz',
            'email' => 'jose220396@hotmail.com',
            'password' => bcrypt('123'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $this->call(UserSeeder::class);
    }
}
