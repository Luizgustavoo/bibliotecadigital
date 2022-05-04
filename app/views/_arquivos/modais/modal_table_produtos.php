<div class="modal fade" id="modal_table_produtos">
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
   
   $("#modal_table_produtos").on('click','table#tbl-itens-compra tbody tr td a.selecionar-item-compra',function(e){
        e.preventDefault();
        //alert($(this).parent().siblings("td:eq(5)").text());
        var id = $("#modal_table_produtos #id_linha").val();

       $("#"+id).closest('tr').find('td[data-nome] input.id_prod').val($(this).parent().siblings("td:eq(0)").text());
        
         $("#modal_table_produtos").modal('hide');
         
        });
   
     
    
});

</script>