<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function home()
    {
        return view('site.home.index');
    }

    public function about()
    {
        return view('site.about.index');
    }

    public function properties()
    {
        return view('site.properties.index');
    }

    public function property(Request $request)
    {
        $property = Property::where('slug', $request->slug)->first();
        return view('site.properties.property', compact('property'));
    }

    public function contact()
    {
        return view('site.contact.index');
    }
}
