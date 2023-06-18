<?php

namespace App\Http\Controllers;

use App\Http\Resources\Api\StarResource;
use App\Models\Star;
use Inertia\Inertia;
use Inertia\Response;

class StarsFrontController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Stars/Index', [
            'stars' => StarResource::collection(Star::all()),
        ]);
    }

    public function show(Star $star): Response
    {
        return Inertia::render('Star/Show', [
            'event' => $star->only(
                'id',
                'title',
                'start_date',
                'description'
            ),
        ]);
    }
}
