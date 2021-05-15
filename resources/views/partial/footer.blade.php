<footer>
  <div class="wrapper">
    <div class="row">
      <div class="col-md-6">
        <p class="tit">QUER MONTAR SEU <br> ESCRITORIO?<br>
          <span class="label">
            VAMOS CONVERSAR!
          </span>
        </p>

      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <form action="#" onsubmit="return false;">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group d-none">
                <label for="assunto" class="sr-only">Assunto</label>
                <span class="assunto">
                  <input type="text" name="assunto" value="" size="40" class="form-control" id="assunto" aria-required="true" aria-invalid="false" value="Atendimento" placeholder="Assunto" />
                </span>
              </div>
              <div class="form-group">

                <span class="nome">
                  <input type="text" name="nome" value="" size="40" class="input-form" id="nome" aria-required="true" aria-invalid="false" placeholder="   Nome Completo" />
                </span>
              </div>
              <div class="form-group">

                <span class="email">
                  <input type="email" name="email" value="" size="40" class="input-form" id="email" aria-required="true" aria-invalid="false" placeholder="   E-mail" />
                </span>
              </div>
              <div class="form-group">

                <span class="telefone">
                  <input type="tel" name="telefone" value="" size="40" class="input-form" id="telefone" aria-required="true" aria-invalid="false" placeholder="   Telefone" />
                </span>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">

                <span class="mensagem">
                  <textarea name="mensagem" cols="40" rows="6" class="area-form" id="mensagem" aria-required="true" aria-invalid="false" placeholder="   Como podemos te ajudar hoje?"></textarea>
                </span>
              </div>
            </div>
          </div>
          <div class="row ">
            <div class="col-md-6 offset-md-6 d-flex justify-content-between">
              <div class="custom-control custom-checkbox" style="font-size: 14px;">
                <input type="checkbox" class="custom-control-input" id="relacionamento" name="relacionamento">
                <label class="custom-control-label" for="relacionamento" style="padding-top: 2px;">
                  Desejo receber notícias e promoções no
                  meu e-mail</label>
              </div>
              <div class="cont-btn-enviar">
                <button type="submit" id="sendContact"><i class="fas fa-envelope"></i> Enviar!</button>
                {{--<button type="submit" ><i class="fas fa-sync fa-spin"></i> Enviar!</button>--}}
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="footer">
    <div class="wrapper">
      <img src="{{asset('images/Logo Rodapé.png')}}" alt="Armazém do Escritório">
    </div>
    <div class="conteiner-risco-footer"></div>
    <section class="wrapper cont-footer-button">
      <div>
        <a href="">Fale Conosco</a><br>
        <a href="">Sobre o Armazém</a><br>
        <a href="">Trabalhe Conosco</a>

      </div>
      <div>
        itajaí, SC <br>
        <a href="https://goo.gl/maps/r9Q2BZQaMVA2" target="_blank" title="Clique para ver no Google Maps">
          R. Samuel Heusi, 73 Centro <br>
          <i class="fab fa-whatsapp"></i>
          <i class="fas fa-phone-alt"></i>
          (47) 3348-0291

        </a>
      </div>
      <div>
        Balneario Camboriú, SC <br>
        <a href="https://goo.gl/maps/r9Q2BZQaMVA2" target="_blank" title="Clique para ver no Google Maps">
          R. Portugal 31, Bairo das Naçoões <br>
          <i class="fab fa-whatsapp"></i>
          <i class="fas fa-phone-alt"></i>
          47 3367 1487
        </a>

      </div>
      <div>
        <div class="contato-email">
          <a href="mailto:contato@armazemdoescritorio.com.br" title="Clique para enviar email diretamente">contato@armazemdoescritorio.com.br</a>
        </div>
        <div class="cont-i-redes">
          <a href="https://www.instagram.com/explore/locations/23669937/" target="_blank" class="social instagram" title="Veja nossas fotos no Instagram">
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