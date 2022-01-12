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
  </style>
</head>

<body>
  @include('partial.header')
  @include('partial.banerManutencao')
  <div class="col-12">

    <div class="d-flex mt-3 ">
      <div onclick="manutencao()" class="col-sm-6 col-md-6 col-lg-6 col-xl-6 mb-3">
        <div class="d-flex justify-content-end">
          <img id="img-home" style="max-width: 250px; min-width: 150px;" class="imgHome " src="{{asset('images/botão_produtos.png')}}" alt="Armazém do Escritório">
        </div>
      </div>

      <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 mb-3">
        <a target="blank" href="https://api.whatsapp.com/send?phone=554733480291">
          <div class="d-flex justify-content-start">
            <img id="img-home" style="max-width: 250px; min-width: 100px;" class="imgHome " src="{{asset('images/botão_contrate.png')}}" alt="Armazém do Escritório">
          </div>
        </a>
      </div>
    </div>

  </div>

  <section class="fundoProdutos ">
    <div class="wrapper ">
      <div id="contrate"></div>

      <div id="manutencao" class="cont-categorias  pt-3">
        

        <div class="mb-4 ">
          <div class="manutencao ">
            <div onclick="openCloseModal('01')" class="verProdutos">
              <div class="image">
                <img id="img-home" class="imgHome" src="{{asset('images/FOTOS PRODUTOS/01.jpg')}}" alt="Armazém do Escritório">
              </div>
            </div>
          </div>
        </div>
        <div class="mb-4">
          <div class="manutencao">
            <div onclick="openCloseModal('02')" class="verProdutos">
              <div class="image">
                <img id="img-home" class="imgHome" src="{{asset('images/FOTOS PRODUTOS/02.jpg')}}" alt="Armazém do Escritório">
              </div>
            </div>
          </div>
        </div>
        <div class="mb-4">
          <div class="manutencao">
            <div onclick="openCloseModal('03')" class="verProdutos">
              <div class="image">
                <img id="img-home" class="imgHome" src="{{asset('images/FOTOS PRODUTOS/03.jpg')}}" alt="Armazém do Escritório">
              </div>
            </div>
          </div>
        </div>
        <div class="mb-4">
          <div class="manutencao">
            <div onclick="openCloseModal('04')" class="verProdutos">
              <div class="image">
                <img id="img-home" class="imgHome" src="{{asset('images/FOTOS PRODUTOS/04.jpg')}}" alt="Armazém do Escritório">
              </div>
            </div>
          </div>
        </div>
        <div class="mb-4">
          <div class="manutencao">
            <div onclick="openCloseModal('05')" class="verProdutos">
              <div class="image">
                <img id="img-home" class="imgHome" src="{{asset('images/FOTOS PRODUTOS/05.jpg')}}" alt="Armazém do Escritório">
              </div>
            </div>
          </div>
        </div>
        <div class="mb-4">
          <div class="manutencao">
            <div onclick="openCloseModal('06')" class="verProdutos">
              <div class="image">
                <img id="img-home" class="imgHome" src="{{asset('images/FOTOS PRODUTOS/06.jpg')}}" alt="Armazém do Escritório">
              </div>
            </div>
          </div>
        </div>
        <div class="mb-4">
          <div class="manutencao">
            <div onclick="openCloseModal('07')" class="verProdutos">
              <div class="image">
                <img id="img-home" class="imgHome" src="{{asset('images/FOTOS PRODUTOS/07.jpg')}}" alt="Armazém do Escritório">
              </div>
            </div>
          </div>
        </div>
        <div class="mb-4">
          <div class="manutencao">
            <div onclick="openCloseModal('08')" href="#" class="verProdutos">
              <div class="image">
                <img id="img-home" class="imgHome" src="{{asset('images/FOTOS PRODUTOS/08.jpg')}}" alt="Armazém do Escritório">
              </div>
            </div>
          </div>
        </div>
        <div class="mb-4">
          <div class="manutencao">
            <div onclick="openCloseModal('09')" class="verProdutos">
              <div class="image">
                <img id="img-home" class="imgHome" src="{{asset('images/FOTOS PRODUTOS/09.jpg')}}" alt="Armazém do Escritório">
              </div>
            </div>
          </div>
        </div>
        <div class="mb-4">
          <div class="manutencao">
            <div onclick="openCloseModal('10')" class="verProdutos">
              <div class="image">
                <img id="img-home" class="imgHome" src="{{asset('images/FOTOS PRODUTOS/10.jpg')}}" alt="Armazém do Escritório">
              </div>
            </div>
          </div>
        </div>
        <div class="mb-4">
          <div class="manutencao">
            <div onclick="openCloseModal('11')" class="verProdutos">
              <div class="image">
                <img id="img-home" class="imgHome" src="{{asset('images/FOTOS PRODUTOS/11.jpg')}}" alt="Armazém do Escritório">
              </div>
            </div>
          </div>
        </div>
        <div class="mb-4">
          <div class="manutencao">
            <div onclick="openCloseModal('12')" class="verProdutos">
              <div class="image">
                <img id="img-home" class="imgHome" src="{{asset('images/FOTOS PRODUTOS/12.jpg')}}" alt="Armazém do Escritório">
              </div>
            </div>
          </div>
        </div>
        <div class="mb-4">
          <div class="manutencao">
            <div onclick="openCloseModal('13')" class="verProdutos">
              <div class="image">
                <img id="img-home" class="imgHome" src="{{asset('images/FOTOS PRODUTOS/13.jpg')}}" alt="Armazém do Escritório">
              </div>
            </div>
          </div>
        </div>
        <div class="mb-4">
          <div class="manutencao">
            <div onclick="openCloseModal('14')" class="verProdutos">
              <div class="image">
                <img id="img-home" class="imgHome" src="{{asset('images/FOTOS PRODUTOS/14.jpg')}}" alt="Armazém do Escritório">
              </div>
            </div>
          </div>
        </div>
        <div class="mb-4">
          <div class="manutencao">
            <div onclick="openCloseModal('15')" class="verProdutos">
              <div class="image">
                <img id="img-home" class="imgHome" src="{{asset('images/FOTOS PRODUTOS/15.jpg')}}" alt="Armazém do Escritório">
              </div>
            </div>
          </div>
        </div>
        <div class="mb-4">
          <div class="manutencao">
            <div onclick="openCloseModal('16')" class="verProdutos">
              <div class="image">
                <img id="img-home" class="imgHome" src="{{asset('images/FOTOS PRODUTOS/16.jpg')}}" alt="Armazém do Escritório">
              </div>
            </div>
          </div>
        </div>
        <div class="mb-4">
          <div class="manutencao">
            <div onclick="openCloseModal('17')" class="verProdutos">
              <div class="image">
                <img id="img-home" class="imgHome" src="{{asset('images/FOTOS PRODUTOS/17.jpg')}}" alt="Armazém do Escritório">
              </div>
            </div>
          </div>
        </div>
        <div class="mb-4">
          <div class="manutencao">
            <div onclick="openCloseModal('18')" class="verProdutos">
              <div class="image">
                <img id="img-home" class="imgHome" src="{{asset('images/FOTOS PRODUTOS/18.jpg')}}" alt="Armazém do Escritório">
              </div>
            </div>
          </div>
        </div>
        <div class="mb-4">
          <div class="manutencao">
            <div onclick="openCloseModal('19')" class="verProdutos">
              <div class="image">
                <img id="img-home" class="imgHome" src="{{asset('images/FOTOS PRODUTOS/19.jpg')}}" alt="Armazém do Escritório">
              </div>
            </div>
          </div>
        </div>
        <div class="mb-4">
          <div class="manutencao">
            <div onclick="openCloseModal('20')" class="verProdutos">
              <div class="image">
                <img id="img-home" class="imgHome" src="{{asset('images/FOTOS PRODUTOS/20.jpg')}}" alt="Armazém do Escritório">
              </div>
            </div>
          </div>
        </div>
        <div class="mb-4">
          <div class="manutencao">
            <div onclick="openCloseModal('21')" class="verProdutos">
              <div class="image">
                <img id="img-home" class="imgHome" src="{{asset('images/FOTOS PRODUTOS/21.jpg')}}" alt="Armazém do Escritório">
              </div>
            </div>
          </div>
        </div>
        <div class="mb-4">
          <div class="manutencao">
            <div onclick="openCloseModal('22')" class="verProdutos">
              <div class="image">
                <img id="img-home" class="imgHome" src="{{asset('images/FOTOS PRODUTOS/22.jpg')}}" alt="Armazém do Escritório">
              </div>
              </a>
            </div>
          </div>
        </div>
        <div class="mb-4">
          <div class="manutencao">
            <div onclick="openCloseModal('23')" class="verProdutos">
              <div class="image">
                <img id="img-home" class="imgHome" src="{{asset('images/FOTOS PRODUTOS/23.jpg')}}" alt="Armazém do Escritório">
              </div>
            </div>
          </div>
        </div>
        <div class="mb-4">
          <div class="manutencao">
            <div onclick="openCloseModal('24')" class="verProdutos">
              <div class="image">
                <img id="img-home" class="imgHome" src="{{asset('images/FOTOS PRODUTOS/24.jpg')}}" alt="Armazém do Escritório">
              </div>
            </div>
          </div>
        </div>
        <div class="mb-4">
          <div class="manutencao">
            <div onclick="openCloseModal('25')" class="verProdutos">
              <div class="image">
                <img id="img-home" class="imgHome" src="{{asset('images/FOTOS PRODUTOS/25.jpg')}}" alt="Armazém do Escritório">
              </div>
            </div>
          </div>
        </div>
        <div class="mb-4">
          <div class="manutencao">
            <div onclick="openCloseModal('26')" class="verProdutos">
              <div class="image">
                <img id="img-home" class="imgHome" src="{{asset('images/FOTOS PRODUTOS/26.jpg')}}" alt="Armazém do Escritório">
              </div>
            </div>
          </div>
        </div>
        <div class="mb-4">
          <div class="manutencao">
            <div onclick="openCloseModal('27')" class="verProdutos">
              <div class="image">
                <img id="img-home" class="imgHome" src="{{asset('images/FOTOS PRODUTOS/27.jpg')}}" alt="Armazém do Escritório">
              </div>
            </div>
          </div>
        </div>
        <div class="mb-4">
          <div class="manutencao">
            <div onclick="openCloseModal('28')" class="verProdutos">
              <div class="image">
                <img id="img-home" class="imgHome" src="{{asset('images/FOTOS PRODUTOS/28.jpg')}}" alt="Armazém do Escritório">
              </div>
            </div>
          </div>
        </div>
        <div class="mb-4">
          <div class="manutencao">
            <div onclick="openCloseModal('29')" class="verProdutos">
              <div class="image">
                <img id="img-home" class="imgHome" src="{{asset('images/FOTOS PRODUTOS/29.jpg')}}" alt="Armazém do Escritório">
              </div>
            </div>
          </div>
        </div>
        <div class="mb-4">
          <div class="manutencao">
            <div onclick="openCloseModal('30')" class="verProdutos">
              <div class="image">
                <img id="img-home" class="imgHome" src="{{asset('images/FOTOS PRODUTOS/30.jpg')}}" alt="Armazém do Escritório">
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>


  </section>



  <div class="modal" tabindex="-1" id="modalManutencao">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Manutenção</h5>
          <button onclick="openCloseModal()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div id="img-manutencao"></div>
        </div>
        <div class="modal-footer d-flex">
          <div>
            <button onclick="openCloseModal()" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
          </div>
          <div id="btn-orcamento"></div>
        </div>
      </div>
    </div>
  </div>

  @include('partial.footer')
 
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    const openCloseModal = (src) => {
      if ($('#modalManutencao').hasClass('show')) {
        $('#modalManutencao').modal('hide');

      } else {
        $('#modalManutencao').modal('show');
        $("#img-manutencao").html(`<img id="img-home" class="imgHome" src="{{asset('images/FOTOS PRODUTOS/${src}.jpg')}}" alt="Armazém do Escritório">`)
        $("#btn-orcamento").html(`<button onclick="addOrcamento(${src})" type="button" class="btn btn-primary">Orçamento</button>`)
      }
    }

   
    const addOrcamento = (src) => {
      console.log("img", src)
      let budget = JSON.parse(window.localStorage.getItem("budget"));
      console.log(budget)

      if (budget) {

        let obj = {
          category: `Manutenção ${src}`,
          code: `Manutenção ${src}`,
          image: `${src}`,
        };
        budget.push(obj);

        let stringfy = JSON.stringify(budget);
        localStorage.setItem("budget", stringfy);

      } else {
        let newOrcamento = [{
          category: `Manutenção ${src}`,
          code: `Manutenção ${src}`,
          image: `${src}`,
        }];

        let stringfy = JSON.stringify(newOrcamento);
        localStorage.setItem("budget", stringfy);

      }
      $('#modalManutencao').modal('hide');
      Swal.fire({
        title: ' Adicionado!',
        text: `O produto foi adicionado com sucesso!
                Gerencie seus orçamentos
                no menu superior.`,
        icon: 'success',
        confirmButtonText: 'Fechar'
      })
    }

   
    const manutencao = () => {
      $("#contrate").html(``);
      $("#manutencao").removeClass("d-none")
    }
  </script>
</body>

</html>