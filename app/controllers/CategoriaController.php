<?php

class Categoria extends Controller
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
                    $categoria = new CategoriaModel();
                    $dados['tipo_operacao'] = "alterar";
                    $dados['update'] = $categoria ->listarPorCodigo($id);
                }else{
                    $dados['tipo_operacao'] = "inserir";
                }
        
        
                $this->view("create-update-categoria", $dados);
                exit();
    }
    public function cadastro()
    {

        $categoria = new CategoriaModel();
        $categoria->setDescricaoCategoria($_POST['descricaoCategoria']);
        $categoria->setImagemCategoria($_FILES['imagemCategoria']);
        $categoria->setDataCadastro(date('Y-m-d H:i:s'));

        $dados['retorno'] = $categoria->inserir();
        $dados['tipo_operacao'] = "inserir";
        $this->view("create-update-categoria", $dados);
    }

    public function listagem()
    {

        $listar = new CategoriaModel();
        $dados['listagem'] = $listar->listarTodas();
        $this->view("listagem-categoria", $dados);
    }

    public function excluir()
    {
        session_start();

        if (isset($_POST['id']) && $_POST['id'] > 0) {

            $autor = new CategoriaModel();
            $autor->setIdCategoria($_POST['id']);
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
            $categoria = new CategoriaModel();
            $categoria->setIdCategoria($_POST['idCategoria']);
            $categoria->setImagemCategoria($_FILES['imagemCategoria']);
            $categoria->setDataCadastro(date('Y-m-d H:i:s'));
            $categoria->setDescricaoCategoria($_POST['descricaoCategoria']);
            
            $dados['retorno_update'] = $categoria->alterar();
            header("Location: ".DOMINIO. strtolower(get_class($this)) ."/listagem/return/".$dados['retorno_update']); 
        } else {
            
            header("Location: ".DOMINIO. strtolower(get_class($this)) ."/listagem/return/Falha ao atualizar registro!"); 
            
        }
    }
}
