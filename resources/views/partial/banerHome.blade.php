<img id="img-home" class="imgHome" src="{{asset('images/Banner Home (1).png')}}" alt="Armazém do Escritório">
<img id="img-categorias" class="imgHome" src="{{asset('images/banner_v4.jpg')}}" alt="Armazém do Escritório">


<script>
        let urlImgBaners = window.location.pathname;       
        if (urlImgBaners == "/") {
            $('#img-home').removeClass('d-none');
            $('#img-categorias').addClass('d-none');
           
        } else {
            $('#img-categorias').removeClass('d-none');
            $('#img-home').addClass('d-none');
           

        }
</script>