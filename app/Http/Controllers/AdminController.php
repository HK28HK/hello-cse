<?php

namespace App\Http\Controllers;

use App\Http\Requests\Api\StarStoreRequest;
use App\Http\Requests\Api\StarUpdateRequest;
use App\Http\Resources\Api\StarResource;
use App\Http\Services\StarService;
use App\Models\Star;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return Inertia::render('Admin/Stars/Index', [
            'stars' => StarResource::collection(Star::all()),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return Inertia::render('Admin/Stars/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StarStoreRequest $request): RedirectResponse
    {
        /** @var array<string,mixed> */
        $fields = $request->validated();

        // Upload image
        $file = $request->file('image');

        StarService::store($fields, $file);

        return to_route('admin.stars.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Star $star): Response
    {
        return Inertia::render('Admin/Stars/Show', ['star' => StarResource::make($star)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Star $star): Response
    {
        return Inertia::render('Admin/Stars/Edit', ['star' => StarResource::make($star)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StarUpdateRequest $request, Star $star): RedirectResponse
    {
        /** @var array<string,mixed> */
        $fields = $request->validated();

        StarService::update($star, $fields);

        return to_route('admin.stars.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Star $star): RedirectResponse
    {
        StarService::destroy($star);

        return to_route('admin.stars.index');
    }
}
