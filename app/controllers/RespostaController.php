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
                    $dados['update'] = $resposta ->listarPorCodigo($id);
                }else{
                    $dados['tipo_operacao'] = "inserir";
                }
        
        
                $this->view("create-update-resposta", $dados);
                exit();
    }

    public function listagem()
    {
        $listar = new RespostaModel();
        $dados['listagem'] = $listar->listarTodas();
        $this->view("listagem-resposta", $dados);
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

    public function excluir()
    {
        session_start();

        if (isset($_POST['id']) && $_POST['id'] > 0) {

            $resposta = new RespostaModel();
            $resposta->setId($_POST['id']);
            $retorno = $resposta->excluir();
            echo $retorno;
        } else {
            echo "Falha!";
        }
    }


    public function alterar()
    {
        session_start();

        if (isset($_POST)) {
            $resposta = new RespostaModel();
            $resposta->setId($_POST['id']);
            $resposta->setPerguntaId($_POST['pergunta_id']);
            $resposta->setResposta($_POST['resposta']);
            $resposta->setClaId($_POST['cla_id']);
            $dados['retorno_update'] = $resposta->alterar();
            header("Location: ".DOMINIO. strtolower(get_class($this)) ."/listagem/return/".$dados['retorno_update']); 
        } else {
            
            header("Location: ".DOMINIO. strtolower(get_class($this)) ."/listagem/return/Falha ao atualizar registro!"); 
            
        }
    }
}
