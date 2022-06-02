  <?php

  if (isset($view_retorno) && strlen(trim($view_retorno)) > 0) {
    $pos = strripos(strtolower($view_retorno), "erro");
    $pos2 = strripos(strtolower($view_retorno), "falha");
    $pos3 = strripos(strtolower($view_retorno), "inválido");
    $pos4 = strripos(strtolower($view_retorno), "inválida");
    $pos5 = strripos(strtolower($view_retorno), "invalida");
    $pos6 = strripos(strtolower($view_retorno), "invalido");


    if (
      $pos === false &&
      $pos2 === false &&
      $pos3 === false &&
      $pos4 === false &&
      $pos5 === false &&
      $pos6 === false
    ) {
      $classe = 'alert-success';
    } else {
      $classe = 'alert-danger';
    }

    echo '<script>setTimeout(function(){
        $(".alert").fadeOut("slow", function(){
          $(this).alert("close");
        });    
      }, 4000)
      </script>';
    echo  '<div class="mt-3 alert ' . $classe . ' alert-dismissible" id="resposta">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-info"></i> ' . $view_retorno . ' </h4></div>';
  }
  ?>          