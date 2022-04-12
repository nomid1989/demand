<?php

namespace App\Observers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

/**
 * Class UserObserver.
 *
 * @package App\Observers
 * @author DaKoshin.
 */
class UserObserver
{
    /**
     * Handle the User "created" event.
     *
     * @param User $user
     * @return void
     */
    public function created(User $user)
    {
        $user->password = Hash::make($user->password);
        $user->email_verified_at = now();
        $user->save();
    }
}
