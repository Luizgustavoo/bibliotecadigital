<div class="modal fade" id="modal_fornecedor">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-plus"></i>&nbsp;Novo Empresa Fornecedor</h4>
              </div>
              <div class="modal-body">
<section class="content">
      <div class="row">
        <div class="col-md-12">

          <div class="box box-success">
            
            <div class="box-body">
                <div class="erros">
                    
                </div>  
               <form method="POST" id="form-empresa-fornecedor">
              
             <div class="row">
                <div class="col-xs-3">
                    <div class="form-group">
                        <label>Código:</label>
                        <input type="text" disabled class="form-control" id="id_empresa_fornecedor" name="id_empresa_fornecedor" placeholder="Código automático">
                    </div>
                </div>
                 </div>
                    <div class="row">
                <div class="col-xs-6">
                  <div class="form-group">
                        <label>Nome / Razão Social:</label>
                  <input type="text" class="form-control" id="nome_razao_social" name="nome_razao_social" placeholder="Insira o nome ou razão social">
                    </div>
                </div>
                        
                        
                        <div class="col-xs-6">
                  <div class="form-group">
                        <label>Nome Fantasia:</label>
                  <input type="text" class="form-control" id="nome_fantasia" name="nome_fantasia" placeholder="Insira o nome fantasia">
                    </div>
                </div> 
                        
                        
                        
              </div>
                    
                    
                    
                    <div class="row">
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label>Tipo Pessoa:</label>
                                <select class="form-control select2" name="tipo_pessoa_fis_jur" id="tipo_pessoa_fis_jur" style="width: 100%;">
                                    <option>Selecione</option> 
                                    <option value="fisica">Física</option> 
                                    <option value="juridica">Jurídica</option> 
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-5">
                            <div class="form-group">
                                <label id="cpf-cnpj">CPF / CNPJ:</label>
                                <input type="text" class="form-control" id="cpf_cnpj" name="cpf_cnpj" placeholder="Insirao cpf ou cnpj">
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
    
    $("#form-empresa-fornecedor").each (function(){
  this.reset();
});
    
    $(".erros").html(""); 
    $("#form-empresa-fornecedor").submit(function(event){
    event.preventDefault();
    var formDados = new FormData($(this)[0]);
    var erros = validarForm("#form-empresa-fornecedor");
    if(erros.length > 0){
        
        
        
        $(".erros").html(erros).css({'color':'red','font-weight':'bold','font-size':'10pt'}); 
        setTimeout(function () {
        $(".erros").html("");
        }, 3000);
        
        return false;
    }else{
        
       $.ajax({
        url: '<?=DOMINIO?>empresafornecedor/inserir',
        type: 'POST',
        data: formDados,
        cache: false,
        contentType: false,
        processData: false,
        success: function(data){
 
           $(".erros").html(data).css({'color':'blue','font-weight':'bold','font-size':'14pt'}); 
           limparForm("#form-empresa-fornecedor");
           
           setTimeout(function () {
        $(".erros").html(""); 
           $("#modal_fornecedor").modal('hide');
        }, 2000);
           
        }
        
    }); 
    return false;
    } 
});

function validarForm(form){
var erros = "";
   
    erros += $(form+" #nome_razao_social").val().length < 3 ? "Nome/Razão social inválida!<br>"  : "";
        erros += $(form+" #tipo_pessoa_fis_jur").val().length < 3 ? "Tipo pessoa inválida!<br>"  : "";
        erros += $(form+" #cpf_cnpj").val().length < 11 ? "CPF/CNPJ inválido!<br>"  : "";
        erros += $(form+" #inscricao_estadual").val().length < 3 ? "Inscrição estadual inválida!<br>"  : "";
        
    
    return erros;
}

function limparForm(form){
    $(form).each (function(){
  this.reset();
});
}







$('#descricao_cidade').autocomplete({
    autoFocus: true,
    source: function(request, response){
       
        $.ajax({
            url: '<?= DOMINIO ?>cidade/jsonautocomplete',
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
            $("#form-empresa-fornecedor #id_cidade").val(ui.item.codigo); 
        }
});


$('#modal_fornecedor').on('hide.bs.modal', function (event) {
  limparForm("#form-empresa-fornecedor");
});

});
</script>