<?php

namespace App\Policies;

use App\Models\User;

class ApplicationPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
     public function view(User $user, Application $application)
    {
        // Owner of application OR owner of the project
        return $application->user_id === $user->id 
            || $application->project->user_id === $user->id;
    }

    public function create(User $user)
    {
        // Any authenticated user can apply
        return $user !== null;
    }

    public function update(User $user, Application $application)
    {
        // Only owner of application can update
        return $application->user_id === $user->id;
    }

    public function delete(User $user, Application $application)
    {
        // Only owner of application can delete
        return $application->user_id === $user->id;
    }
}
