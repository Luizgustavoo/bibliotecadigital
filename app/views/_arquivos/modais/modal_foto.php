<div class="modal fade" id="modal_foto">
    <div class="modal-dialog" style="width: 20%;">
            <div class="modal-content">

              <div class="modal-body">
<section class="content">
      <div class="row">
        <div class="col-md-12">

                
            <div id="tabela_aqui">
                
                
                
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

        $("#modal_table").on('click','table#tbl-cidade tbody tr td a.selecionar',function(e){
        e.preventDefault();        
        $("#id_cidade").val($(this).parent().siblings("td:eq(0)").text());
        $("#nome_cidade").val($(this).parent().siblings("td:eq(1)").text());
        $("#modal_table").modal('hide');
        });

        $("#modal_table").on('click','table#tbl-escolas tbody tr td a.selecionar',function(e){
        e.preventDefault();        
        $("#id_escola").val($(this).parent().siblings("td:eq(0)").text());
        $("#nome_escola").val($(this).parent().siblings("td:eq(1)").text());
        $("#modal_table").modal('hide');
        });

        $("#modal_table").on('click','table#tbl-posto tbody tr td a.selecionar',function(e){
        e.preventDefault();        
        $("#id_posto").val($(this).parent().siblings("td:eq(0)").text());
        $("#nome_posto").val($(this).parent().siblings("td:eq(1)").text());
        $("#modal_table").modal('hide');
        });
        
        $("#modal_table").on('click','table#tbl-pessoa tbody tr td a.selecionar',function(e){
        e.preventDefault();    
        
        var id = $(this).attr('id');
        var name = $(this).attr('name');

            $("#"+id).val($(this).parent().siblings("td:eq(0)").text());
            $("#"+name).val($(this).parent().siblings("td:eq(1)").text() + " - " + $(this).parent().siblings("td:eq(2)").text());
            $("#modal_table").modal('hide');

        if(id == 'id_aluno'){
            $.ajax({
                url: DOMINIO + 'matricula/matriculaexiste',
                type: 'post',
                data: {'id_aluno':$(this).parent().siblings("td:eq(0)").text()},
                dataType: 'html',
                success: function(retorno){
                    if(retorno == 'existe'){

                        $("#modal_retorno .modal-title").html("Erro encontrado!");
                        $("#modal_retorno").addClass('modal-danger');
                        $("#modal_retorno .modal-body p").html("Matrícula já existe para o aluno selecionado!").css({'color':'black'});
                        $("#modal_retorno").modal('show');

                        $("#"+id).val("");
                        $("#"+name).val("");

                    }
                }
            });
        }
        

        });

        function mascaraValor(valor) {
    valor = valor.toString().replace(/\D/g,"");
    valor = valor.toString().replace(/(\d)(\d{8})$/,"$1.$2");
    valor = valor.toString().replace(/(\d)(\d{5})$/,"$1.$2");
    valor = valor.toString().replace(/(\d)(\d{2})$/,"$1,$2");
    return valor                    
}

        $("#modal_table").on('click','a#novo_tipo_despesa',function(e){
        e.preventDefault();
        $("#modal_tipo_despesa").modal('show');
        });
    
        $("#modal_table").on('click','a#novo_categoria_despesa',function(e){
        e.preventDefault();
        $("#modal_categoria_despesa").modal('show');
        });
    
        $("#modal_table").on('click','a#novo_forma_pagamento',function(e){
        e.preventDefault();
        $("#modal_forma_pagamento").modal('show');
        });
    
        $("#modal_table").on('click','a#novo_conta_bancaria',function(e){
        e.preventDefault();
        $("#modal_conta_bancaria").modal('show');
        });
        
        $("#modal_table").on('click','a#novo_tipo_contribuicao',function(e){
        e.preventDefault();
        $("#modal_tipo_contribuicao").modal('show');
        });
        
        $("#modal_table").on('click','a#novo_contribuinte',function(e){
        e.preventDefault();
        $("#modal_contribuinte").modal('show');
        });
        
        $("#modal_table").on('click','a#novo_empresa_fornecedor',function(e){
        e.preventDefault();
        $("#modal_fornecedor").modal('show');
        });
        
        $("#modal_table").on('click','a#novo_produto',function(e){
        e.preventDefault();
        $("#modal_produto").modal('show');
        });

        $("#modal_table").on('click','a#novo_cidade',function(e){
        e.preventDefault();
        $("#modal_cidade").modal('show');
        });
    
        
        $("#modal_table").on('click','a#novo_servico',function(e){
        e.preventDefault();
        $("#modal_servico").modal('show');
        });

        $("#modal_table").on('click','a#novo_categoria_produto',function(e){
        e.preventDefault();
        $("#modal_categoria_produto").modal('show');
        });

        $("#modal_table").on('click','a#novo_categoria_servico',function(e){
        e.preventDefault();
        $("#modal_categoria_servico").modal('show');
        });
        
        
        $("#modal_table").on('click','a#novo_forma_pagamento',function(e){
        e.preventDefault();
        $("#modal_forma_pagamento").modal('show');
        });
    
});

</script>