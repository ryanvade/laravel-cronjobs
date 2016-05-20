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
        'storage_server_url'=> '159.203.172.61',
        'storage_server_port' => 21,
        'storage_server_password' => 'password123',
        'storage_server_username' => 'ryan',
        'server_is_anonymous' => FALSE,
        'created_at' => new DateTime,
        'updated_at' => new DateTime
      ]);
      DB::table('projects')->insert([
        'project_name' => 'Test Project 2',
        'storage_server_url'=> '159.203.172.61',
        'storage_server_port' => 21,
        'storage_server_password' => 'password123',
        'storage_server_username' => 'ryan',
        'server_is_anonymous' => FALSE,
        'created_at' => new DateTime,
        'updated_at' => new DateTime
      ]);
    }
}
