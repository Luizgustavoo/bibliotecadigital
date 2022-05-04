<div class="modal fade" id="modal_table_patrimonio">
    <div class="modal-dialog modal-lg" style="width: 90%;">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-search-plus"></i>&nbsp;</h4>
              </div>
              <div class="modal-body">
<section class="content">
      <div class="row">
        <div class="col-md-12">
<div class="erros">
                    
                </div>  
            <form id="form-desativar-patrimonio" method="post"> 
            <div id="tabela_aqui">
                
                
                
            </div>
                
                <div class="row">
                <div class="col-xs-12">
                  <div class="form-group">
                        <label>Motivo desativar:</label>
                        <textarea class="form-control" id="motivo_desativar" name="motivo_desativar" rows="5" placeholder="Insira o motivo"></textarea>
                    </div>
                </div>
              </div>
                
                <div class="box-footer">
                <button type="button" class="btn btn-primary" id="desativar">Desativar</button>
                <button type="button" class="btn btn-danger" id="excluir">Excluir</button>
              </div>
                
                </form>
                
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
    
    var _url = '';
    
    $("#desativar, #excluir").on("click", function(){
        
        var operacao = $(this).attr("id");
        
        if(operacao == "desativar"){
            _url = '<?=DOMINIO?>patrimonio/desativar';
        }else{
            _url = '<?=DOMINIO?>patrimonio/excluir';
        }
        $("#form-desativar-patrimonio").submit();
        
    });
    
    
    
        
        
        

        
         $("#form-desativar-patrimonio").submit(function(event){
    event.preventDefault();
     
      var tbl = $('#tbl-patrimonio-desativar').DataTable();
      var tabela = tbl.$('input,select,textarea').serializeArray();
      
 var formDados = new FormData($(this)[0]);
 //var formDados = $("#form-desativar-patrimonio").serializeArray();
 
 var dados = [];
 
 $.each(tabela,function(key, value){
     dados.push(value.value); 
 });
 
 var lista = {id:dados,motivo:$("#form-desativar-patrimonio #motivo_desativar").val()};
 
 console.log(lista);

    //var formDados = $(this).serialize();
    var erros = validarForm("#form-desativar-patrimonio");
    
    if(erros.length > 0){
        $(".erros").html(erros).css({'color':'red','font-weight':'bold','font-size':'14pt'}); 
        return false;
    }else{
        
       $.ajax({
        url: _url,
        type: 'POST',
        data: lista,
        dataType: 'html',
//        cache: false,
//        contentType: false,
//        processData: false, 
        success: function(data){
 
           $(".erros").html(data).css({'color':'blue','font-weight':'bold','font-size':'14pt'}); 
           limparForm("#form-desativar-patrimonio");
           
           setTimeout(function () {
        $(".erros").html(""); 
           $("#modal_table_patrimonio").modal('hide');
        }, 2000);
           
        }
        
    }); 
    return false;
    } 
    
  
    
});
        
    
    
    
   

function validarForm(form){
var erros = "";


    if($(form+' input[type=checkbox]:checked').length <= 0){
        erros += "Nenhum item selecionado!<br>";  
    }
    if($(form+" #motivo_desativar").val().length <= 2){
        erros += "Motivo inválido!";
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