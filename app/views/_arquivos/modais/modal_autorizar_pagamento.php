<div class="modal fade" id="modal_autorizar_pagamento">
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
                <form method="POST" id="form-autorizar-pagamento" name="form-autorizar-pagamento">
              
                    <input type="hidden" name="id_conta_pagar_autorizada" id="id_conta_pagar_autorizada">
                    
                    <div class="row">
                <div class="col-xs-12">
                  <div class="form-group">
                        <label>Usuário: </label>
                        <input type="text" class="form-control" readonly id="nome_usuario_autorizacao" name="nome_usuario_autorizacao">
                    </div>
                </div>     
              </div>
                    
                    <div class="row">
                <div class="col-xs-12">
                  <div class="form-group">
                        <label>Senha: </label>
                        <input type="password" class="form-control" id="senha_usuario_autorizacao" name="senha_usuario_autorizacao">
                    </div>
                </div>     
              </div>



                    
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Autorizar</button>

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
$(function(){
    
    $("#modal_autorizar_pagamento .erros").html(""); 
    $("#form-autorizar-pagamento").submit(function(event){
    event.preventDefault();
    var formDados = new FormData($(this)[0]);
    var erros = validarForm("#form-autorizar-pagamento");
    if(erros.length > 0){
        $("#modal_autorizar_pagamento .erros").html(erros).css({'color':'red','font-weight':'bold','font-size':'14pt'}); 
        return false;
    }else{
        
       $.ajax({
        url: '<?=DOMINIO?>contaspagar/autorizarpagamento',
        type: 'POST',
        data: formDados,
        cache: false,
        contentType: false,
        processData: false,
        success: function(data){
 
           $("#modal_autorizar_pagamento .erros").html(data).css({'color':'blue','font-weight':'bold','font-size':'14pt'}); 
           limparForm("#form-autorizar-pagamento");
           
           setTimeout(function () {
        $("#modal_autorizar_pagamento .erros").html(""); 
           $("#modal_autorizar_pagamento").modal('hide');
           window.location.reload();
        }, 2000);
           
        }
        
    }); 
    return false;
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