<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Users')->insert([
          'name' => 'Test User',
          'email' => 'TestUser@somesite.com',
          'password' => bcrypt('apassword'),
          'created_at' => new DateTime,
          'updated_at' => new DateTime
        ]);
    }
}
