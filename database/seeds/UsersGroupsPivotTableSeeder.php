<?php

use Illuminate\Database\Seeder;

class UsersGroupsPivotTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('group_user')->insert([
          'group_id' => 1,
          'user_id' => 1
        ]);

        DB::table('group_user')->insert([
          'group_id' => 2,
          'user_id' => 2
        ]);

        DB::table('group_user')->insert([
          'group_id' => 1,
          'user_id' => 3
        ]);

        DB::table('group_user')->insert([
          'group_id' => 2,
          'user_id' => 4
        ]);
    }
}
