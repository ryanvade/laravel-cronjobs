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
        'project_admin_id' => 1,
        'storage_server_url'=> '54.84.85.146',
        'storage_server_port' => 22,
        'storage_server_password' => 'somepassword',
        'storage_server_username' => 'ftptestuser',
        'storage_server_is_sftp' => true,
        'isPassive' => true,
        'created_at' => new DateTime,
        'updated_at' => new DateTime
      ]);
      DB::table('projects')->insert([
        'project_name' => 'Test Project 2',
        'project_admin_id' => 2,
        'storage_server_url'=> '54.84.85.146',
        'storage_server_port' => 21,
        'storage_server_password' => 'somepassword',
        'storage_server_username' => 'ftptestuser',
        'storage_server_is_sftp' => false,
        'isPassive' => false,
        'created_at' => new DateTime,
        'updated_at' => new DateTime
      ]);
    }
}
