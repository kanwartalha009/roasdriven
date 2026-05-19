<?php

namespace App\Http\Controllers;

class JournalController extends Controller
{
    public function index()
    {
        return view('journal.index', [
            'posts' => config('content.journal'),
        ]);
    }

    public function show(string $slug)
    {
        $posts = config('content.journal');
        $post  = collect($posts)->firstWhere('slug', $slug);

        if (! $post) {
            abort(404);
        }

        $related = collect($posts)
            ->reject(fn ($p) => $p['slug'] === $slug)
            ->take(3)
            ->values()
            ->all();

        return view('journal.show', [
            'post'    => $post,
            'related' => $related,
        ]);
    }
}
