<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        // Flatten the grouped client roster into a single list for the marquee.
        $allClients = collect(config('content.clients', []))
            ->flatMap(fn ($group) => $group)
            ->values()
            ->all();

        return view('home', [
            'home'        => config('content.home'),
            'disciplines' => config('content.disciplines'),
            'cases'       => config('content.cases'),
            'faq'         => config('content.home_faq'),
            'allClients'  => $allClients,
        ]);
    }
}
