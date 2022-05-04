<div class="modal fade" tabindex="-1" role="dialog" id="modal_agendamento_visita">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title danger">Solicitar Visita</h5>
            </div>
            <div class="modal-body">
                <form method="post" id="form-solicitar-agendamento" name="form-solicitar-agendamento" action="<?=DOMINIO?>visita/solicitaragendamento">

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
                            <label><b>Tipo de Visita *</b></label>
                            <select class="form-control input-sm" id="tipo_visita" name="tipo_visita">
                                <?php
                                if(isset($view_tipovisita) && count($view_tipovisita) > 0){

                                    foreach($view_tipovisita as $tipovisita){

                                        echo "<option value='{$tipovisita['id_tipo_visita']}'>{$tipovisita['descricao_tipo_visita']}</option>";

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
                                <textarea class="form-control" rows="6" id="motivo_solicitacao" name="motivo_solicitacao"></textarea>
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="submit"  class="btn btn-primary" >Solicitar</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

