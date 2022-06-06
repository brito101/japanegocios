<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;

        for ($i = 0; $i <= 5; $i++) {
            if ($request->hasFile('photo_' . $i) && $request->file('photo_' . $i)->isValid()) {
                $name = Str::slug(mb_substr($data['title'], 0, 100)) . Str::random(5) . time();
                $extenstion = $request->{'photo_' . $i}->extension();
                $nameFile = "{$name}.{$extenstion}";
                $data['photo_' . $i] = $nameFile;
                $upload = $request->{'photo_' . $i}->storeAs('products', $nameFile);

                if (!$upload) {
                    return redirect()
                        ->back()
                        ->withInput()
                        ->with('error', 'Falha ao fazer o upload da imagem');
                }
            }
        }

        $product = Product::create($data);

        if ($product->save()) {
            $product->slug = Str::slug($product->title . '-' . $product->id);
            $product->update();
            return redirect()
                ->route('admin.products.index')
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
        $product = Product::where('id', $id)->first();
        if (empty($product->id)) {
            abort(403, 'Produto não encontrado');
        }

        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $data = $request->all();

        $product = Product::where('id', $id)->first();

        if (empty($product->id)) {
            abort(403, 'Produto não encontrado');
        }

        $data['user_id'] = Auth::user()->id;

        for ($i = 0; $i <= 5; $i++) {
            if ($request->hasFile('photo_' . $i) && $request->file('photo_' . $i)->isValid()) {
                $name = Str::slug(mb_substr($data['title'], 0, 10))  . Str::random(5) . time();
                $imagePath = storage_path() . '/app/public/products/' . $product->{'photo_' . $i};

                if (File::isFile($imagePath)) {
                    unlink($imagePath);
                }

                $extenstion = $request->{'photo_' . $i}->extension();
                $nameFile = "{$name}.{$extenstion}";

                $data['photo_' . $i] = $nameFile;

                $upload = $request->{'photo_' . $i}->storeAs('products', $nameFile);

                if (!$upload)
                    return redirect()
                        ->back()
                        ->withInput()
                        ->with('error', 'Falha ao fazer o upload da imagem');
            }
        }

        if ($product->update($data)) {
            return redirect()
                ->route('admin.products.index')
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
        $product = Product::where('id', $id)->first();
        if (empty($product->id)) {
            abort(403, 'Produto inexistente');
        }

        if ($product->delete()) {
            for ($i = 0; $i <= 5; $i++) {
                $imagePath = storage_path() . '/app/public/products/' . $product->{'photo_' . $i};
                if (File::isFile($imagePath)) {
                    unlink($imagePath);
                    $product->{'photo_' . $i} = null;
                    $product->update();
                }
            }

            return redirect()
                ->route('admin.products.index')
                ->with('success', 'Exclusão realizada!');
        } else {
            return redirect()
                ->back()
                ->with('error', 'Erro ao excluir!');
        }
    }
}
