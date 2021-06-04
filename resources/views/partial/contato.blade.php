<div class="wrapper">

  <div>
    <p class="tit">QUER MONTAR SEU <br> ESCRITORIO?<br>
      <span class="label">
        VAMOS CONVERSAR!
      </span>
    </p>


  </div>
  <div>
    <div>
      <form action="#" onsubmit="return false;">
        <div class="row ">
          <div class="contato-col">
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

          <div class="contato-col">

            <div class="form-group">
              <span class="mensagem">
                <textarea name="mensagem" cols="40" rows="6" class="area-form" id="mensagem" aria-required="true" aria-invalid="false" placeholder="   Como podemos te ajudar hoje?"></textarea>
              </span>
            </div>
            <div class="d-flex justify-content-between ">
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
        </div>
      </form>
    </div>
  </div>
</div>