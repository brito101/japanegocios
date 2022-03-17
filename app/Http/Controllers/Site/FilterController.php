<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FilterController extends Controller
{

    public function type(Request $request)
    {
        session()->remove('type');
        session()->remove('city');
        session()->remove('bedrooms');
        session()->remove('garage');
        session()->remove('bathrooms');
        session()->remove('price');

        session()->put('type', $request->search);
        $cityProperties = $this->createQuery('city');

        if ($cityProperties->count()) {
            $city[] = 'Indiferente';
            foreach ($cityProperties as $property) {
                $city[] = $property->city;
            }

            $collect = collect($city);
            return response()->json($this->setResponse('success', $collect->unique()->toArray()));
        }

        return response()->json($this->setResponse('fail', [], 'Ooops, não foi retornado nenhum dado para essa pesquisa!'));
    }

    public function city(Request $request)
    {
        session()->remove('city');
        session()->remove('bedrooms');
        session()->remove('garage');
        session()->remove('bathrooms');
        session()->remove('price');

        session()->put('city', $request->search);
        $bedroomsProperties = $this->createQuery('bedrooms');

        if ($bedroomsProperties->count()) {
            $bedrooms[] = 'Indiferente';
            foreach ($bedroomsProperties as $property) {
                $bedrooms[] = $property->bedrooms;
            }

            $collect = collect($bedrooms);
            return response()->json($this->setResponse('success', $collect->unique()->toArray()));
        }

        return response()->json($this->setResponse('fail', [], 'Ooops, não foi retornado nenhum dado para essa pesquisa!'));
    }

    public function bedrooms(Request $request)
    {
        session()->remove('bedrooms');
        session()->remove('garage');
        session()->remove('bathrooms');
        session()->remove('price');

        session()->put('bedrooms', $request->search);
        $garageProperties = $this->createQuery('garage');

        if ($garageProperties->count()) {
            $garage[] = 'Indiferente';
            foreach ($garageProperties as $property) {
                $garage[] = $property->garage;
            }

            $collect = collect($garage);
            return response()->json($this->setResponse('success', $collect->unique()->toArray()));
        }

        return response()->json($this->setResponse('fail', [], 'Ooops, não foi retornado nenhum dado para essa pesquisa!'));
    }

    public function garage(Request $request)
    {
        session()->remove('garage');
        session()->remove('bathrooms');
        session()->remove('price');

        session()->put('garage', $request->search);
        $bathroomsProperties = $this->createQuery('bathrooms');

        if ($bathroomsProperties->count()) {
            $bathrooms[] = 'Indiferente';
            foreach ($bathroomsProperties as $property) {
                $bathrooms[] = $property->bathrooms;
            }

            $collect = collect($bathrooms);
            return response()->json($this->setResponse('success', $collect->unique()->toArray()));
        }

        return response()->json($this->setResponse('fail', [], 'Ooops, não foi retornado nenhum dado para essa pesquisa!'));
    }

    public function bathrooms(Request $request)
    {
        session()->remove('bathrooms');
        session()->remove('price');

        session()->put('bathrooms', $request->search);
        $priceProperties = $this->createQuery('price');

        if ($priceProperties->count()) {
            $price[] = 'Indiferente';
            foreach ($priceProperties as $property) {
                if (session('type') == 'sale') {
                    $price[] = $property->sale_price;
                }
                if (session('type') == 'rent') {
                    $price[] = $property->rent_price;
                }
            }

            $collect = collect($price);
            return response()->json($this->setResponse('success', $collect->unique()->toArray()));
        }

        return response()->json($this->setResponse('fail', [], 'Ooops, não foi retornado nenhum dado para essa pesquisa!'));
    }

    public function price(Request $request)
    {
        session()->remove('price');
        session()->put('price', $request->search);
        return response()->json($this->setResponse('success', []));
    }

    private function setResponse(string $status, array $data = null, string $message = null)
    {
        return [
            'status' => $status,
            'data' => $data,
            'message' => $message
        ];
    }

    public function clearAllData()
    {
        session()->remove('type');
        session()->remove('city');
        session()->remove('bedrooms');
        session()->remove('garage');
        session()->remove('bathrooms');
        session()->remove('price');
    }

    public function createQuery($field)
    {
        $type = session('type');
        $city = session('city');
        $garage = session('garage');
        $bathrooms = session('bathrooms');
        $price = session('price');

        return DB::table('properties')
            ->where('status', 'Ativo')
            ->when($type, function ($query, $type) {
                if ($type == 'Indiferente') {
                    return $query;
                }
                return $query->where('porpouse', $type);
            })
            ->when($city, function ($query, $city) {
                if ($city == 'Indiferente') {
                    return $query;
                }
                return $query->where('city', $city);
            })
            ->when($garage, function ($query, $garage) {
                if ($garage == 'Indiferente') {
                    return $query;
                }
                return $query->where('garage', $garage);
            })
            ->when($bathrooms, function ($query, $bathrooms) {
                if ($bathrooms == 'Indiferente') {
                    return $query;
                }
                return $query->where('bathrooms', $bathrooms);
            })
            ->when($price, function ($query, $price) {
                if ($price == 'Indiferente') {
                    return $query;
                }
                if (session('type') == 'sale') {
                    return $query->where('sale_price', $price);
                }
                if (session('type') == 'rent') {
                    return $query->where('rent_price', $price);
                }
            })
            ->get();
    }
}
