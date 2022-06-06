<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Automotive;
use App\Models\Product;
use App\Models\Property;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $properties = Property::all();
        $automotives = Automotive::all();
        $products = Product::all();

        $chart = new \stdClass();
        $chart->properties = array(
            count($properties->where("status", 'Ativo')),
            count($properties->where("status", 'Rascunho')),
            count($properties->where("status", 'Alugado')),
            count($properties->where("status", 'Vendido')),
        );

        $chart->automotives = array(
            count($automotives->where("status", 'Ativo')),
            count($automotives->where("status", 'Rascunho')),
            count($automotives->where("status", 'Vendido')),
        );

        $chart->products = array(
            count($products->where("status", 'Ativo')),
            count($products->where("status", 'Rascunho')),
            count($products->where("status", 'Esgotado')),
        );

        return view('admin.home.index', compact('properties', 'automotives', 'products', 'chart'));
    }
}
