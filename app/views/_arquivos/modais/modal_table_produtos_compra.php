<div class="modal fade" id="modal_table_produtos_compra">
    <div class="modal-dialog" style="width: 70%;">
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
            <input type="hidden" name="id_linha" id="id_linha">
                
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
   
   $("#modal_table_produtos_compra").on('click','table#tbl-itens-compra tbody tr td a.selecionar-item-compra',function(e){
        e.preventDefault();
        //alert($(this).parent().siblings("td:eq(5)").text());
        var id = $("#modal_table_produtos_compra #id_linha").val();

       $("#"+id).closest('tr').find('td[data-nome] input.id_prod').val($(this).parent().siblings("td:eq(2)").text());
       $("#"+id).closest('tr').find('td[data-quantidade] input.quant_pedida').val($(this).parent().siblings("td:eq(5)").text());
       $("#"+id).closest('tr').find('td[data-item-cot] input.id_tem_cot').val($(this).parent().siblings("td:eq(1)").text());
        
         $("#modal_table_produtos_compra").modal('hide');
         
        });
   
     
    
});

</script>