<?php

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('projects')->insert([
        'project_name' => 'Test Project Name',
        'storage_server_url'=> '',
        'storage_server_password' => '',
        'storage_server_username' => '',
        'server_is_anonymous' => FALSE, 
        'created_at' => new DateTime,
        'updated_at' => new DateTime
      ]);
    }
}
