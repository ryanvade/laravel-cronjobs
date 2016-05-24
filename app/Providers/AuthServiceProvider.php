<?php

namespace App\Providers;

use App\User;
use App\Project;
use App\Group;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        #TODO Find a better way to get the groups project admin
        $gate->define('update-ftp', function (User $user, Project $project) {
            $group = Group::find($project->id);
            return $user->id == $group->project_admin_id;
        });

        $gate->define('view-ftp', function (User $user, Project $project) {
            $group = Group::find($project->id);
            return $user->id == $group->project_admin_id;
        });
    }
}
