<div class="modal fade" id="modal_categoria_servico">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-plus"></i>&nbsp;Nova Categoria de Serviço</h4>
              </div>
              <div class="modal-body">
<section class="content">
      <div class="row">
        <div class="col-md-12">

          <div class="box box-success">
            
            <div class="box-body">
                <div class="erros">
                    
                </div>  
               <form method="POST" id="form-categoria-servico">
              
             <div class="row">
                <div class="col-xs-3">
                    <div class="form-group">
                        <label>Código</label>
                        <input type="text" disabled class="form-control" id="id_categoria_servico" name="id_categoria_servico" placeholder="Código automático">
                    </div>
                </div>
                 </div>
                    <div class="row">
                <div class="col-xs-12">
                  <div class="form-group">
                        <label>Descrição</label>
                  <input type="text" class="form-control" id="descricao_categoria_servico" name="descricao_categoria_servico" placeholder="Insira a Descricao da Categoria Produto">
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
    
    $("#modal_categoria_servico .erros").html(""); 
    $("#form-categoria-servico").submit(function(event){
    event.preventDefault();
    var formDados = new FormData($(this)[0]);
    var erros = validarForm("#form-categoria-servico");
    if(erros.length > 0){
        $("#modal_categoria_servico .erros").html(erros).css({'color':'red','font-weight':'bold','font-size':'12pt'}); 
        setTimeout(function () {
        $("#modal_categoria_servico .erros").html(""); 
        }, 2000);
        return false;
    }else{
        
       $.ajax({
        url: '<?=DOMINIO?>categoriaservico/inserir',
        type: 'POST',
        data: formDados,
        cache: false,
        contentType: false,
        processData: false,
        success: function(data){
 
           $("#modal_categoria_servico .erros").html(data).css({'color':'blue','font-weight':'bold','font-size':'14pt'}); 
           limparForm("#form-categoria-servico");
           
           setTimeout(function () {
        $("#modal_categoria_servico .erros").html(""); 
           $("#modal_categoria_servico").modal('hide');
        }, 2000);
           
        }
        
    }); 
    return false;
    } 
});

function validarForm(form){
var erros = "";
    if($(form+" #descricao_categoria_servico").val().length <= 2){
        erros += "Descrição inválida!";
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