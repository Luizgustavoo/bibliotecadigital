<div class="modal fade" id="modal_alterar_solicitacao">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-plus"></i>&nbsp;Alterar Cotação</h4>
                
                <small id="erros-solicitacao"></small>
                
              </div>
              <div class="modal-body" style="overflow-y: scroll;height: 80vh; width: 100%;overflow: auto;">
<section class="content">
    
<form method="POST" id="form-alterar-solicitacao">
                
        <div class="row">
        <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1_inicio" data-toggle="tab">Dados da solicitação</a></li>
              <li><a href="#tab_2_produto" data-toggle="tab">Produtos</a></li>
              <li><a href="#tab_3_servico" data-toggle="tab">Serviços</a></li>
              <li id="div-confirma"><a href="#tab_4_confirma" data-toggle="tab">Confirmar</a></li>
              
              
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1_inicio">
<!--                INICIO DOS DADOS DA COTAÇÃO-->
                  
<section>
    <h4 class="textovermelho">Insira os dados da solicitação de compra</h4>
</section>

   <div class="row">
                  <div class="col-xs-3">
                    <div class="form-group">
                        <label>Código:</label>
                        <input type="text" readonly class="form-control" id="id_solicitacao" name="id_solicitacao" placeholder="Código automático">
                    </div>
                </div>
                        
                <div class="col-xs-4">
                <div class="form-group">
                <label>Data do pedido:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                    <input type="text" class="form-control"  value="<?=date('d/m/Y')?>" id="data_solicitacao" name="data_solicitacao" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask placeholder="dd/mm/yyyy">
                </div>
                <!-- /.input group -->
              </div>
                </div>  
       
       <div class="col-xs-3">
                  <div class="form-group">
                <label>Tipo da solicitação:</label>
                <select class="form-control select2" name="tipo_solicitacao" id="tipo_solicitacao" style="width: 100%;">
                <option value="">Selecione um tipo</option> 
                
                    <option value="solicitacao_interna">Solicitação Interna</option>
                    <option value="solicitacao_externa">Solicitação Externa</option>
                    
                
                </select>
              </div>
                </div> 
</div>

<div class="row">
                <div class="col-xs-12">
                    <div class="form-group">
                  <label>Título do pedido:</label>
                  <input type="text" class="form-control" id="titulo_solicitacao" name="titulo_solicitacao" placeholder="Título da solicitação">
                </div>
                </div>
                 </div>


                  
<!--                FIM DOS DADOS DA COTAÇÃO-->
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2_produto">
                
                  <section>
    <h4 class="textovermelho">Insira os dados do PRODUTO</h4>
</section>
                  
                  
                  
                  <div class="row">
                <div class="col-xs-2">
                  <div class="form-group">
                        <label>ID Produto:</label>
                        <div class="input-group"> 
                            
                  <input type="hidden" class="form-control" id="id_produto_cotacao" name="id_produto_cotacao" placeholder="" >
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
                
                      
                   <div class="col-xs-3">
                  <div class="form-group">
                        <label>Quantidade:</label>
                            <input type="number" class="form-control" id="quantidade_produto" name="quantidade_produto" >

                  </div>
                </div>   
                     
                   <div class="col-xs-3">
                  <div class="form-group">
                <label>Prioridade:</label>
                <select class="form-control select2" name="prioridade_solicitacao" id="prioridade_solicitacao" style="width: 100%;">
                <option value="">Selecione uma prioridade</option> 
                
                    <option value="baixo">Baixo</option>
                    <option value="medio">Médio</option>
                    <option value="alto">Alto</option>
                    
                
                </select>
              </div>
                </div>   
                      
                      
                   <div class="col-xs-6">
                  <div class="form-group">
                <label>Motivo solicitação:</label>
                <input type="text" class="form-control" id="motivo_solicitacao_produto" name="motivo_solicitacao_produto" placeholder="Motivo da Solicitação">
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
                          <h3 class="textoazul"><strong>Tabela de Produtos da Solicitação</strong></h3>
                      </div>
                      
                      <table id="table-produtos-cotacao" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Produto</th>
                  <th>Quantidade</th>
                  <th>Prioridade</th>
                  <th>Motivo</th>
                  <th>AÇÃO</th>
                  
                </tr>
                </thead>
                <tbody>
               
                </tbody>

              </table>
                      
                  </div>
                  
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3_servico">
                   <section>
    <h4 class="textovermelho">Insira os dados do SERVIÇO</h4>
