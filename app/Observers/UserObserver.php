<?php

namespace App\Observers;

use App\Models\User;

class UserObserver
{
    /**
     * Handle the User "creating" event.
     */
    public function creating(User $user): void
    {
        if (is_null($user->type)) {
            $user->type = 'cliente';
        }
    }

    /**
     * Handle the User "created" event.
     */
    public function created(User $user): void
    {
        if ($user->type) {
            $user->assignRole($user->type);
        }

        if ($user->roles()->count() === 0) {
            $user->assignRole('cliente');
            if (! $user->type) {
                $user->type = 'cliente';
                $user->saveQuietly();
            }
        }
    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user): void
    {
        if ($user->wasChanged('type')) {
            $user->syncRoles([$user->type]);
        }
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {
        //
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        //
    }
}
