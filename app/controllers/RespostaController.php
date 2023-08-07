<?php

class Resposta extends Controller
{

    public function index_action()
    {
        session_start();

        
                // $_SESSION['menu_selecionado'] = '';
                // $_SESSION['categoria_menu'] = '';
        
                $action = $this->getParams("action");
        
                $dados['msg'] = $this->getParams("msg");
                $dados['return'] = $this->getParams("return");
        
                $perguntasModel = new PerguntasModel();
                $dados['perguntas'] = $perguntasModel->listarTodas();
                $claModel = new ClaModel();
                $dados['cla'] = $claModel->listarTodas();
                if(!empty($action) && $action == 'update'){
                    $id = $this->getParams("id");
                    $resposta = new RespostaModel();
                    $dados['tipo_operacao'] = "alterar";
                    // $dados['update'] = $resposta ->listarPorCodigo($id);
                }else{
                    $dados['tipo_operacao'] = "inserir";
                }
        
        
                $this->view("create-update-resposta", $dados);
                exit();
    }


    public function cadastro()
    {

        $resposta = new RespostaModel();
        $resposta->setPerguntaId($_POST['pergunta_id']);
        $resposta->setResposta($_POST['resposta']);
        $resposta->setClaId($_POST['cla_id']);
        $dados['tipo_operacao'] = "inserir";
        $dados['retorno'] = $resposta->inserir();

        header('location: '.DOMINIO.'resposta/?return='.$dados['retorno']);
    }

}