</section>
                  
                  
                  
                  <div class="row">
                <div class="col-xs-2">
                  <div class="form-group">
                        <label>ID Serviço:</label>
                        <div class="input-group"> 
                  <input type="hidden" class="form-control" id="id_servico_cotacao" name="id_servico_cotacao" placeholder="" >
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
                        <input type="text" class="form-control" id="detalhes_servico" name="detalhes_servico" placeholder="Detalhes do serviço">
                    </div>
                </div>
                      
                      
              </div>
                  
                  <div class="row">
                
                      
                   <div class="col-xs-3">
                  <div class="form-group">
                        <label>Quantidade:</label>
                            <input type="number" class="form-control" id="quantidade_servico" name="quantidade_produto" >

                  </div>
                </div>   
                     
                   <div class="col-xs-3">
                  <div class="form-group">
                <label>Prioridade:</label>
                <select class="form-control select2" name="prioridade_solicitacao_servico" id="prioridade_solicitacao_servico" style="width: 100%;">
                <option value="">Selecione uma prioridade</option> 
                
                    <option value="baixo">Baixo</option>
                    <option value="medio">Médio</option>
                    <option value="alto">Alto</option>
                    
                
                </select>
              </div>
                </div>   
                      
                      
                   <div class="col-xs-6">
                  <div class="form-group">
                <label>Motivo solicitação:</label>
                <input type="text" class="form-control" id="motivo_solicitacao_servico" name="motivo_solicitacao_servico" placeholder="Motivo da Solicitação">
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
                          <h3 class="textoazul">Tabela de Serviços Cotados</h3>
                      </div>
                      
                      <table id="table-servicos-cotacao" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Serviço</th>
                  <th>Quantidade</th>
                  <th>Prioridade</th>
                  <th>Motivo</th>
                  <th>AÇÃO</th>
                  
                </tr>
                </thead>
                <tbody>
               
                </tbody>

              </table>
                      
                  </div>
                  
                  
                  
                  
                  
                  
              </div>
              <!-- /.tab-pane -->
              
              
              <div class="tab-pane" id="tab_4_confirma">
<!--                INICIO DOS DADOS DA COTAÇÃO-->
<section id="dados-da-cotacao">
    
    <div class="data-da-cotacao"></div>
    <div class="forma-pagamento-da-cotacao"></div>
    <div class="descricao-da-cotacao"></div>
    
</section>

    <div id="conteudo_confirmacao" class="produtos-na-cotacao"><h4>PRODUTOS DA SOLICITAÇÃO</h4></div>
    
    <div id="clone_tabela_produtos"></div>
    
    <hr>
    
    <div class="servicos-na-cotacao"><h4>SERVIÇOS DA SOLICITAÇÃO</h4></div>
    
    <div id="clone_tabela_servicos"></div>
    
<div class="box-footer botao-salvarr">
                <button type="submit" class="btn btn-primary">Salvar</button>
                <a class="btn btn-default" href="http://<?=SITE_ROOT?>solicitacao/listagem">Cancelar</a>
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
  $(function () {
      
      $(".box-footer.botao-salvarr").hide();
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    });
    
    
    $(".box-footer.botao-salvarr").hide();
    
    $("#quantidade_produto, #id_produto, #id_fornecedor, #id_cidade, #id_prestador, #id_servico, #quantidade_servico").bind("keyup blur focus", function(e) {
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
    });
    
</script>

<script src="http://<?=SITE_ROOT;?>/web-pages/bower_components/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script>
    function quantidadeXvalorUnitario(quantidadee, valor){
         var quantidade = quantidadee;
         var valor_unitario = valor.replace('.','').replace(',','.');
         var multiplicacao = (parseInt(quantidade) * parseFloat(valor_unitario));
         return (multiplicacao.toLocaleString('pt-br', {minimumFractionDigits: 2}));
     }
