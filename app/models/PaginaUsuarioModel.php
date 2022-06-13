<?php
Class PaginaUsuarioModel extends Model{
    public $_tabela = "paginausuario";
    
    private $idUsuario;
    private $descricaoPagina = array();

    /**
     * @return mixed
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    /**
     * @param mixed $idUsuario
     */
    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }

    /**
     * @return array
     */
    public function getDescricaoPagina()
    {
        return $this->descricaoPagina;
    }

    /**
     * @param array $descricaoPagina
     */
    public function setDescricaoPagina($descricaoPagina)
    {
        $this->descricaoPagina = $descricaoPagina;
    }




    public function inserir(){
        $valida = $this->validarDados();
        if(strlen($valida) <= 0){        

            /*DELETANDO AS PÁGINA DO PERFIL INFORMADO*/
            $where_delete = "paginausuario.idUsuario = '{$this->getIdUsuario()}'";
            $this->set_transaction($this->deleteTransaction($where_delete, "paginausuario"));


            /*INSERINDO NOVAMENTE AS PÁGINAS PARA O PERFIL SELECIONADO*/
            for($i=0;$i<count($this->getDescricaoPagina());$i++){

                $dados_pagina = [
                    "idUsuario" => strtolower($this->getIdUsuario()),
                    "descricaoPagina" => strtolower($this->getDescricaoPagina()[$i])
                ];
                $this->set_transaction($this->insert($dados_pagina, "paginausuario"));

            }

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

                $dados_cidade = [
                "nome_cidade" => strtoupper($this->getNome_cidade()),
                "estado_cidade" => strtoupper($this->getEstado_cidade()),
                "pais_cidade" => strtoupper($this->getPais_cidade())
            ];
                
                $where = "id_cidade = " . $this->getId_cidade();
              $this->set_transaction($this->update($dados_cidade, $where, $this->_tabela)); 
 
           $retorno = $this->execTransaction();
           
        }else{
            $retorno = $valida;
        }
        return $retorno;  
    }

    public function excluir(){
               
            //inserindo dados no cafe dos alunos

                
                $where = "id_cidade = " . $this->getId_cidade();
              $retorno = $this->delete($where); 
           
        
        return $retorno;  
    }

    public function validarDados(){
        
        $erros = "";
        
        
        if(strlen($this->getIdUsuario()) <= 0){
            $erros .= "Usuário inválido!<br/>";
        }
        if(count($this->getDescricaoPagina()) <= 0){
            $erros .= "Nenhuma página informada!<br/>";
        }
        
        return $erros;
        
    }


    public function listarTodas($idUsuario){

        $places = [
            "paginaspainel.*",
           "(select count(*) from paginausuario where paginausuario.descricaoPagina = paginaspainel.descricaoPagina and paginausuario.idUsuario = $idUsuario) as quantidade",
            "(select nomeUsuario from usuario where usuario.idUsuario = $idUsuario) as usuario"
            ];
        return $this->read("paginaspainel", null, null, null, "paginaspainel.descricaoPagina", $places, null, null);

    }
        
    public function listarPorDescricao($descricao){
        
        $places = ["*"];
        return $this->read($this->_tabela, "nome_cidade like '%$descricao%'", null, null, null, null, null, null);

    }
    
    public function listarPorCodigo($id){

        return $this->read($this->_tabela, "id_cidade = $id", null, null, null, null, null, null);

    }

}
