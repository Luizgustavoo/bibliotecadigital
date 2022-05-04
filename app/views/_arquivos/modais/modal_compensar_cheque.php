<div class="modal fade" id="modal_compensar_cheque">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-plus"></i>&nbsp;Autorizar Pagamento</h4>
              </div>
              <div class="modal-body">
<section class="content">
      <div class="row">
        <div class="col-md-12">

        
            
            <div class="box-body">
                <div class="erros">
                    
                </div>  
                <form method="POST" id="form-compensar-cheque" name="form-compensar-cheque" action="<?=DOMINIO?>contaspagar/compensarcheque">
              
                                     
                    
                    <div class="row">
                        
                        <div class="col-xs-2">
                  <div class="form-group">
                <label>Id Conta:</label>

                <div class="input-group">
                  
                    <input type="text" readonly class="form-control" id="id_conta_pagar_compensar" name="id_conta_pagar_compensar">
                </div>
                <!-- /.input group -->
              </div>
                </div>
                        
                <div class="col-xs-10">
                  <div class="form-group">
                <label>Data Compensação:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                    <input type="text" class="form-control" maxlength="10" id="data_compensacao" name="data_compensacao"  onkeypress="mascaraData( this, event )" placeholder="dd/mm/yyyy">
                </div>
                <!-- /.input group -->
              </div>
                </div>   
              </div>



                    
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Compensar</button>

              </div>
              <!-- /.form group -->
              </form>
            </div>
            <!-- /.box-body -->
       
        </div>
        <!-- /.col (left) -->

      </div>
      <!-- /.row -->

    </section>
                  
                  
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
</div>

<script>
    
    
         function mascaraData( campo, e )
{
	var kC = (document.all) ? event.keyCode : e.keyCode;
	var data = campo.value;
	
	if( kC!=8 && kC!=46 )
	{
		if( data.length==2 )
		{
			campo.value = data += '/';
		}
		else if( data.length==5 )
		{
			campo.value = data += '/';
		}
		else
			campo.value = data;
	}
}
    
    
$(function(){
    
    $("#data_compensacao").focus();
    
    $("#modal_autorizar_pagamento .erros").html(""); 
    $("#form-autorizar-pagamento").submit(function(event){
    event.preventDefault();
    var formDados = new FormData($(this)[0]);
    var erros = validarForm("#form-autorizar-pagamento");
    if(erros.length > 0){
        $("#modal_autorizar_pagamento .erros").html(erros).css({'color':'red','font-weight':'bold','font-size':'14pt'}); 
        return false;
    }else{
    return true;
    } 
});

function validarForm(form){
var erros = "";
    if($(form+" #nome_usuario_autorizacao").val().length < 2){
        erros += "Nome de usuário inválido!";
    }   
    if($(form+" #senha_usuario_autorizacao").val().length < 2){
        erros += "Senha de usuário inválido!";
    }   
    
    if($(form+" #id_conta_pagar_autorizada").val().length <= 0){
        erros += "Id da Conta inválida!";
    }   
    return erros;
}

function limparForm(form){
    $(form).each (function(){
  this.reset();
});
}
});
</script>