$(function () {
    /*somar total produto*/
    /*fim soma produto*/
    $(".produtos-cotacao").on('click','#limpar-campos-produtos', function(){
        limparCamposProdutos();
    });
    
    $(".servicos-cotacao").on('click','#limpar-campos-servicos', function(){
        limparCamposServicos();
    });
    
    limparCamposProdutos = function(){

    $("#id_produto").val("");
    $("#descricao_produto").val("");
    $("#marca_produto").val("");
    document.getElementById("quantidade_produto").value = "";
    $("#prioridade_solicitacao").val("");
    $("#motivo_solicitacao_produto").val("");
        
    }
    
    
    limparCamposServicos = function(){
        
$("#id_prestador").val("");
$("#descricao_prestador").val("");
$("#id_servico").val("");
$("#descricao_servico").val("");
$("#detalhes_servico").val("");
$("#previsao_servico").val("");
document.getElementById("quantidade_produto").value = "";
$("#valor_servico").val("");
$("#total_servico").val("");
        
    }
    
   /*ADICIONAR PRODUTOS DA COTAÇÃO*/
    
    $(".produtos-cotacao").on('click','#adicionar-produtos-tabela',function(){
        
    var newRow = $("<tr>");
    var cols = "";
    
    var erros2 = "";

    
    var id_produto = $("#id_produto").val();
    var descricao_produto = $("#descricao_produto").val();
    var quantidade_produto = $("#quantidade_produto").val();
    var prioridade_solicitacao = $("#prioridade_solicitacao").val();
    var motivo_solicitacao_produto = $("#motivo_solicitacao_produto").val();
    
    
    if(id_produto <= 0 || id_produto.length<=0 ){erros2 += "Código do produto deve ser informado!<br/>";}
    if(descricao_produto.length < 3){erros2 += "Descrição do produto deve ser informada!<br/>";}
    if(quantidade_produto <= 0){erros2 += "Quantidade do produto deve ser informada!<br/>";}
    if(prioridade_solicitacao.length <= 0){erros2 += "Prioridade do produto deve ser informada!<br/>";}
    if(motivo_solicitacao_produto.length <= 0){erros2 += "Motivo da solicitação do produto deve ser informada!<br/>";}
    
    
    if(erros2.length > 0){
        $(".modal-header h4").html("Erros encontrados!");
            $(".modal-body p").html(erros2).css({'color':'white'});
            $("#modal").addClass('modal-danger');
            $("#modal").modal('show');
        setTimeout(function () {
        $('#modal').modal('hide');
        $("#modal").removeClass('modal-danger');
        }, 2000);
    }else{

    cols += "<td><input type='hidden' name='array_id_produto[]' value='" + id_produto + "'/>" + id_produto + "</td>";
    cols += "<td><input type='hidden' name='array_descricao_produto[]' value='" + descricao_produto + "'/>" + descricao_produto + "</td>";
    cols += "<td><input type='hidden' name='array_quantidade_produto[]' value='" + quantidade_produto + "' />" + quantidade_produto + "</td>";
    cols += "<td><input type='hidden' name='array_prioridade_solicitacao[]' value='" + prioridade_solicitacao + "' />" + prioridade_solicitacao + "</td>";
    cols += "<td><input type='hidden' name='array_motivo_solicitacao_produto[]' value='" + motivo_solicitacao_produto + "' />" + motivo_solicitacao_produto + "</td>";
    cols += '<td class="actions">';
    cols += '<button class="btn btn-mini btn-danger remove-linha" type="button">X</button>';
    cols += '</td>';
      
        newRow.append(cols);
      
        $("table#table-produtos-cotacao tbody").append(newRow); 
        limparCamposProdutos();
        
    }
     });
    
    /*FIM ADICIONAR ITENS COTAÇÃO*/
    
    //remover linha
    
    $(".div-tabela-produtos").on('click','table#table-produtos-cotacao tbody tr td button.remove-linha',function(){
         var tr = $(this).closest('tr');
         
         tr.fadeOut(400, function(){ 
            tr.remove(); 
            somarValores();
          });
         
         
         
     });
     
    
  
    
  });
    







