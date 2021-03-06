<?php

namespace App\Console;
use App\Project;
use App\FTPUtil;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Contacs\Logging;
use Log;

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
               Log::info($project->project_name . ' is sftp: ' . $project->storage_server_is_sftp);
               if($project->storage_server_is_sftp){
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
