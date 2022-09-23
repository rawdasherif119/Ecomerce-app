<?php

namespace App\Repositories;

use App\Models\Store;


class StoreRepository extends BaseRepository
{
    protected $filter = null ;

    /**
     *  Return the model
     */
    public function model() :string
    {
        return Store::class;
    }
}
