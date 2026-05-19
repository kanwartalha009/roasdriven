<?php

namespace App\Http\Controllers;

class PricingController extends Controller
{
    public function index()
    {
        return view('pricing', [
            'tiers'    => config('content.pricing'),
            'excluded' => config('content.pricing_excluded'),
            'faq'      => config('content.pricing_faq'),
        ]);
    }
}
