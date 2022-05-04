<div class="modal fade" id="modal_alterar_banco">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-plus"></i>&nbsp;Alterar Banco da Conta</h4>
              </div>
              <div class="modal-body">
<section class="content">
      <div class="row">
        <div class="col-md-12">

          <div class="box box-success">
            
            <div class="box-body">
                <div class="erros">
                    
                </div>  
                <form method="POST" id="form-alterar-banco">
              
                    <div class="row">
                        
                        <div class="col-xs-12">
                  <div class="form-group">
                <label>Estado:</label>
                <select class="form-control select2" name="banco" id="banco" style="width: 100%;">
                <option value="ac">Acre</option> 
		<option value="al">Alagoas</option> 
		<option value="am">Amazonas</option> 
		<option value="ap">Amapá</option> 
		
                </select>
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
    
    $("#modal_cidade .erros").html(""); 
    $("#form-cidade").submit(function(event){
    event.preventDefault();
    var formDados = new FormData($(this)[0]);
    var erros = validarForm("#form-cidade");
    if(erros.length > 0){
        $("#modal_cidade .erros").html(erros).css({'color':'red','font-weight':'bold','font-size':'14pt'}); 
        return false;
    }else{
        
       $.ajax({
        url: '<?=DOMINIO?>cidade/inserir',
        type: 'POST',
        data: formDados,
        cache: false,
        contentType: false,
        processData: false,
        success: function(data){
 
           $("#modal_cidade .erros").html(data).css({'color':'blue','font-weight':'bold','font-size':'14pt'}); 
           limparForm("#form-cidade");
           
           setTimeout(function () {
        $("#modal_cidade .erros").html(""); 
           $("#modal_cidade").modal('hide');
        }, 2000);
           
        }
        
    }); 
    return false;
    } 
});

function validarForm(form){
var erros = "";
    if($(form+" #nome_cidade").val().length < 2){
        erros += "Nome da cidade inválido!";
    }   
    if($(form+" #estado_cidade").val().length < 2){
        erros += "Estado da cidade inválido!";
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