<header>
    <div class="header-transparent">
        <div class="soNoMobile">
            <div class="barraFechada" id="icone">
                <div class="menu">
                    <span class="hamburguer"></span>
                </div>
            </div>

            <div class="barra ">
                <section>
                    <a href="{{ url('/') }}" class="linkNavMob" title="Home">
                        <div> Home</div>
                    </a>
                    <a href="{{ url('/empresa') }}" class="linkNavMob" title="Empresa">
                        <div>Empresa</div>
                    </a>

                    <a class="linkNavMob text-light" onclick="scrolHeaderMoble('contato')" title="Contato">
                        <div style="cursor: pointer;">Contato</div>
                    </a>
                    <a href="{{ route('cart.budgets') }}" class="linkNavMob" title="Orçamentos">
                        <div style="background-color: #e5a74abe;">
                            Solicite um Orçamento
                        </div>
                    
                    </a>


                </section>


            </div>


        </div>
        <div class="wrapper">
            <div class="header">

                <div class="cont-img-logo">
                    <a href="/" title="Página inicial Armazém do Escritório">
                        <figure>
                            <img src="{{asset('images/logo.png')}}" alt="Armazém do Escritório">
                        </figure>
                    </a>
                </div>
                <!-- @include('partial.menus') -->
                <div class="products-line-container soNoDesck">
                    <a href="{{ url('/') }}" class="" title="Home">Home</a>
                    <a href="{{ url('/empresa') }}" class="" title="Empresa">Empresa</a>
                    <span onclick="scrolHeader('produtos')" style="cursor: pointer;" class="text-light" title="Produtos">Produtos</span>
                    <span onclick="scrolHeader('contato')" style="cursor: pointer;" class=" text-light" title="Contato">Contato</span>
                    <!-- <a onclick="window.scrollTo(0, 1800);" title="Orçamentos">
                        <div class=" menu-orcamento"> Solicite um Orçamento</div>
                    </a> -->
                    <a href="{{ route('cart.budgets') }}" title="Orçamentos">
                        <div id="voceOrcando" class="orcando d-flex justify-content-end d-none">
                            Você está orçando...
                        </div>
                        <button type="button" class="btn position-relative">
                            <div class=" menu-orcamento">
                                <div class="containerImg">
                                    <img src="{{asset('images/icone_botão_carrinho.png')}}" alt="Armazém do Escritório">
                                </div>
                                <p>
                                    Solicite um orçamento

                                </p>
                                <span id="quantidade-orcamentos" class="d-none position-absolute top-0 start-100 translate-middle badge rounded-pill quantidade-orcamentos">
                                    0
                                </span>
                            </div>
                        </button>
                    </a>
                    {{-- <a href="{{ route('cart.budgets') }}" class="d-block d-md-inline menu-link cart" title="Orçamento">--}}
                    {{-- <i class="fas fa-shopping-cart"></i> <span class="badge rounded-circle">1</span> <span class="sr-only">Carrinho</span>--}}
                    {{-- </a>--}}



                </div>
            </div>
        </div>
    </div>


</header>
<script>
    $(function() {
        $(window).on("scroll", function() {
            if ($(window).scrollTop() > 100) {
                $(".header-transparent").addClass("header-black");
            } else {
                $(".header-transparent").removeClass("header-black");
            }
        });
    });



    $('#icone').click(function() {
        if ($('.barra').hasClass('trasformarBarra')) {
            $('.barra').removeClass('trasformarBarra')
            $('.hamburguer').removeClass('hamburguer-mover')
        } else {
            $('.barra').addClass('trasformarBarra');
            $('.hamburguer').addClass('hamburguer-mover');
        }
    })
    $('.linkNavMob').click(function() {
        $('.barra').removeClass('trasformarBarra')
        $('.hamburguer').removeClass('hamburguer-mover')
    })
    const orcamentosContados = () => {
        let localStorege = JSON.parse(window.localStorage.getItem("budget"));
        console.log(localStorege)
        if (localStorege) {
            console.log(localStorege.length)


            if (localStorege.length >= 1) {
                document.getElementById("voceOrcando").classList.remove("d-none")
                document.getElementById("quantidade-orcamentos").classList.remove("d-none")

                let quantidadeOrcamentos = document.getElementById("quantidade-orcamentos");
                quantidadeOrcamentos.innerHTML = localStorege.length;

            } else {
                document.getElementById("voceOrcando").classList.add("d-none")
                document.getElementById("quantidade-orcamentos").classList.add("d-none")

            }
        }
    };
    orcamentosContados()
    setInterval(function() {
        orcamentosContados();
    }, 3000);

    const scrolHeader = (path) => {
        let url = window.location.pathname;
        if (url == "/") {
            if (path = "contato") {
                window.scrollTo(0, 1800)
            }
            if (path = "produtos") {
                window.scrollTo(0, 500)
            }
        } else {
            if (path = "contato") {
                window.location.href = "/#contato"
            }
            if (path = "produtos") {
                window.location.href = "/#produtos"
            }

        }
    }
    const scrolHeaderMoble = (path) => {
        let url = window.location.pathname;
        if (url == "/") {
            if (path = "contato") {
                window.scrollTo(0, 1000)
                console.log("contatoasd")
            }

        } else {
            if (path = "contato") {
                window.location.href = "/#contato"
            }

        }
    }
</script>
<style>
    .orcando {
        font-size: 12px;
        margin-bottom: 10px;
        width: 80%;
        font-weight: 500;
        margin-top: -32px;
    }

    .quantidade-orcamentos {
        background-color: #fff;
        color: #e5a84a;
        border: solid 1px #e5a84a;
        margin-top: -15px;
        margin-left: -30px;
        font-size: 15px;
    }
</style>