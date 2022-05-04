<div class="modal fade" tabindex="-1" role="dialog" id="modal_alterar_data">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title danger">Alterar Data Agendamento</h5>

          <div class="erros"></div>

      </div>
      <div class="modal-body">
          <form method="post" id="form-alterar-data" name="form-alterar-data" action="<?=DOMINIO?>refeicao/alterardata">

           <input class="form-control required" readonly minlength="1" autocomplete="off" type="text" id="matriculas" name="matriculas" placeholder="ID Matrícula">


              <div class="row">
                  <div class="col-sm-12 form-group">
                      <label class="font-normal"><b>Data *</b></label>
                      <div class="input-group date">
                          <span class="input-group-addon bg-white"><i class="fa fa-calendar"></i></span>
                          <input class="form-control mascara_data required" autocomplete="off" minlength="10" maxlength="10" type="text" name="data_alteracao" placeholder="dd/mm/yyyy" id="data_alteracao">
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

        $("#form-alterar-data").on('submit', function(){

            var erros = "";
            erros += $("#matriculas").val().length <= 0 ? "Nenhuma matrícula informada "+$("#matriculas").val()+"!<br>" : "";
            erros += $("#data_alteracao").val().length <= 0 ? "Data de alteração inválida!<br>" : "";


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

