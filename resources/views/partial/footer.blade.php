<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h1>Entre em Contato</h1>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <p>
          Utilize o formulário abaixo para entrar em contato!
        </p>
        <br>
        <form action="#" onsubmit="return false;">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group d-none">
                <label for="assunto" class="sr-only">Assunto</label>
                <span class="assunto">
                  <input type="text" name="assunto"
                         value=""
                         size="40"
                         class="form-control"
                         id="assunto"
                         aria-required="true"
                         aria-invalid="false"
                         value="Atendimento"
                         placeholder="Assunto"/>
                  </span>
              </div>
              <div class="form-group">
                <label for="nome" class="sr-only">Nome Completo</label>
                <span class="nome">
                  <input type="text" name="nome" value=""
                         size="40"
                         class="form-control"
                         id="nome"
                         aria-required="true"
                         aria-invalid="false"
                         placeholder="Nome Completo"/>
                </span>
              </div>
              <div class="form-group">
                <label for="email" class="sr-only">E-mail</label>
                <span class="email">
                  <input type="email" name="email" value=""
                         size="40"
                         class="form-control"
                         id="email"
                         aria-required="true"
                         aria-invalid="false"
                         placeholder="E-mail"/>
                </span>
              </div>
              <div class="form-group">
                <label for="telefone" class="sr-only">Telefone</label>
                <span class="telefone">
                  <input type="tel" name="telefone"
                         value=""
                         size="40"
                         class="form-control"
                         id="telefone"
                         aria-required="true"
                         aria-invalid="false"
                         placeholder="Telefone"/>
                </span>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="mensagem" class="sr-only">Sua Mensagem</label>
                <span class="mensagem">
                    <textarea name="mensagem" cols="40"
                              rows="10"
                              class="form-control"
                              id="mensagem"
                              aria-required="true"
                              aria-invalid="false"
                              placeholder="Como podemos te ajudar hoje?"></textarea>
                 </span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 offset-md-6">
              <div class="custom-control custom-checkbox" style="font-size: 14px;">
                <input type="checkbox" class="custom-control-input" id="relacionamento" name="relacionamento">
                <label class="custom-control-label" for="relacionamento" style="padding-top: 2px;">
                  Desejo receber notícias e promoções no
                  meu e-mail e WhatsApp.</label>
              </div>
              <div class="button-container text-right">
                <button type="submit" class="btn" id="sendContact"><i class="fas fa-envelope"></i> Enviar</button>
                {{--<button type="submit" class="btn btn-primary"><i class="fas fa-sync fa-spin"></i> Enviar</button>--}}
              </div>
            </div>
          </div>
        </form>
        <div class="pt-5">
          <address>   <p>
              <i class="fas fa-phone"></i>
              (47) 3348-0291
              (47) 3349-8809
            </p>
            <p>
              <i class="fas fa-at"></i>
              <a href="mailto:contato@armazemdoescritorio.com.br" title="Clique para enviar email diretamente">contato@armazemdoescritorio.com.br</a>
            </p>
            <p>
              <i class="fas fa-map-marked-alt"></i>
              <a href="https://goo.gl/maps/r9Q2BZQaMVA2" target="_blank" title="Clique para ver no Google Maps">
                Rua Samuel Heusi, 73 - 88301-32 <span class="sep">|</span> <span
                  class="line-break">Centro - Itajaí/SC</span>
              </a>
            </p>

          </address>
        </div>
        <div class="d-flex justify-content-between copyright py-3">
          <p>Armazém do Escritório é marca registrada &trade; Copyright 2005
            - {{ date('Y') }}</p>
          <div>
            <a href="https://www.instagram.com/explore/locations/23669937/" target="_blank" class="social instagram" title="Veja nossas fotos no Instagram"><span>Instagram</span></a>
            <a href="https://www.facebook.com/armazemdoescritorioitajai?fref=ts" target="_blank" class="social facebook" title="Visite nossa página no Facebook"><span>Facebook</span></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
