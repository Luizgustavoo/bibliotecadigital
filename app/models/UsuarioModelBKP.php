<?php
Class UsuarioModelBKP- extends Model{
    public $_tabela = "usuario";

    private $idUsuario;
    private $nomeUsuario;
    private $loginUsuario;
    private $senhaUsuario;
    private $statusUsuario;

    private $tamanho_upload = 1024 * 1024 * 5;

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
     * @return mixed
     */
    public function getNomeUsuario()
    {
        return $this->nomeUsuario;
    }

    /**
     * @param mixed $nomeUsuario
     */
    public function setNomeUsuario($nomeUsuario)
    {
        $this->nomeUsuario = $nomeUsuario;
    }

    /**
     * @return mixed
     */
    public function getLoginUsuario()
    {
        return $this->loginUsuario;
    }

    /**
     * @param mixed $loginUsuario
     */
    public function setLoginUsuario($loginUsuario)
    {
        $this->loginUsuario = $loginUsuario;
    }

    /**
     * @return mixed
     */
    public function getSenhaUsuario()
    {
        return $this->senhaUsuario;
    }

    /**
     * @param mixed $senhaUsuario
     */
    public function setSenhaUsuario($senhaUsuario)
    {
        $this->senhaUsuario = $senhaUsuario;
    }

    /**
     * @return mixed
     */
    public function getStatusUsuario()
    {
        return $this->statusUsuario;
    }

    /**
     * @param mixed $statusUsuario
     */
    public function setStatusUsuario($statusUsuario)
    {
        $this->statusUsuario = $statusUsuario;
    }

    /**
     * @return float|int
     */
    public function getTamanhoUpload()
    {
        return $this->tamanho_upload;
    }

    /**
     * @param float|int $tamanho_upload
     */
    public function setTamanhoUpload($tamanho_upload)
    {
        $this->tamanho_upload = $tamanho_upload;
    } //2MB



    public function alterar(){
        $valida = $this->validarDados();

        if(strlen($valida) <= 0){

            $dados_update = [

                "nomeUsuario" => $this->getNomeUsuario(),
                "loginUsuario" => $this->getLoginUsuario(),
                "senhaUsuario" => md5(md5($this->getSenhaUsuario())),
                "statusUsuario" => $this->getStatusUsuario()

            ];
            $where = "idUsuario = " . $this->getIdUsuario();
            $this->set_transaction($this->update($dados_update, $where, $this->_tabela));

            $retorno = $this->execTransaction();
        } else {
            $retorno = $valida;
        }
        return $retorno;
    }
    public function inserir(){
        $valida = $this->validarDados();
        if(strlen($valida) <= 0){
            //inserindo dados no cafe dos alunos

            $dados_insert= [
                "nomeUsuario" => $this->getNomeUsuario(),
                "loginUsuario" => $this->getLoginUsuario(),
                "senhaUsuario" => md5(md5($this->getSenhaUsuario())),
                "statusUsuario" => $this->getStatusUsuario()
            ];
            $this->set_transaction($this->insert($dados_insert, $this->_tabela));

            $retorno = $this->execTransaction();

        }else{
            $retorno = $valida;
        }
        return $retorno;
    }

    public function excluir(){
        // Aonde este id está puxando
        $where = "idUsuario = " . $this->getIdUsuario();
        $retorno = $this->delete($where);
        return $retorno;
    }
    public function validarDados(){

        $erros = "";

        if(strlen($this->getNomeUsuario()) < 3){$erros .= "Nome do usuário inválido!<br/>";}
        if(strlen($this->getLoginUsuario()) < 3){$erros .= "Login do usuário inválido!<br/>";}
        if(strlen($this->getSenhaUsuario()) < 8){$erros .= "Senha do usuário inválida!<br/>";}
        if(strlen($this->getStatusUsuario()) <= 0){$erros .= "Status do usuário inválido!<br/>";}


        return $erros;

    }
    public function listarTodas(){

        return $this->read($this->_tabela, null, null, null, 'nomeUsuario', null, null, null);

    }

    public function listarTodasAtivos(){

        return $this->read($this->_tabela, "statusUsuario = 'ativo'", null, null, 'nomeUsuario', null, null, null);

    }

    public function listarPorDescricao($descricao){


        return $this->read($this->_tabela, "nomeUsuario like '%$descricao%'", null, null, null, null, null, null);


    }

    public function listarUsuario(){

        $where = "loginUsuario = '".$this->getLoginUsuario()."' and senhaUsuario = '".md5(md5($this->getSenhaUsuario()))."' and statusUsuario = 'ativo'";
        return $this->read($this->_tabela, $where, null, null, null, null, null, null);


    }

    public function listarPorCodigo($id){


        return $this->read($this->_tabela, "idUsuario = $id", null, null, null, null, null, null);


    }

    public function alterarProfile(){
        $valida = "";

        if(strlen($valida) <= 0){

            $avatar = $this->inserirAvatar();
            $dados_update = array();

            if(strlen(trim($this->getNomeUsuario())) > 0){
                $dados_update["nomeUsuario"] = $this->getNomeUsuario();
            }

            if(strlen(trim($this->getSenhaUsuario())) > 0){
                $dados_update["senhaUsuario"] = md5(md5($this->getSenhaUsuario()));
            }


            $where = "idUsuario = " . $this->getIdUsuario();
            $this->set_transaction($this->update($dados_update, $where, $this->_tabela));

            $retorno = $this->execTransaction();
        } else {
            $retorno = $valida;
        }
        return $retorno;
    }

    public function validarDadosProfile(){

        $erros = "";


        if(strlen($this->getSenhaUsuario()) < 8){$erros .= "Senha do usuário deve conter no mínimo 8 caracteres!<br>";}
        if(strlen($this->getSenhaUsuario()) < 10){$erros .= "Login do usuário inválido!<br>";}


        return $erros;

    }


    public function listarPorLogin($login){

        $where = "loginUsuario = '".$login."' and statusUsuario = 'ativo'";
        return $this->read($this->_tabela, $where, null, null, null, null, null, null);


    }

    public function listarPorChave($chave){

        $where = "chave_usuario = '".$chave."' and status_chave = 'ativo'";

        return $this->read('chaveusuario', $where, null, null, null, null, null, null);


    }




}
