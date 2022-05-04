<div class="modal fade" tabindex="-1" role="dialog" id="modal_pendencias">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: red; color: white; font-weight: bold;" >
        <h5 class="modal-title danger">Lançar pendências</h5>

          <div class="erros"></div>

      </div>
      <div class="modal-body">
          <form method="post" id="form-pendencias" name="form-pendencias" action="<?=DOMINIO?>pendencias/cadastro">

           <input class="form-control required" readonly minlength="1" autocomplete="off" type="hidden" id="matriculas" name="matriculas" placeholder="ID Matrícula">


              <div class="row">
                  <div class="col-sm-12 form-group">
                      <label class="font-normal"><b>Data Entrega *</b></label>
                      <div class="input-group date">
                          <span class="input-group-addon bg-white"><i class="fa fa-calendar"></i></span>
                          <input class="form-control mascara_data required" autocomplete="off" minlength="10" maxlength="10" type="text" name="data_pendencia" placeholder="dd/mm/yyyy" id="data_pendencia">
                      </div>
                  </div>
              </div>

              <div class="row">
                  <div class="col-sm-12 form-group">
                      <label><b>Tipo de Visita *</b></label>
                      <select class="form-control input-sm" id="id_tipo_pendencia" name="id_tipo_pendencia">
                          <?php
                          if(isset($view_tipopendencia) && count($view_tipopendencia) > 0){

                              foreach($view_tipopendencia as $tipopendencia){

                                  echo "<option value='{$tipopendencia['id_tipo_pendencia']}'>{$tipopendencia['descricao_tipo_pendencia']}</option>";

                              }

                          }
                          ?>

                      </select>
                  </div>
              </div>

              <div class="row">

                  <div class="col-sm-12 form-group">

                      <div class="form-group">
                          <label><b>Observações *</b></label>
                          <textarea class="form-control" rows="6" id="motivo_pendencia" name="motivo_pendencia"></textarea>
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

        $("#form-pendencias").on('submit', function(){

            var erros = "";
            erros += $("#matriculas").val().length <= 0 ? "Nenhuma matrícula informada "+$("#matriculas").val()+"!<br>" : "";
            erros += $("#data_pendencia").val().length <= 0 ? "Data da pendência inválida!<br>" : "";
            erros += $("#motivo_pendencia").val().length <= 0 ? "Motivo da pendência inválido!<br>" : "";

            if(erros.length > 0){
                $(".modal-header .erros").html(erros).css({'color':'white'});
                //$("#modal_retorno .modal-body p").html(erros).css({'color':'black'});
                return false;
            }else{
                return true;
            }

            return false;

        });
    });
</script>

