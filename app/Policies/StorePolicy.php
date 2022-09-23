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
     * @param  User $user
     * @param  Store $store
     * @return bool
     */
    public function update(User $user, Store $store)
    {
        return $user->stores->contains($store);
    }

    /**
     * Determine if the given product can be created by the user.
     *
     * @param  User $user
     * @param  Store $store
     * @return bool
     */
    public function createProduct(User $user, Store $store)
    {
        return $user->stores->contains($store);
    }

}
