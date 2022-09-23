<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\UserService;
use Illuminate\Http\Response;

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
}
