<div class="modal fade" id="modal_tipo_contribuicao">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-plus"></i>&nbsp;Novo Tipo de Contribuição</h4>
              </div>
              <div class="modal-body">
<section class="content">
      <div class="row">
        <div class="col-md-12">

          <div class="box box-success">
            
            <div class="box-body">
                <div class="erros">
                    
                </div>  
              
                <form method="POST" id="form-tipo-contribuicao">
              
             <div class="row">
                <div class="col-xs-3">
                    <div class="form-group">
                        <label>Código</label>
                        <input type="text" readonly class="form-control" id="id_tipo_contribuicao" name="id_tipo_contribuicao" placeholder="Código automático">
                    </div>
                </div>
                 </div>
                    <div class="row">
                <div class="col-xs-12">
                  <div class="form-group">
                        <label>Descrição</label>
                  <input type="text" class="form-control" id="descricao_tipo_contribuicao" name="descricao_tipo_contribuicao" placeholder="Insira a Descricao da Categoria Produto">
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
    
    $("#modal_tipo_contribuicao .erros").html(""); 
    $("#form-tipo-contribuicao").submit(function(event){
    event.preventDefault();
    var formDados = new FormData($(this)[0]);
    var erros = validarForm("#form-tipo-contribuicao");
    if(erros.length > 0){
        $("#modal_tipo_contribuicao .erros").html(erros).css({'color':'red','font-weight':'bold','font-size':'14pt'}); 
        return false;
    }else{
        
       $.ajax({
        url: '<?=DOMINIO?>tipocontribuicao/inserir',
        type: 'POST',
        data: formDados,
        cache: false,
        contentType: false,
        processData: false,
        success: function(data){
 
           $("#modal_tipo_contribuicao .erros").html(data).css({'color':'blue','font-weight':'bold','font-size':'14pt'}); 
           limparForm("#form-tipo-contribuicao");
           
           setTimeout(function () {
        $("#modal_tipo_contribuicao .erros").html(""); 
           $("#modal_tipo_contribuicao").modal('hide');
        }, 2000);
           
        }
        
    }); 
    return false;
    } 
});

function validarForm(form){
var erros = "";
    if($(form+" #descricao_tipo_contribuicao").val().length < 2){
        erros += "descrição do Tipo de Contribuição inválida!";
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