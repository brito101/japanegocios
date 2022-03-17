@extends('site.master.master')

@section('content')
    <!--/ imóveis  grid top /-->
    <section class="intro-single">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-8">
                    <div class="title-single-box">
                        <h1 class="title-single">Nossos produtos</h1>
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
                                Produtos
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

                @foreach ($products as $product)
                    <div class="col-md-4">
                        <div class="card-box-a card-shadow">
                            <div class="img-box-a">
                                <img src="{{ url('storage/products/' . $product->photo_0) }}"
                                    alt="{{ $product->title }}" class="img-a img-fluid">
                            </div>
                            <div class="card-overlay">
                                <div class="card-overlay-a-content">
                                    <div class="card-header-a">
                                        <h2 class="card-title-a">
                                            <a
                                                href="{{ route('product', ['slug' => $product->slug]) }}">{{ $product->title }}</a>
                                        </h2>
                                    </div>
                                    <div class="card-body-a">
                                        <div class="price-box d-flex">
                                            <span class="price-a">{{ $product->sale_price }}</span>
                                        </div>
                                        <a href="{{ route('product', ['slug' => $product->slug]) }}"
                                            class="link-a">Ver Mais
                                            <span class="ion-ios-arrow-forward"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="row">
                    <div class="col-sm-12">
                        <nav class="pagination-a">
                            {{ $products->links() }}
                        </nav>
                    </div>
                </div>
            </div>
    </section>
    <!--/ Grid End /-->
@endsection
