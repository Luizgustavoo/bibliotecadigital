<?php
                if (isset($view_return)) {
                    
//                    echo $view_return;
                    $pos = strripos( strtolower($view_return), "erro");
                    $pos2 = strripos( strtolower($view_return), "falha");
                    $pos3 = strripos( strtolower($view_return), "inválido");
                    $pos4 = strripos( strtolower($view_return), "inválida");
                    $pos5 = strripos( strtolower($view_return), "invalida");
                    $pos6 = strripos( strtolower($view_return), "invalido");

                    
                    if(
                            $pos === false && 
                            $pos2 === false && 
                            $pos3 === false && 
                            $pos4 === false && 
                            $pos5 === false && 
                            $pos6 === false){
                        ?>
                        <script>
                            new PNotify({
                                title: 'Sucesso',
                                text: '<?=$view_return?>',
                                type: 'success',
                                hide: true,
                                styling: 'bootstrap3'
                            });
                        </script>
                        <?php
                    }else{
                        ?>
                        <script>
                            new PNotify({
                                title: 'Falha',
                                text: '<?=$view_return?>',
                                type: 'error',
                                hide: true,
                                styling: 'bootstrap3'
                            });
                        </script>
                        <?php
                    }

                }
                ?>