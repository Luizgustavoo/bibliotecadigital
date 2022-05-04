<div class="modal fade" id="modal_cancelar_conta_receber">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-plus"></i>&nbsp;Cancelar Conta</h4>
              </div>
              <div class="modal-body">
<section class="content">
      <div class="row">
        <div class="col-md-12">

        
            
            <div class="box-body">
                <div class="erros">
                    
                </div>  
                <form method="POST" id="form-cancelar-conta" name="form-cancelar-conta">
              
                  
                    <input type="hidden" class="form-control" id="id_conta_receber_cancelar" name="id_conta_receber_cancelar">
                
                    
                    <div class="row">
                        
                <div class="col-xs-12">
                  <div class="form-group">
                <label>Motivo Cancelamento:</label>

                <textarea class="form-control" rows="5" id="motivo_cancelamento" name="motivo_cancelamento"></textarea>
                
                <!-- /.input group -->
              </div>
                </div>   
              </div>



                    
              <div class="box-footer">
                <button type="submit" class="btn btn-danger">Cancelar Conta</button>

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
    
    
    $("#modal_cancelar_conta_receber .erros").html(""); 
    $("#form-cancelar-conta").submit(function(event){
    event.preventDefault();
    var formDados = new FormData($(this)[0]);
    var erros = validarForm("#form-cancelar-conta");
    if(erros.length > 0){
        $("#modal_cancelar_conta_receber .erros").html(erros).css({'color':'red','font-weight':'bold','font-size':'14pt'}); 
        alert("aqui");
        return false;
    }else{
        
        $.post(
                <?=DOMINIO?>+"contasreceber/cancelarconta",
                   $("#form-cancelar-conta").serialize(),
                   function (response, status){
                       
                   $("#modal_cancelar_conta_receber .erros").html(response).css({'color':'green','font-weight':'bold','font-size':'14pt'}); 
                       
                       setTimeout(function(){
                           location.reload();
                       }, 2000);
                       
                       
                   }
                
                    );
        
    return false;
    } 
});

function validarForm(form){
var erros = "";

    if($(form+" #id_conta_receber_cancelar").val().length <= 0){
        erros += "Conta inválida!";
    }   
    if($(form+" #motivo_cancelamento").val().length < 2){
        erros += "Motivo cancelamento inválido!";
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