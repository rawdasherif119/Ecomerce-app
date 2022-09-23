<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Response;
use App\Services\StoreService;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\StoreResource;
use App\Http\Requests\MerchantStoreRequest;
use Illuminate\Http\Resources\Json\JsonResource;

class StoreController extends Controller
{

    protected $service;

    public function __construct(StoreService $service)
    {
        $this->service = $service;
    }

    /**
     * @param  MerchantStoreRequest  $request
     */
    public function store(MerchantStoreRequest $request): Response
    {
        $this->service->create($request->validated() ,auth()->user()->stores());
        return response()->noContent(Response::HTTP_CREATED);
    }

    /**
     * @param  MerchantStoreRequest  $request
     * @param  Store $store 
     */
    public function update(MerchantStoreRequest $request ,Store $store): Response
    {
        $this->service->update($request->validated(), $store);
        return response()->noContent(Response::HTTP_OK);
    }

    /**
     * @param  Store $store 
     */
    public function show(Store $store): JsonResource
    {
        return new StoreResource($store);
    }
}
