<?php require_once ARQUIVOS . 'modais/modal_aguarde.php'; ?>
<div class="modal fade" id="modal_alterar_cotacao">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-plus"></i>&nbsp;Alterar Cotação</h4>
                
                <small id="erros-cotacao"></small>
                
              </div>
              <div class="modal-body" style="overflow-y: scroll;height: 80vh; width: 100%;overflow: auto;">
<section class="content">
    <form method="POST" id="form-alterar-cotacao" action="<?=DOMINIO?>cotacao/alterar">
            <div class="temporario"></div>
        <div class="row">
        <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
              <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Dados da Cotação</a></li>
              <li><a href="#tab_2" data-toggle="tab">Produtos</a></li>
              <li><a href="#tab_3" data-toggle="tab">Serviços</a></li>
              <li id="div-confirma"><a href="#tab_4" data-toggle="tab">Confirmar</a></li>

            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
<!--                INICIO DOS DADOS DA COTAÇÃO-->
                  
<section>
    <h4 class="textovermelho">Insira os dados da Cotação</h4>
</section>

   <div class="row">
                  <div class="col-xs-3">
                    <div class="form-group">
                        <label>Código:</label>
                        <input type="text" disabled class="form-control" id="id_cotacao" name="id_cotacao" placeholder="Código automático">
                    </div>
                </div>
                        
                <div class="col-xs-4">
                <div class="form-group">
                <label>Data da cotação:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                    <input type="text" class="form-control"  value="<?=date('d/m/Y')?>" id="data_cotacao" name="data_cotacao" maxlength="10">
                </div>
                <!-- /.input group -->
              </div>
                </div>      
</div>


<div class="row" style="background-color: #ffffcc">
<div class="col-xs-3">
<div class="form-group">
<label>Id Solicitação Compra:</label>
<div class="input-group"> 

<input type="text" class="form-control" id="id_solicitacao_compra" name="id_solicitacao_compra" placeholder="" >
<span class="input-group-btn">
<button type="button" class="btn btn-default btn-flat" id="button-solicitacao-compra"><i class="fa fa-search"></i></button>
</span>

</div>
</div>
</div>
<div class="col-xs-9">
<div class="form-group">
<label>Descrição da Solicitação de Compra:</label>
<input type="text" class="form-control" id="descricao_solicitacao" name="descricao_solicitacao" placeholder="Descricao da forma de pagamento">
</div>
</div>
</div>


<div class="row">
                <div class="col-xs-12">
                    <div class="form-group">
                  <label>Título da cotação:</label>
                  <input type="text" class="form-control" id="titulo_cotacao" name="titulo_cotacao" placeholder="Título da cotação">
                </div>
                </div>
                 </div>


<div class="row">
                <div class="col-xs-3">
                  <div class="form-group">
                        <label>Id Forma Pagamento:</label>
                        <div class="input-group"> 
                            
                  <input type="text" class="form-control" id="id_forma_pagamento" name="id_forma_pagamento" placeholder="" >
                    <span class="input-group-btn">
                      <button type="button" class="btn btn-default btn-flat" id="button-forma-pagamento"><i class="fa fa-search"></i></button>
                    </span>
                        
                        </div>
                  </div>
                </div>
                        <div class="col-xs-9">
                  <div class="form-group">
                        <label>Descrição da Forma de Pagamento:</label>
                        <input type="text" class="form-control" id="descricao_forma_pagamento" name="descricao_forma_pagamento" placeholder="Descricao da forma de pagamento">
                    </div>
                </div>
              </div>



                  
<!--                FIM DOS DADOS DA COTAÇÃO-->
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                
                  <section>
    <h4 class="textovermelho">Insira os dados do PRODUTO</h4>
</section>
                  
