<div class="modal fade" id="modal_table_2">
    <div class="modal-dialog modal-lg" style="width: 90%;">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-search-plus"></i>&nbsp;</h4>
              </div>
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
    
    
    $('.modal').on('show.bs.modal', function(){
   var modS = $('.modal').not($(this)),
       modZ = 0;
   modS.each(function(){
      var zIdx = $(this).css('z-index');
      if(zIdx >= modZ){
         modZ = parseInt(zIdx)+1;
      }
   });
   $(this).css('z-index', modZ);
});
    
   
   $("#modal_table").on('click','table#produtos-autorizados tbody tr td a.selecionar-produto',function(e){
        e.preventDefault();

        
        var fornecedor = $(this).parent().siblings("td:eq(7)").text().split('-');
        
        $("#id_produto_cotacao").val($(this).attr('codigo'));
        $("#id_produto").val($(this).parent().siblings("td:eq(0)").text());
        $("#descricao_produto").val($(this).parent().siblings("td:eq(1)").text());
        $("#marca_produto").val($(this).parent().siblings("td:eq(2)").text());
        $("#id_fornecedor").val(fornecedor[0]);
        $("#descricao_fornecedor").val(fornecedor[1]);
        $("#vencimento_produto").val($(this).parent().siblings("td:eq(6)").text());
        $("#quantidade_produto").val($(this).parent().siblings("td:eq(3)").text());
        $("#valor_produto").val($(this).parent().siblings("td:eq(4)").text());
        $("#total_produto").val($(this).parent().siblings("td:eq(5)").text());
        
         $("#modal_table").modal('hide');
         
        });
   $("#modal_table").on('click','table#produtos tbody tr td a.selecionar-produto',function(e){
        e.preventDefault();

        
        var fornecedor = $(this).parent().siblings("td:eq(7)").text().split('-');
        
        $("#id_produto").val($(this).parent().siblings("td:eq(0)").text());
        $("#descricao_produto").val($(this).parent().siblings("td:eq(1)").text());
        $("#marca_produto").val($(this).parent().siblings("td:eq(2)").text());
        //$("#valor_produto").val($(this).parent().siblings("td:eq(4)").text());
        
         $("#modal_table").modal('hide');
         
        });
        
        $("#modal_table").on('click','table#servicos tbody tr td a.selecionar-servico',function(e){
        e.preventDefault();

        
        var fornecedor = $(this).parent().siblings("td:eq(7)").text().split('-');
        
        $("#id_servico").val($(this).parent().siblings("td:eq(0)").text());
        $("#descricao_servico").val($(this).parent().siblings("td:eq(1)").text());
        $("#detalhes_servico").val($(this).parent().siblings("td:eq(2)").text());
        //$("#valor_produto").val($(this).parent().siblings("td:eq(4)").text());
        
         $("#modal_table").modal('hide');
         
        });
        
        $("#modal_table").on('click','table#servicos-autorizados tbody tr td a.selecionar-produto',function(e){
        e.preventDefault();

        
        var fornecedor = $(this).parent().siblings("td:eq(7)").text().split('-');
        
        $("#id_servico_cotacao").val($(this).attr('codigo'));
        $("#id_servico").val($(this).parent().siblings("td:eq(0)").text());
        $("#descricao_servico").val($(this).parent().siblings("td:eq(1)").text());
        $("#detalhes_servico").val($(this).parent().siblings("td:eq(2)").text());
        $("#id_prestador").val(fornecedor[0]);
        $("#descricao_prestador").val(fornecedor[1]);
        $("#previsao_servico").val($(this).parent().siblings("td:eq(6)").text());
        $("#quantidade_servico").val($(this).parent().siblings("td:eq(3)").text());
        $("#valor_servico").val($(this).parent().siblings("td:eq(4)").text());
        $("#total_servico").val($(this).parent().siblings("td:eq(5)").text());
        
         $("#modal_table").modal('hide');
         
        });
        
        
        $("#modal_table").on('click','table#tbl-categoria-despesa tbody tr td a.selecionar-categoria-despesa',function(e){
        e.preventDefault();

        
        
        $("#id_categoria_despesa").val($(this).parent().siblings("td:eq(0)").text());
        $("#descricao_categoria_despesa").val($(this).parent().siblings("td:eq(1)").text());
         $("#modal_table").modal('hide');
         
        });
        
        
        
        $("#modal_table").on('click','table#tbl-forma-pagamento tbody tr td a.selecionar-forma',function(e){
        e.preventDefault();

        
        
        $("#id_forma_pagamento").val($(this).parent().siblings("td:eq(0)").text());
        $("#descricao_forma_pagamento").val($(this).parent().siblings("td:eq(1)").text());
         $("#modal_table").modal('hide');
         
        });
        
        
        
        
        $("#modal_table").on('click','table#tbl-tipo-despesa tbody tr td a.selecionar-tipo-despesa',function(e){
        e.preventDefault();        
        $("#id_tipo_despesa").val($(this).parent().siblings("td:eq(0)").text());
        $("#descricao_tipo_despesa").val($(this).parent().siblings("td:eq(1)").text());
         $("#modal_table").modal('hide');
         
        });
        
        
        
        
        $("#modal_table").on('click','table#tbl-categoria-funcionario tbody tr td a.selecionar-categoria-funcionario',function(e){
        e.preventDefault();        
        $("#id_categoria_funcionario").val($(this).parent().siblings("td:eq(0)").text());
        $("#descricao_categoria_funcionario").val($(this).parent().siblings("td:eq(1)").text());
         $("#modal_table").modal('hide');
         
        });
        
        
        
        
        $("#modal_table_2").on('click','table#tbl-cidade tbody tr td a.selecionar-cidade',function(e){
        e.preventDefault();        
        $("#id_cidade").val($(this).parent().siblings("td:eq(0)").text());
        $("#descricao_cidade").val($(this).parent().siblings("td:eq(1)").text());
         $("#modal_table_2").modal('hide');
         
        });
        
        
        
        
        $("#modal_table_2").on('click','table#tbl-tipo-contribuinte tbody tr td a.selecionar-tipo-contribuinte',function(e){
        e.preventDefault();        
        $("#id_tipo_contribuinte").val($(this).parent().siblings("td:eq(0)").text());
        $("#descricao_tipo_contribuinte").val($(this).parent().siblings("td:eq(1)").text());
         $("#modal_table_2").modal('hide');
         
        });
        
        
        
        
        $("#modal_table").on('click','table#tbl-tipo-contribuicao tbody tr td a.selecionar-tipo-contribuicao',function(e){
        e.preventDefault();        
        $("#id_tipo_contribuicao").val($(this).parent().siblings("td:eq(0)").text());
        $("#descricao_tipo_contribuicao").val($(this).parent().siblings("td:eq(1)").text());
         $("#modal_table").modal('hide');
         
        });
        
        
        
        
        $("#modal_table").on('click','table#tbl-contribuinte tbody tr td a.selecionar-contribuinte',function(e){
        e.preventDefault();        
        $("#id_contribuinte").val($(this).parent().siblings("td:eq(0)").text());
        $("#nome_razao_social").val($(this).parent().siblings("td:eq(1)").text());
         $("#modal_table").modal('hide');
         
        });
        
        
        
        
        $("#modal_table").on('click','table#tbl-conta-bancaria tbody tr td a.selecionar-conta',function(e){
        e.preventDefault();        
        $("#id_conta_bancaria").val($(this).parent().siblings("td:eq(0)").text());
        $("#descricao_conta").val($(this).parent().siblings("td:eq(1)").text());
         $("#modal_table").modal('hide');
         
        });
        
        
        
        
        $("#modal_table").on('click','table#tbl-funcionario tbody tr td a.selecionar-funcionario',function(e){
        e.preventDefault();        
        $("#id_funcionario").val($(this).parent().siblings("td:eq(0)").text());
        $("#nome_funcionario").val($(this).parent().siblings("td:eq(1)").text());
         $("#modal_table").modal('hide');
         
        });
        
        
        $("#modal_table").on('click','table#tbl-funcionario-despesa tbody tr td a.selecionar-funcionario-despesa',function(e){
        e.preventDefault();        
        
        var quantidade_horas = $(this).parent().siblings("td:eq(2)").text();
        var valor_hora = $(this).parent().siblings("td:eq(3)").text().replace("R$","").replace(".","").replace(",",".");
        
        var salario = parseInt(quantidade_horas) * parseFloat(valor_hora);
        
        $("#id_funcionario").val($(this).parent().siblings("td:eq(0)").text());
        $("#nome_funcionario").val($(this).parent().siblings("td:eq(1)").text());
        $("#total_de_horas").val($(this).parent().siblings("td:eq(2)").text());
        $("#valor_hora_funcionario").val($(this).parent().siblings("td:eq(3)").text().replace("R$",""));
        $("#valor_despesa").val(mascaraValor(salario.toFixed(2)));
        $("#total_despesa").val(mascaraValor(salario.toFixed(2)));
         $("#modal_table").modal('hide');
         
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
    
});

</script>