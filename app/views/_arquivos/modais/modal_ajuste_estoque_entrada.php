<link href="http://<?=SITE_ROOT;?>/web-pages/bower_components/jquery-ui/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<div class="modal fade" id="modal_ajuste_estoque_entrada">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-plus"></i>&nbsp;Ajuste Entrada no Estoque</h4>
              </div>
              <div class="modal-body">
<section class="content">
      <div class="row">
        <div class="col-md-12">

          <div class="box box-success">
            
            <div class="box-body">
                <div class="erros">
                    
                </div>  
                
                <div class="row">
                    
                    
                   <div class="col-xs-2">
                  <div class="form-group">
                        <label>ID Produto:</label>
                        <div class="input-group"> 
                            
                  <input type="hidden" class="form-control" id="id_produto_cotacao" name="id_produto_cotacao" placeholder="" >
                  <input type="text" class="form-control" id="id_produto" name="id_produto" placeholder="" >
                    <span class="input-group-btn">
                   </span>
                        
                        </div>
                  </div>
                </div>
                        <div class="col-xs-7">
                  <div class="form-group">
                        <label>Descrição Produto:</label>
                        <input type="text" class="form-control maiusculo" id="descricao_produto" name="descricao_produto" placeholder="Descricao do produto">
                    </div>
                </div>
                    

                <div class="col-xs-3">

                            <!-- Date range -->
                            <div class="form-group">
                              <label>Quantidade:</label>
                              <div class="input-group">
                               
                                <input type="text" class="form-control trocar_ponto" value="1"  name="quantidade_produto" min="1" id="quantidade_produto"/>
                              </div>
                              <!-- /.input group -->
                            </div>

                          </div>
                        
                        
                        
                        
              </div>

              <div class="row">

              <div class="col-xs-4">
                  <div class="form-group">
                <label>Data Vencimento:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                    <input type="text" class="form-control"  id="data_vencimento" name="data_vencimento" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask placeholder="dd/mm/yyyy">
                </div>
                <!-- /.input group -->
              </div>
                </div>

                          <div class="col-xs-3">
                  <div class="form-group">
                        <label>Valor Unitário:</label>
                        <div class="input-group"> 
                            <div class="input-group-addon">
                    <i class="fa fa-dollar"></i>
                  </div>
                  <input type="text" class="form-control" value="0,00" id="valor_unitario_produto" name="valor_unitario_produto" placeholder="0.00"  onKeyPress="return formataMoeda(this,'.',',',event);">
                    </div>
                  </div>
                </div>
                        
                        <div class="col-xs-3">
                  <div class="form-group">
                        <label>Total:</label>
                        <div class="input-group"> 
                            <div class="input-group-addon">
                    <i class="fa fa-dollar"></i>
                  </div>
                            <input type="text" class="form-control" value="0,00" id="total_produto" name="total_produto" placeholder="0.00"  readonly style="font-weight: bold; font-size: 12pt;">
                    </div>
                  </div>
                </div> 




                <div class="col-xs-1">
                  <div class="form-group">
                        <div class="input-group" style='margin-top: 25px;'> 
                            
                        <a class="btn btn-info" id="adicionar-produtos-tabela-estoque">
                <i class="glyphicon glyphicon-save-file"></i> Add Item
              </a>
                
                  
                
                </div>
                  </div>
                </div> 


              </div>

              <form method="POST" id="form-produtos-estoque">

              <div class="box-solid div-tabela-produtos" style="overflow: auto;">
                     
                      
                      <div class="box box-warning">
                          <h3 class="textoazul">Tabela de Produtos</h3>
                      </div>
                      
                      <table id="table-produtos-estoque" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Produto</th>
                  <th>Vencimento</th>
                  <th>Quantidade</th>
                  <th>Valor</th>
                  <th>Total</th>
                  <th>AÇÃO</th>
                  
                </tr>
                </thead>
                <tbody>
               
                </tbody>

              </table>
                      
                  </div>



                    
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Lançar Estoque</button>

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
    
    $("#modal_cidade .erros").html(""); 
    $("#form-produtos-estoque").submit(function(event){
    event.preventDefault();
    var formDados = new FormData($(this)[0]);
    var erros = validarForm("#form-produtos-estoque");
    if(erros.length > 0){
        $("#modal_ajuste_estoque_entrada .erros").html(erros).css({'color':'red','font-weight':'bold','font-size':'14pt'}); 
        return false;
    }else{
        
       $.ajax({
        url: '<?=DOMINIO?>estoque/inserir',
        type: 'POST',
        data: formDados,
        cache: false,
        contentType: false,
        processData: false,
        success: function(data){
 
           $("#modal_ajuste_estoque_entrada .erros").html(data).css({'color':'blue','font-weight':'bold','font-size':'14pt'}); 
           limparForm("#form-produtos-estoque");
           
           $("table#table-produtos-estoque tbody tr").remove(); 
           
          setTimeout(function () {
         $("#modal_ajuste_estoque_entrada .erros").html(""); 
         window.location.reload();
         }, 1000);
           
        }
        
    }); 
    return false;
    } 
});

function validarForm(form){
var erros = "";
    if($(form+" input[name='array_id_produto[]']").length <= 0){
        erros += "Produto inválido!";
    }    
    return erros;
}

function limparForm(form){
    $(form).each (function(){
  this.reset();
});
}



