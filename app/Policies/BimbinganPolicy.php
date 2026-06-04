<?php

namespace App\Policies;

use App\Models\Bimbingan;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class BimbinganPolicy
{
    /**
     * Perform pre-authorization checks.
     */
    public function before(User $user, string $ability): ?bool
    {
        if ($user->role === 'admin') {
            return true;
        }

        return null;
    }

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Bimbingan $bimbingan): bool
    {
        return ($user->role === 'mahasiswa' && $bimbingan->mahasiswa_id === $user->mahasiswa?->id) ||
               ($user->role === 'dosen' && $bimbingan->dosen_id === $user->dosen?->id);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->role === 'mahasiswa';
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Bimbingan $bimbingan): bool
    {
        return ($user->role === 'mahasiswa' && $bimbingan->mahasiswa_id === $user->mahasiswa?->id) ||
               ($user->role === 'dosen' && $bimbingan->dosen_id === $user->dosen?->id);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Bimbingan $bimbingan): bool
    {
        if ($user->role === 'mahasiswa' && $bimbingan->mahasiswa_id === $user->mahasiswa?->id) {
            return $bimbingan->status === 'Pending';
        }

        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Bimbingan $bimbingan): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Bimbingan $bimbingan): bool
    {
        return false;
    }
}
