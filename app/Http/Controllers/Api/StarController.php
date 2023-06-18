<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiBaseController;
use App\Http\Requests\Api\StarStoreRequest;
use App\Http\Requests\Api\StarUpdateRequest;
use App\Http\Resources\Api\StarResource;
use App\Http\Services\StarService;
use App\Models\Star;
use Illuminate\Http\JsonResponse;

class StarController extends ApiBaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $stars = Star::all();

        return self::response(
            StarResource::collection($stars)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StarStoreRequest $request): JsonResponse
    {
        /** @var array<string,mixed> */
        $fields = $request->validated();

        // Upload image
        $file = $request->file('image');

        $star = StarService::store($fields, $file);

        return self::response(
            StarResource::make($star)
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Star $star): JsonResponse
    {
        return self::response(
            StarResource::make($star)
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StarUpdateRequest $request, Star $star): JsonResponse
    {
        /** @var array<string,mixed> */
        $fields = $request->validated();

        StarService::update($star, $fields);

        return self::response(
            StarResource::make($star)
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Star $star): JsonResponse
    {
        StarService::destroy($star);

        return self::response();
    }
}
