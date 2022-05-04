<div class="modal fade" id="modal_contribuinte">
          <div class="modal-dialog modal-lg" style="width: 90%;">
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
              
            
                
                <form method="POST" id="form-contribuinte">
              
             <div class="row">
                <div class="col-xs-3">
                    <div class="form-group">
                        <label>Código:</label>
                        <input type="text" readonly class="form-control" id="id_contribuinte" name="id_contribuinte" placeholder="Código automático">
                    </div>
                    </div>
                    
                    <div class="col-xs-3">
                  <div class="form-group">
                <label>Data cadastro:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                    <input type="text" class="form-control"  value="<?=date('d/m/Y')?>" id="data_cadastro" name="data_cadastro" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask placeholder="dd/mm/yyyy">
                </div>
                <!-- /.input group -->
              </div>
                </div>
                 
                 <div class="col-xs-3">
                  <div class="form-group">
                <label>Primeira contribuição:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                    <input type="text" class="form-control"  value="<?=date('d/m/Y')?>" id="primeira_contribuicao" name="primeira_contribuicao" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask placeholder="dd/mm/yyyy">
                </div>
                <!-- /.input group -->
              </div>
                </div>
                    
                    
                    
                    <div class="col-xs-3">
                  <div class="form-group">
                     
                      <label>Status:</label><br>                      
                      
                      <input type="checkbox" checked name="status_contribuinte" value="ativo" data-toggle="toggle" data-on="Ativo" data-off="Inativo" data-width="100%" data-onstyle="success" data-offstyle="danger">
                      
                      
                  </div>
                </div> 
                    
                    
                
                 </div>
                    <div class="row">
                <div class="col-xs-12">
                  <div class="form-group">
                        <label>Nome / Razão Social:</label>
                  <input type="text" class="form-control required" id="nome_razao_social" name="nome_razao_social" placeholder="Insira o nome ou razão social">
                    </div>
                </div>
              </div>
                    
                    
                    
                    <div class="row">
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label>Tipo Pessoa:</label>
                                <select class="form-control" name="tipo_pessoa_fis_jur" id="tipo_pessoa_fis_jur" style="width: 100%;">
                                    <option>Selecione</option> 
                                    <option value="fisica">Física</option> 
                                    <option value="juridica">Jurídica</option> 
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-5">
                            <div class="form-group">
                                <label id="cpf-cnpj">CPF / CNPJ:</label>
                                <input type="text" class="form-control required" id="cpf_cnpj" name="cpf_cnpj" placeholder="Insirao cpf ou cnpj">
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label id="cpf-cnpj">Inscrição Estadual:</label>
                                <input type="text" class="form-control" id="inscricao_estadual" name="inscricao_estadual" placeholder="Insira a Inscrição Estadual">
                            </div>
                        </div>  
                    </div>
                     
                    

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Salvar</button>
                <a class="btn btn-default" href="http://<?=SITE_ROOT?>contribuinte/listagem">Cancelar</a>
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
    
    $("#modal_contribuinte .erros").html(""); 
    $("#form-contribuinte").submit(function(event){
    event.preventDefault();
     
    var formDados = new FormData($(this)[0]);
      
    var erros = validarForm($(this)[0]);
    if(erros.length > 0){
        $("#modal_contribuinte .erros").html(erros).css({'color':'red','font-weight':'bold','font-size':'14pt'}); 
        return false;
    }else{
        
       $.ajax({
        url: '<?=DOMINIO?>contribuinte/inserir',
        type: 'POST',
        data: formDados,
        cache: false,
        contentType: false,
        processData: false,
        success: function(data){
 

           $("#modal_contribuinte .erros").html(data).css({'color':'blue','font-weight':'bold','font-size':'14pt'}); 
           limparForm("#form-contribuinte");
           
           setTimeout(function () {
        $("#modal_contribuinte .erros").html(""); 
           $("#modal_contribuinte").modal('hide');
        }, 2000);
           
        }
        
    }); 
    return false;
    } 
});



$("#id_tipo_contribuinte").on('keyup', function(){
if($.isNumeric($(this).val())){
    $.ajax({
            url: '<?= DOMINIO ?>tipocontribuinte/listarporcodigo',
            type: 'post',
            dataType: 'html',
            data: {
                'id' : $(this).val()
            },
           success: function(retorno){
               
               if(retorno.length > 0){
                   $("#descricao_tipo_contribuinte").val(retorno); 
               }else{
                   $("#id_tipo_contribuinte").val(""); 
                   $("#descricao_tipo_contribuinte").val(""); 
               }
               
               
           }
        });
}else{
$("#id_tipo_contribuinte").val(""); 
$("#descricao_tipo_contribuinte").val(""); 
}
});

$("#id_cidade").on('keyup', function(){
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

        $.ajax({
            url: '<?= DOMINIO ?>cidade/modalCidades',
            type: 'post',
            dataType: 'html',
            cache: false,
            contentType: false,
            processData: false, 
            success: function(retorno){
                $("#modal_table_2 .modal-title").html("&nbsp;Tipo da Despesa");
                $("#modal_table_2 #tabela_aqui").html(retorno);
                $('#tbl-cidade').DataTable();
            }
});
    $("#modal_table_2").modal('show');
});

$("#button-tipo-contribuinte").on('click', function(){ 
        $.ajax({
            url: '<?= DOMINIO ?>tipocontribuinte/modalTipoContribuinte',
            type: 'post',
            dataType: 'html',
            cache: false,
            contentType: false,
            processData: false,  
            success: function(retorno){
                $("#modal_table_2 .modal-title").html("&nbsp;Tipo de Contribuinte");
                $("#modal_table_2 #tabela_aqui").html(retorno);
                $('#tbl-tipo-contribuinte').DataTable();
            }
});
    $("#modal_table_2").modal('show');
});




function validarForm(form){
var erros = "";

//    if($(form+" #nome_razao_social").val().length < 2){
//        erros += "Nome/Razão Social inválida!";
//    } 
//    if($(form+" #bairro").val().length < 2){
//        erros += "Bairro inválido!";
//    } 
//    if($(form+" #cep").val().length < 2){
//        erros += "CEP inválido!";
//    } 
//    if($(form+" #cpf_cnpj").val().length < 2){
//        erros += "CPF/CNPJ inválido!";
//    } 
//    if($(form+" #email").val().length < 2){
//        erros += "E-mail inválido!";
//    } 
//    if($(form+" #endereco").val().length < 2){
//        erros += "Endereço inválido!";
//    } 
//    if($(form+" #inscricao_estadual").val().length < 2){
//        erros += "Inscrição Estadual inválida!";
//    } 
//    if($(form+" #n_casa").val().length < 2){
//        erros += "Número da casa/local  inválido!";
//    } 
//    if($(form+" #id_cidade").val().length < 2){
//        erros += "Cidade inválida!";
//    } 
//    if($(form+" #telefone_celular").val().length < 2){
//        erros += "telefone celular inválido!!";
//    } 
//    if($(form+" #telefone_fixo").val().length < 2){
//        erros += "Telefone fixo inválido!";
//    } 
//    if($(form+" #tipo_pessoa_fis_jur").val().length < 2){
//        erros += "Tipo pessoa Fisica/Juridica inválida!";
//    } 
    
    
    
    return erros;
}



function limparForm(form){
    $(form).each (function(){
  this.reset();
});
}
});
</script>