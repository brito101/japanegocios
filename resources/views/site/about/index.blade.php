@extends('site.master.master')

@section('content')
    <!--/ Apresentação /-->
    <section class="intro-single">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-8">
                    <div class="title-single-box">
                        <h1 class="title-single">Um Pouco sobre a nossa tragetória</h1>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4">
                    <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Quem somos
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!--/ Fim da apresentação /-->
    <!--/ About Star /-->
    <section class="section-about">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="about-img-box">
                        <img src="img/slide-about-1.jpg" alt="" class="img-fluid">
                    </div>
                    <div class="sinse-box">
                        <h3 class="sinse-title">HenriqueNegócios
                            <span></span>
                            <br> Desde 2017
                        </h3>
                        <p>Vendas & Negócios</p>
                    </div>
                </div>
                <div class="col-md-12 section-t8">
                    <div class="row">
                        <div class="col-md-6 col-lg-5">
                            <img src="img/about-2.jpg" alt="" class="img-fluid">
                        </div>
                        <div class="col-lg-2  d-none d-lg-block">
                            <div class="title-vertical d-flex justify-content-start">
                                <span>Vendas e Locações de imovéis e afins</span>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-5 section-md-t3">
                            <div class="title-box-d">
                                <h3 class="title-d">Tudo que
                                    <span class="color-d">você</span> procura
                                    <br> em um só lugar.
                                </h3>
                            </div>
                            <p class="color-text-a">
                                Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vivamus magna justo, lacinia
                                eget
                                consectetur sed, convallis
                                at tellus. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum
                                ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit
                                neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.
                            </p>
                            <p class="color-text-a">
                                Sed porttitor lectus nibh. Vivamus magna justo, lacinia eget consectetur sed, convallis at
                                tellus.
                                Mauris blandit aliquet
                                elit, eget tincidunt nibh pulvinar a. Vivamus magna justo, lacinia eget consectetur sed,
                                convallis at tellus.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ fim quem somos /-->
@endsection
