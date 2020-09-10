<?php

namespace App\Policies;

use App\Models\Document;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DocumentPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function delete(User $user, Document $document)
    {
        return $user->id === $document->user_id;
    }

    public function update(User $user, Document $document)
    {
        return $user->id === $document->user_id;
    }

}