<div class="row">
                <div class="col-xs-2">
                  <div class="form-group">
                        <label>ID Fornecedor:</label>
                        <div class="input-group"> 
                            
                  <input type="text" class="form-control" id="id_fornecedor" name="id_fornecedor" placeholder="" >
                    <span class="input-group-btn">
                      <button type="button" class="btn btn-default btn-flat" id="button-fornecedor"><i class="fa fa-search"></i></button>
                    </span>
                        
                        </div>
                  </div>
                </div>
                        <div class="col-xs-10">
                  <div class="form-group">
                        <label>Descrição Fornecedor:</label>
                        <input type="text" class="form-control" id="descricao_fornecedor" name="descricao_fornecedor" placeholder="Descricao do fornecedor">
                    </div>
                </div>
              </div>
                  
                  <div class="row">
                <div class="col-xs-2">
                  <div class="form-group">
                        <label>ID Produto:</label>
                        <div class="input-group"> 
                            
                  <input type="text" class="form-control" id="id_produto" name="id_produto" placeholder="" >
                    <span class="input-group-btn">
                      <button type="button" class="btn btn-default btn-flat" id="button-produto"><i class="fa fa-search"></i></button>
                    </span>
                        
                        </div>
                  </div>
                </div>
                        <div class="col-xs-5">
                  <div class="form-group">
                        <label>Descrição Produto:</label>
                        <input type="text" class="form-control" id="descricao_produto" name="descricao_produto" placeholder="Descricao do produto">
                    </div>
                </div>
                      
                    
                      <div class="col-xs-5">
                  <div class="form-group">
                        <label>Marca Produto:</label>
                        <input type="text" class="form-control" id="marca_produto" name="marca_produto" placeholder="Marca do Produto">
                    </div>
                </div>
                      
                      
              </div>
                  
                  <div class="row">
                <div class="col-xs-2">
                  <div class="form-group">
                <label>Vencimento:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                    <input type="text" class="form-control"  value="<?=date('d/m/Y')?>" id="vencimento_produto" name="vencimento_produto" maxlength="10">
                </div>
                <!-- /.input group -->
              </div>
                </div>
                      
                   <div class="col-xs-2">
                  <div class="form-group">
                        <label>Quantidade:</label>
                            <input type="number" class="form-control" id="quantidade_produto" name="quantidade_produto" >

                  </div>
                </div>   
                   <div class="col-xs-3">
                  <div class="form-group">
                        <label>Valor:</label>
                        <div class="input-group"> 
                            <div class="input-group-addon">
                    <i class="fa fa-dollar"></i>
                  </div>
                  <input type="text" class="form-control" id="valor_produto" name="valor_produto" placeholder="0.00"  onKeyPress="return formataMoeda(this,'.',',',event);">
                    </div>
                  </div>
                </div>   
                   <div class="col-xs-2">
                  <div class="form-group">
                        <label>Frete:</label>
                        <div class="input-group"> 
                            <div class="input-group-addon">
                    <i class="fa fa-dollar"></i>
                  </div>
                            <input type="text" class="form-control" id="frete_produto" value="0,00" name="frete_produto" placeholder="0.00"  >
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
                            <input type="text" class="form-control" disabled id="total_produto" name="total_produto" placeholder="0.00">
                    </div>
                  </div>
                </div>   
                      
              </div>
                  
                  <div class="row">
                      
                      <div class="col-xs-8">
                  <div class="form-group">
                        <label>Link Site:</label>
                            <input type="text" class="form-control" id="link_site_produto" name="link_site_produto" >

                  </div>
                </div> 
                      
                      <div class="col-xs-4">
                  <div class="form-group">
                        <label>Contato Fornecedor:</label>
                            <input type="text" class="form-control" id="contato_fornecedor_produto" name="contato_fornecedor_produto" >

                  </div>
                </div> 
                      
                  </div>
                  
                  <div class="box-solid produtos-cotacao">
                      <button type="button" class="btn btn-success" id="adicionar-produtos-tabela" ><i class="glyphicon glyphicon-arrow-down"></i> Adicionar</button>
                      <button type="button" class="btn btn-warning" id="limpar-campos-produtos"><i class="fa fa-eraser"></i> Limpar Campos</button>
              </div>
                  <br>
                  <div class="box-solid div-tabela-produtos">
                     
                      
                      <div class="box box-success">
                          <h3 class="textoazul">Tabela de Produtos Cotados <span class="total-tabela-produtos" style="color: red; font-weight: bold; font-size: 20pt;">R$ 0,00</span></h3>
                      </div>
                      
                     <table id="table-produtos-cotacao" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Fornecedor</th>
                  <th>Produto</th>
                  <th>Marca</th>
                  <th>Vencimento</th>
                  <th>Quantidade</th>
                  <th>Valor</th>
                  <th>Frete</th>
                  <th>Total</th>
                  <th>URL</th>
                  <th>Contato</th>
                  <th>AÇÃO</th>
                  
                </tr>
                </thead>
                <tbody>
               
                </tbody>

              </table>
                      
                  </div>
                  
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">
                   <section>
    <h4 class="textovermelho">Insira os dados do SERVIÇO</h4>
</section>
                     
                  <div class="row">
                <div class="col-xs-2">
                  <div class="form-group">
                        <label>ID Prestador:</label>
                        <div class="input-group"> 
                            
                  <input type="text" class="form-control" id="id_prestador" name="id_prestador" placeholder="" >
                    <span class="input-group-btn">
                      <button type="button" class="btn btn-default btn-flat" id="button-prestador"><i class="fa fa-search"></i></button>
                    </span>
                        
                        </div>
                  </div>
                </div>
                        <div class="col-xs-10">
                  <div class="form-group">
                        <label>Descrição Prestador de Serviço:</label>
                        <input type="text" class="form-control" id="descricao_prestador" name="descricao_prestador" placeholder="Descricao do prestador de serviço">
                    </div>
                </div>
              </div>
                  
                  <div class="row">
                <div class="col-xs-2">
                  <div class="form-group">
                        <label>ID Serviço:</label>
                        <div class="input-group"> 
                            
                  <input type="text" class="form-control" id="id_servico" name="id_servico" placeholder="" >
                    <span class="input-group-btn">
                      <button type="button" class="btn btn-default btn-flat" id="button-servico"><i class="fa fa-search"></i></button>
                    </span>
                        
                        </div>
                  </div>
                </div>
                        <div class="col-xs-5">
                  <div class="form-group">
                        <label>Descrição Serviço:</label>
                        <input type="text" class="form-control" id="descricao_servico" name="descricao_servico" placeholder="Descricao do serviço">
                    </div>
                </div>
                      
                    
                      <div class="col-xs-5">
                  <div class="form-group">
                        <label>Detalhes do Serviço:</label>
                        <input type="text" class="form-control" id="detalhes_servico" value="N/A" name="detalhes_servico" placeholder="Detalhes do serviço">
                    </div>
                </div>
                      
                      
              </div>
                  
                  <div class="row">
                <div class="col-xs-3">
                  <div class="form-group">
                <label>Data prevista:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                    <input type="text" class="form-control"  value="<?=date('d/m/Y')?>" id="previsao_servico" name="previsao_servico" maxlength="10">
                </div>
                <!-- /.input group -->
              </div>
                </div>
                      
                   <div class="col-xs-3">
                  <div class="form-group">
                        <label>Quantidade:</label>
                            <input type="number" class="form-control" id="quantidade_servico" name="quantidade_servico" >

                  </div>
                </div>   
                   <div class="col-xs-3">
                  <div class="form-group">
                        <label>Valor Serviço:</label>
                        <div class="input-group"> 
                            <div class="input-group-addon">
                    <i class="fa fa-dollar"></i>
                  </div>
                            <input type="text" class="form-control" id="valor_servico" name="valor_servico" placeholder="0.00" >
                    </div>
                  </div>
                </div>   
                   <div class="col-xs-3">
                  <div class="form-group">
                        <label>Total Serviço:</label>
                        <div class="input-group"> 
                            <div class="input-group-addon">
                    <i class="fa fa-dollar"></i>
                  </div>
                            <input type="text" class="form-control" readonly id="total_servico" name="total_servico" placeholder="0.00">
                    </div>
                  </div>
                </div>   
                      
              </div>
                  
                  <div class="row">
                      
                      <div class="col-xs-8">
                  <div class="form-group">
                        <label>Link Site:</label>
                            <input type="text" class="form-control" id="link_site_servico" name="link_site_servico" >

                  </div>
                </div> 
                      
                      <div class="col-xs-4">
                  <div class="form-group">
                        <label>Contato Fornecedor:</label>
                            <input type="text" class="form-control" id="contato_fornecedor_servico" name="contato_fornecedor_servico" >

                  </div>
                </div> 
                      
                  </div>
                  
                  
                  <div class="box-solid servicos-cotacao">
                      <button type="button" class="btn btn-success" id="adicionar-servicos-tabela" ><i class="glyphicon glyphicon-arrow-down"></i> Adicionar</button>
                      <button type="button" class="btn btn-danger" id="limpar-campos-servicos"><i class="fa fa-eraser"></i> Limpar Campos</button>
              </div>
                  <br>
                  <div class="box-solid div-tabela-servicos">
                     
                      
                      <div class="box box-default">
                          <h3 class="textoazul">Tabela de Serviços Cotados <span class="total-tabela-servicos" style="color: red; font-weight: bold; font-size: 20pt;">R$ 0,00</span></h3>
                      </div>
                      
                      <table id="table-servicos-cotacao" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Fornecedor</th>
                  <th>Serviço</th>
                  <th>Detalhes</th>
                  <th>Previsão realização</th>
                  <th>Quantidade</th>
                  <th>Valor</th>
                  <th>Total</th>
                  <th>URL</th>
                  <th>Contato</th>
                  <th>AÇÃO</th>
                  
                </tr>
                </thead>
                <tbody>
               
                </tbody>

              </table>
                      
                  </div>
                  
                  
                  
                  
                  
                  
              </div>
              <!-- /.tab-pane -->
              
              
              <div class="tab-pane" id="tab_4">
