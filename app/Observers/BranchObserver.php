<?php

namespace App\Observers;

use App\Models\Branch;

class BranchObserver
{
    /**
     * Handle the Branch "creating" event.
     */
    public function creating(Branch $branch): void
    {
        if (!$branch->code) {
            $lastBranch = Branch::orderBy('id', 'desc')->first();
            $nextNumber = $lastBranch ? ((int) str_replace('SUC-', '', $lastBranch->code)) + 1 : 1;
            $branch->code = 'SUC-' . str_pad($nextNumber, 3, '0', STR_PAD_LEFT);
        }
    }

    /**
     * Handle the Branch "created" event.
     */
    public function created(Branch $branch): void
    {
        //
    }

    /**
     * Handle the Branch "updated" event.
     */
    public function updated(Branch $branch): void
    {
        //
    }

    /**
     * Handle the Branch "deleted" event.
     */
    public function deleted(Branch $branch): void
    {
        //
    }

    /**
     * Handle the Branch "restored" event.
     */
    public function restored(Branch $branch): void
    {
        //
    }

    /**
     * Handle the Branch "force deleted" event.
     */
    public function forceDeleted(Branch $branch): void
    {
        //
    }
}
