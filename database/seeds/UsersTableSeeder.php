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
          'group_id' => 1,
          'created_at' => new DateTime,
          'updated_at' => new DateTime
        ]);

        DB::table('Users')->insert([
          'name' => 'Admin2',
          'email' => 'Admin2@somesite.com',
          'password' => bcrypt('apassword'),
          'group_id' => 2,
          'created_at' => new DateTime,
          'updated_at' => new DateTime
        ]);

        DB::table('Users')->insert([
          'name' => 'Dummy1',
          'email' => 'Dummy@somesite.com',
          'password' => bcrypt('apassword'),
          'group_id' => 1,
          'created_at' => new DateTime,
          'updated_at' => new DateTime
        ]);
        DB::table('Users')->insert([
          'name' => 'Dummy2',
          'email' => 'Dummy2@somesite.com',
          'password' => bcrypt('apassword'),
          'group_id' => 2,
          'created_at' => new DateTime,
          'updated_at' => new DateTime
        ]);
    }
}
