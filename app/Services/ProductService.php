<?php

namespace App\Services;

use App\Repositories\ProductRepository;
use App\Services\BaseService;

class ProductService extends BaseService
{
    protected $repo;

    public function __construct(ProductRepository $repo)
    {
        $this->repo = $repo;
    }
}