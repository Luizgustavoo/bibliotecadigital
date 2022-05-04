<div class="modal fade" id="modal_cidade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-plus"></i>&nbsp;Nova Categoria de Produto</h4>
              </div>
              <div class="modal-body">
<section class="content">
      <div class="row">
        <div class="col-md-12">

          <div class="box box-success">
            
            <div class="box-body">
                <div class="erros">
                    
                </div>  
                <form method="POST" id="form-cidade">
              
             <div class="row">
                <div class="col-xs-3">
                    <div class="form-group">
                        <label>Código:</label>
                        <input type="text" disabled class="form-control" id="id_cidade" name="id_cidade" placeholder="Código automático">
                    </div>
                </div>
                 </div>
                    <div class="row">
                <div class="col-xs-8">
                  <div class="form-group">
                        <label>Nome cidade: </label>
                  <input type="text" class="form-control" id="nome_cidade" name="nome_cidade" placeholder="Insira a cidade">
                    </div>
                </div>
                        
                        <div class="col-xs-4">
                  <div class="form-group">
                <label>Estado:</label>
                <select class="form-control select2" name="estado_cidade" id="estado_cidade" style="width: 100%;">
                <option value="ac">Acre</option> 
		<option value="al">Alagoas</option> 
		<option value="am">Amazonas</option> 
		<option value="ap">Amapá</option> 
		<option value="ba">Bahia</option> 
		<option value="ce">Ceará</option> 
		<option value="df">Distrito Federal</option> 
		<option value="es">Espírito Santo</option> 
		<option value="go">Goiás</option> 
		<option value="ma">Maranhão</option> 
		<option value="mt">Mato Grosso</option> 
		<option value="ms">Mato Grosso do Sul</option> 
		<option value="mg">Minas Gerais</option> 
		<option value="pa">Pará</option> 
		<option value="pb">Paraíba</option> 
		<option value="pr">Paraná</option> 
		<option value="pe">Pernambuco</option> 
		<option value="pi">Piauí</option> 
		<option value="rj">Rio de Janeiro</option> 
		<option value="rn">Rio Grande do Norte</option> 
		<option value="ro">Rondônia</option> 
		<option value="rs">Rio Grande do Sul</option> 
		<option value="rr">Roraima</option> 
		<option value="sc">Santa Catarina</option> 
		<option value="se">Sergipe</option> 
		<option value="sp">São Paulo</option> 
		<option value="to">Tocantins</option>
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