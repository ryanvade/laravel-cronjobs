<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id')->unique()->index();
            $table->string('project_name');
            $table->integer('project_admin_id')->unsigned();
            $table->string('storage_server_url');
            $table->integer('storage_server_port');
            $table->string('storage_server_password');
            $table->string('storage_server_username');
            $table->boolean('storage_server_is_sftp');
            $table->boolean('isPassive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('projects');
    }
}
