<?php

class Index extends Controller{

    public function index_action(){
//        $dados['msg'] = $this->getParams("msg");
//        $dados['return'] = $this->getParams("return");
//        inicia a sessão do menu selecionado


        $this->view("home");
        exit();
    }

}