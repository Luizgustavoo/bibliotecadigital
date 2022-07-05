<?php

class Leitor extends Controller
{

    public function index_action()
    {

        session_start();


        // $_SESSION['menu_selecionado'] = '';
        // $_SESSION['categoria_menu'] = '';

        $action = $this->getParams("action");

        $dados['msg'] = $this->getParams("msg");
        $dados['return'] = $this->getParams("return");

        $tipoleitor = new TipoLeitorModel();
        $dados['tipoLeitor'] = $tipoleitor->listarTodas();



        if(!empty($action) && $action == 'update'){
            $id = $this->getParams("id");

            $leitor = new LeitorModel();
            $dados['tipo_operacao'] = "alterar";
            $dados['update'] = $leitor ->listarPorCodigo($id);

        }else{
            $dados['tipo_operacao'] = "inserir";
        }


        $this->view("create-update-leitor", $dados);
        exit();
    }

    public function cadastro()
    {

        $leitor = new LeitorModel();
        $leitor->setNomeLeitor($_POST['nomeLeitor']);
        $leitor->setAvatarLeitor($_FILES['avatarLeitor']);
        $leitor->setEmailLeitor($_POST['emailLeitor']);
        $leitor->setSexoLeitor($_POST['sexoLeitor']);
        $leitor->setLoginLeitor($_POST['loginLeitor']);
        $leitor->setSenhaLeitor($_POST['senhaLeitor']);
        $leitor->setStatusLeitor($_POST['statusLeitor']);
        $leitor->setIdTipo($_POST['idTipo']);

        $dados['retorno'] = $leitor->inserir();

        $this->view("create-update-leitor", $dados);
    }

    public function listagem()
    {
        $listar = new LeitorModel();
        $dados['listagem'] = $listar->listarTodas();
        $this->view("listagem-leitor", $dados);
    }

    public function excluir()
    {
        session_start();

        if (isset($_POST['id']) && $_POST['id'] > 0) {

            $leitor = new LeitorModel();
            $leitor->setIdLeitor($_POST['id']);
            $retorno = $leitor->excluir();
            echo $retorno;
        } else {
            echo "Falha!";
        }
    }

    public function alterar()
    {
        session_start();

        if (isset($_POST)) {
            $leitor = new LeitorModel();
            $leitor->setIdLeitor($_POST['idLeitor']);
            $leitor->setNomeLeitor($_POST['nomeLeitor']);
            $leitor->setAvatarLeitor($_FILES['avatarLeitor']);
            $leitor->setLoginLeitor($_POST['loginLeitor']);
            $leitor->setEmailLeitor($_POST['emailLeitor']);
            $leitor->setSenhaLeitor($_POST['senhaLeitor']);
            $leitor->setStatusLeitor($_POST['statusLeitor']);
            $leitor->setSexoLeitor($_POST['sexoLeitor']);
            $leitor->setIdTipo($_POST['idTipo']);
            
            $dados['retorno_update'] = $leitor->alterar();
            header("Location: ".DOMINIO. strtolower(get_class($this)) ."/listagem/return/".$dados['retorno_update']); 
        } else {
            
            header("Location: ".DOMINIO. strtolower(get_class($this)) ."/listagem/return/Falha ao atualizar registro!"); 
            
        }
    }
}
