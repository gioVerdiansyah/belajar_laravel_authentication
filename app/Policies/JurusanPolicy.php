<?php

namespace App\Policies;

use App\Models\Jurusan;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class JurusanPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->email === "gioverdiansyh@gmail.com";
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user): bool
    {
        // ini untuk versi memanggilnya di route
        return $user->email === "gioverdiansyh@gmail.com";
        // Jika terjadi error mungkin kelebihan argumen (tadi ada tambahan Jurusan)
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        // membatasi hanya email ini yang hanya bisa membuat data
        // return $user->email === "gioverdiansyh@gmail.com";
        // lalu untuk mengantifkan pilicy create() ini harus di tambah sesuatu di dalam method store()

        // ? Jika lebih dari 1 kondisi bisa begini:
        return ($user->email === "gioverdiansyh@gmail.com") or ($user->name === 'Verdi');

        // ? jika dalam kondisi yang sama namun berbeda value bisa:
        // return in_array($user->email,[
        //     'admin@gmail.com',
        //     'support@gmail.com',
        //     ]);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Jurusan $jurusan): bool
    {
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Jurusan $jurusan): bool
    {
        return true;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Jurusan $jurusan): bool
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Jurusan $jurusan): bool
    {
        return true;
    }
}