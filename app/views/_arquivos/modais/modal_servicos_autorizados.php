<div class="modal fade" id="modal_servicos_autorizados">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-search-plus"></i>&nbsp;Serviços Autorizados</h4>
              </div>
              <div class="modal-body">
<section class="content">
      <div class="row">
        <div class="col-md-12">

                
            <div id="tabela_aquii">
                
                
                
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
   
   $("#modal_servicos_autorizados").on('click','table#servicos-autorizados tbody tr td a.selecionar-produto',function(e){
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
        
         $("#modal_servicos_autorizados").modal('hide');
         
        });
    
});

</script>