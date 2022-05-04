
<div class="modal fade" id="modal_produto">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-plus"></i>&nbsp;Novo Produto</h4>
              </div>
              <div class="modal-body">
<section class="content">
      <div class="row">
        <div class="col-md-12">

          <div class="box box-success">
            
            <div class="box-body">
                <div class="erros">
                    
                </div>  
             <form method="POST" id="form-produto">

                 
                 
<div class="row">
<div class="col-xs-3">
<div class="form-group">
<label>Código:</label>
<input type="text" value="<?=$id_produto;?>" readonly class="form-control maiusculo" id="id_produto" name="id_produto" placeholder="Código automático">
</div>
</div>
</div>
<div class="row">
<div class="col-xs-12">
<div class="form-group">
<label>Descrição:</label>
<input type="text" class="form-control maiusculo" value="<?=$nome_produto;?>" id="nome_produto" name="nome_produto" placeholder="Insira a Descricao do Produto">
</div>
</div>
</div>


<div class="row">
<div class="col-xs-2">
<div class="form-group">
<label>Id Categoria:</label>
<div class="input-group"> 

    <input type="text" class="form-control maiusculo" readonly value="<?=$id_categoria_produto;?>" id="id_categoria_produto" name="id_categoria_produto" placeholder="XXXX" >

</div>
</div>
</div>
<div class="col-xs-10">
<div class="form-group">
<label>Descrição Categoria:</label>
<input type="text"  class="form-control maiusculo" value="<?=$descricao_categoria_produto;?>" id="descricao_categoria_produto" name="descricao_categoria_produto" placeholder="Descricao da Categoria Produto">
</div>
</div>
</div>


<div class="row">
<div class="col-xs-9">
<div class="form-group">
<label>Marca:</label>
<input type="text" class="form-control maiusculo" value="<?=$marca_produto;?>" id="marca_produto" name="marca_produto" placeholder="Insira a Marca do Produto">
</div>
</div>


<div class="col-xs-3">
<div class="form-group">
<label>Unidade de Medida:</label>
<select class="form-control select2" name="unidade_medida" id="unidade_medida" style="width: 100%;">
<option value="unid" <?=$unidade_medida=='unid'?'selected':'';?> >Unidade(s)</option>
<option value="g" <?=$unidade_medida=='g'?'selected':'';?> >Grama(s)</option>
<option value="kg" <?=$unidade_medida=='kg'?'selected':'';?> >Quilograma(s)</option>
<option value="l" <?=$unidade_medida=='l'?'selected':'';?> >Litro(s)</option>
<option value="m" <?=$unidade_medida=='m'?'selected':'';?> >Metro(s)</option>
<option value="m2" <?=$unidade_medida=='m2'?'selected':'';?> >Metro(s) Quadrado(s)</option>
<option value="m3" <?=$unidade_medida=='m3'?'selected':'';?> >Metro(s) Cúbico(s)</option>
<option value="pct" <?=$unidade_medida=='pct'?'selected':'';?> >Pacote(s)</option>
<option value="caixa" <?=$unidade_medida=='caixa'?'selected':'';?> >Caixa</option>
<option value="sc" <?=$unidade_medida=='sc'?'selected':'';?> >Saco</option>


</select>
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
<input type="text" class="form-control" value="<?=$valor_produto>0?$valor_produto:'0,00';?>" id="valor_produto" name="valor_produto" placeholder="0.00"  onKeyPress="return formataMoeda(this,'.',',',event);">
</div>
</div>
</div>


<div class="col-xs-4">
<div class="form-group">
<label>Estoque Máximo:</label>
<div class="input-group"> 
<div class="input-group-addon">
<i class="fa fa-plus"></i>
</div>
<input type="text" class="form-control" value="<?=$estoque_maximo>0?$estoque_maximo:'0';?>" id="estoque_maximo" name="estoque_maximo">
</div>
</div>
</div>

<div class="col-xs-4">
<div class="form-group">
<label>Estoque Mínimo:</label>
<div class="input-group"> 
<div class="input-group-addon">
<i class="fa fa-minus"></i>
</div>
<input type="text" class="form-control" value="<?=$estoque_minimo>0?$estoque_minimo:'0';?>" id="estoque_minimo" name="estoque_minimo">
</div>
</div>
</div>




</div>

<div class="form-group">
<label>Observações/detalhes:</label>
<textarea class="form-control maiusculo" id="detalhes_produto" name="detalhes_produto" rows="10" placeholder="Insira todos os códigos um sob o outro..."><?=$detalhes_produto;?></textarea>
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
    
 //jQuery.noConflict();
    

    $("#form-produto").each (function(){
  this.reset();
});
    
    $("#form-produto .erros").html(""); 
    
    $("#form-produto").submit(function(event){
    event.preventDefault();
    var formDados = new FormData($(this)[0]);
    var erros = validarForm("#form-produto");
    if(erros.length > 0){
        
        
        
        $("#modal_produto .erros").html(erros).css({'color':'red','font-weight':'bold','font-size':'10pt'}); 
        setTimeout(function () {
        $("#modal_produto .erros").html("");
        }, 3000);
        
        return false;
    }else{
        
       $.ajax({
        url: '<?=DOMINIO?>produto/inserir',
        type: 'POST',
        data: formDados,
        cache: false,
        contentType: false,
        processData: false,
        success: function(data2){
 
           $("#modal_produto .erros").html("Operação realizada com sucesso!").css({'color':'blue','font-weight':'bold','font-size':'14pt'}); 
           limparForm("#form-produto");
           
           setTimeout(function () {
        $("#modal_produto .erros").html(""); 
           $("#modal_produto").modal('hide');
        }, 2000);
           
        }
        
    }); 
    return false;
    } 
});

function validarForm(form){
var erros = "";
   
    erros += $("#form-produto #nome_produto").val().length < 3 ? "Descrição do produto inválida!<br>"  : "";
        //erros += !$.isNumeric($("#form-produto #id_categoria_produto").val()) ? "Código da categoria do produto inválido!<br>"  : "";
        //erros += $("#form-produto #descricao_categoria_produto").val().length < 3 ? "Descrição da categoria do produto inválida!<br>"  : "";
        //erros += $("#form-produto #marca_produto").val().length < 3 ? "Marca do produto inválida!<br>"  : "";
        //erros += $("#form-produto #valor_produto").val().length < 4 ? "Valor do produto inválido!<br>"  : "";
    return erros;
}

function limparForm(form){
    $(form).each (function(){
  this.reset();
});
}





$("#form-produto #descricao_categoria_produto").autocomplete({
    autoFocus: true,
    source: function(request, response){
        $.ajax({
            url: '<?= DOMINIO ?>categoriaproduto/jsoncategoriaproduto',
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
            $("#form-produto #id_categoria_produto").val(ui.item.codigo); 
        }
});


$("#id_categoria_produto").on('keyup', function(){
if($.isNumeric($(this).val())){
    $.ajax({
            url: '<?= DOMINIO ?>categoriaproduto/listarcategoriaporcodigo',
            type: 'post',
            dataType: 'html',
            data: {
                'id' : $(this).val()
            },
           success: function(retorno){
               $("#form-produto #descricao_categoria_produto").val(retorno);                 
           }         
        });
}else{
$("#form-produto #descricao_categoria_produto").val("Valor informado é inválido!");
$("#form-produto #id_categoria_produto").val("");
}
});



});
</script>