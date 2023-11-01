<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Slide;
use Illuminate\Auth\Access\HandlesAuthorization;

class SlidePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_slide');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Slide  $slide
     * @return bool
     */
    public function view(User $user, Slide $slide): bool
    {
        return $user->can('view_slide');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function create(User $user): bool
    {
        return $user->can('create_slide');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Slide  $slide
     * @return bool
     */
    public function update(User $user, Slide $slide): bool
    {
        return $user->can('update_slide');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Slide  $slide
     * @return bool
     */
    public function delete(User $user, Slide $slide): bool
    {
        return $user->can('delete_slide');
    }

    /**
     * Determine whether the user can bulk delete.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_slide');
    }

    /**
     * Determine whether the user can permanently delete.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Slide  $slide
     * @return bool
     */
    public function forceDelete(User $user, Slide $slide): bool
    {
        return $user->can('force_delete_slide');
    }

    /**
     * Determine whether the user can permanently bulk delete.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force_delete_any_slide');
    }

    /**
     * Determine whether the user can restore.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Slide  $slide
     * @return bool
     */
    public function restore(User $user, Slide $slide): bool
    {
        return $user->can('restore_slide');
    }

    /**
     * Determine whether the user can bulk restore.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any_slide');
    }

    /**
     * Determine whether the user can replicate.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Slide  $slide
     * @return bool
     */
    public function replicate(User $user, Slide $slide): bool
    {
        return $user->can('replicate_slide');
    }

    /**
     * Determine whether the user can reorder.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function reorder(User $user): bool
    {
        return $user->can('reorder_slide');
    }

}
