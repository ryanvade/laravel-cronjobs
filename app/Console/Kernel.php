<?php

namespace App\Console;
use App\Project;
use App\FTPUtil;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        // Commands\Inspire::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function() {

            foreach (Project::all() as $project) {
               $filename = createprojectfile($project);
               if($project->storage_sever_is_sftp){
                   sftpUpload($project, $filename);
               }else {
                   ftpUpload($project, $filename);
               }
            }

        })->when(function() {
          return true;
        });
        //->everyFiveMinutes();
    }
}
