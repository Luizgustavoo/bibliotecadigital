<?php

class Autor extends Controller
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
            $autor = new AutorModel();
            $dados['tipo_operacao'] = "alterar";
            $dados['update'] = $autor ->listarPorCodigo($id);
        }else{
            $dados['tipo_operacao'] = "inserir";
        }


        $this->view("create-update-autor", $dados);
        exit();
    }

    public function cadastro()
    {

        $autor = new AutorModel();
        $autor->setDescricaoAutor($_POST['descricaoAutor']);
        $autor->setImagemAutor($_FILES['imagemAutor']);
        $autor->setDataCadastro(date('Y-m-d H:i:s'));

        $dados['tipo_operacao'] = "inserir";

        $dados['retorno'] = $autor->inserir();

        $this->view("create-update-autor", $dados);
    }

    public function listagem()
    {
        $listar = new AutorModel();
        $dados['listagem'] = $listar->listarTodas();
        $this->view("listagem-autor", $dados);
    }

    public function excluir()
    {
        session_start();

        if (isset($_POST['id']) && $_POST['id'] > 0) {

            $autor = new AutorModel();
            $autor->setIdAutor($_POST['id']);
            $retorno = $autor->excluir();
            echo $retorno;
        } else {
            echo "Falha!";
        }
    }

    public function alterar()
    {
        session_start();

        if (isset($_POST)) {
            $autor = new AutorModel();
            $autor->setIdAutor($_POST['idAutor']);
            $autor->setImagemAutor($_FILES['imagemAutor']);
            $autor->setDataCadastro(date('Y-m-d H:i:s'));
            $autor->setDescricaoAutor($_POST['descricaoAutor']);
            $dados['retorno_update'] = $autor->alterar();
            header("Location: ".DOMINIO. strtolower(get_class($this)) ."/listagem/return/".$dados['retorno_update']); 
        } else {
            
            header("Location: ".DOMINIO. strtolower(get_class($this)) ."/listagem/return/Falha ao atualizar registro!"); 
            
        }
    }
}
