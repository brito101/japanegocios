@extends('adminlte::page')
@section('plugins.Select2', true)
@section('plugins.BsCustomFileInput', true)
@section('plugins.Summernote', true)

@section('title', '- Cadastro de Produto')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="fas fa-fw fa-cart-plus"></i> Novo Produto</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.products.index') }}">Produtos</a></li>
                        <li class="breadcrumb-item active">Novo Produto</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    @include('components.alert')

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Dados Cadastrais do Produto</h3>
                        </div>

                        <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">

                                <div class="d-flex flex-wrap justify-content-between">
                                    <div class="col-12 col-md-6 form-group px-0 pr-md-2">
                                        <label for="title">Título</label>
                                        <input type="text" class="form-control" id="title" placeholder="Título"
                                            name="title" value="{{ old('title') }}" required>
                                    </div>
                                    <div class="col-12 col-md-6 form-group px-0 pl-md-2">
                                        <x-adminlte-input-file name="photo_0" label="Foto de Capa"
                                            placeholder="Selecione uma imagem..." legend="Selecionar" />
                                    </div>
                                </div>

                                <div class="d-flex flex-wrap justify-content-between">
                                    <div class="col-12 col-md-6 form-group px-0 pr-md-2">
                                        <x-adminlte-input-file name="photo_1" label="Imagem 1"
                                            placeholder="Selecione uma imagem..." legend="Selecionar" />
                                    </div>
                                    <div class="col-12 col-md-6 form-group px-0 pl-md-2">
                                        <x-adminlte-input-file name="photo_2" label="Imagem 2"
                                            placeholder="Selecione uma imagem..." legend="Selecionar" />
                                    </div>
                                </div>

                                <div class="d-flex flex-wrap justify-content-between">
                                    <div class="col-12 col-md-6 form-group px-0 pr-md-2">
                                        <x-adminlte-input-file name="photo_3" label="Imagem 3"
                                            placeholder="Selecione uma imagem..." legend="Selecionar" />
                                    </div>
                                    <div class="col-12 col-md-6 form-group px-0 pl-md-2">
                                        <x-adminlte-input-file name="photo_4" label="Imagem 4"
                                            placeholder="Selecione uma imagem..." legend="Selecionar" />
                                    </div>
                                </div>

                                <div class="d-flex flex-wrap justify-content-between">
                                    <div class="col-12 col-md-6 form-group px-0 pr-md-2">
                                        <label for="sale_price">Preço de Venda</label>
                                        <input type="tel" class="form-control" id="sale_price"
                                            placeholder="Preço de Venda" name="sale_price"
                                            value="{{ old('sale_price') }}">
                                    </div>

                                    <div class="col-12 col-md-6 form-group px-0 pl-md-2">
                                        <label for="status">Status</label>
                                        <x-adminlte-select2 name="status">
                                            <option value="Ativo" {{ old('status') == 'Ativo' ? 'selected' : '' }}>
                                                Ativo
                                            </option>
                                            <option value="Rascunho" {{ old('status') == 'Rascunho' ? 'selected' : '' }}>
                                                Rascunho
                                            </option>
                                            <option value="Esgotado" {{ old('status') == 'Esgotado' ? 'selected' : '' }}>
                                                Esgotado
                                            </option>
                                        </x-adminlte-select2>
                                    </div>
                                </div>

                                <div class="d-flex flex-wrap justify-content-between">
                                    <div class="col-12 col-md-12 form-group px-0">
                                        @php
                                            $config = [
                                                'height' => '300',
                                                'toolbar' => [
                                                    // [groupName, [list of button]]
                                                    ['style', ['bold', 'italic', 'underline', 'clear']],
                                                    ['font', ['strikethrough', 'superscript', 'subscript']],
                                                    ['fontsize', ['fontsize']],
                                                    ['color', ['color']],
                                                    ['para', ['ul', 'ol', 'paragraph']],
                                                    ['height', ['height']],
                                                    ['table', ['table']],
                                                    ['insert', ['link', 'picture', 'video']],
                                                    ['view', ['fullscreen', 'codeview', 'help']],
                                                ],
                                            ];
                                        @endphp
                                        <x-adminlte-text-editor name="description" label="" igroup-size="sm"
                                            placeholder="Escreva o conteúdo do anúncio aqui..." :config="$config">
                                            {{ old('description') }}
                                        </x-adminlte-text-editor>
                                    </div>
                                </div>

                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Enviar</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('custom_js')
    <script src="{{ asset('vendor/jquery/jquery.maskMoney.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#sale_price").maskMoney({
                prefix: "R$ ",
                decimal: ",",
                thousands: "."
            });
        });
    </script>
@endsection
