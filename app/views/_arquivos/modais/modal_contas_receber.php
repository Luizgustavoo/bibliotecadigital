<div class="modal fade" id="modal_contas_receber">
    <div class="modal-dialog modal-lg" >
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Conta a Receber</h4>
              </div>
                <div class="erros"></div>
              <div class="modal-body">
                    <form method="POST" id="form-conta-receber" name="form-conta-receber">
              
             <div class="row">
                <div class="col-xs-3">
                    <div class="form-group">
                        <label>Id:</label>
                        <input type="text" readonly class="form-control" id="id_conta" name="id_conta" placeholder="Código automático">
                    </div>
                </div>
                 
                 
                 <div class="col-xs-3">
                  <div class="form-group">
                <label>Data Competência:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                    <input type="text" class="form-control"  id="data_competencia" name="data_competencia">
                </div>
                <!-- /.input group -->
              </div>
                </div>
                 
                 
                 <div class="col-xs-3">
                  <div class="form-group">
                <label>Data Vencimento:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                    <input type="text" class="form-control" id="data_vencimento" name="data_vencimento">
                </div>
                <!-- /.input group -->
              </div>
                </div>
                 
                 <div class="col-xs-3">
                  <div class="form-group">
                <label>Nº cheque:</label>

                <div class="input-group">
                    <div class="input-group-addon">
                    <i class="fa fa-sort-numeric-asc"></i>
                  </div>
                  
                    <input type="text" class="form-control" id="numero_cheque" name="numero_cheque">
                </div>
                <!-- /.input group -->
              </div>
                </div>
                 
                 
                 
                 
                 
                 
                 
                 
                 
                 
                 
                 
                 </div>
                        
                        
                        
                        
                    <div class="row">
                <div class="col-xs-4">
                  <div class="form-group">
                        <label>Descrição Conta:</label>
                        <input type="text" class="form-control" readonly id="descricao_conta_pagar" name="descricao_conta_pagar" placeholder="">
                    </div>
                </div>
                        
                        <div class="col-xs-2">
                  <div class="form-group">
                        <label>Nº Documento:</label>
                        <input type="text" class="form-control" id="n_documento" name="n_documento" placeholder="">
                    </div>
                </div>
                        
                        
                        <div class="col-xs-3">
                  <div class="form-group">
                <label>Espécie Doc.:</label>
                <select class="form-control select2" name="especie_documento" id="especie_documento" style="width: 100%;">
               
                    <option value="duplicata">Duplicata</option>
                    <option value="cheque">Cheque</option>
                    <option value="numerario">Numerário</option>
                    <option value="deposito_cc">Depósito CC</option>
                    <option value="recibo">Recibo</option>
                    <option value="DDA">Depósito Direto Autorizado (DDA)</option>
                    <option value="n_a">N/A</option>
                    
                </select>
              </div>
                </div>
                        
                        
                        <div class="col-xs-3">
                  <div class="form-group">
                <label>Emissão Doc:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                    <input type="text" class="form-control" id="emissao_documento" name="emissao_documento">
                </div>
                <!-- /.input group -->
              </div>
                </div>
                        
                        
              </div>
                        
                    <div class="row">
                <div class="col-xs-6">
                  <div class="form-group">
                        <label>Recebemos de:</label>
                        <input type="text" class="form-control" readonly id="descricao_cheque" name="descricao_cheque" placeholder="">
                    </div>
                </div>
                      
                        
                        <div class="col-xs-3">
                  <div class="form-group">
                <label>Data Recebimento:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                    <input type="text" class="form-control"  value="<?=date('d/m/Y')?>" id="data_recebimento" name="data_recebimento" >
                </div>
                <!-- /.input group -->
              </div>
              </div> 
                        
                        
                        <div class="col-xs-3">
                  <div class="form-group">
                     
                      <label>Receber agora:</label><br>                      
                      
                      <input type="checkbox" name="check_receber_agora" checked value="sim" data-toggle="toggle" data-on="Sim" data-off="Não" data-width="100%" data-onstyle="success" data-offstyle="danger">
                     
                  </div>
                </div> 
                        
                        
              </div>
                    
                    
                    
                    <div class="row">
                        
                        <div class="col-xs-3">
                  <div class="form-group">
                        <label>Valor Conta:</label>
                        <div class="input-group"> 
                            <div class="input-group-addon">
                    <i class="fa fa-dollar"></i>
                  </div>
                  <input type="text" class="form-control" id="valor_parcela" name="valor_parcela" placeholder="0.00">
                    </div>
                  </div>
                </div> 
                        
                        
                        <div class="col-xs-3">
                  <div class="form-group">
                        <label>Acréscimo:</label>
                        <div class="input-group"> 
                            <div class="input-group-addon">
                    <i class="fa fa-dollar"></i>
                  </div>
                  <input type="text" class="form-control" id="acrescimo_parcela" name="acrescimo_parcela" placeholder="0.00">
                    </div>
                  </div>
                </div> 
                        <div class="col-xs-3">
                  <div class="form-group">
                        <label>Desconto:</label>
                        <div class="input-group"> 
                            <div class="input-group-addon">
                    <i class="fa fa-dollar"></i>
                  </div>
                  <input type="text" class="form-control" id="desconto_parcela" name="desconto_parcela" placeholder="0.00">
                    </div>
                  </div>
                </div> 
               
                        
                        
                        
                        
                        <div class="col-xs-3">
                  <div class="form-group">
                        <label>Valor Total:</label>
                        <div class="input-group"> 
                            <div class="input-group-addon">
                    <i class="fa fa-dollar"></i>
                  </div>
                  <input type="text" class="form-control" id="valor_nota" name="valor_nota" placeholder="0.00" >
                    </div>
                  </div>
                </div> 
                        
                 
              </div>
                                        
                    
                    
                    <div class="row">
                <div class="col-xs-2">
                  <div class="form-group">
                        <label>Natureza:</label>
                        <div class="input-group"> 
                            
                            <input type="text" class="form-control required" id="id_tipo_despesa" name="id_tipo_despesa" placeholder="" >
                    <span class="input-group-btn">
                      <button type="button" class="btn btn-default btn-flat" id="button-tipo-despesa"><i class="fa fa-search"></i></button>
                    </span>
                        
                        </div>
                  </div>
                </div>
                        <div class="col-xs-10">
                  <div class="form-group">
                        <label>Descrição Natureza:</label>
                        <input type="text" class="form-control required" readonly id="descricao_tipo_despesa" name="descricao_tipo_despesa" placeholder="Descricao do tipo de despesa">
                    </div>
                </div>
                         
              </div>
                        
                   
                        
                        
                        
                        
                    
                    
                        
                        
                        <div class="row">
