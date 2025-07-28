<?php

namespace App\Http\Controllers;

use App\Http\Resources\CharacteristicResource;
use App\Models\Characteristic;
use App\Models\CharacteristicCategory;
use Inertia\Inertia;
use Inertia\Response;

class CharacteristicController extends Controller
{
    public function index(): Response
    {
        $categories = CharacteristicCategory::query()->latest()->take(10)->get();

        $characteristics = Characteristic::query()
            ->with('characteristicCategory:id,name')
            ->latest()
            ->paginate(9)
            ->toResourceCollection();

        return Inertia::render(
            'Characteristics/Index',
            compact('characteristics', 'categories')
        );
    }

    public function show(Characteristic $characteristic): Response
    {
        $characteristic->load('characteristicCategory:id,name');
        $characteristic = $characteristic->toResource();

        return Inertia::render('Characteristics/Show', compact('characteristic'));
    }
}
