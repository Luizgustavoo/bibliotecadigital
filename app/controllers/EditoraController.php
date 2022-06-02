<?php

class Editora extends Controller
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
                    $editora = new EditoraModel();
                    $dados['tipo_operacao'] = "alterar";
                    $dados['update'] = $editora ->listarPorCodigo($id);
                }else{
                    $dados['tipo_operacao'] = "inserir";
                }
        
        
                $this->view("create-update-editora", $dados);
                exit();
    }

    public function cadastro()
    {

        $editora = new EditoraModel();
        $editora->setDescricaoEditora($_POST['descricaoEditora']);
        $editora->setImagemEditora($_FILES['imagemEditora']);
        $editora->setDataCadastro(date('Y-m-d H:i:s'));

        $dados['retorno'] = $editora->inserir();

        $this->view("create-update-editora", $dados);
    }

    public function listagem()
    {

        $listar = new EditoraModel();
        $dados['listagem'] = $listar->listarTodas();
        $this->view("listagem-editora", $dados);
    }

    public function excluir()
    {
        session_start();

        if (isset($_POST['id']) && $_POST['id'] > 0) {

            $editora = new EditoraModel();
            $editora->setIdEditora($_POST['id']);
            $retorno = $editora->excluir();
            echo $retorno;
        } else {
            echo "Falha!";
        }
    }

    public function alterar()
    {
        session_start();

        if (isset($_POST)) {
            $categoria = new EditoraModel();
            $categoria->setIdEditora($_POST['idEditora']);
            $categoria->setImagemEditora($_FILES['imagemEditora']);
            $categoria->setDataCadastro(date('Y-m-d H:i:s'));
            $categoria->setDescricaoEditora($_POST['descricaoEditora']);
            $dados['retorno_update'] = $categoria->alterar();
            header("Location: ".DOMINIO. strtolower(get_class($this)) ."/listagem/return/".$dados['retorno_update']); 
        } else {
            
            header("Location: ".DOMINIO. strtolower(get_class($this)) ."/listagem/return/Falha ao atualizar registro!"); 
            
        }
    }
}
