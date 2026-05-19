<?php

namespace App\Http\Controllers;

use Illuminate\Support\Arr;

class WorkController extends Controller
{
    public function index()
    {
        $clients = config('content.clients', []);

        // Flatten the grouped roster into a single list with niche metadata
        // so each brand card can carry data-niche for client-side filtering.
        $brands  = [];
        $niches  = []; // ordered list of niches with slugs for the filter UI
        foreach ($clients as $niche => $list) {
            $slug = \Illuminate\Support\Str::slug($niche);
            $niches[] = ['label' => $niche, 'slug' => $slug, 'count' => count($list)];

            foreach ($list as $brand) {
                $brands[] = array_merge($brand, [
                    'niche'      => $niche,
                    'niche_slug' => $slug,
                ]);
            }
        }

        return view('work.index', [
            'cases'  => config('content.cases'),
            'brands' => $brands,
            'niches' => $niches,
        ]);
    }

    public function show(string $slug)
    {
        $cases = config('content.cases');
        $case  = collect($cases)->firstWhere('slug', $slug);

        if (! $case) {
            abort(404);
        }

        $next = collect($cases)
            ->reject(fn ($c) => $c['slug'] === $slug)
            ->first();

        return view('work.show', [
            'case' => $case,
            'next' => $next,
        ]);
    }
}
