<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

class ServiceController extends Controller
{
    public function index()
    {
        return view('services.index', [
            'disciplines' => config('content.disciplines'),
        ]);
    }

    public function show(string $slug)
    {
        $service = config('content.services.' . $slug);

        if (! $service) {
            abort(404);
        }

        return view('services.show', [
            'slug'    => $slug,
            'service' => $service,
        ]);
    }
}
