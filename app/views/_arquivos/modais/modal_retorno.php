<div class="modal fade" tabindex="-1" role="dialog" id="modal_retorno">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title danger">Modal title</h5>
        <button type="button" class="close fechar" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary fechar"  data-dismiss="modal">OK</button>
      </div>
    </div>
  </div>
</div>

<script>
  $(function(){
    $(".fechar").on('click', function(){
      $("#modal_retorno").modal('hide')
    })
  });
</script>