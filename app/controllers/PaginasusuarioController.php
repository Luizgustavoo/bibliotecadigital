<?php

class Paginasusuario extends Controller
{

    public function index_action()
    {

        session_start();


        // $_SESSION['menu_selecionado'] = '';
        // $_SESSION['categoria_menu'] = '';

        $action = $this->getParams("action");

        $dados['msg'] = $this->getParams("msg");
        $dados['return'] = $this->getParams("return");

        $usuario = new UsuarioModel();
        $dados['usuarios'] = $usuario->listarTodasAtivos();




        if(isset($_POST['idUsuario']) && (int)$_POST['idUsuario'] > 0){
            $paginasUsuario = new PaginaUsuarioModel();
            $dados['listagem'] = $paginasUsuario->listarTodas($_POST['idUsuario']);
            $dados['id_usuario'] = $_POST['idUsuario'];
        }


        if(isset($_POST['idUsuarioHidden'], $_POST['arr_paginas']) &&
            (int)$_POST['idUsuarioHidden'] > 0 && count($_POST['arr_paginas']) > 0){

            $paginasUsuario = new PaginaUsuarioModel();
            $paginasUsuario->setIdUsuario($_POST['idUsuarioHidden']);
            $paginasUsuario->setDescricaoPagina($_POST['arr_paginas']);
            $dados['retorno'] = $paginasUsuario->inserir();


        }



        $this->view("listagem-paginas-usuario", $dados);

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
