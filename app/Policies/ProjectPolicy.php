<?php

namespace App\Policies;

use App\Models\User;

class ProjectPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
    public function view(User $user, Project $project)
    {
        // User can view own project
        return $project->user_id === $user->id;
    }

    public function create(User $user)
    {
        // Any authenticated user can create
        return $user !== null;
    }

    public function update(User $user, Project $project)
    {
        // Only owner can update
        return $project->user_id === $user->id;
    }

    public function delete(User $user, Project $project)
    {
        // Only owner can delete
        return $project->user_id === $user->id;
    }
}
