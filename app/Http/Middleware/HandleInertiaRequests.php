<?php

namespace App\Http\Middleware;

use App\Models\Address;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Middleware;
use Tightenco\Ziggy\Ziggy;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request)
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed[]
     */
    public function share(Request $request)
    {
        return array_merge(parent::share($request), [
            'auth' => [
                'user' => auth()->check() ? auth()->user() : null,
                'address' => auth()->check() && !is_null(Address::where('user_id', auth()->user()->id)->first()) ? Address::where('user_id', auth()->user()->id)->first() : null,
            ],
            'categories' => Category::all(),
            'random_products' => Product::inRandomOrder()->limit(8)->get(),
            'ziggy' => function () use ($request) {
                return array_merge((new Ziggy)->toArray(), [
                    'location' => $request->url(),
                ]);
            },
        ]);
    }
}