$(".servicos-cotacao").on('click','#adicionar-servicos-tabela',function(){
        
    var newRow = $("<tr>");
    var cols = "";
    
    var erros2 = "";

    var id_servico = $("#id_servico").val();
    var descricao_servico = $("#descricao_servico").val();
    var quantidade_servico = $("#quantidade_servico").val();
    var prioridade_solicitacao_servico = $("#prioridade_solicitacao_servico").val();
    var motivo_solicitacao_servico = $("#motivo_solicitacao_servico").val();
    
    
    
    if(id_servico.length <= 0){erros2 += "Código do serviço deve ser informado!<br/>";}
    if(descricao_servico.length < 3){erros2 += "Descrição do serviço deve ser informada!<br/>";}
    if(quantidade_servico <= 0){erros2 += "Quantidade do serviço deve ser informada!<br/>";}
    if(prioridade_solicitacao_servico.length <= 0){erros2 += "Prioridade do serviço deve ser informada!<br/>";}
    if(motivo_solicitacao_servico.length <= 0){erros2 += "Motivo da solicitação do serviço deve ser informada!<br/>";}
    
    
    
    if(erros2.length > 0){
        $(".modal-header h4").html("Erros encontrados!");
            $(".modal-body p").html(erros2).css({'color':'white'});
            $("#modal").addClass('modal-danger');
            $("#modal").modal('show');
        setTimeout(function () {
        $('#modal').modal('hide');
        $("#modal").removeClass('modal-danger');
        }, 2000);
    }else{
    cols += "<td><input type='hidden' name='array_id_servico[]' value='" + id_servico + "'/>" + id_servico + "</td>";
    cols += "<td><input type='hidden' name='array_descricao_servico[]' value='" + descricao_servico + "'/>" + descricao_servico + "</td>";
    cols += "<td><input type='hidden' name='array_quantidade_servico[]' value='" + quantidade_servico + "' />" + quantidade_servico + "</td>";
    cols += "<td><input type='hidden' name='array_prioridade_solicitacao_servico[]' value='" + prioridade_solicitacao_servico + "' />" + prioridade_solicitacao_servico + "</td>";
    cols += "<td><input type='hidden' name='array_motivo_solicitacao_servico[]' value='" + motivo_solicitacao_servico + "' />" + motivo_solicitacao_servico + "</td>";
    cols += '<td class="actions">';
    cols += '<button class="btn btn-mini btn-danger remove-linha" type="button">X</button>';
    cols += '</td>';
      
        newRow.append(cols);
      
        $("table#table-servicos-cotacao tbody").append(newRow); 
        somarValores_servico();
        $("#previsao_servico").val("");
        document.getElementById("quantidade_servico").value = "0";
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

$("#dados-da-cotacao .data-da-cotacao").html("<h4>Data da solicitacao: "+ $("#data_solicitacao").val() +"</h4>");
$("#dados-da-cotacao .descricao-da-cotacao").html("<h4>Título da solicitação: "+ $("#titulo_solicitacao").val() +"</h4><hr>");
        
        
        //aqui começa produtos

    var ArrayProdutos = new Array();
    
   
var $array_id_produto = $("input[name='array_id_produto[]']");
var $array_descricao_produto = $("input[name='array_descricao_produto[]']");
var $array_quantidade_produto = $("input[name='array_quantidade_produto[]']");
var $array_prioridade_solicitacao = $("input[name='array_prioridade_solicitacao[]']");
var $array_motivo_solicitacao_produto = $("input[name='array_motivo_solicitacao_produto[]']");

for(var x = 0; x < $array_descricao_produto.length; x++){
    
    var arr = {
        'id_produto' : $($array_id_produto[x]).val(),
        'descricao_produto' : $($array_descricao_produto[x]).val(),
        'quantidade_produto' : $($array_quantidade_produto[x]).val(),
        'prioridade_solicitacao' : $($array_prioridade_solicitacao[x]).val(),
        'motivo_solicitacao_produto' : $($array_motivo_solicitacao_produto[x]).val()
    };
    
    ArrayProdutos.push(arr);
    
}



ArrayProdutos.sort(function(a,b){
    return (a.descricao_produto > b.descricao_produto) ? 1 : ((b.descricao_produto > a.descricao_produto) ? -1 : 0);
});




$(".produtos-na-cotacao").hide();

if(ArrayProdutos.length > 0){
    ARRAY_PRODUTOS = ArrayProdutos;
    $(".produtos-na-cotacao").show();
    
    html_produto += "<table class='table table-bordered table-striped'>";
    html_produto += "<tr>";
    html_produto += "<td>Id</td>";
    html_produto += "<td>Produto</td>";
    html_produto += "<td>Quantidade</td>";
    html_produto += "<td>Prioridade</td>";
    html_produto += "<td>Motivo</td>";
    html_produto += "</tr>";
    
    
    
    for(var x = 0; x < ArrayProdutos.length; x++){
        
        
        
        html_produto += "<tr>";
        html_produto += "<td>"+ ArrayProdutos[x]['id_produto'] +"</td>";
        html_produto += "<td>"+ ArrayProdutos[x]['descricao_produto'] +"</td>";
        html_produto += "<td>"+ ArrayProdutos[x]['quantidade_produto'] +"</td>";
        html_produto += "<td>"+ ArrayProdutos[x]['prioridade_solicitacao'] +"</td>";
        html_produto += "<td>"+ ArrayProdutos[x]['motivo_solicitacao_produto'] +"</td>";
        html_produto += "</tr>";
        
        
    
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

var $array_id_servico = $("input[name='array_id_servico[]']");
var $array_descricao_servico = $("input[name='array_descricao_servico[]']");
var $array_quantidade_servico = $("input[name='array_quantidade_servico[]']");
var $array_prioridade_solicitacao_servico = $("input[name='array_prioridade_solicitacao_servico[]']");
var $array_motivo_solicitacao_servico = $("input[name='array_motivo_solicitacao_servico[]']");

var ArrayServicos = new Array();


for(var x = 0; x < $array_descricao_servico.length; x++){
    
    var arr = {
        'id_servico' : $($array_id_servico[x]).val(),
        'descricao_servico' : $($array_descricao_servico[x]).val(),
        'quantidade_servico' : $($array_quantidade_servico[x]).val(),
        'prioridade_solicitacao_servico' : $($array_prioridade_solicitacao_servico[x]).val(),
        'motivo_solicitacao_servico' : $($array_motivo_solicitacao_servico[x]).val()
    };
    
    ArrayServicos.push(arr);
    
}

ArrayServicos.sort(function(a,b){
    return (a.descricao_servico > b.descricao_servico) ? 1 : ((b.descricao_servico > a.descricao_servico) ? -1 : 0);
});
$(".servicos-na-cotacao").hide();
if(ArrayServicos.length > 0){
    ARRAY_SERVICOS = ArrayServicos;
    $(".servicos-na-cotacao").show();
    
    var html_servico = "<table class='table table-bordered table-striped'>";
    html_servico += "<tr>";
    html_servico += "<td>Id</td>";
    html_servico += "<td>Serviço</td>";
    html_servico += "<td>Quantidade</td>";
    html_servico += "<td>Prioridade</td>";
    html_servico += "<td>Motivo</td>";
    html_servico += "</tr>";
    
    for(var x = 0; x < ArrayServicos.length; x++){
                
        html_servico += "<tr>";
        html_servico += "<td>"+ ArrayServicos[x]['id_servico'] +"</td>";
        html_servico += "<td>"+ ArrayServicos[x]['descricao_servico'] +"</td>";
        html_servico += "<td>"+ ArrayServicos[x]['quantidade_servico'] +"</td>";
        html_servico += "<td>"+ ArrayServicos[x]['prioridade_solicitacao_servico'] +"</td>";
        html_servico += "<td>"+ ArrayServicos[x]['motivo_solicitacao_servico'] +"</td>";
        html_servico += "</tr>";

}
    
    html_servico += "<table>";
    $("#clone_tabela_servicos").html(html_servico);
}else{
    $(".servicos-na-cotacao").hide();
    ARRAY_SERVICOS = null;
}






if((ArrayServicos.length > 0 || ArrayProdutos.length > 0) && $("#data_solicitacao").val().length > 0 && $("#titulo_solicitacao").val().length > 0 && $("#tipo_solicitacao").val().length > 0){

$(".box-footer.botao-salvarr").show();
    
}else{
    $(".box-footer.botao-salvarr").hide();
}
}








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
            
            
            
        }
});

$("#id_produto").on('keyup', function(){
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
            $("#descricao_produto").val(retorno[0].nome_produto); 
            $("#marca_produto").val(retorno[0].marca_produto); 
             
               }else{
                   limparCamposProdutos();
               }
               
                        
           }         
        });
}else{
$("#descricao_produto").val("");
$("#id_produto").val("");
}
});
//FINAL CONTROLE PRODUTO 

