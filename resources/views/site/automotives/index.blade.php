@extends('site.master.master')

@section('content')
    <!--/ imóveis  grid top /-->
    <section class="intro-single">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-8">
                    <div class="title-single-box">
                        <h1 class="title-single">Nossos automóveis</h1>
                        <span class="color-text-a">disponíveis</span>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4">
                    <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Automóveis
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

                @foreach ($automotives as $automotive)
                    <div class="col-md-4">
                        <div class="card-box-a card-shadow">
                            <div class="img-box-a">
                                <img src="{{ url('storage/automotives/' . $automotive->photo_0) }}"
                                    alt="{{ $automotive->title }}" class="img-a img-fluid">
                            </div>
                            <div class="card-overlay">
                                <div class="card-overlay-a-content">
                                    <div class="card-header-a">
                                        <h2 class="card-title-a">
                                            <a href="{{ route('automotive', ['slug' => $automotive->slug]) }}">{{ $automotive->number }}
                                                Str::words($automotive->street, 1, '')
                                                <br />
                                                {{ Str::words(Str::of($automotive->street)->after(Str::words($automotive->street, 1, '')), 2, '') }}</a>
                                        </h2>
                                    </div>
                                    <div class="card-body-a">
                                        <div class="price-box d-flex">
                                            <span class="price-a">{{ $automotive->sale_price }}</span>
                                        </div>
                                        <a href="{{ route('automotive', ['slug' => $automotive->slug]) }}"
                                            class="link-a">Ver Mais
                                            <span class="ion-ios-arrow-forward"></span>
                                        </a>
                                    </div>
                                    <div class="card-footer-a">
                                        <ul class="card-info d-flex justify-content-around">
                                            <li>
                                                <h4 class="card-info-title">Ano</h4>
                                                <span>{{ $automotive->year }}</span>
                                            </li>
                                            <li>
                                                <h4 class="card-info-title">Quilometragem</h4>
                                                <span>{{ $automotive->mileage }} km</span>
                                            </li>
                                            <li>
                                                <h4 class="card-info-title">Câmbio</h4>
                                                <span>{{ $automotive->gear }}</span>
                                            </li>
                                            <li>
                                                <h4 class="card-info-title">Combustível</h4>
                                                <span>{{ $automotive->fuel }}</span>
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
                            {{ $automotives->links() }}
                        </nav>
                    </div>
                </div>
            </div>
    </section>
    <!--/ Grid End /-->
@endsection
