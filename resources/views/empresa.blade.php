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
  <style>
    .colorText {
      color: #353534;
      font-weight: 500;
    }

    laranja {
      color: #e5a84a;
    }

    .container-cabecalho-empresa {
      background-color: #f6f6f6;
      width: 100%;
      padding: 15px 0px 15px 0px;
    }

    .font-weight-100 {
      font-weight: 100;
    }

    .font-weight-200 {
      font-weight: 200;
    }

    .font-weight-300 {
      font-weight: 300;
    }

    .font-weight-400 {
      font-weight: 400;
    }

    .font-weight-700 {
      font-weight: 700;
    }

    .line-height {
      letter-spacing: 3px;
      line-height: 1.0;
    }
  </style>
</head>

<body>
  @include('partial.header')
  @include('partial.banerEmpresa')
  <div>

  </div>
  <div class="container-cabecalho-empresa">

    <div class="wrapper">
      <p class="fs-2 text font-weight-700">

        Desde 2001, <br>
        <laranja>
          Qualidade não tem preço!
        </laranja>
      </p>

    </div>
  </div>
  <div class="conteiner-risco"></div>
  <div class="wrapper mt-3 mb-3">
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="form-group">
          <p class="fs-2 colorText">
            O Armazém
          </p>

        </div>
      </div>
      <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
        <div class="form-group">
          <p class="text-justify colorText">
            <!-- A empresa surgiu a partir de uma oportunidade de negócio no ano de 2001 com a ideia inicial de apenas um showroom de fábrica com aproximadamente 200m², administrado pelo representante e atual gestor, sem comercialização direta. -->
            A empresa surgiu à partir de uma oportunidade de negócio no ano de 2001. A ideia inicial era de apenas um showroom de fábrica com aproximadamente 200m², administrado pelo representante e atual gestor, sem comercialização direta.
            <br>
            Um ambiente diferenciado onde os clientes poderiam conhecer 
          </p>
        </div>
      </div>
      <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
        <div class="form-group">
          <p class="text-justify colorText">
            <!-- Um espaço onde lojistas poderiam conhecer os móveis e cadeiras a serem revendidos pelas lojas, mas o negócio tomou outros rumos quando se aliou a experiência do
            gestor em mais de 30 anos de representação com a necessidade do mercado. -->
            os móveis e cadeiras a serem revendidos para consumidor final e para empresas.
            <br>
            Aliado à experiência do gestor em mais de 30 anos de representação em móveis e a necessidade de atender o mercado como um todo, foram necessárias mudanças.
          </p>
        </div>
      </div>
    </div>
  </div>
  <img id="img-home" class="imgHome" src="{{asset('images/img_empresa_2.png')}}" alt="Armazém do Escritório">
  <div class="wrapper mt-3 mb-3">
    <div class="row">
      <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
        <div class="form-group">
          <p class="text-justify colorText">
            <!-- Os anos se passaram e as mudanças foram necessárias. Com o avanço da cidade, foi preciso ampliar o portfólio de produtos, surgindo o Armazém do Escritório em meados de 2011. Hoje a empresa conta com aproximadamente 1.000m² de showroom com depósito próprio, oferecendo linhas completas de móveis para escritório desde a recepção até produtos com certificação nos padrões técnicos de ergonomia. -->
            Com a evolução da cidade e do mercado moveleiro, foi preciso ampliar o portfólio de produtos e expandir a loja. Hoje a empresa conta com aproximadamente 1.000m² de showroom com depósito próprio, oferecendo linhas completas de móveis para escritório, móveis corporativos, planejados e sob medida. 

          </p>
        </div>
      </div>
      <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
        <div class="form-group">
          <span class="colorText"> 

            Desde a linha decorativa até produtos com certificação nos padrões técnicos de ergonomia.
          </span>
          <p class="fs-2 line-height">

            <laranja>
              <span class="font-weight-100">

                Prezamos
              </span>
              <br>
              <span class="font-weight-700 ">
              pelo
                <!-- <br> -->
                conforto e <br>
                bem-estar
              </span>
            </laranja>
          </p>

        </div>
      </div>
    </div>
  </div>

  <img id="img-home" class="imgHome" src="{{asset('images/img_empresa_3.png')}}" alt="Armazém do Escritório">
  <div class="wrapper mt-3 mb-3">
    <div class="row">

      <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
        <div class="form-group">
          <p class="text-justify colorText">
            Somos a maior loja de Itajaí e uma das maiores lojas de móveis para escritório do estado de Santa Catarina. <br>
            <!-- Além de produtos com qualidade e procedência, contamos com serviços de manutenção para cadeiras e móveis em geral, oferecemos produtos com exclusividade.
            Atuando em todo território catarinense com vendas, em 2020 abrimos a primeira filial, na cidade de Balneário Camboriú, uma loja versátil para melhor atender os clientes da região. -->


            Além de produtos com qualidade e procedência, contamos com serviços de manutenção para cadeiras e móveis em geral.
            Oferecemos produtos com exclusividade, moderno e garantia assegurada.
            <br>
            Atuando em todo território catarinense e nacional com vendas direta, em 2020 abrimos a primeira filial na cidade de Balneário Camboriú, uma loja versátil para melhor atender os clientes da região.

          </p>
        </div>
      </div>
      <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
        <div class="form-group">
          <p class="text-justify colorText">
            <!-- Um espaço onde lojistas poderiam conhecer os móveis e cadeiras a serem revendidos pelas lojas, mas o negócio tomou outros rumos quando se aliou a experiência do

            gestor em mais de 30 anos de representação com a necessidade do mercado. -->

            São 20 anos de história e tradição, seguindo a missão de entregar uma experiência única ao consumidor final, com os melhores serviços e produtos do mercado.



          </p>
          <p class="fs-2 line-height">

            <laranja>
              <span class="font-weight-100">

                De Itajaí para
              </span>
              <br>
              <span class="font-weight-700">

                todo<br>
                Brasil.
              </span>
            </laranja>
          </p>
        </div>
      </div>
    </div>
  </div>
  @include('partial.footer')
  </div>
</body>

</html>