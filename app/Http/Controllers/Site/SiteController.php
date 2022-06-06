<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Mail\SendMailUser;
use App\Models\Automotive;
use App\Models\Product;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SiteController extends Controller
{
    public function home()
    {
        $filter = new FilterController();
        $filter->clearAllData();
        $properties = Property::where('status', 'Ativo')->orderBy('created_at', 'desc')->limit(4)->get();

        $propertiesList = Property::where('status', 'Ativo')->get();

        $types = [];
        $cities = [];
        $bedrooms = [];
        $garages = [];
        $bathrooms = [];
        $prices = [];

        foreach ($propertiesList as $property) {
            $types[] = $property->porpouse;
            $cities[] = $property->city;
            $bedrooms[] = $property->bedrooms;
            $garages[] = $property->garage;
            $bathrooms[] = $property->bathrooms;
            if ($property->porpouse == 'sale') {
                $prices[] = $property->sale_price;
            }
            if ($property->porpouse == 'rent') {
                $prices[] = $property->rent_price;
            }
        }

        $listTypes = collect($types)->unique();
        $listCities = collect($cities)->unique();
        $listBedrooms = collect($bedrooms)->unique();
        $listGarages = collect($garages)->unique();
        $listBathrooms = collect($bathrooms)->unique();
        $listPrices = collect($prices)->unique();

        return view('site.home.index', compact(
            'properties',
            'listTypes',
            'listCities',
            'listBedrooms',
            'listGarages',
            'listBathrooms',
            'listPrices'
        ));
    }

    public function about()
    {
        $filter = new FilterController();
        $filter->clearAllData();

        $propertiesList = Property::where('status', 'Ativo')->get();
        $types = [];
        $cities = [];
        $bedrooms = [];
        $garages = [];
        $bathrooms = [];
        $prices = [];

        foreach ($propertiesList as $property) {
            $types[] = $property->porpouse;
            $cities[] = $property->city;
            $bedrooms[] = $property->bedrooms;
            $garages[] = $property->garage;
            $bathrooms[] = $property->bathrooms;
            if ($property->porpouse == 'sale') {
                $prices[] = $property->sale_price;
            }
            if ($property->porpouse == 'rent') {
                $prices[] = $property->rent_price;
            }
        }

        $listTypes = collect($types)->unique();
        $listCities = collect($cities)->unique();
        $listBedrooms = collect($bedrooms)->unique();
        $listGarages = collect($garages)->unique();
        $listBathrooms = collect($bathrooms)->unique();
        $listPrices = collect($prices)->unique();

        return view('site.about.index', compact(
            'listTypes',
            'listCities',
            'listBedrooms',
            'listGarages',
            'listBathrooms',
            'listPrices'
        ));
    }

    public function properties()
    {
        $filter = new FilterController();
        $filter->clearAllData();
        $properties = Property::where('status', 'Ativo')->paginate(10);

        $propertiesList = Property::where('status', 'Ativo')->get();

        $types = [];
        $cities = [];
        $bedrooms = [];
        $garages = [];
        $bathrooms = [];
        $prices = [];

        foreach ($propertiesList as $property) {
            $types[] = $property->porpouse;
            $cities[] = $property->city;
            $bedrooms[] = $property->bedrooms;
            $garages[] = $property->garage;
            $bathrooms[] = $property->bathrooms;
            if ($property->porpouse == 'sale') {
                $prices[] = $property->sale_price;
            }
            if ($property->porpouse == 'rent') {
                $prices[] = $property->rent_price;
            }
        }

        $listTypes = collect($types)->unique();
        $listCities = collect($cities)->unique();
        $listBedrooms = collect($bedrooms)->unique();
        $listGarages = collect($garages)->unique();
        $listBathrooms = collect($bathrooms)->unique();
        $listPrices = collect($prices)->unique();

        return view('site.properties.index', compact(
            'properties',
            'listTypes',
            'listCities',
            'listBedrooms',
            'listGarages',
            'listBathrooms',
            'listPrices'
        ));
    }

    public function property(Request $request, $slug)
    {
        $filter = new FilterController();
        $filter->clearAllData();

        $propertiesList = Property::where('status', 'Ativo')->get();

        $types = [];
        $cities = [];
        $bedrooms = [];
        $garages = [];
        $bathrooms = [];
        $prices = [];

        foreach ($propertiesList as $property) {
            $types[] = $property->porpouse;
            $cities[] = $property->city;
            $bedrooms[] = $property->bedrooms;
            $garages[] = $property->garage;
            $bathrooms[] = $property->bathrooms;
            if ($property->porpouse == 'sale') {
                $prices[] = $property->sale_price;
            }
            if ($property->porpouse == 'rent') {
                $prices[] = $property->rent_price;
            }
        }

        $listTypes = collect($types)->unique();
        $listCities = collect($cities)->unique();
        $listBedrooms = collect($bedrooms)->unique();
        $listGarages = collect($garages)->unique();
        $listBathrooms = collect($bathrooms)->unique();
        $listPrices = collect($prices)->unique();

        $property = Property::where('slug', $slug)->first();
        if ($property->id) {
            return view('site.properties.single', compact(
                'property',
                'listTypes',
                'listCities',
                'listBedrooms',
                'listGarages',
                'listBathrooms',
                'listPrices'
            ));
        } else {
            return redirect()->route('properties');
        }
    }

    public function automotives()
    {
        $filter = new FilterController();
        $filter->clearAllData();

        $propertiesList = Property::where('status', 'Ativo')->get();

        $types = [];
        $cities = [];
        $bedrooms = [];
        $garages = [];
        $bathrooms = [];
        $prices = [];

        foreach ($propertiesList as $property) {
            $types[] = $property->porpouse;
            $cities[] = $property->city;
            $bedrooms[] = $property->bedrooms;
            $garages[] = $property->garage;
            $bathrooms[] = $property->bathrooms;
            if ($property->porpouse == 'sale') {
                $prices[] = $property->sale_price;
            }
            if ($property->porpouse == 'rent') {
                $prices[] = $property->rent_price;
            }
        }

        $listTypes = collect($types)->unique();
        $listCities = collect($cities)->unique();
        $listBedrooms = collect($bedrooms)->unique();
        $listGarages = collect($garages)->unique();
        $listBathrooms = collect($bathrooms)->unique();
        $listPrices = collect($prices)->unique();

        $automotives = Automotive::where('status', 'Ativo')->paginate(10);
        return view('site.automotives.index', compact(
            'automotives',
            'listTypes',
            'listCities',
            'listBedrooms',
            'listGarages',
            'listBathrooms',
            'listPrices'
        ));
    }

    public function automotive(Request $request, $slug)
    {
        $filter = new FilterController();
        $filter->clearAllData();

        $propertiesList = Property::where('status', 'Ativo')->get();

        $types = [];
        $cities = [];
        $bedrooms = [];
        $garages = [];
        $bathrooms = [];
        $prices = [];

        foreach ($propertiesList as $property) {
            $types[] = $property->porpouse;
            $cities[] = $property->city;
            $bedrooms[] = $property->bedrooms;
            $garages[] = $property->garage;
            $bathrooms[] = $property->bathrooms;
            if ($property->porpouse == 'sale') {
                $prices[] = $property->sale_price;
            }
            if ($property->porpouse == 'rent') {
                $prices[] = $property->rent_price;
            }
        }

        $listTypes = collect($types)->unique();
        $listCities = collect($cities)->unique();
        $listBedrooms = collect($bedrooms)->unique();
        $listGarages = collect($garages)->unique();
        $listBathrooms = collect($bathrooms)->unique();
        $listPrices = collect($prices)->unique();

        $automotive = Automotive::where('slug', $slug)->first();
        if ($automotive->id) {
            return view('site.automotives.single', compact(
                'automotive',
                'listTypes',
                'listCities',
                'listBedrooms',
                'listGarages',
                'listBathrooms',
                'listPrices'
            ));
        } else {
            return redirect()->route('automotives');
        }
    }

    public function products()
    {
        $filter = new FilterController();
        $filter->clearAllData();

        $propertiesList = Property::where('status', 'Ativo')->get();

        $types = [];
        $cities = [];
        $bedrooms = [];
        $garages = [];
        $bathrooms = [];
        $prices = [];

        foreach ($propertiesList as $property) {
            $types[] = $property->porpouse;
            $cities[] = $property->city;
            $bedrooms[] = $property->bedrooms;
            $garages[] = $property->garage;
            $bathrooms[] = $property->bathrooms;
            if ($property->porpouse == 'sale') {
                $prices[] = $property->sale_price;
            }
            if ($property->porpouse == 'rent') {
                $prices[] = $property->rent_price;
            }
        }

        $listTypes = collect($types)->unique();
        $listCities = collect($cities)->unique();
        $listBedrooms = collect($bedrooms)->unique();
        $listGarages = collect($garages)->unique();
        $listBathrooms = collect($bathrooms)->unique();
        $listPrices = collect($prices)->unique();

        $products = Product::where('status', 'Ativo')->paginate(10);
        return view('site.products.index', compact(
            'products',
            'listTypes',
            'listCities',
            'listBedrooms',
            'listGarages',
            'listBathrooms',
            'listPrices'
        ));
    }

    public function product(Request $request, $slug)
    {
        $filter = new FilterController();
        $filter->clearAllData();

        $propertiesList = Property::where('status', 'Ativo')->get();

        $types = [];
        $cities = [];
        $bedrooms = [];
        $garages = [];
        $bathrooms = [];
        $prices = [];

        foreach ($propertiesList as $property) {
            $types[] = $property->porpouse;
            $cities[] = $property->city;
            $bedrooms[] = $property->bedrooms;
            $garages[] = $property->garage;
            $bathrooms[] = $property->bathrooms;
            if ($property->porpouse == 'sale') {
                $prices[] = $property->sale_price;
            }
            if ($property->porpouse == 'rent') {
                $prices[] = $property->rent_price;
            }
        }

        $listTypes = collect($types)->unique();
        $listCities = collect($cities)->unique();
        $listBedrooms = collect($bedrooms)->unique();
        $listGarages = collect($garages)->unique();
        $listBathrooms = collect($bathrooms)->unique();
        $listPrices = collect($prices)->unique();

        $product = Product::where('slug', $slug)->first();
        if ($product->id) {
            return view('site.products.single', compact(
                'product',
                'listTypes',
                'listCities',
                'listBedrooms',
                'listGarages',
                'listBathrooms',
                'listPrices'
            ));
        } else {
            return redirect()->route('productss');
        }
    }

    public function contact()
    {
        $filter = new FilterController();
        $filter->clearAllData();

        $propertiesList = Property::where('status', 'Ativo')->get();

        $types = [];
        $cities = [];
        $bedrooms = [];
        $garages = [];
        $bathrooms = [];
        $prices = [];

        foreach ($propertiesList as $property) {
            $types[] = $property->porpouse;
            $cities[] = $property->city;
            $bedrooms[] = $property->bedrooms;
            $garages[] = $property->garage;
            $bathrooms[] = $property->bathrooms;
            if ($property->porpouse == 'sale') {
                $prices[] = $property->sale_price;
            }
            if ($property->porpouse == 'rent') {
                $prices[] = $property->rent_price;
            }
        }

        $listTypes = collect($types)->unique();
        $listCities = collect($cities)->unique();
        $listBedrooms = collect($bedrooms)->unique();
        $listGarages = collect($garages)->unique();
        $listBathrooms = collect($bathrooms)->unique();
        $listPrices = collect($prices)->unique();

        return view('site.contact.index', compact(
            'listTypes',
            'listCities',
            'listBedrooms',
            'listGarages',
            'listBathrooms',
            'listPrices'
        ));
    }

    public function sendEmail(Request $request)
    {
        if (empty($request['email'])) {
            return redirect()->route('web.home');
        }

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message
        ];

        Mail::send(new SendMailUser($data));
        return response()->json('Sua mensagem foi enviada, obrigado.');
    }

    public function filter()
    {
        $filter = new FilterController();
        $itemProperties = $filter->createQuery('id');

        $propertiesList = Property::where('status', 'Ativo')->get();

        $types = [];
        $cities = [];
        $bedrooms = [];
        $garages = [];
        $bathrooms = [];
        $prices = [];

        foreach ($propertiesList as $property) {
            $types[] = $property->porpouse;
            $cities[] = $property->city;
            $bedrooms[] = $property->bedrooms;
            $garages[] = $property->garage;
            $bathrooms[] = $property->bathrooms;
            if ($property->porpouse == 'sale') {
                $prices[] = $property->sale_price;
            }
            if ($property->porpouse == 'rent') {
                $prices[] = $property->rent_price;
            }
        }

        $listTypes = collect($types)->unique();
        $listCities = collect($cities)->unique();
        $listBedrooms = collect($bedrooms)->unique();
        $listGarages = collect($garages)->unique();
        $listBathrooms = collect($bathrooms)->unique();
        $listPrices = collect($prices)->unique();

        foreach ($itemProperties as $property) {
            $properties[] = $property->id;
        }

        if (!empty($properties)) {
            $properties = Property::whereIn('id', $properties)->where('status', 'Ativo')->orderBy('created_at', 'desc')->paginate(10);
        } else {
            $properties = Property::where('status', 'Ativo')->paginate(10);
        }

        return view('site.properties.index', compact(
            'properties',
            'properties',
            'listTypes',
            'listCities',
            'listBedrooms',
            'listGarages',
            'listBathrooms',
            'listPrices'
        ));
    }
}
