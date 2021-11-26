<footer>

  <div class="footer">
    <div class="wrapper">
      <img src="{{asset('images/Logo Rodapé.png')}}" alt="Armazém do Escritório">
    </div>
    <div class="conteiner-risco-footer"></div>
    <section class="wrapper cont-footer-button">
      <div>
        <a target="blank" href="https://api.whatsapp.com/send?phone=554733480291">Fale Conosco</a><br>
        <a href="{{ url('/empresa') }}">Sobre o Armazém</a><br>
        <a target="blank" href="https://api.whatsapp.com/send?phone=55554733480291&text=Ol%C3%A1%20tenho%20interesse%20em%20trabalhar%20com%20voc%C3%AAs%20segue%20abaixo%20meu%20curr%C3%ADculo.">Trabalhe Conosco</a>

      </div>
      <div>
        <a href="https://goo.gl/maps/r9Q2BZQaMVA2" target="_blank" title="Clique para ver no Google Maps">
          <i class="fas fa-map-marker-alt"></i>
          Itajaí, SC <br>
          R. Samuel Heusi, 73 Centro <br>
          <!-- <i class="fab fa-whatsapp"></i> -->
        </a>
        <a href="tel:+4733480291">
          <i class="fas fa-phone-alt"></i>
          (47) 3348-0291
        </a>
      </div>
      <div>
        <a href="https://goo.gl/maps/ixTD2doat6bg5a4fA" target="_blank" title="Clique para ver no Google Maps">
          <i class="fas fa-map-marker-alt"></i>
          Balneário Camboriú, SC <br>
          R. Portugal 31, Bairo das Nações <br>
          <!-- <i class="fab fa-whatsapp"></i> -->
        </a>
        <a href="tel:+4733671487">

          <i class="fas fa-phone-alt"></i>
          (47) 3367-1487
        </a>

      </div>
      <div>
        <div class="contato-email">
          <a href="mailto:contato@armazemdoescritorio.com.br" title="Clique para enviar email diretamente">contato@armazemdoescritorio.com.br</a>
        </div>
        <div class="cont-i-redes">
          <a href="https://www.instagram.com/armazemdoescritorio/" target="_blank" class="social instagram" title="Veja nossas fotos no Instagram">
            <i class="fab fa-instagram"></i>
          </a>
          <a href="https://www.facebook.com/armazemdoescritorioitajai?fref=ts" target="_blank" class="social facebook" title="Visite nossa página no Facebook">
            <i class="fab fa-facebook-f"></i>
          </a>
        </div>

      </div>
    </section>
  


    <!--   
    <p>Armazém do Escritório é marca registrada &trade; Copyright 2005
      - {{ date('Y') }}</p> -->



  </div>

</footer>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  const openCloseModalTrabalhe = () => {
    console.log("openCloseModalTrabalhe")


    $('#modaltrabalhe').modal('show');

  }
  const closeTrabalhe = () => {


    $('#modaltrabalhe').modal('hide');



  }
</script>