$("#modal_ajuste_estoque_entrada #descricao_produto").autocomplete({
    autoFocus: true,
    source: function(request, response){
        $.ajax({
            url: '<?= DOMINIO ?>produto/jsonautocomplete',
            type: 'post',
            dataType: 'json',
            data: {
                'termo' : request.term
            }
        }).done(function(data){
            if(data.length > 0){
                response($.each(data, function(key, item){ 
                    return({label:item});  
                }));  
            }
        }); 
    },
    select: function(event, ui){
        
            
            $("#id_produto").val(ui.item.codigo); 
            $("#marca_produto").val(ui.item.marca);
            
            
            
        }
});


$("#modal_ajuste_estoque_entrada #id_produto").on('keyup', function(){
if($.isNumeric($(this).val())){
    $.ajax({
            url: '<?= DOMINIO ?>produto/listarporcodigo2',
            type: 'post',
            dataType: 'json',
            data: {
                'id' : $(this).val()
            },
                    
           success: function(retorno){
               
               if(retorno.length > 0){
            $("#modal_ajuste_estoque_entrada #descricao_produto").val(retorno[0].nome_produto); 
             
               }else{
                   $("#modal_ajuste_estoque_entrada #descricao_produto").val(""); 
               }
               
                        
           }         
        });
}else{
$("#modal_ajuste_estoque_entrada #descricao_produto").val("");
$("#modal_ajuste_estoque_entrada #id_produto").val("");
}
});



$("#modal_ajuste_estoque_entrada #adicionar-produtos-tabela-estoque").on('click',function(){

        
        
        var erros2 = "";
    
        var id_produto = $("#modal_ajuste_estoque_entrada #id_produto").val();
        var descricao_produto = $("#modal_ajuste_estoque_entrada #descricao_produto").val();
        var quantidade_produto = $("#modal_ajuste_estoque_entrada #quantidade_produto").val();
        var data_vencimento = $("#modal_ajuste_estoque_entrada #data_vencimento").val();
        var valor_unitario_produto = $("#modal_ajuste_estoque_entrada #valor_unitario_produto").val();
        var total_produto = $("#modal_ajuste_estoque_entrada #total_produto").val();
        
        if(id_produto <= 0 || id_produto.length<=0 ){erros2 += "Código do produto deve ser informado!<br/>";}
        if(descricao_produto.length < 3){erros2 += "Descrição do produto deve ser informada!<br/>";}
        if(!fctValidaData(data_vencimento)){erros2 += "Data de Vecimento inválida!<br/>";}
        if(quantidade_produto <= 0){erros2 += "Quantidade do produto deve ser informadaaaaa!<br/>";}
       
        if(erros2.length > 0){
            
          $("#modal_ajuste_estoque_entrada .erros").html(erros2).css({'color':'red','font-weight':'bold','font-size':'14pt'}); 
            setTimeout(function () {
              $("#modal_ajuste_estoque_entrada .erros").html("");
            }, 5000);
        }else if(erros2.length <= 0){
            console.log(erros2);
        var newRow = $("<tr>");
        var cols = "";
        cols += "<td><input type='hidden' name='array_id_produto[]' value='" + id_produto + "'/>";
        cols += "<input type='hidden' name='array_descricao_produto[]' value='" + descricao_produto + "'/>" + descricao_produto + "</td>";
        cols += "<td><input type='hidden' name='array_data_vencimento[]' value='" + data_vencimento + "'/>" + data_vencimento + "</td>";
        cols += "<td><input type='hidden' name='array_quantidade_produto[]' value='" + quantidade_produto + "' />" + quantidade_produto + "</td>";
        cols += "<td><input type='hidden' name='array_valor_unitario_produto[]' value='" + valor_unitario_produto + "' />" + valor_unitario_produto + "</td>";
        cols += "<td><input type='hidden' name='array_total_produto[]' value='" + total_produto + "' />" + total_produto + "</td>";
        cols += '<td class="actions">';
        cols += '<button class="btn btn-mini btn-danger remove-linha" type="button">X</button>';
        cols += '</td>';
          
            newRow.append(cols);
          
            $("table#table-produtos-estoque tbody").append(newRow); 
          
          
            
        }
         });



         $(".div-tabela-produtos").on('click','table#table-produtos-estoque tbody tr td button.remove-linha',function(){
         var tr = $(this).closest('tr');
         
         tr.fadeOut(400, function(){ 
            tr.remove(); 
          });
         
         
         
     });

     $("#modal_ajuste_estoque_entrada").on('keyup change','#valor_unitario_produto, #quantidade_produto', function(){


      calcular_total();

     });

calcular_total = function(){

  var quantidade = parseInt($("#quantidade_produto").val());
      var valor = $("#valor_unitario_produto").val().replace('.','').replace(',','.');

      $("#total_produto").val( (quantidade * valor).toLocaleString('pt-BR') );

}


fctValidaData = function(obj)
{
    var data = obj;
    var dia = data.substring(0,2)
    var mes = data.substring(3,5)
    var ano = data.substring(6,10)

    //Criando um objeto Date usando os valores ano, mes e dia.
    var novaData = new Date(ano,(mes-1),dia);

    var mesmoDia = parseInt(dia,10) == parseInt(novaData.getDate());
    var mesmoMes = parseInt(mes,10) == parseInt(novaData.getMonth())+1;
    var mesmoAno = parseInt(ano) == parseInt(novaData.getFullYear());

    if (!((mesmoDia) && (mesmoMes) && (mesmoAno)))
    {
        return false;
    }  
    return true;
}

 




});
</script>