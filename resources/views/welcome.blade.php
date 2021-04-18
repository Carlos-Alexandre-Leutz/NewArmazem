<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    @php
    $site_name = config('app.name');
    $site_url = config('app.url');
    $title = "Armazém do Escritório :: Móveis para Escritório";
    $description = "A maior loja de móveis para escritório do Vale do Itajaí. Venha conhecer nossos produtos e ofertas!";
    @endphp
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    <meta itemprop="name" content="{{ $site_name }}">
    <meta itemprop="description" content="{{ $description }}">
    <meta property="og:url" content="{{ $site_url }}">
    <meta property="og:title" content="{{ $site_name }}">
    <meta property="og:type" content="website">
    <meta property="og:description" content="{{ $description }}">
    <meta property="og:image" content="{{ asset('images/armazem-do-escritorio.png') }}">
    <link rel="canonical" href="{{ $site_url }}" data-prerender="keep">
    <link href="{{ asset('css/site.css') }}" rel="stylesheet">
    <link href="{{ asset('favicon.ico') }}" rel="shortcut icon">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>

<body>

    @include('partial.header')

    <!-- <div class="wrapper">
        <div>
            <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    @for($i = 0; $i < $banners->count(); $i++)
                        <li data-target="#carouselIndicators" data-slide-to="{{ $i }}" class="{{ $i == 0 ?'active':'' }}"></li>
                        @endfor
                </ol>
                <div class="carousel-inner" role="listbox">
                    @php $i = 0; @endphp
                    @foreach($banners as $banner)
                    <div title="@if(strlen($banner->link)>0) Clique para visitar @endif" class="carousel-item {{ $i==0?'active':'' }}" style="background-image: url('{{ asset('banner/' . $banner->image) }}')" @if(strlen($banner->link)>0) data-link="{{$banner->link}} @endif">
                        <div class="carousel-caption d-none d-md-block">
                            <h2 class="display-4">{{ $banner->title }}</h2>
                            <p class="lead">{{ $banner->subtitle }}</p>
                        </div>
                    </div>
                    @php $i++; @endphp
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Anterior</span>
                </a>
                <a class="carousel-control-next" href="#carouselIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Próximo</span>
                </a>
            </div>
        </div>
    </div> -->

    <section class="products">

        <div class="">
            @if($hasCategory)
            <p id="back-container"><a class="" id="verCategorias" href="{{ url('/') }}"><i class="fas fa-arrow-left"></i> Categorias</a></p>
            <h2 class="linha">{{ $parentCategory->name }}</h2>
            <p>Confira abaixo as variações nesta linha de produtos!</p>
            @else
            <h2 class="linha">Linha de Produtos</h2>
            <p>Confira abaixo nossa linha de produtos e solicite um orçamento sem compromisso!</p>
            @endif
        </div>
        </div>
        <ul class="" style="display: none">
            @foreach($categories as $category)
            <li data-category="{{$category->code}}">{{$category->name}}</li>
            @endforeach
        </ul>
        <div class="">
            @forelse($categories as $category)
            <div class="">
                <figure class="">
                    <img src="{{ asset('images/produtos/marked/category-' . $category->image) }}" alt="{{$category->name}}">
                    <figcaption>
                        <h2>{{$category->name}}</h2>
                        <p>
                            {{$category->description}}
                            <br>
                            <br>
                            <strong>
                                <i class="fas fa-external-link-alt"></i>
                                @if($hasCategory)
                                Ver produtos
                                @else
                                Mais nesta categoria
                                @endif

                            </strong>
                        </p>
                        @if($hasCategory)
                        <a href="{{ url('/produtos/' . $category->code) }}" class="verProdutos">Ver produtos</a>
                        @else
                        <a href="{{ url('/categoria/' . $category->code) }}" class="verProdutos">Mais nesta categoria</a>
                        @endif
                    </figcaption>
                </figure>
            </div>
            @empty
            <div class="">
                <div class="alert alert-warning">
                    Não há linhas associadas à esta categoria no momento.<br>
                    Pedimos a gentileza que verifique conosco o motivo!
                </div>
            </div>
            @endforelse

    </section>
    <div class="cont-img-contato">

        <img src="{{asset('images/Imagem-Banner-Empresa-home.png')}}" alt="Armazém do Escritório">
    </div>
    <section class="wrapper">
        <div class="container-contato">

            <h1 id="targetEmpresa">Armazém do Escritório</h1>
            <p>O Armazém do Escritório é uma empresa familiar que, com mais de 18 anos
                no mercado, atua com vendas e manutenção de mobiliário para escritórios,
                componentes e artigos de decoração para ambientes de trabalho, ampla
                linha de móveis para escritórios desde a recepção até a decoração.

            </p>


            <button type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                Continue lendo ...
            </button>


        </div>
        
     
        <div class="collapse" id="collapseExample">
            <div class="card card-body">
                <p>
                    Nosso showroom com mais de 600 m², possui uma grande cartela de
                    marcas, modelos e cores entre cadeiras e conjuntos de ambientes completos
                    para apreciação e venda.
                    Contamos com um depósito de 350 m² para armazenagem de pedidos e
                    produtos para distribuição além de alguns produtos a pronta entrega,
                    facilitando ainda mais a montagem dos ambientes.
                    Somos uma empresa completa e sua necessidade está no nosso estoque!
                </p>

                <h1>A História</h1>
                <p>
                    A Constituição da empresa Comin Comércio de Móveis Ltda. (CNPJ 00.526.441/0001-21) veio a partir de uma oportunidade de negócio tendo em vista o administrador e representante com mais de 30 anos de experiência em vendas de móveis em geral. A idéia inicial era de apenas um Showroom sem comercialização direta mas a necessidade mudou os rumos e a definição da empresa.
                    Na época policiais 200 m² trabalhamos com pena com apenas uma linha de móveis e cadeiras que atendia perfeitamente para o momento.
                    Hoje a empresa conta com aproximadamente 1000 m², sendo 650 m² de showroom com uma ampla linha de móveis para escritório que engloba recepção até os detalhes mais delicados da decoração e um depósito de 350 m² com espaço suficiente para colocar pedidos e produtos a serem distribuídos para o consumidor.
                </p>

                <h1>Os Valores</h1>
                <p>
                    A missão da empresa Comin Comércio de móveis Ltda. consiste em atuar de maneira correta no mercado, de forma justa, visando a satisfação dos clientes em relação os produtos e serviços de qualidade oferecidos.
                    A visão é ter uma empresa reconhecida no ramo de escritório e decoração para escritórios em todo estado de Santa Catarina.
                    Destaca-se pelos valores éticos e morais mantendo o companheirismo, o espírito de equipe, respeito, honestidade e clareza nas atitudes.
                </p>

                <h1>A Marca</h1>
                <p>
                    O nome surgiu da idéia de que em um armazém é possível encontrar uma variedade muito grande de produtos e no Armazém do Escritório, de igual forma, é possível encontrar uma linha bem variado de móveis corporativos, desde linhas convencionais até linhas mais diferenciadas. Pode-se montar uma bela recepção com cadeiras decorativas e decorações variadas, salas de reuniões equipadas e ambiente de trabalho que sigam as normas de ergonomia sem perder a beleza.
                </p>

            </div>
        </div>

    </section>
    <div class="conteiner-risco"></div>
<!-- LightWidget WIDGET --><script src="https://cdn.lightwidget.com/widgets/lightwidget.js"></script><iframe src="//lightwidget.com/widgets/57357dc81ce75c5683a81154784b026c.html" scrolling="no" allowtransparency="true" class="lightwidget-widget" style="width:100%;border:0;overflow:hidden;"></iframe>
    @include('partial.footer')
    @include('partial.modal-orcamento')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ asset('js/site.js') }}"></script>
    <script>
        jQuery(function() {
            $(document).on('click', '.carousel-item', function(e) {
                if ($(this).data('link')) {
                    window.location = $(this).data('link');
                }
            });
        })
    </script>
</body>

</html>