<!--                INICIO DOS DADOS DA COTAÇÃO-->
<section id="dados-da-cotacao">
    
    <div class="data-da-cotacao"></div>
    <div class="forma-pagamento-da-cotacao"></div>
    <div class="descricao-da-cotacao"></div>
    
</section>

    <div id="conteudo_confirmacao" class="produtos-na-cotacao"><h4>PRODUTOS DA COTAÇÃO</h4></div>
    
    <div id="clone_tabela_produtos"></div>
    
    <hr>
    
    <div class="servicos-na-cotacao"><h4>SERVIÇOS NA COTAÇÃO</h4></div>
    
    <div id="clone_tabela_servicos"></div>
    
<div class="box-footer botao-salvarr">
                <button type="submit" class="btn btn-primary">Salvar</button>
                <a class="btn btn-default" >Cancelar</a>
              </div>

              </div>  
              
              
              
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
            </div>
            
                </form>
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
    
//    $("#form-empresa-fornecedor").each (function(){
//  this.reset();
//});
//    
//    $(".erros").html(""); 
//    $("#form-empresa-fornecedor").submit(function(event){
//    event.preventDefault();
//    var formDados = new FormData($(this)[0]);
//    var erros = validarForm("#form-empresa-fornecedor");
//    if(erros.length > 0){
//        
//        
//        
//        $(".erros").html(erros).css({'color':'red','font-weight':'bold','font-size':'10pt'}); 
//        setTimeout(function () {
//        $(".erros").html("");
//        }, 3000);
//        
//        return false;
//    }else{
//        
//       $.ajax({
//        url: 'empresafornecedor/inserir',
//        type: 'POST',
//        data: formDados,
//        cache: false,
//        contentType: false,
//        processData: false,
//        success: function(data){
// 
//           $(".erros").html(data).css({'color':'blue','font-weight':'bold','font-size':'14pt'}); 
//           limparForm("#form-empresa-fornecedor");
//           
//           setTimeout(function () {
//        $(".erros").html(""); 
//           $("#modal_fornecedor").modal('hide');
//        }, 2000);
//           
//        }
//        
//    }); 
//    return false;
//    } 
//});
//
//function validarForm(form){
//var erros = "";
//   
//    erros += $(form+" #nome_razao_social").val().length < 3 ? "Nome/Razão social inválida!<br>"  : "";
//        erros += $(form+" #tipo_pessoa_fis_jur").val().length < 3 ? "Tipo pessoa inválida!<br>"  : "";
//        erros += $(form+" #cpf_cnpj").val().length < 11 ? "CPF/CNPJ inválido!<br>"  : "";
//        erros += $(form+" #inscricao_estadual").val().length < 3 ? "Inscrição estadual inválida!<br>"  : "";
//        erros += $(form+" #endereco").val().length < 3 ? "Endereço inválido!<br>"  : "";
//        erros += $(form+" #bairro").val().length < 3 ? "Bairro inválido!<br>"  : "";
//        erros += $(form+" #n_casa").val().length <= 0 ? "Número inválido!<br>"  : "";
//        erros += $(form+" #cep").val().length < 8 ? "CEP inválido!<br>"  : "";
//        erros += !$.isNumeric($(form+" #id_cidade").val()) ? "Código da cidade inválido!<br>"  : "";
//        erros += $(form+" #descricao_cidade").val().length < 3 ? "Descrição da cidade inválida!<br>"  : "";
//        erros += ($(form+" #telefone_fixo").val().length < 8) && ($(form+" #telefone_celular").val().length < 8) ? "Telefone fixo ou celular deve ser informado!<br>"  : "";
//        erros += $(form+" #email").val().length < 10 ? "E-mail inválido!<br>"  : "";
//    
//    return erros;
//}
//
//function limparForm(form){
//    $(form).each (function(){
//  this.reset();
//});
//}


});
</script>

<script src="<?=HTTPS.SITE_ROOT;?>/web-pages/bower_components/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script>
    
