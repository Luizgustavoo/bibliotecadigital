<?php

class Categoria extends Controller
{

    public function index_action()
    {
        //        $dados['msg'] = $this->getParams("msg");
        //        $dados['return'] = $this->getParams("return");
        //        inicia a sessão do menu selecionado


        $this->view("create-update-categoria", $dados);
        exit();
    }
    public function cadastro()
    {

        print_r($_POST);
    }

    public function listagem()
    {

        $this->view("listagem-categoria", $dados);
    }
}
