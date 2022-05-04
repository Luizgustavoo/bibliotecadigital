<div class="modal fade" id="modal_forma_pagamento">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-plus"></i>&nbsp;Nova Forma de Pagamento</h4>
              </div>
              <div class="modal-body">
<section class="content">
      <div class="row">
        <div class="col-md-12">

          <div class="box box-success">
            
            <div class="box-body">
                <div class="erros">
                    
                </div>  
                <form method="POST" id="form-forma-pagamento">
              
             <div class="row">
                <div class="col-xs-3">
                    <div class="form-group">
                        <label>Código</label>
                        <input type="text" disabled class="form-control" id="id_forma_pagamento" name="id_forma_pagamento" placeholder="Código automático">
                    </div>
                </div>
                 </div>
                    <div class="row">
                <div class="col-xs-12">
                  <div class="form-group">
                        <label>Descrição</label>
                  <input type="text" class="form-control" id="descricao_forma_pagamento" name="descricao_forma_pagamento" placeholder="Insira a Descricao da Categoria Produto">
                    </div>
                </div>
              </div>



                    
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Salvar</button>
              </div>
              <!-- /.form group -->
              </form>
            </div>
            <!-- /.box-body -->
          </div>
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
    
    $(".erros").html(""); 
    $("#form-forma-pagamento").submit(function(event){
    event.preventDefault();
    var formDados = new FormData($(this)[0]);
    var erros = validarForm("#form-forma-pagamento");
    if(erros.length > 0){
        $(".erros").html(erros).css({'color':'red','font-weight':'bold','font-size':'14pt'}); 
        return false;
    }else{
        
       $.ajax({
        url: '<?=DOMINIO?>formapagamento/inserir',
        type: 'POST',
        data: formDados,
        cache: false,
        contentType: false,
        processData: false,
        success: function(data){
 
           $(".erros").html(data).css({'color':'blue','font-weight':'bold','font-size':'14pt'}); 
           limparForm("#form-forma-pagamento");
           
           setTimeout(function () {
        $(".erros").html(""); 
           $("#modal_forma_pagamento").modal('hide');
        }, 2000);
           
        }
        
    }); 
    return false;
    } 
});

function validarForm(form){
var erros = "";
    if($(form+" #descricao_forma_pagamento").val().length <= 2){
        erros += "Descrição inválida!";
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