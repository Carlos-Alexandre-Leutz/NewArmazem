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
                    <a href="{{ url('/') }}" class="linkNavMob" title="Home"><div> Home</div></a>
                    <a href="{{ url('/') }}" class="linkNavMob" id="verEmpresa" title="Empresa"><div>Empresa</div></a>
                    <a href="{{ url('/') }}" class="linkNavMob" title="Produtos"><div>Produtos</div></a>
                    <a href="{{ url('/') }}" class="linkNavMob" title="Contato"><div>Contato</div></a>
                    <a href="{{ route('cart.budgets') }}" class="linkNavMob" title="Orçamentos">
                        <div class=" menu-orcamento"> Solicite um Orçamento</div>
                    </a>
                    {{-- <a href="{{ route('cart.budgets') }}" class="d-block d-md-inline menu-link cart" title="Orçamento">--}}
                    {{-- <i class="fas fa-shopping-cart"></i> <span class="badge rounded-circle">1</span> <span class="sr-only"><div>Carrinho</div></span>--}}
                    {{-- </a>--}}
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
                    <a href="{{ url('/') }}" class="" id="verEmpresa" title="Empresa">Empresa</a>
                    <a href="{{ url('/') }}" class="" title="Produtos">Produtos</a>
                    <a href="{{ url('/') }}" class="" title="Contato">Contato</a>
                    <!-- <a onclick="window.scrollTo(0, 1800);" title="Orçamentos">
                        <div class=" menu-orcamento"> Solicite um Orçamento</div>
                    </a> -->
                    <a href="{{ route('cart.budgets') }}" title="Orçamentos">
                        <div class=" menu-orcamento"> Solicite um Orçamento</div>
                    </a> 
                     {{-- <a href="{{ route('cart.budgets') }}"  class="d-block d-md-inline menu-link cart" title="Orçamento">--}}
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
</script>