<?php

namespace App\Policies\System;

use App\Models\User;
use App\Models\System\Tipe;
use Illuminate\Auth\Access\HandlesAuthorization;

class TipePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->can('view_any_pengaturan::tipe');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\System\Tipe  $tipe
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Tipe $tipe)
    {
        return $user->can('view_pengaturan::tipe');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('create_pengaturan::tipe');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\System\Tipe  $tipe
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Tipe $tipe)
    {
        return $user->can('update_pengaturan::tipe');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\System\Tipe  $tipe
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Tipe $tipe)
    {
        return $user->can('delete_pengaturan::tipe');
    }

    /**
     * Determine whether the user can bulk delete.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function deleteAny(User $user)
    {
        return $user->can('delete_any_pengaturan::tipe');
    }

    /**
     * Determine whether the user can permanently delete.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\System\Tipe  $tipe
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Tipe $tipe)
    {
        return $user->can('force_delete_pengaturan::tipe');
    }

    /**
     * Determine whether the user can permanently bulk delete.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDeleteAny(User $user)
    {
        return $user->can('force_delete_any_pengaturan::tipe');
    }

    /**
     * Determine whether the user can restore.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\System\Tipe  $tipe
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Tipe $tipe)
    {
        return $user->can('restore_pengaturan::tipe');
    }

    /**
     * Determine whether the user can bulk restore.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restoreAny(User $user)
    {
        return $user->can('restore_any_pengaturan::tipe');
    }

    /**
     * Determine whether the user can replicate.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\System\Tipe  $tipe
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function replicate(User $user, Tipe $tipe)
    {
        return $user->can('replicate_pengaturan::tipe');
    }

    /**
     * Determine whether the user can reorder.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function reorder(User $user)
    {
        return $user->can('reorder_pengaturan::tipe');
    }

}
