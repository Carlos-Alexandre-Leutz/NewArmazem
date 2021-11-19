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
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />

</head>
<body>
<!-- pagina de descrição de produto saparadamente-->
@include('partial.header')
 @include('partial.banerHome')

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
                <div class="col-1 p-3 mr-1"></div>
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

@include('partial.modal-orcamento')
@include('partial.contato')
@include('partial.footer')

<script type="text/javascript" src="{{ asset('js/site.js') }}"></script>
</body>
</html>
