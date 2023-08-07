<?php

class Perguntas extends Controller
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
                    $perguntas = new PerguntasModel();
                    $dados['tipo_operacao'] = "alterar";
                    // $dados['update'] = $perguntas ->listarPorCodigo($id);
                }else{
                    $dados['tipo_operacao'] = "inserir";
                }
        
        
                $this->view("create-update-perguntas", $dados);
                exit();
    }

    public function listagem()
    {

        $listar = new PerguntasModel();
        $dados['listagem'] = $listar->listarTodas();
        $this->view("listagem-perguntas", $dados);
    }


    public function cadastro()
    {

        $perguntas = new PerguntasModel();
        $perguntas->setPergunta($_POST['pergunta']);
        $dados['tipo_operacao'] = "inserir";
        $dados['retorno'] = $perguntas->inserir();

        header('location: '.DOMINIO.'perguntas/?return='.$dados['retorno']);
    }


    
}