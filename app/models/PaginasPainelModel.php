<?php
Class PaginasPainelModel extends Model{
    public $_tabela = "paginaspainel";
    
    private $pagina;

    /**
     * @return mixed
     */
    public function getPagina()
    {
        return $this->pagina;
    }

    /**
     * @param mixed $pagina
     */
    public function setPagina($pagina)
    {

        $this->pagina = str_replace(' ','_', $pagina);
    }




    public function inserir(){
        $valida = $this->validarDados();
        if(strlen($valida) <= 0){
            //inserindo dados no cafe dos alunos

            $dados_pagina = [
                "descricaoPagina" => strtolower($this->getPagina())
            ];
            $this->set_transaction($this->insert($dados_pagina, "paginaspainel"));


            $dados_usuarios_admin = $this->read('usuario', "perfil_usuario = 'admin'", null, null, null, ['idUsuario'], null, null);

            foreach($dados_usuarios_admin as $user){
                $dados_pagina_usuario = [
                    "idUsuario" => $user['idUsuario'],
                    "descricaoPagina" => strtolower($this->getPagina())
                ];
                $this->set_transaction($this->insert($dados_pagina_usuario, 'paginausuario'));

            }

            $retorno = $this->execTransaction();

        }else{
            $retorno = $valida;
        }
        return $retorno;
    }
    public function inserirBKP(){
        $valida = $this->validarDados();
        if(strlen($valida) <= 0){        
            //inserindo dados no cafe dos alunos

                $dados_pagina = [
                "pagina" => strtolower($this->getPagina())
            ];  
              $this->set_transaction($this->insert($dados_pagina, $this->_tabela));
 
           $retorno = $this->execTransaction();
           
        }else{
            $retorno = $valida;
        }
        return $retorno;  
    }
    public function alterar(){
        $valida = $this->validarDados();
        if(strlen($valida) <= 0){        
            //inserindo dados no cafe dos alunos

            $dados_pagina = [
                "descricaoPagina" => strtolower($this->getPagina())
            ];
                $where = "descricaoPagina = " . $this->getPagina();
              $this->set_transaction($this->update($dados_pagina, $where, $this->_tabela));
 
           $retorno = $this->execTransaction();
           
        }else{
            $retorno = $valida;
        }
        return $retorno;  
    }
    public function excluir(){
               
            //inserindo dados no cafe dos alunos

              $where = "descricaoPagina = '" . $this->getPagina() . "'";

              $this->set_transaction($this->deleteTransaction($where,'paginausuario'));
              $this->set_transaction($this->deleteTransaction($where,'paginaspainel'));

              $retorno = $this->execTransaction();
           
        
        return $retorno;  
    }
    
    public function validarDados(){
        
        $erros = "";
        
        
        if(strlen($this->getPagina()) <= 0){
            $erros .= "Nome da página inválido!<br/>";
        }
        
        return $erros;
        
    }
    
    public function listarTodas(){

        return $this->read('paginaspainel', null, null, null, 'descricaoPagina', null, null, null);
    
    }
        
    public function listarPorDescricao($descricao){
        
        $places = ["*"];
        
        return $this->read($this->_tabela, "nome_cidade like '%$descricao%'", null, null, null, null, null, null);

        
    }
    
    public function listarPorCodigo($id){
              
        return $this->read($this->_tabela, "descricaoPagina = '$id'", null, null, null, null, null, null);

        
    }
    
    
    
   
}
