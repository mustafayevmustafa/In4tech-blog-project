<?php

namespace App\Observers;

use App\Models\Role;
use Illuminate\Support\Facades\Log;

class RoleObserver
{
    /**
     * Handle the Role "created" event.
     */
    public function created(Role $role)
    {
        Log::info('Yeni rol oluşturuldu: ' . $role->name);
    }

    /**
     * Handle the Role "updated" event.
     */
    public function updated(Role $role)
    {
        Log::info('Rol güncellendi: ' . $role->name);
    }

    /**
     * Handle the Role "deleted" event.
     */
    public function deleted(Role $role): void
    {
        //
    }

    /**
     * Handle the Role "restored" event.
     */
    public function restored(Role $role): void
    {
        //
    }

    /**
     * Handle the Role "force deleted" event.
     */
    public function forceDeleted(Role $role): void
    {
        //
    }
}
