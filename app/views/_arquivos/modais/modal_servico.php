
<div class="modal fade" id="modal_servico">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-plus"></i>&nbsp;Novo Serviço</h4>
              </div>
              <div class="modal-body">
<section class="content">
      <div class="row">
        <div class="col-md-12">

          <div class="box box-success">
            
            <div class="box-body">
                <div class="erros">
                    
                </div>  
           <form method="POST" id="form-servico">
              
             <div class="row">
                <div class="col-xs-3">
                    <div class="form-group">
                        <label>Código:</label>
                        <input type="text" disabled class="form-control" id="id_servico" name="id_servico" placeholder="Código automático">
                    </div>
                </div>
                 </div>
                    <div class="row">
                <div class="col-xs-12">
                  <div class="form-group">
                        <label>Descrição:</label>
                  <input type="text" class="form-control" id="descricao_servico" name="descricao_servico" placeholder="Insira a Descricao do Produto">
                    </div>
                </div>
              </div>
                    
                    <div class="row">
                <div class="col-xs-4">
                  <div class="form-group">
                        <label>Valor:</label>
                        <div class="input-group"> 
                            <div class="input-group-addon">
                    <i class="fa fa-dollar"></i>
                  </div>
                  <input type="text" class="form-control" id="valor_servico" name="valor_servico" placeholder="0.00">
                    </div>
                  </div>
                </div>
              </div>
                    

              <div class="box-footer">
                <button type="submit" class="btn btn-warning">Salvar</button>
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
    
 //jQuery.noConflict();

    
    $("#form-servico").each (function(){
  this.reset();
});
    
    $("#form-servico .erros").html(""); 
    
    $("#form-servico").submit(function(event){
    event.preventDefault();
    var formDados = new FormData($(this)[0]);
    var erros = validarForm("#form-servico");
    if(erros.length > 0){
        
        
        
        $("#modal_servico .erros").html(erros).css({'color':'red','font-weight':'bold','font-size':'10pt'}); 
        setTimeout(function () {
        $("#modal_servico .erros").html("");
        }, 3000);
        
        return false;
    }else{
        
       $.ajax({
        url: '<?=DOMINIO?>servico/inserir',
        type: 'POST',
        data: formDados,
        cache: false,
        contentType: false,
        processData: false,
        success: function(data2){
 
           $("#modal_servico .erros").html("Operação realizada com sucesso!" + data2).css({'color':'blue','font-weight':'bold','font-size':'14pt'}); 
           limparForm("#form-servico");
           
           setTimeout(function () {
        $("#modal_servico .erros").html(""); 
           $("#modal_servico").modal('hide');
        }, 2000);
           
        }
        
    }); 
    return false;
    } 
});

function validarForm(form){
var erros = "";        
        erros += $("#form-servico #descricao_servico").val().length < 3 ? "Descrição do serviço inválida!<br>" : "";
        //erros += $("#form-servico #valor_servico").val().length < 3 ? "Valor do serviço inválido!<br>" : "";
       // erros += $("#form-servico #id_categoria_servico").val().length <= 0 ? "Id da categoria de serviço inválido!<br>" : "";
        //erros += $("#form-servico #descricao_categoria_servico").val().length < 3 ? "Descrição da categoria de serviço inválida!<br>" : "";
        
        
    return erros;
}

function limparForm(form){
    $(form).each (function(){
  this.reset();
});
}





$("#form-servico #descricao_categoria_servico").autocomplete({
    autoFocus: true,
    source: function(request, response){
        $.ajax({
            url: '<?= DOMINIO ?>categoriaservico/jsonautocomplete',
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
            $("#form-servico #id_categoria_servico").val(ui.item.codigo); 
        }
});


$("#id_categoria_servico").on('keyup', function(){
if($.isNumeric($(this).val())){
    $.ajax({
            url: '<?= DOMINIO ?>categoriaservico/listarporcodigo',
            type: 'post',
            dataType: 'html',
            data: {
                'id' : $(this).val()
            },
           success: function(retorno){
               $("#form-servico #descricao_categoria_servico").val(retorno);                 
           }         
        });
}else{
$("#form-servico #descricao_categoria_servico").val("Valor informado é inválido!");
$("#form-servico #id_categoria_servico").val("");
}
});


$("#form-servico #button-categoria-servico").on('click', function(){

$("#modal_servico.modal-header h4").html('<i class="fa fa-plus"></i>&nbsp;Nova Categoria de Serviço');
$("#modal_categoria_servico").modal('show');
});


});


</script>

<?php require_once ARQUIVOS . 'modais/modal_categoria_servico.php'; ?>