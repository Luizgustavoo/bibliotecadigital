<?php

class TipoLeitor extends Controller
{

    public function index_action()
    {

        session_start();


        // $_SESSION['menu_selecionado'] = '';
        // $_SESSION['categoria_menu'] = '';

        $action = $this->getParams("action");

        $dados['msg'] = $this->getParams("msg");
        $dados['return'] = $this->getParams("return");


        if(!empty($action) && $action == 'update'){
            $id = $this->getParams("id");
            $tipoLeitor = new TipoLeitorModel();
            $dados['tipo_operacao'] = "alterar";
            $dados['update'] = $tipoLeitor ->listarPorCodigo($id);
        }else{
            $dados['tipo_operacao'] = "inserir";
        }


        $this->view("create-update-tipo-leitor", $dados);
        exit();
    }

    public function cadastro()
    {

        $tipoLeitor = new TipoLeitorModel();
        $tipoLeitor->setDescricaoTipo($_POST['descricaoTipo']);
        $tipoLeitor->setStatusTipo($_POST['statusTipo']);
        $dados['tipo_operacao'] = "inserir";
        $dados['retorno'] = $tipoLeitor->inserir();

        $this->view("create-update-tipo-leitor", $dados);
    }

    public function listagem()
    {
        $listar = new TipoLeitorModel();
        $dados['listagem'] = $listar->listarTodas();
        $this->view("listagem-tipo-leitor", $dados);
    }

    public function excluir()
    {
        session_start();

        if (isset($_POST['id']) && $_POST['id'] > 0) {

            $tipoLeitor = new TipoLeitorModel();
            $tipoLeitor->setIdTipo($_POST['id']);
            $retorno = $tipoLeitor->excluir();
            echo $retorno;
        } else {
            echo "Falha!";
        }
    }

    public function alterar()
    {
        session_start();

        if (isset($_POST)) {
            $tipoLeitor = new TipoLeitorModel();
            $tipoLeitor->setIdTipo($_POST['idTipo']);
            $tipoLeitor->setDescricaoTipo($_POST['descricaoTipo']);
            $tipoLeitor->setStatusTipo($_POST['statusTipo']);
            $dados['retorno_update'] = $tipoLeitor->alterar();
            header("Location: ".DOMINIO. strtolower(get_class($this)) ."/listagem/return/".$dados['retorno_update']); 
        } else {
            
            header("Location: ".DOMINIO. strtolower(get_class($this)) ."/listagem/return/Falha ao atualizar registro!"); 
            
        }
    }
}
