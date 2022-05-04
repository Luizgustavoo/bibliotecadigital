<div class="modal fade" tabindex="-1" role="dialog" id="modal_desistencia">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title danger">Desistência</h5>
      </div>
      <div class="modal-body">
          <form method="post" id="form-desistencia" name="form-desistencia" action="<?=DOMINIO?>desistente/cadastro">

              <div class="row">
                  <div class="col-sm-2 form-group">
                      <label><b>Id *</b></label>
                      <input class="form-control required" minlength="1" readonly autocomplete="off" type="text" id="id_matricula" name="id_matricula" placeholder="ID Matrícula">
                      <div class="help-block with-errors"></div>
                  </div>


                  <div class="col-sm-10 form-group">
                      <label><b>Nome *</b></label>
                      <input class="form-control required" minlength="2" readonly autocomplete="off" type="text" id="nome_pessoa" name="nome_pessoa" placeholder="ID Matrícula">
                      <div class="help-block with-errors"></div>
                  </div>


              </div>

              <div class="row">
                  <div class="col-sm-12 form-group">
                      <label class="font-normal"><b>Data Desistência *</b></label>
                      <div class="input-group date">
                          <span class="input-group-addon bg-white"><i class="fa fa-calendar"></i></span>
                          <input class="form-control mascara_data required" value="<?=date('d/m/Y')?>" minlength="10" maxlength="10" type="text" name="data_desistencia" placeholder="dd/mm/yyyy" id="data_desistencia">
                      </div>
                  </div>
              </div>

              <div class="row">
                  <div class="col-sm-12 form-group">
                      <label><b>Tipo de Desistência *</b></label>
                      <select class="form-control input-sm" id="tipo_desistencia" name="tipo_desistencia">
                          <?php
                          if(isset($view_tipodesistencia) && count($view_tipodesistencia) > 0){

                              foreach($view_tipodesistencia as $tipodesistencia){

                                  echo "<option value='{$tipodesistencia['id_tipo_desistencia']}'>{$tipodesistencia['descricao_tipo_desistencia']}</option>";

                              }

                          }
                          ?>

                      </select>
                  </div>
              </div>

              <div class="row">

                  <div class="col-sm-12 form-group">

                      <div class="form-group">
                          <label><b>Motivo *</b></label>
                          <textarea class="form-control" rows="6" id="motivo_desistencia" name="motivo_desistencia"></textarea>
                      </div>
                  </div>

              </div>

              <div class="modal-footer">
                  <button type="submit"  class="btn btn-primary" > Salvar</button>
              </div>
          </form>
      </div>

    </div>
  </div>
</div>
<script>
    $(function(){

        $("#modal_desistencia #form-desistencia").on('submit', function(){

            var erros = "";

            erros += $("#form-desistencia #id_matricula").val().length <= 0 ? "Matrícula inválida!\n" : "";
            erros += $("#form-desistencia #nome_pessoa").val().length < 3 ? "Aluno(a) inválido(a)!\n" : "";
            erros += $("#form-desistencia #data_desistencia").val().length < 10 ? "Data de desistência inválida!\n" : "";
            erros += $("#form-desistencia #motivo_desistencia").val().length < 3 ? "Motivo da desistência inválido!\n" : "";

            if(erros.length > 0){
                alert(erros);
                return false;
            }else{
                return true;
            }

            return false;

        });

    });
</script>

