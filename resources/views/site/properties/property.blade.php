@extends('site.master.master')

@section('content')
    <!--/ Intro Single star /-->
    <section class="intro-single">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-8">
                    <div class="title-single-box">
                        <h1 class="title-single">144 Avenida</h1>
                        <span class="color-text-a">Pereira Barrreto, SP</span>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4">
                    <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="index.html">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="property-grid.html">Imóveis</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Sobrado
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
                            <img src="img/ft.png" alt="">
                        </div>
                        <div class="carousel-item-b">
                            <img src="img/ft.png" alt="">
                        </div>
                        <div class="carousel-item-b">
                            <img src="img/ft.png" alt="">
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
                                        <h5 class="title-c">2000</h5>
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
                                            <span>1134</span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>Endereço:</strong>
                                            <span>Av. Pereira Barreto 144</span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>Tipo</strong>
                                            <span>Casa</span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>Status:</strong>
                                            <span>Aluguel</span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>Area:</strong>
                                            <span>80m
                                                <sup>2</sup>
                                            </span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>Quartos:</strong>
                                            <span>4</span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>Banheiros:</strong>
                                            <span>2</span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>Garagem:</strong>
                                            <span>1</span>
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
                                <p class="description color-text-a">
                                    Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
                                    Donec velit
                                    neque, auctor sit amet
                                    aliquam vel, ullamcorper sit amet ligula. Cras ultricies ligula sed magna dictum porta.
                                    Curabitur aliquet quam id dui posuere blandit. Mauris blandit aliquet elit, eget
                                    tincidunt
                                    nibh pulvinar quam id dui posuere blandit.
                                </p>
                                <p class="description color-text-a no-margin">
                                    Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Donec rutrum congue leo
                                    eget
                                    malesuada. Quisque velit nisi,
                                    pretium ut lacinia in, elementum id enim. Donec sollicitudin molestie malesuada.
                                </p>
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
                                    <li>Móvel Planejado</li>
                                    <li>Churrasqueira</li>
                                    <li>Wi-Fi</li>
                                    <li>Móvel Planejado</li>
                                    <li>Churrasqueira</li>
                                    <li>Wi-Fi</li>
                                    <li>Móvel Planejado</li>
                                    <li>Churrasqueira</li>
                                    <li>Wi-Fi</li>
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
                            <img src="img/henr.jpeg" alt="" class="img-fluid">
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
                                <form class="form-a">
                                    <div class="row">
                                        <div class="col-md-12 mb-1">
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-lg form-control-a"
                                                    id="inputName" placeholder="Nome *" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-1">
                                            <div class="form-group">
                                                <input type="email" class="form-control form-control-lg form-control-a"
                                                    id="inputEmail1" placeholder="Email *" required>
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
