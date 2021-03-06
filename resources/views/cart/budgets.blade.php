<!doctype html>
<html lang="pt-BR">

<head>
  @php
  $site_name = config('app.name');
  $site_url = config('app.url');
  $title = "Armazém do Escritório :: Seus Orçamentos";
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

  @include('partial.header')
  @include('partial.banerOrcamento')
  <ul class="categories d-none">
    @foreach($categories as $category)
    <li data-category="{{$category->code}}">{{$category->name}}</li>
    @endforeach
  </ul>
  <section class="products">
    <div class="container">
      <div class="row">

        <div class="col-12">
          <p id="back-container">
            @if(url()->current() !== url()->previous())
            <a class="btn-link" href="{{ url()->previous() }}" id="backButton"><i class="fas fa-arrow-left"></i> Voltar</a>
            @else
            <a class="btn-link" href="{{ route('home') }}" id="backButton"><i class="fas fa-arrow-left"></i> Home</a>
            @endif
          </p>

          @include('partial.contato')
          <!-- 
          <div id="budget-products" class="d-none">
            <div>
              <p class="tit">QUER MONTAR SEU <br> ESCRITORIO?<br>
                <span class="label">
                  VAMOS CONVERSAR!
                </span>
              </p>
            </div>
            <div>
              <form action="#">
                <div class="row">
                  <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 ">
                    <spam class="">
                      <input type="text" class="input-form" id="budgetName" placeholder="  Nome Completo">
                    </spam>
                    <span><input type="text" class="input-form" id="budgetEmail" placeholder="  Email"></span>
                    <span><input type="text" class="input-form" id="budgetPhone" placeholder="  Telefone"></span>
                  </div>
                  <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 ">

                    <span><textarea type="text" class="input-form" id="obcervacao" placeholder="  Observação"   style="height: 145px;"></textarea></span>
                  </div>
                </div>



                <div class="cont-btn-enviar">
                  <button type="button" id="sendBudget">
                    <i class="fas fa-envelope"></i> Enviar!
                  </button>
                </div>
              </form>
            </div>
          </div> -->
          <table class="table">
            <tbody id="budgetTable">
              <tr>
                <td><i class="fas fa-sync fa-spin"></i> Analisando seu carrinho...</td>
              </tr>
            </tbody>
          </table>

        </div>
      </div>
    </div>
  </section>

  @include('partial.modal-orcamento')
  @include('partial.footer')

  <script type="text/javascript" src="{{ asset('js/site.js') }}"></script>

</body>

</html>