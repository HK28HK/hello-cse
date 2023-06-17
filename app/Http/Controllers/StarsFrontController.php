<?php

namespace App\Http\Controllers;

use App\Http\Resources\Api\StarResource;
use App\Models\Star;
use Inertia\Inertia;

class StarsFrontController extends Controller
{

    public function index(): \Inertia\Response
    {
        return Inertia::render('Stars/Index', [
            'stars' => StarResource::collection(Star::all()),
        ]);
    }

    public function show(Star $star)
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
