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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
</head>

<body>

    @include('partial.header')
    @include('partial.banerHome')

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

    <section id="products" class="products wrapper ">

        <!-- <div class="">
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
        -->
        <!-- <ul class="" style="display: none">
            @foreach($categories as $category)
            <li data-category="{{$category->code}}">{{$category->name}}</li>
            @endforeach
        </ul> -->
        <div class="cont-nav-categorias">

            <a href="/categoria/Poltronas">
                <img src="{{asset('images/Icone Poltronas (4).png')}}" alt="Armazém do Escritório">
                <p>Poltronas</p>
            </a>
            <a href="/categoria/Corporativos">
                <img src="{{asset('images/Icone Corporativos.png')}}" alt="Armazém do Escritório">
                <p>Corporativo</p>
            </a>
            <a href="/categoria/Cadeiras">
                <img src="{{asset('images/Icone Cadeiras.png')}}" alt="Armazém do Escritório">
                <p>Cadeiras</p>
            </a>
            <a href="/categoria/Ambientes">
                <img src="{{asset('images/Icone Ambientes.png')}}" alt="Armazém do Escritório">
                <p>Ambientes</p>
            </a>
            <a href="/categoria/Decor">
                <img src="{{asset('images/Icone Decor.png')}}" alt="Armazém do Escritório">
                <p>Decor</p>
            </a>
            <a href="/categoria/aco">
                <img src="{{asset('images/Icone Linha aço.png')}}" alt="Armazém do Escritório">
                <p>Linha Aço</p>
            </a>
        </div>
    </section>
    <section class="fundoProdutos">
        <div class="wrapper">
            <div id="cont-categorias" class="cont-categorias">
                <div class="conteiner-risco mb-3"></div>
                @forelse($categories as $category)
                <div class="">
                    <figure class="categorias">
                        @if($hasCategory)
                        <a href="{{ url('/produtos/' . $category->code) }}" class="verProdutos">
                            <div class="image">
                                <img src="{{ asset('images/produtos/marked/category-' . $category->image) }}">
                            </div>
                        </a>
                        @else
                        <a href="{{ url('/categoria/' . $category->code) }}" class="verProdutos">
                            <div class="image">
                                <img src="{{ asset('images/produtos/marked/category-' . $category->image) }}">
                            </div>
                        </a>
                        @endif

                        <p>{{$category->name}}</p>
                        <!--alt="{{$category->name}}"-->

                    </figure>
                </div>

                .
                @empty
                <div class="alert alert-warning">
                    Não há linhas associadas à esta categoria no momento.<br>
                    Pedimos a gentileza que verifique conosco o motivo!
                </div>
                @endforelse

            </div>
        </div>

    </section>


    <div class="background-sobre">
        <section class="wrapper">
            <div class="cont-sobre">
                <div class="sobre-armasem">
                    <h1 id="targetEmpresa">O ARMAZÉM</h1>
                    <p>
                        A empresa surgiu a partir de uma oportunidade de negócio no ano de 2001 com a ideia inicial de apenas um showroom de fábrica com aproximadamente 200m², administrado pelo representante e atual gestor, sem comercialização direta.

                    </p>
                    <a href="{{ url('/empresa') }}">
                        <button type="button">
                            Continue lendo ...
                        </button>
                    </a>
                </div>
                <div class="cont-img-contato">
                    <img src="{{asset('images/oie_transparent.png')}}" alt="Armazém do Escritório">
                </div>
            </div>
        </section>
    </div>



    <div class="conteiner-risco margin-risco-sub"></div>

    <!-- <iframe class="instagranIframe" src="//lightwidget.com/widgets/4d0841f0c0b2599c8dd075ec223896ce.html" scrolling="no" allowtransparency="false" style="width:100%;border:0;overflow:hidden;"></iframe> -->

    <iframe src="//lightwidget.com/widgets/7533daa84a6b5739bd1ae982d962a18c.html" scrolling="no" allowtransparency="true" class="lightwidget-widget" style="width:100%;border:0;overflow:hidden;"></iframe>
    <div class="conteiner-risco margin-risco-inf"></div>
    <div class="laranja"></div>
    <section class="cont-manutecao">
        <div class="cont-manutecao-itens wrapper">
            <div>
                PROCURANDO MANUTENÇÃO?
            </div>
            <div>
                <a href="/manutencao">
                    <button>CONFIRA</button>
                </a>
                <div>
                    COMPLETA LINHA DE <br> PRODUTOS PRODUTOS PARA MANUTENÇÃO
                </div>
            </div>
        </div>
    </section>
    <div class="laranja"></div>

    @include('partial.contato')
    @include('partial.footer')
    <div id="#teste">
        @include('partial.modal-orcamento')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="{{ asset('js/site.js') }}"></script>
    <script src="https://cdn.lightwidget.com/widgets/lightwidget.js"></script>
    <script>
        jQuery(function() {
            $(document).on('click', '.carousel-item', function(e) {
                if ($(this).data('link')) {
                    window.location = $(this).data('link');
                }
            });
        })
        let url = window.location.pathname;
        if (url == "/") {
            $('#cont-categorias').addClass('d-none');
        } else {
            $('#cont-categorias').removeClass('d-none');
        }





        const scrol = () => {
            console.log("scrol")
            let urlID = document.location.href;
            let split = urlID.split("#")[1]
            if (split) {
                console.log("split")
                if (split == "contato") {
                    window.scrollTo(0, 1800)
                    $(".header-transparent").addClass("header-black");

                } else if (split == "produtos") {
                    window.scrollTo(0, 500)
                    $(".header-transparent").addClass("header-black");
                }
            }
        } 
        scrol();
    </script>
</body>

</html>