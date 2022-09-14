<?php

class Usuario extends Controller
{

    public function index_action()
    {

        session_start();


        // $_SESSION['menu_selecionado'] = '';
        // $_SESSION['categoria_menu'] = '';

        $action = $this->getParams("action");

        $dados['msg'] = $this->getParams("msg");
        $dados['return'] = $this->getParams("return");


        if (!empty($action) && $action == 'update') {
            $id = $this->getParams("id");
            $usuario = new UsuarioModel();
            $dados['tipo_operacao'] = "alterar";
            $dados['update'] = $usuario->listarPorCodigo($id);
        } else {
            $dados['tipo_operacao'] = "inserir";
        }


        $this->view("create-update-usuario", $dados);
        exit();
    }

    public function cadastro()
    {

        $usuario = new UsuarioModel();
        $usuario->setNomeUsuario($_POST['nomeUsuario']);
        $usuario->setLoginUsuario($_POST['loginUsuario']);
        $usuario->setSenhaUsuario($_POST['senhaUsuario']);
        $usuario->setStatusUsuario($_POST['statusUsuario']);
        $usuario->setPerfilUsuario($_POST['perfil_usuario']);
        $dados['tipo_operacao'] = "inserir";
        $dados['retorno'] = $usuario->inserir();

        $this->view("create-update-usuario", $dados);
    }

    public function listagem()
    {
        $listar = new UsuarioModel();
        $dados['listagem'] = $listar->listarTodas();
        $this->view("listagem-usuario", $dados);
    }

    public function excluir()
    {
        session_start();

        if (isset($_POST['id']) && $_POST['id'] > 0) {

            $usuario = new UsuarioModel();
            $usuario->setIdUsuario($_POST['id']);
            $retorno = $usuario->excluir();
            echo $retorno;
        } else {
            echo "Falha!";
        }
    }

    public function alterar()
    {
        session_start();

        if (isset($_POST)) {
            
            $usuario = new UsuarioModel();
            $usuario->setIdUsuario($_POST['idUsuario']);
            $usuario->setNomeUsuario($_POST['nomeUsuario']);
            $usuario->setLoginUsuario($_POST['loginUsuario']);
            $usuario->setSenhaUsuario($_POST['senhaUsuario']);
            $usuario->setStatusUsuario($_POST['statusUsuario']);
            $usuario->setPerfilUsuario($_POST['perfil_usuario']);
            $dados['retorno_update'] = $usuario->alterar();
            header("Location: " . DOMINIO . strtolower(get_class($this)) . "/listagem/return/" . $dados['retorno_update']);
        } else {

            header("Location: " . DOMINIO . strtolower(get_class($this)) . "/listagem/return/Falha ao atualizar registro!");
        }
    }
}
