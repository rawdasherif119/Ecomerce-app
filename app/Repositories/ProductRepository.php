<?php

namespace App\Repositories;

use App\Models\Product;


class ProductRepository extends BaseRepository
{
    protected $filter = null ;

    /**
     *  Return the model
     */
    public function model() :string
    {
        return Product::class;
    }
}
