<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Store;
use App\Models\Product;
use App\Services\UserService;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

class UserProductController extends Controller
{
    protected $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }


    /**
     * @param  Product  $product
     */
    public function store(Product $product): Response
    {
        $this->service->addProduct($product);
        return response()->noContent(Response::HTTP_OK);
    }

    /**
     * @param  Product  $product
     */
    public function delete(Product $product): Response
    {
        $this->service->removeProduct($product);
        return response()->noContent(Response::HTTP_OK);
    }

    /** 
     * Calculate the cart’s total 
     *  But here we have two cases : 
     *    1- There is only one cart for all stores  
     *       buyer can buy many products from more than one store
     *       ----> (So calculate total for all on one)
     *       ----> in this case route  (/api/users/products/{store})
     *       
     *    2- Each store have its own cart for each user
     *       ----> (So calculate total for each store) 
     *       ----> in this case route  (/api/users/products)
     * 
     *  @param  Store  $store
     */
    public function index(Store $store) : Response
    {
        return response(
            $this->service->index($store)
        );
    }
}
