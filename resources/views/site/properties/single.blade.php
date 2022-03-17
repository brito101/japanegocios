@extends('site.master.master')

@section('content')
    <!--/ Intro Single star /-->
    <section class="intro-single">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-8">
                    <div class="title-single-box">
                        <h1 class="title-single">{{ $property->number }} {{ Str::words($property->street, 1, '') }}
                        </h1>
                        <span
                            class="color-text-a">{{ Str::words(Str::of($property->street)->after(Str::words($property->street, 1, ''))) }},
                            {{ $property->state }}</span>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4">
                    <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('properties') }}">Imóveis</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                {{ $property->type }}
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!--/ Intro Single End /-->

    <!--/ Property Single Star /-->
    <section class="property-single nav-arrow-b">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="property-single-carousel" class="owl-carousel owl-arrow gallery-property">
                        <div class="carousel-item-b">
                            <img src="{{ url('storage/properties/' . $property->photo_0) }}"
                                alt="{{ $property->title }}">
                        </div>
                        <div class="carousel-item-b">
                            <img src="{{ url('storage/properties/' . $property->photo_1) }}"
                                alt="{{ $property->title }}">
                        </div>
                        <div class="carousel-item-b">
                            <img src="{{ url('storage/properties/' . $property->photo_2) }}"
                                alt="{{ $property->title }}">
                        </div>
                        <div class="carousel-item-b">
                            <img src="{{ url('storage/properties/' . $property->photo_3) }}"
                                alt="{{ $property->title }}">
                        </div>
                        <div class="carousel-item-b">
                            <img src="{{ url('storage/properties/' . $property->photo_4) }}"
                                alt="{{ $property->title }}">
                        </div>
                    </div>
                    <div class="row justify-content-between">
                        <div class="col-md-5 col-lg-4">
                            <div class="property-price d-flex justify-content-center foo">
                                <div class="card-header-c d-flex">
                                    <div class="card-box-ico">
                                        <span class="ion-money">R$</span>
                                    </div>
                                    <div class="card-title-c align-self-center">
                                        <h5 class="title-c">
                                            {{ $property->porpouse == 'sale'
                                                ? Str::words(Str::of($property->sale_price)->after(Str::words($property->sale_price, 1, '')))
                                                : Str::words(Str::of($property->rent_price)->after(Str::words($property->rent_price, 1, ''))) }}
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="property-summary">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="title-box-d section-t4">
                                            <h3 class="title-d">Detalhes</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="summary-list">
                                    <ul class="list">
                                        <li class="d-flex justify-content-between">
                                            <strong>Imóvel ID:</strong>
                                            <span>{{ $property->id }}</span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>Endereço:</strong>
                                            <span>{{ $property->street }} {{ $property->number }}</span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>Tipo</strong>
                                            <span>{{ $property->type }}</span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>Status:</strong>
                                            <span>{{ $property->porpouse }}</span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>Area:</strong>
                                            <span>{{ $property->area }}m
                                                <sup>2</sup>
                                            </span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>Quartos:</strong>
                                            <span>{{ $property->bedrooms }}</span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>Banheiros:</strong>
                                            <span>{{ $property->bathrooms }}</span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>Garagem:</strong>
                                            <span>{{ $property->garage }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 col-lg-7 section-md-t3">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="title-box-d">
                                        <h3 class="title-d">Descrição do Imóvel</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="property-description">
                                {!! $property->description !!}
                            </div>
                            <div class="row section-t3">
                                <div class="col-sm-12">
                                    <div class="title-box-d">
                                        <h3 class="title-d">Diferenciais</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="amenities-list color-text-a">
                                <ul class="list-a no-margin">
                                    {!! $property->planned_furniture ? '<li>Móvel Planejado</li>' : '' !!}
                                    {!! $property->barbecue_grill ? '<li>Churrasqueira</li>' : '' !!}
                                    {!! $property->wifi ? '<li>Wi-Fi</li>' : '' !!}
                                    {!! $property->air_conditioning ? '<li>Ar Condicionado</li>' : '' !!}
                                    {!! $property->bar ? '<li>Bar</li>' : '' !!}
                                    {!! $property->american_kitchen ? '<li>Cozinha Americana</li>' : '' !!}
                                    {!! $property->office ? '<li>Escritório</li>' : '' !!}
                                    {!! $property->pool ? '<li>Piscina</li>' : '' !!}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row section-t3">
                        <div class="col-sm-12">
                            <div class="title-box-d">
                                <h3 class="title-d">Contato do Corretor</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-lg-4">
                            <img src="{{ asset('img/henr.jpeg') }}" alt="" class="img-fluid">
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="property-agent">
                                <h4 class="title-agent">Henrique Sobrenome</h4>
                                <p class="color-text-a">
                                    Nulla porttitor accumsan tincidunt. Vestibulum ac diam sit amet quam vehicula elementum
                                    sed sit amet
                                    dui. Quisque velit nisi,
                                    pretium ut lacinia in, elementum id enim.
                                </p>
                                <ul class="list-unstyled">
                                    <li class="d-flex justify-content-between">
                                        <strong>Whatsapp:</strong>
                                        <span class="color-text-a">(00) 00000-0000</span>
                                    </li>
                                    <li class="d-flex justify-content-between">
                                        <strong>Email:</strong>
                                        <span class="color-text-a">email@gmail.com</span>
                                    </li>
                                </ul>
                                <div class="socials-a">
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a href="#">
                                                <i class="fa fa-facebook" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#">
                                                <i class="fa fa-instagram" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-4">
                            <div class="property-contact">
                                <form class="form-a contactForm" action="{{ route('sendEmail') }}" method="post"
                                    role="form">
                                    @csrf
                                    <div id="sendmessage">
                                        Sua mensagem foi enviada, obrigado.
                                    </div>
                                    <div id="errormessage"></div>
                                    <div class="row">
                                        <div class="col-md-12 mb-1">
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-lg form-control-a"
                                                    id="inputName" placeholder="Nome *" name="name" required>
                                            </div>
                                        </div>
                                        <input type="hidden" name="subject"
                                            value="Interesse pelo imóvel ID {{ $property->id }}">
                                        <div class="col-md-12 mb-1">
                                            <div class="form-group">
                                                <input type="email" class="form-control form-control-lg form-control-a"
                                                    id="inputEmail1" placeholder="Email *" required name="email">
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-1">
                                            <div class="form-group">
                                                <textarea id="textMessage" class="form-control" placeholder="Mensagem *" name="message" cols="45" rows="8"
                                                    required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-a">Enviar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ Property Single End /-->
@endsection
