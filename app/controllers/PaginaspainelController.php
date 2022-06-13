<?php

class Paginaspainel extends Controller
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
            $pagina = new PaginasPainelModel();
            $dados['tipo_operacao'] = "alterar";
            $dados['update'] = $pagina->listarPorCodigo($id);
        }else{
            $dados['tipo_operacao'] = "inserir";
        }


        $this->view("create-update-paginas-painel", $dados);
        exit();
    }

    public function cadastro()
    {

        $pagina = new PaginasPainelModel();
        $pagina->setPagina($_POST['descricaoPagina']);

        $dados['retorno'] = $pagina->inserir();

        $this->view("create-update-paginas-painel", $dados);
    }

    public function listagem()
    {
        $listar = new PaginasPainelModel();
        $dados['listagem'] = $listar->listarTodas();
        $this->view("listagem-paginas-painel", $dados);
    }

    public function excluir()
    {
        session_start();

        if (isset($_POST['id']) && $_POST['id'] > 0) {

            $pagina = new PaginasPainelModel();
            $pagina->setPagina($_POST['id']);
            $retorno = $pagina->excluir();
            echo $retorno;
        } else {
            echo "Falha!";
        }
    }

    public function alterar()
    {
        session_start();

        if (isset($_POST)) {
            $pagina = new PaginasPainelModel();
            $pagina->setPagina($_POST['descricaoPagina']);
            $dados['retorno_update'] = $pagina->alterar();
            header("Location: ".DOMINIO. strtolower(get_class($this)) ."/listagem/return/".$dados['retorno_update']); 
        } else {
            
            header("Location: ".DOMINIO. strtolower(get_class($this)) ."/listagem/return/Falha ao atualizar registro!"); 
            
        }
    }
}
