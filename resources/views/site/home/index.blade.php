@extends('site.master.master')

@section('content')
    <!--/ Carousel  /-->
    <div class="intro intro-carousel">
        <div id="carousel" class="owl-carousel owl-theme">
            @foreach ($properties->slice(0, 3) as $property)
                <div class="carousel-item-a intro-item bg-image"
                    style="background-image: url({{ url('storage/properties/' . $property->photo_0) }})">
                    <!-- INSERIR A IMAGEM DINAMICAMENTE DOS ULTIMOS IMOVEIS ADICIONADOS -->
                    <div class="overlay overlay-a"></div>
                    <div class="intro-content display-table">
                        <div class="table-cell">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="intro-body">
                                            <p class="intro-title-top">{{ $property->city }}, {{ $property->state }}
                                                <br> {{ $property->id }}
                                            </p> <!-- Código do imóvel -->
                                            <h1 class="intro-title mb-4">
                                                <span class="color-b">{{ $property->number }} </span>
                                                {{ Str::words($property->street, 1, '') }}
                                                <br>
                                                {{ Str::words(Str::of($property->street)->after(Str::words($property->street, 1, '')), 2, '') }}
                                            </h1>
                                            <p class="intro-subtitle intro-price">
                                                <a href="{{ route('property', ['slug' => $property->slug]) }}"><span
                                                        class="price-a">{{ $property->porpouse == 'sale' ? 'Venda' : 'Aluguel' }}
                                                        |
                                                        {{ $property->porpouse == 'sale' ? $property->sale_price : $property->rent_price }}</span></a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!--/ Fim do Carousel /-->

    <!--/ Serviços /-->
    <section class="section-services section-t8">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-wrap d-flex justify-content-between">
                        <div class="title-box">
                            <h2 class="title-a">Nossos Serviços</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card-box-c foo">
                        <div class="card-header-c d-flex">
                            <div class="card-box-ico">
                                <span class="fa fa-gamepad"></span>
                            </div>
                            <div class="card-title-c align-self-center">
                                <h2 class="title-c">Meu objetivo</h2>
                            </div>
                        </div>
                        <div class="card-body-c">
                            <p class="content-c">
                                Sempre buscar os melhores preços, condições e qualidade para poder servir
                                vocês da melhor forma possível.
                                Atendimento diferenciado e especializado para cumprir com a sua expectativa nesse
                                momento importante da sua vida, na compra de um bem material tão esperado.
                            </p>
                        </div>
                        <div class="card-footer-c">
                            <a href="{{ route('contact') }}" class="link-c link-icon">Entrar em contato
                                <span class="ion-ios-arrow-forward"></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-box-c foo">
                        <div class="card-header-c d-flex">
                            <div class="card-box-ico">
                                <span class="fa fa-usd"></span>
                            </div>
                            <div class="card-title-c align-self-center">
                                <h2 class="title-c">Valores</h2>
                            </div>
                        </div>
                        <div class="card-body-c">
                            <p class="content-c">
                                Buscando compreender o momento difícil que a nossa sociedade
                                se encontra, sempre vamos trazer o melhor custo benefício para você.
                            </p>
                        </div>
                        <div class="card-footer-c">
                            <a href="{{ route('about') }}" class="link-c link-icon">Saber mais
                                <span class="ion-ios-arrow-forward"></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-box-c foo">
                        <div class="card-header-c d-flex">
                            <div class="card-box-ico">
                                <span class="fa fa-home"></span>
                            </div>
                            <div class="card-title-c align-self-center">
                                <h2 class="title-c">Imóveis</h2>
                            </div>
                        </div>
                        <div class="card-body-c">
                            <p class="content-c">
                                Diversidade é o que nos difere de todos os outros concorrentes,
                                possuímos imóveis, carros e diversos outros Produtos
                                com qualidade e acabamento fino,sempre prezando o conforto e
                                bem-estar.
                            </p>
                        </div>
                        <div class="card-footer-c">
                            <a href="{{ route('properties') }}" class="link-c link-icon">Ver imóveis
                                <span class="ion-ios-arrow-forward"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ Fim dos Serviços /-->

    <!--/ Imóveis /-->
    <section class="section-property section-t8">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-wrap d-flex justify-content-between">
                        <div class="title-box">
                            <h2 class="title-a">Adicionadas recentemente</h2>
                        </div>
                        <div class="title-link">
                            <a href="{{ route('properties') }}">Todos os imóveis
                                <span class="ion-ios-arrow-forward"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div id="property-carousel" class="owl-carousel owl-theme">
                @foreach ($properties as $property)
                    <div class="carousel-item-b">
                        <div class="card-box-a card-shadow">
                            <div class="img-box-a">
                                <img src="{{ url('storage/properties/' . $property->photo_0) }}"
                                    alt="{{ $property->title }}" class="img-a img-fluid">
                            </div>
                            <div class="card-overlay">
                                <div class="card-overlay-a-content">
                                    <div class="card-header-a">
                                        <h2 class="card-title-a">
                                            <a href="property-single.html">{{ $property->number }}
                                                Str::words($property->street, 1, '')
                                                <br />
                                                {{ Str::words(Str::of($property->street)->after(Str::words($property->street, 1, '')), 2, '') }}</a>
                                            <!--  DINAMICO -->
                                        </h2>
                                    </div>
                                    <div class="card-body-a">
                                        <div class="price-box d-flex">
                                            <span
                                                class="price-a">{{ $property->porpouse == 'sale' ? 'Venda' : 'Aluguel' }}
                                                |
                                                {{ $property->porpouse == 'sale' ? $property->sale_price : $property->rent_price }}</span>
                                            <!--  DINAMICO -->
                                        </div>
                                        <a href="{{ route('property', ['slug' => $property->slug]) }}"
                                            class="link-a">Saber mais
                                            <span class="ion-ios-arrow-forward"></span>
                                        </a>
                                    </div>
                                    <div class="card-footer-a">
                                        <ul class="card-info d-flex justify-content-around">
                                            <li>
                                                <h4 class="card-info-title">Area</h4> <!--  DINAMICO -->
                                                <span>{{ $property->area }}m
                                                    <sup>2</sup>
                                                </span>
                                            </li>
                                            <li>
                                                <h4 class="card-info-title">Quartos</h4> <!--  DINAMICO -->
                                                <span>{{ $property->bedrooms }}</span>
                                            </li>
                                            <li>
                                                <h4 class="card-info-title">Banheiros</h4> <!--  DINAMICO -->
                                                <span>{{ $property->bathrooms }}</span>
                                            </li>
                                            <li>
                                                <h4 class="card-info-title">Garagem</h4> <!--  DINAMICO -->
                                                <span>{{ $property->garage }}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--/ Fim Imóveis /-->

    <!--/ Corretores /-->
    <section class="section-agents section-t8">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-wrap d-flex justify-content-between">
                        <div class="title-box">
                            <h2 class="title-a">Corretor</h2>
                        </div>
                        {{-- <div class="title-link">
                            <a href="agents-grid.html">Todos os corretores
                                <span class="ion-ios-arrow-forward"></span>
                            </a>
                        </div> --}}
                    </div>
                </div>
            </div>
            <div class="row" style="display:flex; align-items:center; justify-content:center;">
                <div class="col-md-4">
                    <div class="card-box-d">
                        <div class="card-img-d">
                            <img src="img/henr.jpeg" alt="" class="img-d img-fluid">
                        </div>
                        <div class="card-overlay card-overlay-hover">
                            <div class="card-header-d">
                                <div class="card-title-d align-self-center">
                                    <h3 class="title-d">
                                        <a href="agent-single.html" class="link-two">Henrique sobrenome
                                            <br> ultimonome</a>
                                    </h3>
                                </div>
                            </div>
                            <div class="card-body-d">
                                <p class="content-d color-text-a">
                                    Corretor, SEO, negociador e apaixonado por vendas
                                </p>
                                <div class="info-agents color-a">
                                    <p>
                                        <strong>Whatsapp: </strong> +55 11980260-0988
                                    </p>
                                    <p>
                                        <strong>Email: </strong> emaildocliente@gmail.com
                                    </p>
                                </div>
                            </div>
                            <div class="card-footer-d">
                                <div class="socials-footer d-flex justify-content-center">
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a href="#" class="link-one">
                                                <i class="fa fa-facebook" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#" class="link-one">
                                                <i class="fa fa-twitter" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#" class="link-one">
                                                <i class="fa fa-instagram" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--/ Agentes Fim /-->

    <!--/ refereencias /-->
    <section class="section-testimonials section-t8 nav-arrow-a">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-wrap d-flex justify-content-between">
                        <div class="title-box">
                            <h2 class="title-a">Clientes Satisfeitos</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div id="testimonial-carousel" class="owl-carousel owl-arrow">
                <div class="carousel-item-a">
                    <div class="testimonials-box">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="testimonial-img">
                                    <img src="img/testimonial-2.jpg" alt="" class="img-fluid">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="testimonial-ico">
                                    <span class="ion-ios-quote"></span>
                                </div>
                                <div class="testimonials-content">
                                    <p class="testimonial-text">
                                        Feedback do cliente sobre o tipo de serviço prestado, elogios e criticas
                                        construtivas.
                                        Feedback do cliente sobre o tipo de serviço prestado, elogios e criticas
                                        construtivas.
                                        Feedback do cliente sobre o tipo de serviço prestado, elogios e criticas
                                        construtivas.
                                    </p>
                                </div>
                                <div class="testimonial-author-box">
                                    <img src="img/mini-testimonial-2.jpg" alt="" class="testimonial-avatar">
                                    <h5 class="testimonial-author">Nome do cliente</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item-a">
                    <div class="testimonials-box">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="testimonial-img">
                                    <img src="img/testimonial-2.jpg" alt="" class="img-fluid">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="testimonial-ico">
                                    <span class="ion-ios-quote"></span>
                                </div>
                                <div class="testimonials-content">
                                    <p class="testimonial-text">
                                        Feedback do cliente sobre o tipo de serviço prestado, elogios e criticas
                                        construtivas.
                                        Feedback do cliente sobre o tipo de serviço prestado, elogios e criticas
                                        construtivas.
                                        Feedback do cliente sobre o tipo de serviço prestado, elogios e criticas
                                        construtivas.
                                    </p>
                                </div>
                                <div class="testimonial-author-box">
                                    <img src="img/mini-testimonial-2.jpg" alt="" class="testimonial-avatar">
                                    <h5 class="testimonial-author">Nome do cliente</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ Fim Clientes /-->
@endsection