$(function(){
    
    
    $("#button-solicitacao-compra").on('click', function(){
    
$.ajax({
    
            url: '<?= DOMINIO ?>solicitacaocompra/modalSolicitacoes',
            type: 'post',
            dataType: 'html',
            cache: false,
            contentType: false,
            processData: false,  
            success: function(retorno){
                
                $("#modal_table .modal-title").html("&nbsp;Solicitações de Compra");
                $("#modal_table #tabela_aqui").html(retorno);

$('#solicitacoes').DataTable();
}
    
});
    $("#modal_table").modal('show');
});

$("#id_solicitacao_compra").on('keyup', function(){
if($.isNumeric($(this).val())){
    $.ajax({
            url: '<?= DOMINIO ?>solicitacaocompra/listarporcodigo2',
            type: 'post',
            dataType: 'html',
            data: {
                'id' : $(this).val()
            },
                    
           success: function(retorno){
                              
               $("#descricao_solicitacao").val(retorno);                                
           }         
        });
}else{
$("#descricao_solicitacao").val("Valor informado é inválido!");
$("#id_solicitacao_compra").val("");
}
});
    
     
  $("#id_forma_pagamento, #quantidade_produto, #id_produto, #id_fornecedor, #id_cidade, #id_prestador, #id_servico, #quantidade_servico").bind("keyup blur focus", function(e) {
            e.preventDefault();
            var expre = /[^\d]/g;
            $(this).val($(this).val().replace(expre,''));
   });
   
   $("#quantidade_produto, #valor_produto").on('keypress keyup change', function(){
         //$("span#total-produto-selecionado p").html(quantidadeXvalorUnitario());
         $("#total_produto").val(quantidadeXvalorUnitario($("#quantidade_produto").val(),$("#valor_produto").val()));
     });
     
     $("#quantidade_servico, #valor_servico").on('keypress keyup change', function(){
         //$("span#total-produto-selecionado p").html(quantidadeXvalorUnitario());
         $("#total_servico").val(quantidadeXvalorUnitario($("#quantidade_servico").val(),$("#valor_servico").val()));
     });
     
     function quantidadeXvalorUnitario(quantidadee, valor){
         var quantidade = quantidadee;
         var valor_unitario = valor.replace('.','').replace(',','.');
         var multiplicacao = (parseInt(quantidade) * parseFloat(valor_unitario));
         return (multiplicacao.toLocaleString('pt-br', {minimumFractionDigits: 2}));
     }
     
     $(".produtos-cotacao").on('click','#limpar-campos-produtos', function(){
        limparCamposProdutos();
    });
    
    $(".servicos-cotacao").on('click','#limpar-campos-servicos', function(){
        limparCamposServicos();
    });
    
    limparCamposProdutos = function(){
        
$("#id_fornecedor").val("");
$("#descricao_fornecedor").val("");
$("#id_produto").val("");
$("#descricao_produto").val("");
$("#marca_produto").val("");
$("#vencimento_produto").val("");
document.getElementById("quantidade_produto").value = "0";
$("#valor_produto").val("");
$("#total_produto").val("");
        
    }
    
    limparCamposServicos = function(){
        
$("#id_prestador").val("");
$("#descricao_prestador").val("");
$("#id_servico").val("");
$("#descricao_servico").val("");
$("#detalhes_servico").val("");
$("#previsao_servico").val("");
document.getElementById("quantidade_servico").value = "0";
$("#valor_servico").val("");
$("#total_servico").val("");
        
    }
    
    $(".produtos-cotacao").on('click','#adicionar-produtos-tabela',function(){
        
    var newRow = $("<tr>");
    var cols = "";
    
    var erros2 = "";

    var id_fornecedor = $("#id_fornecedor").val();
    var descricao_fornecedor = $("#descricao_fornecedor").val();
    var id_produto = $("#id_produto").val();
    var descricao_produto = $("#descricao_produto").val();
    var marca_produto = $("#marca_produto").val();
    var vencimento_produto = $("#vencimento_produto").val();
    var quantidade_produto = $("#quantidade_produto").val();
    var valor_produto = $("#valor_produto").val();
    var total_produto = $("#total_produto").val();
    
    if(id_fornecedor.length <= 0){erros2 += "ID do fornecedor deve ser informado!<br/>";}
    if(descricao_fornecedor.length < 3){erros2 += "Descricao do fornecedor deve ser informado!<br/>";}
    if(id_produto.length <= 0){erros2 += "Código do produto deve ser informado!<br/>";}
    if(descricao_produto.length < 3){erros2 += "Descrição do produto deve ser informada!<br/>";}
    if(marca_produto.length < 3){erros2 += "Marca do produto deve ser informada!<br/>";}
    if(vencimento_produto.length < 10){erros2 += "Vencimento do produto deve ser informada!<br/>";}
    if(quantidade_produto <= 0){erros2 += "Quantidade do produto deve ser informada!<br/>";}
    if(parseFloat(valor_produto) < 0 || valor_produto.length <=0 ){erros2 += "Valor do produto deve ser informado!<br/>";}
    if(parseFloat(total_produto) < 0 ){erros2 += "Total do produto deve ser informada!<br/>";}
    
    if(erros2.length > 0){
        $("#erros-cotacao").html("").css({'color':'red'});
            $("#erros-cotacao").html(erros2).css({'color':'red'});

        setTimeout(function () {
        $("#erros-cotacao").html("").css({'color':'red'});
        }, 2000);
    }else{
    cols += "<td>\n\
<input type='hidden' name='array_id_fornecedor[]' value='" + id_fornecedor + "'/>\n\
<input type='hidden' name='array_descricao_fornecedor[]' value='" + descricao_fornecedor + "'/>\n\
\n\
" + descricao_fornecedor + "</td>";
    cols += "<td><input type='hidden' name='array_id_produto[]' value='" + id_produto + "'/><input type='hidden' name='array_descricao_produto[]' value='" + descricao_produto + "'/>" + descricao_produto + "</td>";
    cols += "<td><input type='hidden' name='array_marca_produto[]' value='" + marca_produto + "'/>" + marca_produto + "</td>";
    cols += "<td><input type='hidden' name='array_vencimento_produto[]' value='" + vencimento_produto + "'/>" + vencimento_produto + "</td>";
    cols += "<td><input type='hidden' name='array_quantidade_produto[]' value='" + quantidade_produto + "' />" + quantidade_produto + "</td>";
    cols += "<td><input type='hidden' name='array_valor_produto[]' value='" + valor_produto + "' />R$ " + valor_produto + "</td>";
    cols += "<td><input type='hidden' name='array_total_produto[]' value='" + total_produto + "' />R$ " + total_produto + "</td>";
    cols += '<td class="actions">';
    cols += '<button class="btn btn-mini btn-danger remove-linha" type="button">X</button>';
    cols += '</td>';
      
        newRow.append(cols);
      
        $("table#table-produtos-cotacao tbody").append(newRow); 
        somarValores();
        $("#vencimento_produto").val("");
        document.getElementById("quantidade_produto").value = "0";
        $("#valor_produto").val("");
        $("#total_produto").val("");
        
        //$("span#total-produto-selecionado p").html("R$ 0,00");
        //limpar campos
//        $(":text",$("#div-itens-compra")).each(function () {
//            $(this).val("");
//        }); 
        
        //document.getElementById("quantidade_produto").value = "1";
        
         //$("#id_produto").focus();
    }
     });
     
     
     $(".div-tabela-produtos").on('click','table#table-produtos-cotacao tbody tr td button.remove-linha',function(){
         var tr = $(this).closest('tr');
         
         tr.fadeOut(400, function(){ 
            tr.remove(); 
            somarValores();
          });
         
         
         
     });
     
     somarValores = function(){
      
      //somando valores
        
        var valor_itens = new Array();
 var rend = 0;
  $("input[name='array_total_produto[]']").each(function(){
     valor_itens.push($(this).val());
  });
  
  for(var x=0;x<valor_itens.length;x++){
      rend = rend + parseFloat(valor_itens[x].replace('.','').replace(',','.').replace('R$',''));
  }

            $("span.total-tabela-produtos").html(rend.toLocaleString("pt-BR", { style: "currency" , currency:"BRL"}));
           // $("#valor_compra").val(rend.toLocaleString('pt-br', {minimumFractionDigits: 2}));
        
        
        
        //somarTotalCotacao();
      
  }
  
  somarTotalCotacao = function(){


 var valor_itens = new Array();
 var rend = 0;
  $("input[name='array_total_produto[]']").each(function(){
     valor_itens.push($(this).val());
  });
  
  for(var x=0;x<valor_itens.length;x++){
      rend = rend + parseFloat(valor_itens[x].replace('.','').replace(',','.').replace('R$',''));
  }
           
var valor_itens2 = new Array();
 var rend2 = 0;
  $("input[name='array_total_servico[]']").each(function(){
     valor_itens2.push($(this).val());
  });
  
  for(var x=0;x<valor_itens2.length;x++){
      rend2 = rend2 + parseFloat(valor_itens2[x].replace('.','').replace(',','.').replace('R$',''));
  }

        
      var total = rend + rend2;
      $("span#total_da_cotacao strong").html(total.toLocaleString("pt-BR", { style: "currency" , currency:"BRL"}));
  }
  
  
  //CONTROLE FORMA DE PAGAMENTO
$("#descricao_forma_pagamento").autocomplete({
    autoFocus: true,
    source: function(request, response){
        $.ajax({
            url: '<?= DOMINIO ?>formapagamento/jsonautocomplete',
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
            $("#id_forma_pagamento").val(ui.item.codigo); 
        }
});

$("#id_forma_pagamento").on('keyup', function(){
if($.isNumeric($(this).val())){
    $.ajax({
            url: '<?= DOMINIO ?>formapagamento/listarporcodigo',
            type: 'post',
            dataType: 'html',
            data: {
                'id' : $(this).val()
            },
           success: function(retorno){
               $("#descricao_forma_pagamento").val(retorno);                 
           }         
        });
}else{
$("#descricao_forma_pagamento").val("Valor informado é inválido!");
$("#id_forma_pagamento").val("");
}
});
//FINAL CONTROLE FORMA DE PAGAMENTO   
        
auto_complete($("#descricao_fornecedor"),'<?= DOMINIO ?>empresafornecedor/jsonautocomplete',$("#id_fornecedor"));
auto_complete($("#descricao_prestador"),'<?= DOMINIO ?>empresafornecedor/jsonautocomplete',$("#id_prestador"));
       
function auto_complete(input_complete, urll, input_id){
        input_complete.autocomplete({
        autoFocus: true,
        source: function(request, response){
        $.ajax({
        url: urll,
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
        input_id.val(ui.item.codigo); 
        }
        });
        }

//CONTROLE FORNECEDOR

prestador_fornecedor_por_codigo($("#id_fornecedor"), $("#descricao_fornecedor"));
prestador_fornecedor_por_codigo($("#id_prestador"), $("#descricao_prestador"));

function prestador_fornecedor_por_codigo(id_key_up, descricao){
    
    id_key_up.on('keyup', function(){
if($.isNumeric($(this).val())){
    $.ajax({
            url: '<?= DOMINIO ?>empresafornecedor/listarporcodigo',
            type: 'post',
            dataType: 'html',
            data: {
                'id' : $(this).val()
            },
           success: function(retorno){
               descricao.val(retorno);                 
           }         
        });
}else{
descricao.val("Valor informado é inválido!");
id_key_up.val("");
}
});  
}
//FINAL CONTROLE FORNECEDOR 

//CONTROLE PRODUTO
$("#descricao_produto").autocomplete({
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
            $("#valor_produto").val(ui.item.valor.replace(',','').replace('.',',')); 
        }
});

$("#id_produto").on('keyup', function(){
if($.isNumeric($(this).val())){
    $.ajax({
            url: '<?= DOMINIO ?>produto/listarporcodigo',
            type: 'post',
            dataType: 'html',
            data: {
                'id' : $(this).val()
            },
           success: function(retorno){
               
               var dados = retorno.split(';');
               
               $("#descricao_produto").val(dados[0]);                 
               $("#marca_produto").val(dados[1]);                 
               $("#valor_produto").val(dados[2].replace(',','').replace('.',','));                 
           }         
        });
}else{
$("#descricao_produto").val("Valor informado é inválido!");
$("#id_produto").val("");
}
});
//FINAL CONTROLE PRODUTO 

$("#button-forma-pagamento").on('click', function(){
    
$.ajax({
    
            url: '<?= DOMINIO ?>formapagamento/modalFormaPagamento',
            type: 'post',
            dataType: 'html',
            cache: false,
            contentType: false,
            processData: false,  
            success: function(retorno){
                
                $("#modal_table .modal-title").html("&nbsp;Produtos");
                $("#modal_table #tabela_aqui").html(retorno);

$('#tbl-forma-pagamento').DataTable();
}
    
});
    $("#modal_table").modal('show');
});











$("#id_forma_pagamento").on('keyup', function(){
if($.isNumeric($(this).val())){
    $.ajax({
            url: '<?= DOMINIO ?>formapagamento/listarporcodigo',
            type: 'post',
            dataType: 'html',
            data: {
                'id' : $(this).val()
            },
           success: function(retorno){
               $("#descricao_forma_pagamento").val(retorno);                 
           }         
        });
}else{
$("#descricao_forma_pagamento").val("Valor informado é inválido!");
$("#id_forma_pagamento").val("");
}
});





$("#button-fornecedor").on('click', function(){
$(".modal-header h4").html('<i class="fa fa-plus"></i>&nbsp;Novo Fornecedor');
$("#modal_fornecedor").modal('show');
});

$("#button-produto").on('click', function(){

$(".modal-header h4").html('<i class="fa fa-plus"></i>&nbsp;Novo Produto');
$("#modal_produto").modal('show');
});

/*CIDADE DO MODAL FORNECEDOR*/

$("#modal_fornecedor").on('keyup','#id_cidade', function(){
    
if($.isNumeric($(this).val())){
    $.ajax({
            url: '<?= DOMINIO ?>cidade/listarporcodigo',
            type: 'post',
            dataType: 'html',
            data: {
                'id' : $(this).val()
            },
           success: function(retorno){
               $("#descricao_cidade").val(retorno);                 
           }
        });
}else{
$("#nome_cidade").val("id inválido");
$("#id_cidade").val("");
}
    
});

$("#button-cidade").on('click', function(){

$("#modal_cidade.modal-header h4").html('<i class="fa fa-plus"></i>&nbsp;Nova Cidade');
$("#modal_cidade").modal('show');
});

/*FINAL MODAL CIDADE*/

$("#descricao_servico").autocomplete({
    autoFocus: true,
    source: function(request, response){
        $.ajax({
            url: '<?= DOMINIO ?>servico/jsonautocomplete',
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
            $("#id_servico").val(ui.item.codigo); 
            $("#valor_servico").val(ui.item.valor.replace(',','').replace('.',',')); 
        }
});

$("#id_servico").on('keyup', function(){
if($.isNumeric($(this).val())){
    $.ajax({
            url: '<?= DOMINIO ?>servico/listarporcodigo',
            type: 'post',
            dataType: 'html',
            data: {
                'id' : $(this).val()
            },
           success: function(retorno){
               
               var dados = retorno.split(';');
               
               $("#descricao_servico").val(dados[0]);              
               $("#valor_servico").val(dados[1].replace(',','').replace('.',','));                 
           }         
        });
}else{
$("#descricao_servico").val("Valor informado é inválido!");
$("#id_servico").val("");
}
});

$("#button-servico").on('click', function(){

$("#modal_servico.modal-header h4").html('<i class="fa fa-plus"></i>&nbsp;Novo Serviço');
$("#modal_servico").modal('show');
});

$(".servicos-cotacao").on('click','#adicionar-servicos-tabela',function(){
        
    var newRow = $("<tr>");
    var cols = "";
    
    var erros2 = "";

    var id_prestador = $("#id_prestador").val();
    var descricao_prestador = $("#descricao_prestador").val();
    var id_servico = $("#id_servico").val();
    var descricao_servico = $("#descricao_servico").val();
    var detalhes_servico = $("#detalhes_servico").val();
    var previsao_servico = $("#previsao_servico").val();
    var quantidade_servico = $("#quantidade_servico").val();
    var valor_servico = $("#valor_servico").val();
    var total_servico = $("#total_servico").val();
    
    
    if(id_prestador.length <= 0){erros2 += "ID do prestador deve ser informado!<br/>";}
    if(descricao_prestador.length < 3){erros2 += "Descricao do prestador deve ser informado!<br/>";}
    if(id_servico.length <= 0){erros2 += "Código do serviço deve ser informado!<br/>";}
    if(descricao_servico.length < 3){erros2 += "Descrição do serviço deve ser informada!<br/>";}
    if(detalhes_servico.length < 3){erros2 += "Detalhes do serviço deve ser informada!<br/>";}
    if(previsao_servico.length < 10){erros2 += "Previsão de entrega do serviço deve ser informada!<br/>";}
    if(quantidade_servico <= 0){erros2 += "Quantidade do serviço deve ser informada!<br/>";}
    
    if(parseFloat(valor_servico) < 0 || valor_servico.length <=0 ){erros2 += "Valor do serviço deve ser informado!<br/>";}
    if(parseFloat(total_servico) < 0 ){erros2 += "Total do serviço deve ser informada!<br/>";}
    
    if(erros2.length > 0){
        $("#erros-cotacao").html("").css({'color':'red'});
            $("#erros-cotacao").html(erros2).css({'color':'red'});

        setTimeout(function () {
        $("#erros-cotacao").html("").css({'color':'red'});
        }, 2000);
    }else{
    cols += "<td><input type='hidden' name='array_id_prestador[]' value='" + id_prestador + "'/><input type='hidden' name='array_descricao_prestador[]' value='" + descricao_prestador + "'/>" + descricao_prestador + "</td>";
    cols += "<td><input type='hidden' name='array_id_servico[]' value='" + id_servico + "'/><input type='hidden' name='array_descricao_servico[]' value='" + descricao_servico + "'/>" + descricao_servico + "</td>";
    cols += "<td><input type='hidden' name='array_detalhes_servico[]' value='" + detalhes_servico + "'/>" + detalhes_servico + "</td>";
    cols += "<td><input type='hidden' name='array_previsao_servico[]' value='" + previsao_servico + "'/>" + previsao_servico + "</td>";
    cols += "<td><input type='hidden' name='array_quantidade_servico[]' value='" + quantidade_servico + "' />" + quantidade_servico + "</td>";
    cols += "<td><input type='hidden' name='array_valor_servico[]' value='" + valor_servico + "' />R$ " + valor_servico + "</td>";
    cols += "<td><input type='hidden' name='array_total_servico[]' value='" + total_servico + "' />R$ " + total_servico + "</td>";
    cols += '<td class="actions">';
    cols += '<button class="btn btn-mini btn-danger remove-linha" type="button">X</button>';
    cols += '</td>';
      
        newRow.append(cols);
      
        $("table#table-servicos-cotacao tbody").append(newRow); 
        somarValores_servico();
        $("#previsao_servico").val("");
        document.getElementById("quantidade_servico").value = "1";
        $("#valor_servico").val("");
        $("#total_servico").val("");
        
        //$("span#total-produto-selecionado p").html("R$ 0,00");
        //limpar campos
//        $(":text",$("#div-itens-compra")).each(function () {
//            $(this).val("");
//        }); 
        
        //document.getElementById("quantidade_produto").value = "1";
        
         //$("#id_produto").focus();
    }
     });
     
$(".div-tabela-servicos").on('click','table#table-servicos-cotacao tbody tr td button.remove-linha',function(){
         var tr = $(this).closest('tr');
         
         tr.fadeOut(400, function(){ 
            tr.remove(); 
            somarValores_servico();
          });
         
         
         
     });

somarValores_servico = function(){
      
      //somando valores
        
        var valor_itens = new Array();
 var rend = 0;
  $("input[name='array_total_servico[]']").each(function(){
     valor_itens.push($(this).val());
  });
  
  for(var x=0;x<valor_itens.length;x++){
      rend = rend + parseFloat(valor_itens[x].replace('.','').replace(',','.').replace('R$',''));
  }

            $("span.total-tabela-servicos").html(rend.toLocaleString("pt-BR", { style: "currency" , currency:"BRL"}));
           // $("#valor_compra").val(rend.toLocaleString('pt-br', {minimumFractionDigits: 2}));

        //fim soma valores
        
        //somarTotalCotacao();
      
  }

var ARRAY_PRODUTOS = new Array();
var ARRAY_SERVICOS = new Array();

$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
    var target = $(e.target).attr("href");
    if ((target == '#tab_4')) {

var html_produto = "";

if($('#table-produtos-cotacao tbody').children().length <= 0){
    $("#clone_tabela_produtos").html("");
}
if($('#table-servicos-cotacao tbody').children().length <= 0){
    $("#clone_tabela_servicos").html("");
}

$("#dados-da-cotacao .data-da-cotacao").html("<h4>Data da cotação: "+ $("#data_cotacao").val() +"</h4>");
$("#dados-da-cotacao .forma-pagamento-da-cotacao").html("<h4>Forma de pagamento: "+ $("#descricao_forma_pagamento").val() +"</h4>");
$("#dados-da-cotacao .descricao-da-cotacao").html("<h4>Título da cotação: "+ $("#titulo_cotacao").val() +"</h4><hr>");
        
        
        //aqui começa produtos

    var ArrayProdutos = new Array();
    
    
    
    var $array_descricao_fornecedor = $("input[name='array_descricao_fornecedor[]']");
var $array_descricao_produto = $("input[name='array_descricao_produto[]']");
var $array_marca_produto = $("input[name='array_marca_produto[]']");
var $array_vencimento_produto = $("input[name='array_vencimento_produto[]']");
var $array_quantidade_produto = $("input[name='array_quantidade_produto[]']");
var $array_valor_produto = $("input[name='array_valor_produto[]']");
var $array_total_produto = $("input[name='array_total_produto[]']");

for(var x = 0; x < $array_descricao_fornecedor.length; x++){
    
    var arr = {
        'descricao_fornecedor' : $($array_descricao_fornecedor[x]).val(),
        'descricao_produto' : $($array_descricao_produto[x]).val(),
        'marca_produto' : $($array_marca_produto[x]).val(),
        'vencimento_produto' : $($array_vencimento_produto[x]).val(),
        'quantidade_produto' : $($array_quantidade_produto[x]).val(),
        'valor_produto' : $($array_valor_produto[x]).val(),
        'total_produto' : $($array_total_produto[x]).val()
    };
    
    ArrayProdutos.push(arr);
    
}



ArrayProdutos.sort(function(a,b){
    return (a.descricao_fornecedor > b.descricao_fornecedor) ? 1 : ((b.descricao_fornecedor > a.descricao_fornecedor) ? -1 : 0);
});




$(".produtos-na-cotacao").hide();

if(ArrayProdutos.length > 0){
    ARRAY_PRODUTOS = ArrayProdutos;
    $(".produtos-na-cotacao").show();
    
    html_produto += "<table class='table table-bordered table-striped'>";
    html_produto += "<tr>";
    html_produto += "<td>Fornecedor</td>";
    html_produto += "<td>Produto</td>";
    html_produto += "<td>Marca</td>";
    html_produto += "<td>Vencimento</td>";
    html_produto += "<td>Quantidade</td>";
    html_produto += "<td>Valor</td>";
    html_produto += "<td>Total</td>";
    html_produto += "</tr>";
    
    
    var total_por_empresaa = 0.00;
    var contadorr = 0;
    
    for(var x = 0; x < ArrayProdutos.length; x++){
        
        total_por_empresaa += parseFloat(ArrayProdutos[x]['total_produto'].toString().replace('.','').replace(',','.'));
        
        html_produto += "<tr>";
        html_produto += "<td>"+ ArrayProdutos[x]['descricao_fornecedor'] +"</td>";
        html_produto += "<td>"+ ArrayProdutos[x]['descricao_produto'] +"</td>";
        html_produto += "<td>"+ ArrayProdutos[x]['marca_produto'] +"</td>";
        html_produto += "<td>"+ ArrayProdutos[x]['vencimento_produto'] +"</td>";
        html_produto += "<td>"+ ArrayProdutos[x]['quantidade_produto'] +"</td>";
        html_produto += "<td>"+ ArrayProdutos[x]['valor_produto'] +"</td>";
        html_produto += "<td>"+ ArrayProdutos[x]['total_produto'] +"</td>";
        html_produto += "</tr>";
        
        if(parseInt(x+1) <= (ArrayProdutos.length-1)){
        if((ArrayProdutos[x]['descricao_fornecedor'] != ArrayProdutos[x+1]['descricao_fornecedor']) )
        {
            html_produto += "<tr><td colspan='6' ALIGN='RIGHT'><strong>TOTAL DO FORNECEDOR ACIMA:</strong></td><td><strong>"+(total_por_empresaa.toLocaleString("pt-BR", { style: "currency" , currency:"BRL"}))+"</strong></td></tr>";
            total_por_empresaa = 0;
        }
        }
        
        if(ArrayProdutos.length > 0){
        
        if(parseInt(x + 1) == ArrayProdutos.length){
           html_produto += "<tr><td colspan='6' ALIGN='RIGHT'><strong>TOTAL DO FORNECEDOR ACIMA:</strong></td><td><strong>"+(total_por_empresaa.toLocaleString("pt-BR", { style: "currency" , currency:"BRL"}))+"</strong></td></tr>";
        }
        
        }
        
    
}



    
    html_produto += "<table>";
    $("#clone_tabela_produtos").html(html_produto);
}else{
    $(".produtos-na-cotacao").hide();
    ARRAY_PRODUTOS = [];
}
    
//    $('#table-produtos-cotacao tbody').children().length
    

//aqui termina produtos

//aquiiii

var $array_descricao_prestador = $("input[name='array_descricao_prestador[]']");
var $array_descricao_servico = $("input[name='array_descricao_servico[]']");
var $array_detalhes_servico = $("input[name='array_detalhes_servico[]']");
var $array_previsao_servico = $("input[name='array_previsao_servico[]']");
var $array_quantidade_servico = $("input[name='array_quantidade_servico[]']");
var $array_valor_servico = $("input[name='array_valor_servico[]']");
var $array_total_servico = $("input[name='array_total_servico[]']");

var ArrayServicos = new Array();


for(var x = 0; x < $array_descricao_prestador.length; x++){
    
    var arr = {
        'descricao_prestador' : $($array_descricao_prestador[x]).val(),
        'descricao_servico' : $($array_descricao_servico[x]).val(),
        'detalhes_servico' : $($array_detalhes_servico[x]).val(),
        'previsao_servico' : $($array_previsao_servico[x]).val(),
        'quantidade_servico' : $($array_quantidade_servico[x]).val(),
        'valor_servico' : $($array_valor_servico[x]).val(),
        'total_servico' : $($array_total_servico[x]).val()
    };
    
    ArrayServicos.push(arr);
    
}

ArrayServicos.sort(function(a,b){
    return (a.descricao_prestador > b.descricao_prestador) ? 1 : ((b.descricao_prestador > a.descricao_prestador) ? -1 : 0);
});
$(".servicos-na-cotacao").hide();
if(ArrayServicos.length > 0){
    ARRAY_SERVICOS = ArrayServicos;
    $(".servicos-na-cotacao").show();
    
    var html_servico = "<table class='table table-bordered table-striped'>";
    html_servico += "<tr>";
    html_servico += "<td>Prestador</td>";
    html_servico += "<td>Serviço</td>";
    html_servico += "<td>Detalhes</td>";
    html_servico += "<td>Previsão</td>";
    html_servico += "<td>Quantidade</td>";
    html_servico += "<td>Valor</td>";
    html_servico += "<td>Total</td>";
    html_servico += "</tr>";
    var total_por_empresa = 0.00;
    var contador = 0;
    
    for(var x = 0; x < ArrayServicos.length; x++){
        
        total_por_empresa += parseFloat(ArrayServicos[x]['total_servico'].toString().replace('.','').replace(',','.'));
        
        html_servico += "<tr>";
        html_servico += "<td>"+ ArrayServicos[x]['descricao_prestador'] +"</td>";
        html_servico += "<td>"+ ArrayServicos[x]['descricao_servico'] +"</td>";
        html_servico += "<td>"+ ArrayServicos[x]['detalhes_servico'] +"</td>";
        html_servico += "<td>"+ ArrayServicos[x]['previsao_servico'] +"</td>";
        html_servico += "<td>"+ ArrayServicos[x]['quantidade_servico'] +"</td>";
        html_servico += "<td>"+ ArrayServicos[x]['valor_servico'] +"</td>";
        html_servico += "<td>"+ ArrayServicos[x]['total_servico'] +"</td>";
        html_servico += "</tr>";
        
        if(parseInt(x+1) <= (ArrayServicos.length-1)){
        if((ArrayServicos[x]['descricao_prestador'] != ArrayServicos[x+1]['descricao_prestador']) )
        {
                html_servico += "<tr><td colspan='6' ALIGN='RIGHT'><strong>TOTAL DO PRESTADOR ACIMA:</strong></td><td><strong>"+(total_por_empresa.toLocaleString("pt-BR", { style: "currency" , currency:"BRL"}))+"</strong></td></tr>";
            total_por_empresa = 0;
        }
        }
        
        if(ArrayServicos.length > 0){
        
        if(parseInt(x + 1) == ArrayServicos.length){
           html_servico += "<tr><td colspan='6' ALIGN='RIGHT'><strong>TOTAL DO PRESTADOR ACIMA:</strong></td><td><strong>"+(total_por_empresa.toLocaleString("pt-BR", { style: "currency" , currency:"BRL"}))+"</strong></td></tr>";
        }
        
        }
        
        
    
}
    
    html_servico += "<table>";
    $("#clone_tabela_servicos").html(html_servico);
}else{
    $(".servicos-na-cotacao").hide();
    ARRAY_SERVICOS = null;
}






if((ArrayServicos.length > 0 || ArrayProdutos.length > 0) && $("#data_cotacao").val().length > 0 && $("#descricao_forma_pagamento").val()){

$(".box-footer.botao-salvarr").show();
    
}else{
    $(".box-footer.botao-salvarr").hide();
}
}

});




/*ENVIAR FORM PARA ALTERAÇÃO*/


    $("#form-alterar-cotacao").submit(function(event){
    event.preventDefault();
    var formDados = new FormData(this);
    //var erros = validarForm("#form-alterar-cotacao");
//    var dados = $(this).serialize();
        
       $.ajax({
        url: '<?=DOMINIO?>cotacao/alterar',
        type: 'POST',
        data: formDados,
        cache: false,
        contentType: false,
        processData: false,
        beforeSend : function() {
//        $(".loader").fadeIn('fast'); //exibe uma imagem de carregando, mas se quiser pode retirar isso

           $("#modal_aguarde").modal('show').fadeIn('fast');
         },
        complete: function() {
                $("#modal_aguarde").modal('hide');
            },
        success: function(data){
 

           $("#modal_alterar_cotacao #erros-cotacao").html(data).css({'color':'blue','font-weight':'bold','font-size':'14pt'}); 
           
           setTimeout(function () {
        $("#modal_alterar_cotacao #erros-cotacao").html(""); 
           $("#modal_alterar_cotacao").modal('hide');
        }, 2000);
           
        },
        error: function (request, status, error) {
            alert(request.responseText);
        }
        
    }); 
    return false;
    
});






     
    
});
    
</script>
