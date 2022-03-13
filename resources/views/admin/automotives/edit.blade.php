@extends('adminlte::page')
@section('plugins.Select2', true)
@section('plugins.BsCustomFileInput', true)
@section('plugins.Summernote', true)

@section('title', '- Edição de Automóvel')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="fas fa-fw fa-car"></i> Editar Automóvel</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.automotives.index') }}">Automóveis</a></li>
                        <li class="breadcrumb-item active">Editar Automóvel</li>
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
                            <h3 class="card-title">Dados Cadastrais do Automóvel</h3>
                        </div>

                        <form method="POST"
                            action="{{ route('admin.automotives.update', ['automotive' => $automotive->id]) }}"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <input type="hidden" name="id" value="{{ $automotive->id }}">
                            <div class="card-body">

                                <div class="d-flex flex-wrap justify-content-between">
                                    <div class="col-12 col-md-6 form-group px-0 pr-md-2">
                                        <label for="title">Título</label>
                                        <input type="text" class="form-control" id="title" placeholder="Título"
                                            name="title" value="{{ old('title') ?? $automotive->title }}" required>
                                    </div>

                                    <div class="col-12 col-md-6 form-group px-0 pl-md-2 d-flex flex-wrap">
                                        <div class="{{ $automotive->photo_0 != null ? 'col-md-9' : 'col-md-12' }} px-0">
                                            <x-adminlte-input-file name="photo_0" label="Foto de Capa"
                                                placeholder="Selecione uma imagem..." legend="Selecionar" />
                                        </div>

                                        @if ($automotive->photo_0 != null)
                                            <div
                                                class='col-12 col-md-3 align-self-center mt-3 d-flex justify-content-center justify-content-md-end px-0'>
                                                <img src="{{ url('storage/automotives/' . $automotive->photo_0) }}"
                                                    alt="{{ $automotive->photo_0 }}" style="max-width: 80%;"
                                                    class="img-thumbnail d-block">
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="d-flex flex-wrap justify-content-between">
                                    <div class="col-12 col-md-6 form-group px-0 pr-md-2 d-flex flex-wrap">
                                        <div class="{{ $automotive->photo_1 != null ? 'col-md-9' : 'col-md-12' }} px-0">
                                            <x-adminlte-input-file name="photo_1" label="Imagem 1 "
                                                placeholder="Selecione uma imagem..." legend="Selecionar" />
                                        </div>

                                        @if ($automotive->photo_1 != null)
                                            <div
                                                class='col-12 col-md-3 align-self-center mt-3 d-flex justify-content-center justify-content-md-end px-0'>
                                                <img src="{{ url('storage/automotives/' . $automotive->photo_1) }}"
                                                    alt="{{ $automotive->photo_1 }}" style="max-width: 80%;"
                                                    class="img-thumbnail d-block">
                                            </div>
                                        @endif
                                    </div>

                                    <div class="col-12 col-md-6 form-group px-0 pl-md-2 d-flex flex-wrap">
                                        <div class="{{ $automotive->photo_2 != null ? 'col-md-9' : 'col-md-12' }} px-0">
                                            <x-adminlte-input-file name="photo_2" label="Imagem 2"
                                                placeholder="Selecione uma imagem..." legend="Selecionar" />
                                        </div>

                                        @if ($automotive->photo_2 != null)
                                            <div
                                                class='col-12 col-md-3 align-self-center mt-3 d-flex justify-content-center justify-content-md-end px-0'>
                                                <img src="{{ url('storage/automotives/' . $automotive->photo_2) }}"
                                                    alt="{{ $automotive->photo_2 }}" style="max-width: 80%;"
                                                    class="img-thumbnail d-block">
                                            </div>
                                        @endif
                                    </div>
                                </div>


                                <div class="d-flex flex-wrap justify-content-between">
                                    <div class="col-12 col-md-6 form-group px-0 pr-md-2 d-flex flex-wrap">
                                        <div class="{{ $automotive->photo_3 != null ? 'col-md-9' : 'col-md-12' }} px-0">
                                            <x-adminlte-input-file name="photo_3" label="Imagem 3"
                                                placeholder="Selecione uma imagem..." legend="Selecionar" />
                                        </div>

                                        @if ($automotive->photo_3 != null)
                                            <div
                                                class='col-12 col-md-3 align-self-center mt-3 d-flex justify-content-center justify-content-md-end px-0'>
                                                <img src="{{ url('storage/automotives/' . $automotive->photo_3) }}"
                                                    alt="{{ $automotive->photo_3 }}" style="max-width: 80%;"
                                                    class="img-thumbnail d-block">
                                            </div>
                                        @endif
                                    </div>

                                    <div class="col-12 col-md-6 form-group px-0 pl-md-2 d-flex flex-wrap">
                                        <div class="{{ $automotive->photo_4 != null ? 'col-md-9' : 'col-md-12' }} px-0">
                                            <x-adminlte-input-file name="photo_4" label="Imagem 4"
                                                placeholder="Selecione uma imagem..." legend="Selecionar" />
                                        </div>

                                        @if ($automotive->photo_4 != null)
                                            <div
                                                class='col-12 col-md-3 align-self-center mt-3 d-flex justify-content-center justify-content-md-end px-0'>
                                                <img src="{{ url('storage/automotives/' . $automotive->photo_4) }}"
                                                    alt="{{ $automotive->photo_4 }}" style="max-width: 80%;"
                                                    class="img-thumbnail d-block">
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="d-flex flex-wrap justify-content-between">
                                    <div class="col-12 col-md-6 form-group px-0 pr-md-2">
                                        <label for="owner">Proprietário</label>
                                        <input type="text" class="form-control" id="owner"
                                            placeholder="Nome do Proprietário" name="owner"
                                            value="{{ old('owner') ?? $automotive->owner }}" required>
                                    </div>
                                    <div class="col-12 col-md-6 form-group px-0 pl-md-2">
                                        <label for="phone">Telefone para Contato</label>
                                        <input type="text" class="form-control" id="phone"
                                            placeholder="Telefone para Contato com o proprietário" name="phone"
                                            value="{{ old('phone') ?? $automotive->phone }}" required>
                                    </div>
                                </div>

                                <div class="d-flex flex-wrap justify-content-between">
                                    <div class="col-12 col-md-6 form-group px-0 pr-md-2">
                                        <label for="category">Categoria</label>
                                        <x-adminlte-select2 name="category">
                                            <option value="Carro"
                                                {{ old('category') == 'Carro' ? 'selected' : ($automotive->category == 'Carro' ? 'selected' : '') }}>
                                                Carro
                                            </option>
                                            <option value="Moto"
                                                {{ old('category') == 'Moto' ? 'selected' : ($automotive->category == 'Moto' ? 'selected' : '') }}>
                                                Moto
                                            </option>
                                        </x-adminlte-select2>
                                    </div>

                                    <div class="col-12 col-md-6 form-group px-0 pl-md-2">
                                        <label for="brand">Marca</label>
                                        <input type="text" class="form-control" id="brand" placeholder="Marca"
                                            name="brand" value="{{ old('brand') ?? $automotive->brand }}" required>
                                    </div>
                                </div>

                                <div class="d-flex flex-wrap justify-content-between">
                                    <div class="col-12 col-md-6 form-group px-0 pr-md-2">
                                        <label for="model">Modelo</label>
                                        <input type="text" class="form-control" id="model" placeholder="Modelo"
                                            name="model" value="{{ old('model') ?? $automotive->model }}" required>
                                    </div>

                                    <div class="col-12 col-md-6 form-group px-0 pl-md-2">
                                        <label for="status">Status</label>
                                        <x-adminlte-select2 name="status">
                                            <option value="Ativo"
                                                {{ old('status') == 'Ativo' ? 'selected' : ($automotive->status == 'Ativo' ? 'selected' : '') }}>
                                                Ativo
                                            </option>
                                            <option value="Rascunho"
                                                {{ old('status') == 'Rascunho' ? 'selected' : ($automotive->status == 'Rascunho' ? 'selected' : '') }}>
                                                Rascunho
                                            </option>
                                            <option value="Vendido"
                                                {{ old('status') == 'Vendido' ? 'selected' : ($automotive->status == 'Vendido' ? 'selected' : '') }}>
                                                Vendido
                                            </option>
                                        </x-adminlte-select2>
                                    </div>
                                </div>

                                <div class="d-flex flex-wrap justify-content-between">
                                    <div class="col-12 col-md-6 form-group px-0 pr-md-2">
                                        <label for="sale_price">Preço de Venda</label>
                                        <input type="tel" class="form-control" id="sale_price"
                                            placeholder="Preço de Venda" name="sale_price"
                                            value="{{ old('sale_price') ?? $automotive->sale_price }}">
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
                                            {{ old('description') ?? $automotive->description }}
                                        </x-adminlte-text-editor>
                                    </div>
                                </div>

                                <div class="d-flex flex-wrap justify-content-between">

                                    <div class="col-12 col-md-6 form-group px-0 pr-md-2">
                                        <label for="year">Ano</label>
                                        <input type="number" class="form-control" id="year" placeholder="Ano" name="year"
                                            value="{{ old('year') ?? $automotive->year }}" required>
                                    </div>

                                    <div class="col-12 col-md-6 form-group px-0 pl-md-2">
                                        <label for="mileage">Quilometragem</label>
                                        <input type="number" class="form-control" id="mileage" placeholder="Quilometragem"
                                            name="mileage" value="{{ old('mileage') ?? $automotive->mileage }}" required>
                                    </div>
                                </div>

                                <div class="d-flex flex-wrap justify-content-between">

                                    <div class="col-12 col-md-6 form-group px-0 pr-md-2">
                                        <label for="gear">Câmbio</label>
                                        <input type="text" class="form-control" id="gear"
                                            placeholder="Manual, autmático..." name="gear"
                                            value="{{ old('gear') ?? $automotive->gear }}" required>
                                    </div>

                                    <div class="col-12 col-md-6 form-group px-0 pl-md-2">
                                        <label for="fuel">Combustível</label>
                                        <input type="text" class="form-control" id="fuel" placeholder="Gasolina, flex..."
                                            name="fuel" value="{{ old('fuel') ?? $automotive->fuel }}" required>
                                    </div>
                                </div>

                                <div class="d-flex flex-wrap justify-content-between">
                                    <div class="col-12 col-md-6 form-group px-0 pr-md-2">
                                        <label for="zipcode">CEP</label>
                                        <input type="tel" class="form-control" id="zipcode" placeholder="CEP"
                                            name="zipcode" value="{{ old('zipcode') ?? $automotive->zipcode }}" required>
                                    </div>
                                    <div class="col-12 col-md-6 form-group px-0 pl-md-2">
                                        <label for="street">Rua</label>
                                        <input type="text" class="form-control" id="street" placeholder="Rua"
                                            name="street" value="{{ old('street') ?? $automotive->street }}" required>
                                    </div>
                                </div>

                                <div class="d-flex flex-wrap justify-content-between">
                                    <div class="col-12 col-md-6 form-group px-0 pr-md-2">
                                        <label for="number">Número</label>
                                        <input type="text" class="form-control" id="number" placeholder="Número"
                                            name="number" value="{{ old('number') ?? $automotive->number }}" required>
                                    </div>
                                    <div class="col-12 col-md-6 form-group px-0 pl-md-2">
                                        <label for="complement">Complemento</label>
                                        <input type="text" class="form-control" id="complement" placeholder="Complemento"
                                            name="complement" value="{{ old('complement') ?? $automotive->complement }}">
                                    </div>
                                </div>

                                <div class="d-flex flex-wrap justify-content-between">
                                    <div class="col-12 col-md-6 form-group px-0 pr-md-2">
                                        <label for="neighborhood">Bairro</label>
                                        <input type="text" class="form-control" id="neighborhood" placeholder="Bairro"
                                            name="neighborhood"
                                            value="{{ old('neighborhood') ?? $automotive->neighborhood }}" required>
                                    </div>
                                    <div class="col-12 col-md-6 form-group px-0 pl-md-2">
                                        <label for="state">Estado</label>
                                        <input type="text" class="form-control" id="state" placeholder="UF" name="state"
                                            value="{{ old('state') ?? $automotive->state }}">
                                    </div>
                                </div>

                                <div class="d-flex flex-wrap justify-content-between">
                                    <div class="col-12 col-md-6 form-group px-0 pr-md-2">
                                        <label for="city">Cidade</label>
                                        <input type="text" class="form-control" id="city" placeholder="Cidade" name="city"
                                            value="{{ old('city') ?? $automotive->city }}" required>
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
    <script src="{{ asset('vendor/jquery/jquery.inputmask.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery/jquery.maskMoney.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
@endsection
