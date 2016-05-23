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
          'name' => 'Admin',
          'email' => 'Admin@somesite.com',
          'password' => bcrypt('apassword'),
          'created_at' => new DateTime,
          'updated_at' => new DateTime
        ]);

        DB::table('Users')->insert([
          'name' => 'Not Admin',
          'email' => 'NotAdmin@somesite.com',
          'password' => bcrypt('apassword'),
          'created_at' => new DateTime,
          'updated_at' => new DateTime
        ]);
    }
}
