<div class="modal fade" tabindex="-1" role="dialog" id="modal_alterar_status">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title danger">Alterar Status</h5>

          <div class="erros"></div>

      </div>
      <div class="modal-body">
          <form method="post" id="form-alterar-status" name="form-alterar-status" action="<?=DOMINIO?>matricula/alterarstatusdirecao">

           <input class="form-control required" readonly minlength="1" autocomplete="off" type="hidden" id="matriculas" name="matriculas" placeholder="ID Matrícula">

              <div class="col-sm-12 form-group">
                  <label for=""><b>Status Matrícula</b></label>
                  <select name="status_matricula" id="status_matricula" class="form-control">

                      <option value="#">Selecione um status</option>
                      <?php
                      if(isset($view_status) && count($view_status) > 0){

                          foreach ($view_status as $status) {

                              echo "<option value='{$status['id_status']}' >{$status['descricao_status']}</option>";

                          }

                      }
                      ?>

                  </select>
              </div>

              <div class="modal-footer">
                  <button type="submit"  class="btn btn-primary" > <i class="fa fa-save"></i> Alterar</button>
              </div>
          </form>
      </div>

    </div>
  </div>
</div>

<script>
    $(function(){

        $("#form-alterar-status").on('submit', function(){

            var erros = "";
            erros += $("#matriculas").val().length <= 0 ? "Nenhuma matrícula informada "+$("#matriculas").val()+"!<br>" : "";
            erros += $("#status_matricula").val().length <= 0 ? "Status inválido!<br>" : "";

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

