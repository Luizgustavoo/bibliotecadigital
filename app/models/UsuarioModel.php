<?php
class UsuarioModel extends Model
{
    public $_tabela = "usuario";

    private $idUsuario;
    private $nomeUsuario;
    private $loginUsuario;
    private $senhaUsuario;
    private $statusUsuario;
    private $perfilUsuario;


    /**
     * @return mixed
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    /**
     * Get the value of perfilUsuario
     *
     * @return  mixed
     */
    public function getPerfilUsuario()
    {
        return $this->perfilUsuario;
    }

    /**
     * Set the value of perfilUsuario
     *
     * @param   mixed  $perfilUsuario  
     *
     * @return  self
     */
    public function setPerfilUsuario($perfilUsuario)
    {
        $this->perfilUsuario = $perfilUsuario;
        return $this;
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




    public function alterar()
    {
        $valida = $this->validarDados();

        if (strlen($valida) <= 0) {

            $dados_update = [

                "nomeUsuario" => $this->getNomeUsuario(),
                "loginUsuario" => $this->getLoginUsuario(),
                "senhaUsuario" => md5(md5($this->getSenhaUsuario())),
                "statusUsuario" => $this->getStatusUsuario(),
                "perfil_usuario" => $this->getPerfilUsuario(),

            ];
            $where = "idUsuario = " . $this->getIdUsuario();
            $this->set_transaction($this->update($dados_update, $where, $this->_tabela));

            $retorno = $this->execTransaction();
        } else {
            $retorno = $valida;
        }
        return $retorno;
    }
    public function inserir()
    {
        $valida = $this->validarDados();
        if (strlen($valida) <= 0) {
            $dados_insert = [
                "nomeUsuario" => $this->getNomeUsuario(),
                "loginUsuario" => $this->getLoginUsuario(),
                "senhaUsuario" => md5(md5($this->getSenhaUsuario())),
                "statusUsuario" => $this->getStatusUsuario(),
                "perfil_usuario" => $this->getPerfilUsuario(),
            ];
            $this->set_transaction($this->insert($dados_insert, $this->_tabela));

            $retorno = $this->execTransaction();
        } else {
            $retorno = $valida;
        }
        return $retorno;
    }

    public function excluir()
    {
        // Aonde este id est?? puxando
        $where = "idUsuario = " . $this->getIdUsuario();
        $retorno = $this->delete($where);
        return $retorno;
    }
    public function validarDados()
    {

        $erros = "";

        if (strlen($this->getNomeUsuario()) < 3) {
            $erros .= "Nome do usu??rio inv??lido!<br/>";
        }
        if (strlen($this->getLoginUsuario()) < 3) {
            $erros .= "Login do usu??rio inv??lido!<br/>";
        }
        if (strlen($this->getSenhaUsuario()) < 8) {
            $erros .= "Senha do usu??rio inv??lida!<br/>";
        }
        if (strlen($this->getStatusUsuario()) <= 0) {
            $erros .= "Status do usu??rio inv??lido!<br/>";
        }


        return $erros;
    }
    public function listarTodas()
    {

        return $this->read($this->_tabela, null, null, null, 'nomeUsuario', null, null, null);
    }

    public function listarTodasAtivos()
    {

        return $this->read($this->_tabela, "statusUsuario = 'ativo'", null, null, 'nomeUsuario', null, null, null);
    }

    public function listarPorDescricao($descricao)
    {


        return $this->read($this->_tabela, "nomeUsuario like '%$descricao%'", null, null, null, null, null, null);
    }

    public function listarUsuario()
    {

        $where = "loginUsuario = '" . $this->getLoginUsuario() . "' and senhaUsuario = '" . md5(md5($this->getSenhaUsuario())) . "' and statusUsuario = 'ativo'";
        return $this->read($this->_tabela, $where, null, null, null, null, null, null);
    }

    public function listarPorCodigo($id)
    {


        return $this->read($this->_tabela, "idUsuario = $id", null, null, null, null, null, null);
    }

    public function alterarProfile()
    {
        $valida = "";

        if (strlen($valida) <= 0) {

           // $avatar = $this->inserirAvatar();
            $dados_update = array();

            if (strlen(trim($this->getNomeUsuario())) > 0) {
                $dados_update["nomeUsuario"] = $this->getNomeUsuario();
            }

            if (strlen(trim($this->getSenhaUsuario())) > 0) {
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

    public function validarDadosProfile()
    {

        $erros = "";


        if (strlen($this->getSenhaUsuario()) < 8) {
            $erros .= "Senha do usu??rio deve conter no m??nimo 8 caracteres!<br>";
        }
        if (strlen($this->getSenhaUsuario()) < 10) {
            $erros .= "Login do usu??rio inv??lido!<br>";
        }


        return $erros;
    }


    public function listarPorLogin($login)
    {

        $where = "loginUsuario = '" . $login . "' and statusUsuario = 'ativo'";
        return $this->read($this->_tabela, $where, null, null, null, null, null, null);
    }

    public function listarPorChave($chave)
    {

        $where = "chave_usuario = '" . $chave . "' and status_chave = 'ativo'";

        return $this->read('chaveusuario', $where, null, null, null, null, null, null);
    }
}
