
<style>
    
    .aprovacao{
        transform: scale(5.5);
    }
    
    .todos input {
    display: none;
}

.todos span {
    width: 12px;
    height: 12px;
    display: block;
    background-color: #fff;
    border: 1px solid #DDD;
}

.todos input:checked + span {
    background-color: #c03;
}
    
</style>


<div class="modal fade" id="modal">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Titulo do Modal</h4>
                
              </div>
                <div class="resposta" style="padding: 5px;"><p></p></div>
                <div class="modal-body" style="overflow-y: scroll;height: 80vh;overflow: auto;">
                   <form id="form-aprovacao-cotacao"> 
                <p>retorno do Modal</p>
                
                <div id="rodape-modal">
                <div class="form-group">
                  <label>Comentários: </label>
                  <textarea class="form-control" id="comentarios_cotacao" name="comentarios_cotacao" rows="10" placeholder="Coloque um comentário sobre a cotação..."></textarea>
                </div>
                
                <div class="box-footer">
                <button type="submit" class="btn btn-primary">Salvar</button>
              </div>
                </div>
                   </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
</div>


<script>

$(function(){
    
//   $(".modal-body p").on("click", 'table#produtos-cotacao tbody tr td a.negar-produto', function(){
//       alert($(this).attr("codigo"));
//   });
//   $(".modal-body p").on("click", 'table#produtos-cotacao tbody tr td a.negar-servico', function(){
//       alert($(this).attr("codigo"));
//   });
//   $(".modal-body p").on("click", 'table#produtos-cotacao tbody tr td a.aprovar-produto', function(){
//       alert($(this).attr("codigo"));
//   });
//   $(".modal-body p").on("click", 'table#produtos-cotacao tbody tr td a.aprovar-servico', function(){
//       alert($(this).attr("codigo"));
//   });
   
   $("#modal").on('hide.bs.modal', function(){
    $("#rodape-modal").hide();
  });

   $("#rodape-modal").hide();
   
   
   $("#form-aprovacao-cotacao").submit(function(e){
       e.preventDefault();
       var formDados = new FormData($(this)[0]);
       
       
       var erros = "";
    
     var checado_servico = $(this).find("input[name='aprovar_servico[]']:checked").length > 0;
     var checado_produto = $(this).find("input[name='aprovar_produto[]']:checked").length > 0;
        
        if(!checado_servico && !checado_produto) erros += "Pelo menos um Produto ou Serviço deve ser selecionado!<br>";
        
        
        if(erros.length > 0){
            alert(erros);
        }else{
            
            $.ajax({
        url: '<?=DOMINIO?>cotacao/aprovar',
        type: 'POST',
        data: formDados,
        cache: false,
        contentType: false,
        processData: false,
        success: function(data){
 
           $("#modal .resposta p").html(data).css({'color':'blue','font-weight':'bold','font-size':'14pt'}); 
           //limparForm("#form-cidade");
           
           setTimeout(function () {
        $("#modal .resposta p").html(""); 
           $("#modal").modal('hide');
        }, 2000);
           
        }
        
    });
            
        }
       
       
       
       
       return false;
   });
   
   
   function validarForm(form){
var erros = "";
    
     var checado = $(this).find("input[name='aprovar_servico[]']:checked").length > 0;
        
        if(!checado) erros += "Pelo menos um PERÍODO deve ser selecionado!<br>";
    
    return erros;
}

$(".modal-body p").on('change',"table tbody tr td input[type='checkbox']", function(){
        
});


$(".modal-body").on('change','#form-aprovacao-cotacao', function(){
    var checado = $(this).find("input[type='checkbox']:checked").length > 0;
        
        
        if(!checado){
            $("#rodape-modal").hide();
        }else{
            $("#rodape-modal").show();
        }
        
        
});

$(".modal-body").on('click','#form-aprovacao-cotacao .todos', function(){
   
     var id = $(this).attr('id');   
       
        $("."+id).each(function(){
            
            if($(this).prop('checked') == false){
                $(this).prop('checked',true);
            }else{
                $(this).prop('checked',false);
            }
            
        });
        
        
        
});
   
    
});

</script>

