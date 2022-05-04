<div class="modal fade" id="modal_ajuste_estoque_vencimento">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-plus"></i>&nbsp;Ajuste Data de Vencimento Produto</h4>
              </div>
              <div class="modal-body">
<section class="content">
      <div class="row">
        <div class="col-md-12">

          <div class="box box-success">
            
            <div class="box-body">
               <form method="POST" id="form-vencimento-produtos-estoque">
                <div class="erros">
                    
                </div>  
               
              
                    <div class="row">
               
                        
                        <div class="col-xs-2">
                  <div class="form-group">
                <label>Id:</label>
                  
                <input type="text" readonly class="form-control" name="id_produto" id="id_produto"/>
                          
              </div>
                </div>
                        <div class="col-xs-10">
                  <div class="form-group">
                <label>Produto:</label>
                  
                <input type="text" readonly class="form-control" name="descricao_produto" id="descricao_produto"/>
                              
              </div>
                </div>
                       
       
              </div>
                   
                   
                   <div class="row">
                       
                       
                       <div class="col-xs-6">
                  <div class="form-group">
                <label>Vencimento Atual:</label>
                  <div id="ver_data_vencimento"></div>
                  <input type="text" readonly class="form-control" name="data_vencimento" id="data_vencimento"/>
                             
              </div>
                </div>
                       
                       
                       <div class="col-xs-6">
                  <div class="form-group">
                <label>Novo Vencimento:</label>
                  <div id="ver_data_vencimento"></div>
               <input type="text" class="form-control" name="nova_data_vencimento" id="nova_data_vencimento" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask placeholder="dd/mm/yyyy" />
                              
              </div>
                </div>
                       
                       
                   </div>
                   
                   
                   

                <button type="submit" class="btn btn-primary">Salvar</button>

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

  
    
    $("#modal_ajuste_estoque_vencimento .erros").html(""); 
    $("#form-vencimento-produtos-estoque").submit(function(event){
    event.preventDefault();
    var formDados = new FormData($(this)[0]);
    var erros = validarForm("#form-vencimento-produtos-estoque");
    if(erros.length > 0){
        $("#modal_ajuste_estoque_vencimento .erros").html(erros).css({'color':'red','font-weight':'bold','font-size':'14pt'}); 
        return false;
    }else{
        
       $.ajax({
        url: '<?=DOMINIO?>estoque/alterarvencimento',
        type: 'POST',
        data: formDados,
        cache: false,
        contentType: false,
        processData: false,
        success: function(data){
 
           $("#modal_ajuste_estoque_vencimento .erros").html(data).css({'color':'blue','font-weight':'bold','font-size':'14pt'}); 
           limparForm("#form-vencimento-produtos-estoque");
           
           setTimeout(function () {
        $("#modal_ajuste_estoque_vencimento .erros").html(""); 
        location.reload();
        }, 2000);
           
        }
        
    }); 
    return false;
    } 
});

function validarForm(form){

var erros = "";

    if($(form+" #id_produto").val().length <= 0){
        erros += "Produto inválido!";
    }    
 

    if( ($(form+" #nova_data_vencimento").val()) < 10){
        erros += "Vencimento do produto inválida!";
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