<div class="col-xs-2">
                  <div class="form-group">
                        <label>Id caixa:</label>
                        <div class="input-group"> 
                            
                            <input type="text" class="form-control required somente-numeros" id="id_conta_bancaria"  name="id_conta_bancaria" placeholder="" >
                    <span class="input-group-btn">
                      <button type="button" class="btn btn-default btn-flat" id="button-caixa"><i class="fa fa-search"></i></button>
                    </span>
                        
                        </div>
                  </div>
                </div>
                        <div class="col-xs-10">
                  <div class="form-group">
                        <label>Caixa:</label>
                        <input type="text" readonly class="form-control required" id="descricao_conta" name="descricao_conta" placeholder="Descricao da conta bancária">
                    </div>
                </div>
                         
                      
                      
              </div>
                        
                        
                        
                        <div class="row">
                            
                               
                            
                            <div class="col-xs-2">
                  <div class="form-group">
                        <label>Id Receb:</label>
                        <div class="input-group"> 
                            
                            <input type="text" class="form-control" id="id_forma_pagamento" name="id_forma_pagamento" placeholder="" >
                    <span class="input-group-btn">
                      <button type="button" class="btn btn-default btn-flat" id="button-forma-pagamento"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </span>
                        
                        </div>
                  </div>
                </div>
                <div class="col-xs-10">
                  <div class="form-group">
                        <label>Descrição da Forma de Recebimento:</label>
                        <input type="text" class="form-control"  id="descricao_forma_pagamento" readonly name="descricao_forma_pagamento" placeholder="Descricao da forma de pagamento">
                    </div>
                </div> 
                            
                        </div>
                        
                        
                       
                        
                        
                        <div class="row">
                <div class="col-xs-2">
                  <div class="form-group">
                        <label>Id Tipo Conta:</label>
                        <div class="input-group"> 
                            
                  <input type="text" class="form-control required" id="id_tipo_contribuicao" name="id_tipo_contribuicao" placeholder="" >
                    <span class="input-group-btn">
                      <button type="button" class="btn btn-default btn-flat" id="button-tipo-contribuicao"><i class="fa fa-search"></i></button>
                    </span>
                        
                        </div>
                  </div>
                </div>
                        <div class="col-xs-10">
                  <div class="form-group">
                        <label>Descrição do Tipo da Contribuição/Conta a Receber:</label>
                        <input type="text" class="form-control required" readonly id="descricao_tipo_contribuicao" name="descricao_tipo_contribuicao" placeholder="Descricao do tipo de contribuição">
                    </div>
                </div>
                       
                        
                        
                        
              </div>
                        
                        
                        
                        
                        
                        
                   
                        <div class="row">
                            
                            <div class="col-xs-12">
                    <div class="form-group">
                  <label>Observações:</label>
                   <textarea class="form-control" id="observacoes_conta" name="observacoes_conta" rows="5"></textarea>
                </div>
                </div>
                            
                        </div>
                    
                   

              <div class="box-footer">
                  <button type="button" class="btn btn-success" name="receber_agora" id="receber_agora"> Salvar</button>
