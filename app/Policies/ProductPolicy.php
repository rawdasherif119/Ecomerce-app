<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Store;
use App\Models\Product;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;
     
    /**
     * Determine if the given education can be updated by the user.
     *
     * @param  User $user
     * @param  product $product
     * @param  Store $store
     * @return bool
     */
    public function update(User $user, Product $product, Store $store)
    {
        return $user->stores->contains($store) &&  $store->products->contains($product);
    }
}
