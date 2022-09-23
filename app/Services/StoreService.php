<?php

namespace App\Services;

use App\Repositories\StoreRepository;
use App\Services\BaseService;

class StoreService extends BaseService
{
    protected $repo;

    public function __construct(StoreRepository $repo)
    {
        $this->repo = $repo;
    }
}