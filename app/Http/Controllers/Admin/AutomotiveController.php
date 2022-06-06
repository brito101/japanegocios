<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AutomotiveRequest;
use App\Models\Automotive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class AutomotiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $automotives = Automotive::all();
        return view('admin.automotives.index', compact('automotives'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.automotives.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AutomotiveRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;

        for ($i = 0; $i <= 5; $i++) {
            if ($request->hasFile('photo_' . $i) && $request->file('photo_' . $i)->isValid()) {
                $name = Str::slug(mb_substr($data['title'], 0, 100)) . Str::random(5) . time();
                $extenstion = $request->{'photo_' . $i}->extension();
                $nameFile = "{$name}.{$extenstion}";
                $data['photo_' . $i] = $nameFile;
                $upload = $request->{'photo_' . $i}->storeAs('automotives', $nameFile);

                if (!$upload) {
                    return redirect()
                        ->back()
                        ->withInput()
                        ->with('error', 'Falha ao fazer o upload da imagem');
                }
            }
        }

        $automotive = Automotive::create($data);

        if ($automotive->save()) {
            $automotive->slug = Str::slug($automotive->title . '-' . $automotive->id);
            $automotive->update();
            return redirect()
                ->route('admin.automotives.index')
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
        $automotive = Automotive::where('id', $id)->first();
        if (empty($automotive->id)) {
            abort(403, 'Automóvel não encontrado');
        }

        return view('admin.automotives.edit', compact('automotive'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AutomotiveRequest $request, $id)
    {
        $data = $request->all();

        $automotive = Automotive::where('id', $id)->first();

        if (empty($automotive->id)) {
            abort(403, 'Autmóvel não encontrado');
        }

        $data['user_id'] = Auth::user()->id;

        for ($i = 0; $i <= 5; $i++) {
            if ($request->hasFile('photo_' . $i) && $request->file('photo_' . $i)->isValid()) {
                $name = Str::slug(mb_substr($data['title'], 0, 10)) . Str::random(5) . time();
                $imagePath = storage_path() . '/app/public/automotives/' . $automotive->{'photo_' . $i};

                if (File::isFile($imagePath)) {
                    unlink($imagePath);
                }

                $extenstion = $request->{'photo_' . $i}->extension();
                $nameFile = "{$name}.{$extenstion}";

                $data['photo' . $i] = $nameFile;

                $upload = $request->photo->storeAs('automotives', $nameFile);

                if (!$upload)
                    return redirect()
                        ->back()
                        ->withInput()
                        ->with('error', 'Falha ao fazer o upload da imagem');
            }
        }

        if ($automotive->update($data)) {
            return redirect()
                ->route('admin.automotives.index')
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
        $automotive = Automotive::where('id', $id)->first();
        if (empty($automotive->id)) {
            abort(403, 'Automóvel inexistente');
        }

        if ($automotive->delete()) {
            for ($i = 0; $i <= 5; $i++) {
                $imagePath = storage_path() . '/app/public/automotives/' . $automotive->{'photo_' . $i};
                if (File::isFile($imagePath)) {
                    unlink($imagePath);
                    $automotive->{'photo_' . $i} = null;
                    $automotive->update();
                }
            }

            return redirect()
                ->route('admin.automotives.index')
                ->with('success', 'Exclusão realizada!');
        } else {
            return redirect()
                ->back()
                ->with('error', 'Erro ao excluir!');
        }
    }
}
