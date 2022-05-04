<div class="modal fade" tabindex="-1" role="dialog" id="modal_doacao_cesta">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title danger">Doação de Cesta Básica</h5>

          <div class="erros"></div>

      </div>
      <div class="modal-body">
          <form method="post" id="form-doacao-cesta" name="form-doacao-cesta" action="<?=DOMINIO?>cestabasica/doar">

           <input class="form-control required" readonly minlength="1" autocomplete="off" type="hidden" id="matriculas" name="matriculas" placeholder="ID Matrícula">


              <div class="row">
                  <div class="col-sm-12 form-group">
                      <label class="font-normal"><b>Data Entrega *</b></label>
                      <div class="input-group date">
                          <span class="input-group-addon bg-white"><i class="fa fa-calendar"></i></span>
                          <input class="form-control mascara_data required" autocomplete="off" minlength="10" maxlength="10" type="text" name="data_entrega" placeholder="dd/mm/yyyy" id="data_entrega">
                      </div>
                  </div>
              </div>

              <div class="row">

                  <div class="col-sm-12 form-group">

                      <div class="form-group">
                          <label><b>Motivo da doação *</b></label>
                          <textarea class="form-control" rows="6" id="motivo_doacao" name="motivo_doacao"></textarea>
                      </div>
                  </div>

              </div>

              <div class="modal-footer">
                  <button type="submit"  class="btn btn-primary" > <i class="fa fa-save"></i> Salvar</button>
              </div>
          </form>
      </div>

    </div>
  </div>
</div>

<script>
    $(function(){

        $("#form-doacao-cesta").on('submit', function(){

            var erros = "";
            erros += $("#matriculas").val().length <= 0 ? "Nenhuma matrícula informada "+$("#matriculas").val()+"!<br>" : "";
            erros += $("#data_entrega").val().length <= 0 ? "Data de entrega inválida!<br>" : "";
            erros += $("#motivo_doacao").val().length <= 0 ? "Motivo da doação inválido!<br>" : "";

            if(erros.length > 0){
                $(".modal-header .erros").html(erros).css({'color':'red'});
                //$("#modal_retorno .modal-body p").html(erros).css({'color':'black'});
                return false;
            }else{
                return true;
            }

            return false;

        });
    });
</script>

