<!doctype html>
<html lang="pt-BR">
<head>
  @php
    $site_name = config('app.name');
    $site_url = config('app.url');
    $title = "Armazém do Escritório :: Produto $product->code em $category->name";
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
</head>
<body>

@include('partial.header')
<section class="products">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <p id="back-container"><a class="btn-link" id="verCategorias" href="{{ url('/produtos/' . $product->category) }}"><i class="fas fa-arrow-left"></i> {{ $category->name }}</a></p>
      </div>
    </div>
    <ul class="categories" style="display: none">
      @foreach($categories as $category)
        <li data-category="{{$category->code}}">{{$category->name}}</li>
      @endforeach
    </ul>
    <div class="row">
      <div class="col-md-7">
        <h2>Código: {{ $product->code }}</h2>
        <div class="product-box">
          <img src="{{ asset('images/produtos/marked/' . $product->image) }}" alt="" style="max-height: 480px; max-width: 100%">
        </div>
      </div>
      <div class="col-sm">
        <div class="product-description">
          <h3>Descrição do Produto</h3>

          @php
            $colors = json_decode($product->colors);
          @endphp
          @if(count($colors) > 0)
            <div class="d-block">Disponível nas cores:</div>
            <div class="row p-3">
              @foreach($colors as $color)
                <div class="col-1 p-3 mr-1" style="background-color: {{ $color }}"></div>
              @endforeach
            </div>
          @endif

          @if(empty($product->description))
            <p>Não perca tempo e solicite orçamento agora mesmo.</p>
          @endif
          <p>{{ $product->description }}</p>

          <button
            title="Solicite um orçamento agora mesmo!"
            data-code="{{ $product->code }}"
            data-image="{{ $product->image }}"
            data-category="{{ $product->category }}"
            type="button"
            class="btn add-to-budget">
            <i class="fas fa-dollar-sign"></i> Orçamento
          </button>
        </div>
      </div>
    </div>
  </div>
</section>

@include('partial.footer')
@include('partial.modal-orcamento')

<script type="text/javascript" src="{{ asset('js/site.js') }}"></script>
</body>
</html>
