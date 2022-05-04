<div class="modal fade" id="modal_produtos_autorizados">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-search-plus"></i>&nbsp;Produtos Autorizados</h4>
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
   
   $("#modal_produtos_autorizados").on('click','table#produtos-autorizados tbody tr td a.selecionar-produto',function(e){
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
        
         $("#modal_produtos_autorizados").modal('hide');
         
        });
    
});

</script>