$("#button-produto").on('click', function(){
    
$.ajax({
    
            url: '<?= DOMINIO ?>produto/modalTodosProdutos',
            type: 'post',
            dataType: 'html',
            cache: false,
            contentType: false,
            processData: false, 
            success: function(retorno){
                var botao = '<button type="button" class="btn btn-primary btn-flat" id="add-produto"><i class="fa fa-plus"></i></button>';
                $("#modal_table .modal-title").html("&nbsp;Produtos &nbsp;&nbsp;"+botao);
                $("#modal_table #tabela_aqui").html(retorno);

$('#produtos').DataTable();
  
                
}
    
});
    $("#modal_table").modal('show');
    


});


$("#button-servico").on('click', function(){
    
$.ajax({
    
            url: '<?= DOMINIO ?>servico/modalTodosServicos',
            type: 'post',
            dataType: 'html',
            cache: false,
            contentType: false,
            processData: false,  
            success: function(retorno){
                
                var botao = '<button type="button" class="btn btn-primary btn-flat" id="add-servico"><i class="fa fa-plus"></i></button>';
                $("#modal_table .modal-title").html("&nbsp;Serviços &nbsp;&nbsp;&nbsp;"+ botao);
                $("#modal_table #tabela_aqui").html(retorno);

$('#servicos').DataTable();
  
                
}
    
});
    $("#modal_table").modal('show');
    


});


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
            $("#detalhes_servico").val(ui.item.categoria); 
             
        }
});


