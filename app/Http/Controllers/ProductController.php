<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\Product;
use Illuminate\Http\Response;
use App\Services\ProductService;
use App\Http\Requests\StoreProductsRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    protected $service;

    public function __construct(ProductService $service)
    {
        $this->service = $service;
    }

    /**
     * @param  StoreProductsRequest  $request
     * @param  Store $store 
     */
    public function store(StoreProductsRequest $request,Store $store): Response
    {
        $this->service->createMultiple($request->products, $store->products());
        return response()->noContent(Response::HTTP_CREATED);
    }

    /**
     * @param  UpdateProductRequest  $request
     * @param  Product $product 
     * @param  Store $store 
     */
    public function update(UpdateProductRequest $request, Store $store ,Product $product): Response
    {
        $this->authorize('update', [Product::class, $product, $store]);
        $this->service->update($request->validated(), $product);
        return response()->noContent(Response::HTTP_OK);
    }
}
