<?php

namespace App\Services;

use App\Services\BaseService;
use Illuminate\Http\Response;
use App\Resources\ErrorResource;
use App\Repositories\UserRepository;

class UserService extends BaseService
{
    protected $repo;

    public function __construct(UserRepository $repo)
    {
        $this->repo = $repo;
    }

    /**
     * @param  Product  $product
     */
    public function addProduct($product) :void
    {
        if(auth()->user()->products->contains($product)){
            abort(new ErrorResource(Response::HTTP_BAD_REQUEST, __('errors.product_exist')));
        }
        $this->attach(auth()->user()->products(),$product); 
    }

    /**
     * @param  Product  $product
     */
    public function removeProduct($product) :void
    {
        if(!auth()->user()->products->contains($product)){
            abort(new ErrorResource(Response::HTTP_BAD_REQUEST, __('errors.product_not_exist')));
        }
        $this->detach(auth()->user()->products(),$product);
    }
}