$("#modal_table").on('click', '#add-produto',function(){

$("#modal_produto.modal-header h4").html('<i class="fa fa-plus"></i>&nbsp;Novo Produto');
$("#modal_produto").modal('show');
});
$("#modal_table").on('click', '#add-servico',function(){

$("#modal_servico.modal-header h4").html('<i class="fa fa-plus"></i>&nbsp;Novo Serviço');
$("#modal_servico").modal('show');
});







$("#form-alterar-solicitacao").submit(function(event){
    //alert('entrei aqui');
    var formDados = new FormData(this);
    //var erros = validarForm("#form-alterar-cotacao");
    //var dados = $(this).serialize();
        
       $.ajax({
        url: '<?=DOMINIO?>solicitacaocompra/alterar',
        type: 'POST',
        data: formDados,
        cache: false,
        contentType: false,
        processData: false,
        success: function(retorno){
 
 //alert(retorno);

           $("#modal_alterar_solicitacao  #erros-solicitacao").html(retorno).css({'color':'blue','font-weight':'bold','font-size':'14pt'}); 
           
           setTimeout(function () {
        $("#modal_alterar_cotacao #erros-solicitacao").html(""); 
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


<script src="http://<?=SITE_ROOT;?>/web-pages/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="http://<?=SITE_ROOT;?>/web-pages/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="http://<?=SITE_ROOT;?>/web-pages/js/bootstrap-toggle.min.js" type="text/javascript"></script>
<?php require_once ARQUIVOS . 'modais/modal_forma_pagamento.php'; ?>
<?php require_once ARQUIVOS . 'modais/modal_fornecedor.php'; ?>
<?php require_once ARQUIVOS . 'modais/modal_cidade.php'; ?>
<?php require_once ARQUIVOS . 'modais/modal_table.php'; ?>
<?php require_once ARQUIVOS . 'modais/modal_servico.php'; ?>
<?php require_once ARQUIVOS . 'modais/modal_aguarde.php'; ?>


<?php require_once ARQUIVOS . 'modais/modal_produto.php'; ?>
<?php require_once ARQUIVOS . 'modais/modal_servico.php'; ?>