<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiBaseController;
use App\Http\Requests\Api\StarStoreRequest;
use App\Http\Requests\Api\StarUpdateRequest;
use App\Http\Resources\Api\StarResource;
use App\Models\Star;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;

class StarController extends ApiBaseController
{
    protected string $storage_folder = 'public/stars';

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
        try {
            /** @var array<string,mixed> */
            $fields = $request->validated();

            // Upload image
            $file = $request->file('image');

            /** 
             * @phpstan-ignore-next-line
             * @link https://github.com/nunomaduro/larastan/issues/250
             */
            $fields['image_path'] = Storage::put($this->storage_folder, $file);

            /** @var Star|null */
            $star = Star::create($fields);

            return self::response(
                StarResource::make($star)
            );
        } catch (\Exception $e) {
            return self::error(__('Failed to create resource'));
        }
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
        try {
            /** @var array<string,mixed> */
            $fields = $request->validated();

            $star->update($fields);

            return self::response(
                StarResource::make($star)
            );
        } catch (\Exception $e) {
            return self::error(__('Failed to update resource'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Star $star): JsonResponse
    {
        try {
            $star->delete();

            return self::response();
        } catch (\Exception $e) {
            return self::error(__('Failed to destroy resource'));
        }
    }
}
