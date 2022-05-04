<div class="modal fade" id="modal_conta_bancaria">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-plus"></i>&nbsp;Nova Conta Bancária</h4>
              </div>
              <div class="modal-body">
<section class="content">
      <div class="row">
        <div class="col-md-12">

          <div class="box box-success">
            
            <div class="box-body">
                <div class="erros">
                    
                </div>  
                <form method="POST" id="form-conta-bancaria">
           
                    
                    <div class="row">
                <div class="col-xs-3">
                    <div class="form-group">
                        <label>Código:</label>
                        <input type="text" disabled class="form-control" id="id_conta_bancaria" name="id_conta_bancaria" placeholder="Código automático">
                    </div>
                </div>
                 </div>
                    <div class="row">
                <div class="col-xs-12">
                  <div class="form-group">
                        <label>Descrição:</label>
                  <input type="text" class="form-control" id="descricao_conta" name="descricao_conta" placeholder="Insira a Descricao">
                    </div>
                </div>
              </div>
                    
                    
                    <div class="row">
                <div class="col-xs-5">
                  <div class="form-group">
                <label>Data Lançamento:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                    <input type="text" class="form-control"  value="<?=date('d/m/Y')?>" id="data_conta" name="data_conta" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask placeholder="dd/mm/yyyy">
                </div>
                <!-- /.input group -->
              </div>
                </div>
                        <div class="col-xs-5">
                  <div class="form-group">
                        <label>Saldo Inicial:</label>
                        <div class="input-group"> 
                            <div class="input-group-addon">
                    <i class="fa fa-dollar"></i>
                  </div>
                  <input type="text" class="form-control" id="saldo_inicial_conta" name="saldo_inicial_conta" placeholder="0.00"  onKeyPress="return formataMoeda(this,'.',',',event);">
                    </div>
                  </div>
                </div>
              </div>
                    
                    <div class="row">
                <div class="col-xs-6">
                  <div class="form-group">
                <label>Tipo de conta:</label>
                <input type="text" class="form-control" id="tipo_conta" name="tipo_conta" placeholder="" >
                    </div>
                </div>
                        <div class="col-xs-6">
                  <div class="form-group">
                      <label>Status</label>
                      <br/>
                      
                      <input type="radio" name="status_conta" value="ativa" class="flat-red" checked>
                <label>Ativa</label>
                
                <input type="radio" name="status_conta" value="inativa" class="flat-red">
                <label>Inativa</label>
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
    
    $(".erros").html(""); 
    $("#form-conta-bancaria").submit(function(event){
    event.preventDefault();
    var formDados = new FormData($(this)[0]);
    var erros = validarForm("#form-conta-bancaria");
    if(erros.length > 0){
        $(".erros").html(erros).css({'color':'red','font-weight':'bold','font-size':'14pt'}); 
        return false;
    }else{
        
       $.ajax({
        url: '<?=DOMINIO?>contabancaria/inserir',
        type: 'POST',
        data: formDados,
        cache: false,
        contentType: false,
        processData: false,
        success: function(data){
 
           $(".erros").html(data).css({'color':'blue','font-weight':'bold','font-size':'14pt'}); 
           limparForm("#form-conta-bancaria");
           
           setTimeout(function () {
        $(".erros").html(""); 
           $("#modal_conta_bancaria").modal('hide');
        }, 2000);
           
        }
        
    }); 
    return false;
    } 
});

function validarForm(form){
var erros = "";
    if($(form+" #descricao_conta").val().length <= 2){
        erros += "Descrição inválida!";
    }   
    if($(form+" #data_conta").val().length <= 9){
        erros += "data inválida!";
    }   
    if($(form+" #saldo_inicial_conta").val().length <= 0){
        erros += "Saldo inicial inválido!";
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