<!--                <button type="button" class="btn btn-info" name="gerar_cheque" id="gerar_cheque">Gerar Cheque</button>-->
                
              </div>
              <!-- /.form group -->
              </form>
              </div>
             
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
</div>

<script src="http://<?=SITE_ROOT;?>/web-pages/dist/js/jquery.mask.min.js"></script>   

<script>

$(function(){
    
    $('#valor_nota').mask('#.##0,0000', {reverse: true});
    $('#valor_parcela').mask('#.##0,0000', {reverse: true});
    $('#desconto_parcela').mask('#.##0,0000', {reverse: true});
    $('#acrescimo_parcela').mask('#.##0,0000', {reverse: true});
    
    $('#datepicker, #data_do_dia, #data_vencimento').datepicker({
      autoclose: true
    });
    
    
    
    
    
    
    
$("form#form-conta-receber #valor_nota, form#form-conta-receber #valor_parcela, form#form-conta-receber #desconto_parcela, form#form-conta-receber #acrescimo_parcela").on('keyup', function(){

    totalConta();

});
    
     totalConta = function(){


var total_nota = 0
var acrescimo_nota = $("form#form-conta-receber #acrescimo_parcela").val().toString().replace(".","").replace(",",".");
var desconto_nota = $("form#form-conta-receber #desconto_parcela").val().toString().replace(".","").replace(",",".");
var parcela_nota = $("form#form-conta-receber #valor_parcela").val().toString().replace(".","").replace(",",".");

acrescimo_nota = parseFloat(acrescimo_nota);
desconto_nota = parseFloat(desconto_nota);
parcela_nota = parseFloat(parcela_nota);

var total_nota = ((parcela_nota) + (acrescimo_nota) - (desconto_nota));

$("form#form-conta-receber #valor_nota").val(total_nota.toFixed(4).replace(".",","));


}
    
    
    
 $("form#form-conta-receber #button-tipo-contribuicao").on('click', function(){ 
$.ajax({
            url: '<?= DOMINIO ?>tipocontribuicao/modalTipoContribuicao',
            type: 'post',
            dataType: 'html',
            cache: false,
            contentType: false,
            processData: false,  
            success: function(retorno){
                $("#modal_table .modal-title").html("&nbsp;Tipos de Conta");
                $("#modal_table #tabela_aqui").html(retorno);
                $('#tbl-tipo-contribuicao').DataTable();
            }
});
    $("#modal_table").modal('show');
});   
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    $("form#form-conta-receber #button-categoria-despesa").on('click', function(){ 
$.ajax({
            url: '<?= DOMINIO ?>categoriadespesa/modalCategoriaDespesa',
            type: 'post',
            dataType: 'html',
            cache: false,
            contentType: false,
            processData: false,
            success: function(retorno){
                $("#modal_table .modal-title").html("&nbsp;Cagegorias de Despesa");
                $("#modal_table #tabela_aqui").html(retorno);
                $('#tbl-categoria-despesa').DataTable();
            }
});
    $("#modal_table").modal('show');
});





$("form#form-conta-receber #id_tipo_contribuicao").on('keyup', function(){
if($.isNumeric($(this).val())){
    $.ajax({
            url: '<?= DOMINIO ?>tipocontribuicao/listarporcodigo',
            type: 'post',
            dataType: 'html',
            data: {
                'id' : $(this).val()
            },
           success: function(retorno){
               if(retorno.length > 0){
                  $("#descricao_tipo_contribuicao").val(retorno);  
               }else{
                   $("#descricao_tipo_contribuicao").val(""); 
                   $("#id_tipo_contribuicao").val("");
               }
                               
           }
        });
}else{
$("#descricao_tipo_contribuicao").val(""); 
$("#id_tipo_contribuicao").val("");
}
});




$("form#form-conta-receber #id_categoria_despesa").on('keyup', function(){
if($.isNumeric($(this).val())){
    $.ajax({
            url: '<?= DOMINIO ?>categoriadespesa/listarporcodigo',
            type: 'post',
            dataType: 'html',
            data: {
                'id' : $(this).val()
            },
           success: function(retorno){
               if(retorno.length > 0){
                  $("#descricao_categoria_despesa").val(retorno);  
               }else{
                   $("#descricao_categoria_despesa").val("").attr({placeholder:"ID não encontrado...",maxlenght:"14"});
               }
                               
           }
        });
}else{
$("#descricao_categoria_despesa").val("").attr({placeholder:"ID não encontrado...",maxlenght:"14"});
$("#id_categoria_despesa").val("");
}
});




$("form#form-conta-receber #button-caixa").on('click', function(){ 
$.ajax({
            url: '<?= DOMINIO ?>contabancaria/modalContaBancaria',
            type: 'post',
            dataType: 'html',
            cache: false,
            contentType: false,
            processData: false,
            success: function(retorno){
                $("#modal_table .modal-title").html("&nbsp;Formas de Pagamento");
                $("#modal_table #tabela_aqui").html(retorno);
                $('#tbl-conta-bancaria').DataTable();
            }
});
    $("#modal_table").modal('show');
});

$("form#form-conta-receber #id_conta_bancaria").on('keyup', function(){
if($.isNumeric($(this).val())){
    $.ajax({
            url: '<?= DOMINIO ?>contabancaria/listarporcodigo',
            type: 'post',
            dataType: 'html',
            data: {
                'id' : $(this).val()
            },
           success: function(retorno){
               if(retorno.length > 0){
                  $("#descricao_conta").val(retorno);  
               }else{
                   $("#descricao_conta").val("").attr({placeholder:"ID não encontrado...",maxlenght:"14"});
                   $("#id_conta_bancaria").val("");
               }
                               
           }
        });
}else{
$("#descricao_conta").val("").attr({placeholder:"ID não encontrado...",maxlenght:"14"});
$("#id_conta_bancaria").val("");
}
});







    
    
    $("form#form-conta-receber #button-tipo-despesa").on('click', function(){ 
$.ajax({
            url: '<?= DOMINIO ?>tipodespesa/modalTipoDespesa',
            type: 'post',
            dataType: 'html',
            cache: false,
            contentType: false,
            processData: false,  
            success: function(retorno){
                $("#modal_table .modal-title").html("&nbsp;Natureza da Despesa");
                $("#modal_table #tabela_aqui").html(retorno);
                $('#tbl-tipo-despesa').DataTable();
            }
});
    $("#modal_table").modal('show');
});

$("form#form-conta-receber #id_tipo_despesa").on('keyup', function(){
if($(this).val().length > 0){
    $.ajax({
            url: '<?= DOMINIO ?>tipodespesa/listarporcodigo',
            type: 'post',
            dataType: 'html',
            data: {
                'id' : $(this).val()
            },
           success: function(retorno){
               if(retorno.length > 0){
                  $("#descricao_tipo_despesa").val(retorno);  
               }else{
                   $("#descricao_tipo_despesa").val("").attr({placeholder:"ID não encontrado...",maxlenght:"14"});
                   
               }
                               
           }
        });
}else{
$("#descricao_tipo_despesa").val("").attr({placeholder:"ID não encontrado...",maxlenght:"14"});
}
});








 $("form#form-conta-receber #button-forma-pagamento").on('click', function(){
    
    $.ajax({
        
                url: '<?= DOMINIO ?>formapagamento/modalFormaPagamento',
                type: 'post',
                dataType: 'html',
                cache: false,
                contentType: false,
                processData: false,  
                success: function(retorno){
                    
                    $("#modal_table .modal-title").html("&nbsp;Forma de Pagamento");
                    $("#modal_table #tabela_aqui").html(retorno);
    
    $('#tbl-forma-pagamento').DataTable();
    }
        
    });
        $("#modal_table").modal('show');
    }); 
    
    
    $("form#form-conta-receber #id_forma_pagamento").on('keyup', function(){
if($.isNumeric($(this).val())){
    $.ajax({
            url: '<?= DOMINIO ?>formapagamento/listarporcodigo',
            type: 'post',
            dataType: 'html',
            data: {
                'id' : $(this).val()
            },
           success: function(retorno){
               
               if(retorno.length > 0){
                   $("#descricao_forma_pagamento").val(retorno);   
               }else{
                   $("#descricao_forma_pagamento").val("Nada encontrado!");
               }
                             
           }         
        });
}else{
$("#descricao_forma_pagamento").val("");
$("#id_forma_pagamento").val("");
}
});










































$("#modal_contas_pagar .erros").html(""); 
    $("#gerar_cheque").on("click", function(event){
    event.preventDefault();
    var formDados = new FormData($("#form-conta-pagar")[0]);
    var erros = validarForm("#form-conta-pagar");
    if(erros.length > 0){
        $("#modal_contas_pagar .erros").html(erros).css({'color':'red','font-weight':'bold','font-size':'14pt'}); 
        return false;
    }else{
        
       $.ajax({
        url: '<?=DOMINIO?>contaspagar/gerarcheque',
        type: 'POST',
        data: formDados,
        cache: false,
        contentType: false,
        processData: false,
        success: function(data){
 
           $("#modal_contas_pagar .erros").html(data).css({'color':'blue','font-weight':'bold','font-size':'14pt'}); 
           limparForm("#form-conta-pagar");
           
           setTimeout(function () {
        $("#modal_contas_pagar .erros").html(""); 
           $("#modal_contas_pagar").modal('hide');
           window.location.reload();
        }, 2000);
           
        }
        
    }); 
    return false;
    } 
});


$("#modal_contas_receber .erros").html(""); 

    $("#receber_agora").on("click", function(event){
    event.preventDefault();
    //alert("entrou aqui");
    var formDados = new FormData($("#form-conta-receber")[0]);
    var erros = validarForm("#form-conta-receber");
    if(erros.length > 0){
        $("#modal_contas_receber .erros").html(erros).css({'color':'red','font-weight':'bold','font-size':'14pt'}); 
        return false;
    }else{
        
       $.ajax({
        url: '<?=DOMINIO?>contasreceber/receberconta',
        type: 'POST',
        data: formDados,
        cache: false,
        contentType: false,
        processData: false,
        success: function(data){
 
           $("#modal_contas_receber .erros").html(data).css({'color':'blue','font-weight':'bold','font-size':'14pt'}); 
           limparForm("#form-conta-receber");
           
           setTimeout(function () {
        $("#modal_contas_receber .erros").html(""); 
           $("#modal_contas_receber").modal('hide');
           window.location.reload();
        }, 2000);
//           
        }
        
    }); 
    return false;
    } 
});



function validarForm(form){
var erros = "";
    if(parseInt($(form+" #nome_usuario_autorizacao").val()) <= 0){
        erros += "Código da conta inválida!";
    }  
    if($(form+" #data_competencia").val().length < 10){
        erros += "Data da competência inválida!";
    } 
     
    if($(form+" #data_vencimento").val().length < 10){
        erros += "Data da competência inválida!";
    }  
    if(parseFloat($(form+" #valor_nota").val()) < 0){
        erros += "Valor da conta inválida!";
    }   
    
    
    if(parseInt($(form+" #id_tipo_despesa").val()) <= 0){
        erros += "Id do tipo da conta inválida!";
    } 
    if($(form+" #descricao_tipo_despesa").val().length <= 0){
        erros += "Descrição do tipo da conta inválida!";
    }
    
    
    
    if(parseInt($(form+" #id_conta_bancaria").val()) <= 0){
        erros += "Id da conta bancária inválida!";
    } 
    if($(form+" #descricao_conta").val().length <= 0){
        erros += "Descrição da conta bancária inválida!";
    }
    
    
    if(parseInt($(form+" #id_forma_pagamento").val()) <= 0){
        erros += "Id da forma de pagamento inválida!";
    } 
    if($(form+" #descricao_forma_pagamento").val().length <= 0){
        erros += "Descrição da forma de pagamento inválida!";
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
<?php require_once ARQUIVOS . 'modais/modal_table.php'; ?>