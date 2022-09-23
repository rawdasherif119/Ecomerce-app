<?php

namespace App\Services;

use App\Http\Resources\ProductResource;
use App\Models\User;
use App\Services\BaseService;
use Illuminate\Http\Response;
use App\Resources\ErrorResource;
use App\Repositories\UserRepository;
use Symfony\Component\HttpKernel\HttpCache\Store;

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


    /**
     * @param  Store  $store
     */
    public function index($store)
    {
        if($store->exists){
           $products = auth()->user()->products->where('store_id',$store->id);
           $total = $this->calculateTotalForOneCartPerStore($store->shipping_cost,$products);
        }else{
           $products = auth()->user()->products;
           $total = $this->calculateTotalForAllStoresOnOneCart($products);
        }

        return [
            'products' => ProductResource::collection($products),
            'total'    => $total
        ];
    }

    /**
     * Caclulate Total cost Of Products on cart and take into concedration 
     * 1- Store VAT settings
     * 2- Store shipping cost
     *
     * @param int $shippingCost
     * @param Collection $products
     */
    public function calculateTotalForOneCartPerStore($shippingCost ,$products) :int
    {
        $grossPrices = $products->pluck('gross_price');
        return $grossPrices->isNotEmpty() ? 
        $shippingCost + array_sum($grossPrices->toArray()) : 0; 
    }

    /** 
     * Caclulate Total cost Of Products on cart and take into concedration 
     * 1- Store VAT settings
     * 2- Store shipping cost
     *
     * @param Collection $products
     */
    public function calculateTotalForAllStoresOnOneCart($products) :int
    {
        $grossPrices = $products->pluck('gross_price');
        $shippingCosts = array_keys($products->groupBy('store.shipping_cost')->toArray());
        return $grossPrices->isNotEmpty() ?
         array_sum($shippingCosts) + array_sum($grossPrices->toArray()) : 0;
    }
}