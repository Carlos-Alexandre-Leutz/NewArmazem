<!doctype html>
<html lang="pt-BR">
<head>
    
    @php
        $site_name = config('app.name');
        $site_url = config('app.url');
        $title = "Armazém do Escritório :: Produtos em $category->name";
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
    <link rel="canonical" href="{{ $site_url  }}" data-prerender="keep">
    <link href="{{ asset('css/site.css') }}" rel="stylesheet">
    <link href="{{ asset('favicon.ico') }}" rel="shortcut icon">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />

</head>
<body>


  <!-- Produtos dentro de uma categoria -->
@include('partial.header')
@include('partial.banerHome')
<section class="products fundoProdutos">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p id="back-container">
                    <a class="btn-link" id="verCategorias" href="{{ url()->previous()  }}">
                        <i class="fas fa-arrow-left"></i>
                        @if($parentCategory)
                            {{ $parentCategory->name }}
                        @else
                            Voltar
                        @endif
                    </a>
                </p>
                <h2>{{ $category->name }}</h2>
                <p>{{ $category->description }}</p>
            </div>
        </div>
        <ul class="categories" style="display: none">
            @foreach($categories as $category)
                <li data-category="{{$category->code}}">{{$category->name}}</li>
            @endforeach
        </ul>
        <div class="row grid">
            @php
                $i = 1;
            @endphp
            @forelse($products as $product)
                <div class="col-sm-12 col-md-3 col-lg-3"
                     data-id="{{ $i }}">
                    <div class="product-image"
                         data-category="{{$product->category}}"
                         data-code="{{$product->code}}"
                         data-width="640"
                         data-height="480"
                         data-src="{{ $product->image }}"
                         data-gallery="products-{{$product->category}}-gallery">
                        <!-- <div class="product-code">{{$product->code}}</div> -->
                        <img src="{{asset('images/produtos/loading.gif')}}" width="100%" style="min-width: 255px;">
                    </div>
                </div>
            @empty
                <div class="col-sm-12">
                    <div class="alert alert-warning">
                        Não há produtos associados à esta categoria no momento.<br>
                        Pedimos a gentileza que verifique conosco o motivo!
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>

@include('partial.footer')
@include('partial.modal-orcamento')

<script type="text/javascript" src="{{ asset('js/site.js') }}"></script>
</body>
</html>
