<div class="modal fade" id="modal_ajuste_estoque_saida">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-plus"></i>&nbsp;Ajuste Saída do Estoque</h4>
              </div>
              <div class="modal-body">
<section class="content">
      <div class="row">
        <div class="col-md-12">

          <div class="box box-success">
            
            <div class="box-body">
               <form method="POST" id="form-baixa-produtos-estoque">
                <div class="erros">
                    
                </div>  
               
              
                    <div class="row">
               
                        
                        <div class="col-xs-2">
                  <div class="form-group">
                <label>Id:</label>
                  
                <input type="text" readonly class="form-control" name="id_produto" id="id_produto"/>
                              
              </div>
                </div>
                        <div class="col-xs-4">
                  <div class="form-group">
                <label>Produto:</label>
                  
                <input type="text" readonly class="form-control" name="descricao_produto" id="descricao_produto"/>
                              
              </div>
                </div>
                        <div class="col-xs-2">
                  <div class="form-group">
                <label>Vencimento:</label>
                  <div id="ver_data_vencimento"></div>
                <input type="text" readonly class="form-control" name="data_vencimento" id="data_vencimento"/>
                              
              </div>
                </div>

                <div class="col-xs-2">

                            <!-- Date range -->
                            <div class="form-group">
                              <label>Quantidade:</label>
                              <div class="input-group">
                                  <input type="hidden" name="maximo_baixa" id="maximo_baixa">
                                  <input type="text" class="form-control trocar_ponto" name="quantidade_produto" id="quantidade_produto" />
                
                              
                            </div>
                              <!-- /.input group -->
                            </div>

                          </div>
                        
                        <div class="col-xs-2">
                  <div class="form-group">
                <label>Valor:</label>
                  
                <input type="text" class="form-control" required name="valor_produto" id="valor_produto"/>
                              
              </div>
                </div>
                        
                        
                        
                        
              </div>
                   
                   

              <div class="row">

              
              <div class="col-xs-12">
                  <div class="form-group">
                <label>Motivo:</label>
                  
                <textarea class="form-control" name="motivo_baixa_produto" id="motivo_baixa_produto"></textarea>
                              
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

$(".trocar_ponto").on("keyup", function(){
         $(this).val($(this).val().replace(",", "."));
     });
  
    
    $("#modal_ajuste_estoque_saida .erros").html(""); 
    $("#form-baixa-produtos-estoque").submit(function(event){
    event.preventDefault();
    var formDados = new FormData($(this)[0]);
    var erros = validarForm("#form-baixa-produtos-estoque");
    if(erros.length > 0){
        $("#modal_ajuste_estoque_saida .erros").html(erros).css({'color':'red','font-weight':'bold','font-size':'14pt'}); 
        return false;
    }else{
        
       $.ajax({
        url: '<?=DOMINIO?>estoque/baixar',
        type: 'POST',
        data: formDados,
        cache: false,
        contentType: false,
        processData: false,
        success: function(data){
 
           $("#modal_ajuste_estoque_saida .erros").html(data).css({'color':'blue','font-weight':'bold','font-size':'14pt'}); 
           limparForm("#form-baixa-produtos-estoque");
           
           setTimeout(function () {
        $("#modal_ajuste_estoque_saida .erros").html(""); 
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

    if($(form+" #motivo_baixa_produto").val().length <= 0){
        erros += "Motivo da baixa do produto inválido!";
    }  

    if( parseInt($(form+" #quantidade_produto").val()) <= 0){
        erros += "Quantidade do produto inválida!";
    }  
    
    if(parseFloat($("#quantidade_produto").val()) > parseFloat($("#maximo_baixa").val())){
        erros += "Quantidade do produto maior que a permitida!";
    }
    
    
    if(parseFloat($("#quantidade_produto").val()) < 0.0){
        erros += "Quantidade do produto menor que a permitida!";
    }

    return erros;
}

function limparForm(form){
    $(form).each (function(){
  this.reset();
});
}



$("#adicionar-produtos").on('click',function(){
        
        var newRow = $("<tr>");
        var cols = "";
        
        var erros2 = "";
    
        
        var id_produto = $("#produto_estoque option:selected").val();
        var descricao_produto = $("#produto_estoque option:selected").text();
        var quantidade_produto = $("#quantidade_produto").val();
        var valor_unitario_produto = $("#valor_unitario_produto").val();
        var total_produto = $("#total_produto").val();
        
        
        if(id_produto <= 0 || id_produto.length<=0 ){erros2 += "Código do produto deve ser informado!<br/>";}
        if(descricao_produto.length < 3){erros2 += "Descrição do produto deve ser informada!<br/>";}
        if(quantidade_produto <= 0){erros2 += "Quantidade do produto deve ser informada!<br/>";}
       
        
        
        if(erros2.length > 0){
          $("#modal_ajuste_estoque_entrada .erros").html(erros2).css({'color':'red','font-weight':'bold','font-size':'14pt'}); 
            setTimeout(function () {
              $("#modal_ajuste_estoque_entrada .erros").html("");
            }, 2000);
        }else{
    
        cols += "<td><input type='hidden' name='array_id_produto[]' value='" + id_produto + "'/>";
        cols += "<input type='hidden' name='array_descricao_produto[]' value='" + descricao_produto + "'/>" + descricao_produto + "</td>";
        cols += "<td><input type='hidden' name='array_quantidade_produto[]' value='" + quantidade_produto + "' />" + quantidade_produto + "</td>";
        cols += "<td><input type='hidden' name='array_valor_unitario_produto[]' value='" + valor_unitario_produto + "' />" + valor_unitario_produto + "</td>";
        cols += "<td><input type='hidden' name='array_total_produto[]' value='" + total_produto + "' />" + total_produto + "</td>";
        cols += '<td class="actions">';
        cols += '<button class="btn btn-mini btn-danger remove-linha" type="button">X</button>';
        cols += '</td>';
          
            newRow.append(cols);
          
            $("table#table-produtos-estoque tbody").append(newRow); 
          $("#quantidade_produto").val("");
          $("#valor_unitario_produto").val("");
          $("#total_produto").val("");
          
            
        }
         });



         $(".div-tabela-produtos").on('click','table#table-produtos-estoque tbody tr td button.remove-linha',function(){
         var tr = $(this).closest('tr');
         
         tr.fadeOut(400, function(){ 
            tr.remove(); 
          });
         
         
         
     });

     $("#form-produtos-estoque").on('keyup change','#valor_unitario_produto, #quantidade_produto', function(){

      calcular_total();

     });

calcular_total = function(){

  var quantidade = parseInt($("#quantidade_produto").val());
      var valor = $("#valor_unitario_produto").val().replace('.','').replace(',','.');

      $("#total_produto").val( (quantidade * valor).toLocaleString('pt-BR') );

}


});
</script>