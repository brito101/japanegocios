<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title>Henrique Negócios</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicons -->
    <link href="img/favicon.png" rel="icon">
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

    <!--  Arquivo Bootstrap CSS File -->
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!--  Arquivops Libraries CSS Files -->
    <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Aqruivo Principal do CSS -->
    <link href="css/style.css" rel="stylesheet">

</head>

<body>
    <div class="click-closed"></div>
    <!--/ Formulário de pesquisa /-->
    <div class="box-collapse">
        <div class="title-box-d">
            <h3 class="title-d">Buscar imóvel</h3>
            <!-- AQUI COLOCAR PRA PESQUISAR OS IMOVEIS  DE ACORDO COM OS DISPONIVEIS NO BANCO DE DADOS -->
        </div>
        <span class="close-box-collapse right-boxed ion-ios-close"></span>
        <div class="box-collapse-wrap form">
            <form class="form-a">
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <div class="form-group">
                            <label for="Type">Palavra Chave</label>
                            <input type="text" class="form-control form-control-lg form-control-a"
                                placeholder="Palavra Chave">
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <div class="form-group">
                            <label for="Type">Tipo de imóvel</label>
                            <select class="form-control form-control-lg form-control-a" id="Type">
                                <option>Todos os tipos</option>
                                <!-- COLOCAR OS TIPOS DE IMOVEIS AUTOMATICAMENTE DE ACORDO COM O TIPO QUE FOR CADASTRADO PELO ADMINISTRADOR NO PAINEL -->
                                <option>Aluguel</option>
                                <option>Venda</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <div class="form-group">
                            <label for="city">Cidade</label>
                            <!-- COLOCAR AS CIDADES AUTOMATICAMENTE DE ACORDO COM O TIPO QUE FOR CADASTRADO PELO ADMINISTRADOR NO PAINEL -->
                            <select class="form-control form-control-lg form-control-a" id="city">
                                <option>Todas as Cidades</option>
                                <option>Santo André</option>
                                <option>São Bernado</option>
                                <option>São Caetano</option>
                                <option>Mauá</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <div class="form-group">
                            <label for="bedrooms">Quartos</label>
                            <!-- COLOCAR A QUANTIDADE DE QUARTOS AUTOMATICAMENTE DE ACORDO COM O QUE FOR CADASTRADO PELO ADMINISTRADOR NO PAINEL -->
                            <select class="form-control form-control-lg form-control-a" id="bedrooms">
                                <option>Qualquer</option>
                                <option>01</option>
                                <option>02</option>
                                <option>03</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <div class="form-group">
                            <label for="garages">Vagas de Garagem</label>
                            <!-- COLOCAR A QUANTIDADE DE VAGAS AUTOMATICAMENTE DE ACORDO COM O QUE FOR CADASTRADO PELO ADMINISTRADOR NO PAINEL -->
                            <select class="form-control form-control-lg form-control-a" id="garages">
                                <option>Qualquer</option>
                                <option>01</option>
                                <option>02</option>
                                <option>03</option>
                                <option>04</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <div class="form-group">
                            <label for="bathrooms">Banheiros</label>
                            <!-- COLOCAR A QUANTIDADE DE BANHEIROS AUTOMATICAMENTE DE ACORDO COM O QUE FOR CADASTRADO PELO ADMINISTRADOR NO PAINEL -->
                            <select class="form-control form-control-lg form-control-a" id="bathrooms">
                                <option>Qualquer</option>
                                <option>01</option>
                                <option>02</option>
                                <option>03</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <div class="form-group">
                            <label for="price"> Preço</label>
                            <!-- COLOCAR OS PREÇOS ENTRE MINIMO E MAXIMO AUTOMATICAMENTE DE ACORDO COM O QUE FOR CADASTRADO PELO ADMINISTRADOR NO PAINEL -->
                            <select class="form-control form-control-lg form-control-a" id="price">
                                <option>Qualquer</option>
                                <option>R$50,000</option>
                                <option>R$100,000</option>
                                <option>R$150,000</option>
                                <option>R$200,000</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-b">Buscar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--/ Fim da barra de pesquisa /-->

    <!--/ Nav  /-->
    <nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
        <div class="container">
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
                aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <a class="navbar-brand text-brand" href="{{ route('home') }}"> <img src="img/japa.png" alt=""
                    width="50px">
                Henrique<span class="color-b">Negócios</span></a>
            <button type="button" class="btn btn-link nav-search navbar-toggle-box-collapse d-md-none"
                data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-expanded="false">
                <span class="fa fa-search" aria-hidden="true"></span>
            </button>
            <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">Quem Somos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('properties') }}">Imóveis</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Produtos
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('properties') }}">Imóveis</a>
                            <a class="dropdown-item" href="blog-single.html">Carros</a>
                            <a class="dropdown-item" href="agents-grid.html">Equipe</a>
                            <a class="dropdown-item" href="agent-single.html">Outros Produtos</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}">Contato</a>
                    </li>
                </ul>
            </div>
            <button type="button" class="btn btn-b-n navbar-toggle-box-collapse d-none d-md-block"
                data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-expanded="false">
                <span class="fa fa-search" aria-hidden="true"></span>
            </button>
        </div>
    </nav>
    <!--/ Fim Nav  /-->

    @yield('content')

    <!--/ footer /-->
    <section class="section-footer">
        <div class="container">
            <div class="row" style="display:flex; justify-content:space-between;">
                <div class="col-sm-12 col-md-4">
                    <div class="widget-a">
                        <div class="w-header-a">
                            <h3 class="w-title-a text-brand">Henrique Negócios</h3>
                        </div>
                        <div class="w-body-a">
                            <p class="w-text-a color-text-a">
                                Há mais de 11 anos no mercado, trazendo sempre os melhores preços, qualidade e
                                responsabilidade em nossos produtos.
                            </p>
                        </div>
                        <div class="w-footer-a">
                            <ul class="list-unstyled">
                                <li class="color-a">
                                    <span class="color-text-a">Whatsapp .</span> +55 1100000 - 0000
                                </li>
                                <li class="color-a">
                                    <span class="color-text-a">Email .</span> email@gmail.com
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 section-md-t3">
                    <div class="widget-a">
                        <div class="w-header-a">
                            <h3 class="w-title-a text-brand">Links Úteis</h3>
                        </div>
                        <div class="w-body-a">
                            <div class="w-body-a">
                                <ul class="list-unstyled">
                                    <li class="item-list-a">
                                        <i class="fa fa-angle-right"></i> <a
                                            href="{{ route('properties') }}">Imóveis</a>
                                    </li>
                                    <li class="item-list-a">
                                        <i class="fa fa-angle-right"></i> <a href="#">Carros</a>
                                    </li>
                                    <li class="item-list-a">
                                        <i class="fa fa-angle-right"></i> <a
                                            href="{{ route('admin.home') }}">Login</a>
                                    </li>
                                    <li class="item-list-a">
                                        <i class="fa fa-angle-right"></i> <a href="#">Corretores</a>
                                    </li>
                                    <li class="item-list-a">
                                        <i class="fa fa-angle-right"></i> <a href="#">Outros Produtos</a>
                                    </li>
                                    <li class="item-list-a">
                                        <i class="fa fa-angle-right"></i> <a href="#">Politica de privacidade</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav class="nav-footer">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a href="#">Início</a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#">Quem somos</a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#">Imóveis</a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#">Blog</a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#">Contato</a>
                            </li>
                        </ul>
                    </nav>
                    <div class="socials-a">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a href="#">
                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#">
                                    <i class="fa fa-twitter" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#">
                                    <i class="fa fa-instagram" aria-hidden="true"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="copyright-footer">
                        <p class="copyright color-text-a">
                            &copy; Copyright
                            <span class="color-a">Henrique Negócios</span> Todos os direitos reservados.
                        </p>
                    </div>
                    <div class="credits">
                        Designed por <a href="#">Gilberto Dias</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--/ fim do Footer  /-->

    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    <div id="preloader"></div>

    <!-- JavaScript Libraries -->
    <script src="lib/jquery/jquery.min.js"></script>
    <script src="lib/jquery/jquery-migrate.min.js"></script>
    <script src="lib/popper/popper.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/scrollreveal/scrollreveal.min.js"></script>
    <!-- Contact Form JavaScript File -->
    <script src="contactform/contactform.js"></script>

    <!-- Template Main Javascript File -->
    <script src="js/main.js"></script>

</body>

</html>
