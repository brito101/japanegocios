<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyRequest;
use App\Models\Property;
use App\Models\PropertyImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties = Property::all();
        return view('admin.properties.index', compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.properties.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PropertyRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;

        if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
            $name = Str::slug(mb_substr($data['title'], 0, 100)) . time();
            $extenstion = $request->photo->extension();
            $nameFile = "{$name}.{$extenstion}";
            $data['photo'] = $nameFile;
            $upload = $request->photo->storeAs('properties', $nameFile);

            if (!$upload) {
                return redirect()
                    ->back()
                    ->withInput()
                    ->with('error', 'Falha ao fazer o upload da imagem');
            }
        }

        $property = Property::create($data);

        if ($property->save()) {
            $property->slug = Str::slug($property->title . '-' . $property->id);
            $property->update();

            return redirect()
                ->route('admin.properties.index')
                ->with('success', 'Cadastro realizado!');
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Erro ao cadastrar!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $property = Property::where('id', $id)->first();
        if (empty($property->id)) {
            abort(403, 'Imóvel não encontrado');
        }

        return view('admin.properties.edit', compact('property'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PropertyRequest $request, $id)
    {
        $data = $request->all();

        $property = Property::where('id', $id)->first();

        if (empty($property->id)) {
            abort(403, 'Imóvel não encontrado');
        }

        $data['user_id'] = Auth::user()->id;

        $data['planned_furniture'] = $request->planned_furniture == 'on' ? true : false;
        $data['wifi'] = $request->wifi == 'on' ? true : false;
        $data['air_conditioning'] = $request->air_conditioning == 'on' ? true : false;
        $data['barbecue_grill'] = $request->barbecue_grill == 'on' ? true : false;
        $data['bar'] = $request->bar == 'on' ? true : false;
        $data['american_kitchen'] = $request->american_kitchen == 'on' ? true : false;
        $data['office'] = $request->office == 'on' ? true : false;
        $data['pool'] = $request->pool == 'on' ? true : false;

        if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
            $name = Str::slug(mb_substr($data['title'], 0, 10)) . time();
            $imagePath = storage_path() . '/app/public/properties/' . $property->photo;

            if (File::isFile($imagePath)) {
                unlink($imagePath);
            }

            $extenstion = $request->photo->extension();
            $nameFile = "{$name}.{$extenstion}";

            $data['photo'] = $nameFile;

            $upload = $request->photo->storeAs('properties', $nameFile);

            if (!$upload)
                return redirect()
                    ->back()
                    ->withInput()
                    ->with('error', 'Falha ao fazer o upload da imagem');
        }

        if ($property->update($data)) {
            return redirect()
                ->route('admin.properties.index')
                ->with('success', 'Atualização realizada!');
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Erro ao atualizar!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $property = Property::where('id', $id)->first();
        if (empty($property->id)) {
            abort(403, 'Imóvel inexistente');
        }

        $imagePath = storage_path() . '/app/public/properties/' . $property->photo;
        if ($property->delete()) {
            if (File::isFile($imagePath)) {
                unlink($imagePath);
                $property->photo = null;
                $property->update();
            }

            return redirect()
                ->route('admin.properties.index')
                ->with('success', 'Exclusão realizada!');
        } else {
            return redirect()
                ->back()
                ->with('error', 'Erro ao excluir!');
        }
    }
}
