@extends('adminlte::page')
@section('plugins.select2', true)
@section('plugins.BsCustomFileInput', true)
@section('plugins.Summernote', true)

@section('title', '- Editar Imóvel')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="fas fa-fw fa-building"></i> Editar Imóvel</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.properties.index') }}">Imóveis</a></li>
                        <li class="breadcrumb-item active">Editar Imóvel</li>
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
                            <h3 class="card-title">Dados Cadastrais do Imóvel</h3>
                        </div>

                        <form method="POST" action="{{ route('admin.properties.update', ['property' => $property->id]) }}"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <input type="hidden" name="id" value="{{ $property->id }}">
                            <div class="card-body">

                                <div class="d-flex flex-wrap justify-content-between">
                                    <div class="col-12 col-md-6 form-group px-0 pr-md-2">
                                        <label for="title">Título</label>
                                        <input type="text" class="form-control" id="title" placeholder="Título"
                                            name="title" value="{{ old('title') ?? $property->title }}" required>
                                    </div>

                                    <div class="col-12 col-md-6 form-group px-0 pl-md-2 d-flex flex-wrap">
                                        <div class="{{ $property->photo != null ? 'col-md-9' : 'col-md-12' }} px-0">
                                            <x-adminlte-input-file name="photo" label="Foto de Capa"
                                                placeholder="Selecione uma imagem..." legend="Selecionar" />
                                        </div>

                                        @if ($property->photo != null)
                                            <div
                                                class='col-12 col-md-3 align-self-center mt-3 d-flex justify-content-center justify-content-md-end px-0'>
                                                <img src="{{ url('storage/properties/' . $property->photo) }}"
                                                    alt="{{ $property->photo }}" style="max-width: 80%;"
                                                    class="img-thumbnail d-block">
                                            </div>
                                        @endif
                                    </div>

                                </div>

                                <div class="d-flex flex-wrap justify-content-between">
                                    <div class="col-12 col-md-6 form-group px-0 pr-md-2">
                                        <label for="type">Tipo</label>
                                        <x-adminlte-select2 name="type">
                                            <option value="Casa"
                                                {{ old('type') == 'Casa' ? 'selected' : ($property->type == 'Casa' ? 'selected' : '') }}>
                                                Casa
                                            </option>
                                            <option value="Apartamento"
                                                {{ old('type') == 'Apartamento' ? 'selected' : ($property->type == 'Apartamento' ? 'selected' : '') }}>
                                                Apartamento</option>
                                            <option value="Terreno"
                                                {{ old('type') == 'Terreno' ? 'selected' : ($property->type == 'Terreno' ? 'selected' : '') }}>
                                                Terreno</option>
                                        </x-adminlte-select2>

                                    </div>

                                    <div class="col-12 col-md-6 form-group px-0 pl-md-2">
                                        <label for="status">Status</label>
                                        <x-adminlte-select2 name="status">
                                            <option value="Ativo"
                                                {{ old('status') == 'Ativo' ? 'selected' : ($property->status == 'Ativo' ? 'selected' : '') }}>
                                                Ativo
                                            </option>
                                            <option value="Rascunho"
                                                {{ old('status') == 'Rascunho' ? 'selected' : ($property->status == 'Rascunho' ? 'selected' : '') }}>
                                                Rascunho
                                            </option>
                                            <option value="Ocupado"
                                                {{ old('status') == 'Ocupado' ? 'selected' : ($property->status == 'Ocupado' ? 'selected' : '') }}>
                                                Ocupado
                                            </option>
                                        </x-adminlte-select2>
                                    </div>
                                </div>

                                <div class="d-flex flex-wrap justify-content-between">
                                    <div class="col-12 col-md-6 form-group px-0 pr-md-2">
                                        <label for="porpouse">Propósito</label>
                                        <x-adminlte-select2 name="porpouse">
                                            <option value="sale"
                                                {{ old('porpouse') == 'Venda' ? 'selected' : ($property->porpouse == 'Venda' ? 'selected' : '') }}>
                                                Venda
                                            </option>
                                            <option value="draft"
                                                {{ old('porpouse') == 'Aluguel' ? 'selected' : ($property->porpouse == 'Aluguel' ? 'selected' : '') }}>
                                                Aluguel
                                            </option>
                                            <option value="occupied"
                                                {{ old('porpouse') == 'Venda ou Aluguel'? 'selected': ($property->porpouse == 'Venda ou Aluguel'? 'selected': '') }}>
                                                Venda ou Aluguel
                                            </option>
                                        </x-adminlte-select2>
                                    </div>

                                    <div class="col-12 col-md-6 form-group px-0 pl-md-2">
                                        <label for="area">Área em m<sup>2</sup></label>
                                        <input type="number" class="form-control" id="area"
                                            placeholder="Área em metros quadrados" name="area"
                                            value="{{ old('area') ?? $property->area }}" required>
                                    </div>
                                </div>

                                <div class="d-flex flex-wrap justify-content-between">
                                    <div class="col-12 col-md-6 form-group px-0 pr-md-2">
                                        <label for="sale_price">Preço de Venda</label>
                                        <input type="tel" class="form-control" id="sale_price"
                                            placeholder="Preço de Venda" name="sale_price"
                                            value="{{ old('sale_price') ?? $property->sale_price }}">
                                    </div>

                                    <div class="col-12 col-md-6 form-group px-0 pr-md-2">
                                        <label for="rent_price">Preço de Aluguel</label>
                                        <input type="tel" class="form-control" id="rent_price"
                                            placeholder="Preço de Venda" name="rent_price"
                                            value="{{ old('rent_price') ?? $property->rent_price }}">
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
                                            {{ old('description') ?? $property->description }}
                                        </x-adminlte-text-editor>
                                    </div>
                                </div>

                                <div class="d-flex flex-wrap justify-content-between">

                                    <div class="col-12 col-md-4 form-group px-0 pr-md-2">
                                        <label for="bathrooms">Banheiros</label>
                                        <input type="number" class="form-control" id="bathrooms" placeholder="Qtd"
                                            name="bathrooms" value="{{ old('bathrooms') ?? $property->bathrooms }}"
                                            required>
                                    </div>

                                    <div class="col-12 col-md-4 form-group px-0 pr-md-2">
                                        <label for="garage">Garagem</label>
                                        <input type="number" class="form-control" id="garage" placeholder="Qtd"
                                            name="garage" value="{{ old('garage') ?? $property->garage }}" required>
                                    </div>

                                    <div class="col-12 col-md-4 form-group px-0 pl-md-2">
                                        <label for="bedrooms">Quartos</label>
                                        <input type="number" class="form-control" id="bedrooms" placeholder="Qtd"
                                            name="bedrooms" value="{{ old('bedrooms') ?? $property->bedrooms }}"
                                            required>
                                    </div>
                                </div>

                                <div class="d-flex flex-wrap justify-content-between">
                                    <div class="col-12 col-md-6 form-group px-0 pr-md-2">
                                        <label for="zipcode">CEP</label>
                                        <input type="tel" class="form-control" id="zipcode" placeholder="CEP"
                                            name="zipcode" value="{{ old('zipcode') ?? $property->zipcode }}" required>
                                    </div>
                                    <div class="col-12 col-md-6 form-group px-0 pl-md-2">
                                        <label for="street">Rua</label>
                                        <input type="text" class="form-control" id="street" placeholder="Rua"
                                            name="street" value="{{ old('street') ?? $property->street }}" required>
                                    </div>
                                </div>

                                <div class="d-flex flex-wrap justify-content-between">
                                    <div class="col-12 col-md-6 form-group px-0 pr-md-2">
                                        <label for="number">Número</label>
                                        <input type="text" class="form-control" id="number" placeholder="Número"
                                            name="number" value="{{ old('number') ?? $property->number }}" required>
                                    </div>
                                    <div class="col-12 col-md-6 form-group px-0 pl-md-2">
                                        <label for="complement">Complemento</label>
                                        <input type="text" class="form-control" id="complement" placeholder="Complemento"
                                            name="complement" value="{{ old('complement') ?? $property->complement }}">
                                    </div>
                                </div>

                                <div class="d-flex flex-wrap justify-content-between">
                                    <div class="col-12 col-md-6 form-group px-0 pr-md-2">
                                        <label for="neighborhood">Bairro</label>
                                        <input type="text" class="form-control" id="neighborhood" placeholder="Bairro"
                                            name="neighborhood"
                                            value="{{ old('neighborhood') ?? $property->neighborhood }}" required>
                                    </div>
                                    <div class="col-12 col-md-6 form-group px-0 pl-md-2">
                                        <label for="state">Estado</label>
                                        <input type="text" class="form-control" id="state" placeholder="UF" name="state"
                                            value="{{ old('state') ?? $property->state }}">
                                    </div>
                                </div>

                                <div class="d-flex flex-wrap justify-content-between">
                                    <div class="col-12 col-md-6 form-group px-0 pr-md-2">
                                        <label for="city">Cidade</label>
                                        <input type="text" class="form-control" id="city" placeholder="Cidade" name="city"
                                            value="{{ old('city') ?? $property->city }}" required>
                                    </div>
                                </div>

                                <div class="d-flex flex-wrap justify-content-between">
                                    <div class="col-12 col-md-3 form-group px-0 pr-md-2">
                                        <div class="card-body p-2 border rounded">
                                            <input type="checkbox" style="cursor: pointer" id="planned_furniture"
                                                name="planned_furniture"
                                                {{ old('planned_furniture') == 'on' || old('planned_furniture') == true? 'checked': ($property->planned_furniture == 1 || $property->planned_furniture == true? 'checked': '') }}>
                                            <label for="planned_furniture" class="my-0 ml-2">Móveis Planejados</label>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-3 form-group px-0 pr-md-2">
                                        <div class="card-body p-2 border rounded">
                                            <input type="checkbox" style="cursor: pointer" id="barbecue_grill"
                                                name="barbecue_grill"
                                                {{ old('barbecue_grill') == 'on' || old('barbecue_grill') == true? 'checked': ($property->barbecue_grill == 1 || $property->barbecue_grill == true? 'checked': '') }}>
                                            <label for="barbecue_grill" class="my-0 ml-2">Churrasqueira</label>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-3 form-group px-0 pr-md-2">
                                        <div class="card-body p-2 border rounded">
                                            <input type="checkbox" style="cursor: pointer" id="wifi" name="wifi"
                                                {{ old('wifi') == 'on' || old('wifi') == true? 'checked': ($property->wifi == 1 || $property->wifi == true? 'checked': '') }}>
                                            <label for="wifi" class="my-0 ml-2">Wi-Fi</label>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-3 form-group px-0 pr-md-2">
                                        <div class="card-body p-2 border rounded">
                                            <input type="checkbox" style="cursor: pointer" id="air_conditioning"
                                                name="air_conditioning"
                                                {{ old('air_conditioning') == 'on' || old('air_conditioning') == true? 'checked': ($property->air_conditioning == 1 || $property->air_conditioning == true? 'checked': '') }}>
                                            <label for="air_conditioning" class="my-0 ml-2">Ar Condicionado</label>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-3 form-group px-0 pr-md-2">
                                        <div class="card-body p-2 border rounded">
                                            <input type="checkbox" style="cursor: pointer" id="bar" name="bar"
                                                {{ old('bar') == 'on' || old('bar') == true? 'checked': ($property->bar == 1 || $property->bar == true? 'checked': '') }}>
                                            <label for="bar" class="my-0 ml-2">Bar</label>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-3 form-group px-0 pr-md-2">
                                        <div class="card-body p-2 border rounded">
                                            <input type="checkbox" style="cursor: pointer" id="american_kitchen"
                                                name="american_kitchen"
                                                {{ old('american_kitchen') == 'on' || old('american_kitchen') == true? 'checked': ($property->planned_furniture == 1 || $property->american_kitchen == true? 'american_kitchen': '') }}>
                                            <label for="american_kitchen" class="my-0 ml-2">Cozinha Americana</label>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-3 form-group px-0 pr-md-2">
                                        <div class="card-body p-2 border rounded">
                                            <input type="checkbox" style="cursor: pointer" id="office" name="office"
                                                {{ old('office') == 'on' || old('office') == true? 'checked': ($property->office == 1 || $property->office == true? 'checked': '') }}>
                                            <label for="office" class="my-0 ml-2">Escritório</label>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-3 form-group px-0 pr-md-2">
                                        <div class="card-body p-2 border rounded">
                                            <input type="checkbox" style="cursor: pointer" id="pool" name="pool"
                                                {{ old('pool') == 'on' || old('pool') == true? 'checked': ($property->pool == 1 || $property->pool == true? 'checked': '') }}>
                                            <label for="pool" class="my-0 ml-2">Piscina</label>
                                            </label>
                                        </div>
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
