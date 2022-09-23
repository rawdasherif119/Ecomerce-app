<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Store;
use Illuminate\Auth\Access\HandlesAuthorization;

class StorePolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine if the given education can be updated by the user.
     *
     * @param  \App\Models\User||\App\Models\Admin  $user
     * @param  \App\Models\Education  $education
     * @return bool
     */
    public function update(User $user, Store $store)
    {
        return $user->stores->contains($store);
    }

}
