@extends('site.master.master')

@section('content')
    <!--/ imóveis  grid top /-->
    <section class="intro-single">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-8">
                    <div class="title-single-box">
                        <h1 class="title-single">Nossos imóveis</h1>
                        <span class="color-text-a">Consulte outros em <a
                                href="https://vivanceimoveis.com.br">https://vivanceimoveis.com.br/</a></span>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4">
                    <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Imóveis
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!--/ Fim imóveis grid top /-->

    <!--/ Property Grid Star /-->
    <section class="property-grid grid">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="grid-option">
                        <form>
                            <select class="custom-select" id="properties">
                                <option selected value="0">Todos</option>
                                <option value="1">Venda</option>
                                <option value="2">Locação</option>
                            </select>
                        </form>
                    </div>
                </div>
                @foreach ($properties as $property)
                    <div class="col-md-4" data-porpouse="{{ $property->porpouse }}">
                        <div class="card-box-a card-shadow">
                            <div class="img-box-a" style="height:250px;">
                                <img src="{{ url('storage/properties/' . $property->photo_0) }}"
                                    alt="{{ $property->title }}" class="img-a img-fluid">
                            </div>
                            <div class="card-overlay">
                                <div class="card-overlay-a-content">
                                    <div class="card-header-a">
                                        <h2 class="card-title-a">
                                            <a href="{{ route('property', ['slug' => $property->slug]) }}">{{ $property->neighborhood }}
                                                <br />
                                                {{ $property->city }}</a>
                                        </h2>
                                    </div>
                                    <div class="card-body-a">
                                        <div class="price-box d-flex">
                                            <span
                                                class="price-a">{{ $property->porpouse == 'sale' ? 'Venda' : 'Aluguel' }}
                                                |
                                                {{ $property->porpouse == 'sale' ? $property->sale_price : $property->rent_price }}</span>
                                        </div>
                                        <a href="{{ route('property', ['slug' => $property->slug]) }}"
                                            class="link-a">Ver Mais
                                            <span class="ion-ios-arrow-forward"></span>
                                        </a>
                                    </div>
                                    <div class="card-footer-a">
                                        <ul class="card-info d-flex justify-content-around">
                                            <li>
                                                <h4 class="card-info-title">Area</h4>
                                                <span>{{ $property->area }}m
                                                    <sup>2</sup>
                                                </span>
                                            </li>
                                            <li>
                                                <h4 class="card-info-title">Quartos</h4>
                                                <span>{{ $property->bedrooms }}</span>
                                            </li>
                                            <li>
                                                <h4 class="card-info-title">Banheiros</h4>
                                                <span>{{ $property->bathrooms }}</span>
                                            </li>
                                            <li>
                                                <h4 class="card-info-title">Garagemm</h4>
                                                <span>{{ $property->garage }}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="row">
                    <div class="col-sm-12">
                        <nav class="pagination-a">
                            {{ $properties->links() }}
                        </nav>
                    </div>
                </div>
            </div>
    </section>
    <!--/ Grid End /-->
@endsection
