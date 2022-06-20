<?php

class LeitorModel extends Model
{

    public $_tabela = "leitor";
    private $idLeitor;
    private $nomeLeitor;
    private $loginLeitor;
    private $senhaLeitor;
    private $dataCadastro;
    private $statusLeitor;
    private $sexoLeitor;
    private $emailLeitor;
    private $idTipo;
    private $avatarLeitor;
    private $tamanho_upload = 1024 * 1024 * 5; //5MB

    /**
     * Get the value of idTipo
     *
     * @return  mixed
     */
    public function getIdTipo()
    {
        return $this->idTipo;
    }

    /**
     * Set the value of idTipo
     *
     * @param   mixed  $idTipo  
     *
     * @return  self
     */
    public function setIdTipo($idTipo)
    {
        $this->idTipo = $idTipo;
        return $this;
    }
    /**
     * Get the value of idLeitor
     *
     * @return  mixed
     */
    public function getIdLeitor()
    {
        return $this->idLeitor;
    }

    /**
     * Set the value of idLeitor
     *
     * @param   mixed  $idLeitor  
     *
     * @return  self
     */
    public function setIdLeitor($idLeitor)
    {
        $this->idLeitor = $idLeitor;
        return $this;
    }

    /**
     * Get the value of loginLeitor
     *
     * @return  mixed
     */
    public function getLoginLeitor()
    {
        return $this->loginLeitor;
    }

    /**
     * Set the value of loginLeitor
     *
     * @param   mixed  $loginLeitor  
     *
     * @return  self
     */
    public function setLoginLeitor($loginLeitor)
    {
        $this->loginLeitor = $loginLeitor;
        return $this;
    }

    /**
     * Get the value of senhaLeitor
     *
     * @return  mixed
     */
    public function getSenhaLeitor()
    {
        return $this->senhaLeitor;
    }

    /**
     * Set the value of senhaLeitor
     *
     * @param   mixed  $senhaLeitor  
     *
     * @return  self
     */
    public function setSenhaLeitor($senhaLeitor)
    {
        $this->senhaLeitor = $senhaLeitor;
        return $this;
    }

    /**
     * Get the value of dataCadastro
     *
     * @return  mixed
     */
    public function getDataCadastro()
    {
        return $this->dataCadastro;
    }

    /**
     * Set the value of dataCadastro
     *
     * @param   mixed  $dataCadastro  
     *
     * @return  self
     */
    public function setDataCadastro($dataCadastro)
    {
        $this->dataCadastro = $dataCadastro;
        return $this;
    }

    /**
     * Get the value of statusLeitor
     *
     * @return  mixed
     */
    public function getStatusLeitor()
    {
        return $this->statusLeitor;
    }

    /**
     * Set the value of statusLeitor
     *
     * @param   mixed  $statusLeitor  
     *
     * @return  self
     */
    public function setStatusLeitor($statusLeitor)
    {
        $this->statusLeitor = $statusLeitor;
        return $this;
    }

    /**
     * Get the value of emailLeitor
     *
     * @return  mixed
     */
    public function getEmailLeitor()
    {
        return $this->emailLeitor;
    }

    /**
     * Set the value of emailLeitor
     *
     * @param   mixed  $emailLeitor  
     *
     * @return  self
     */
    public function setEmailLeitor($emailLeitor)
    {
        $this->emailLeitor = $emailLeitor;
        return $this;
    }

    /**
     * Get the value of sexoLeitor
     *
     * @return  mixed
     */
    public function getSexoLeitor()
    {
        return $this->sexoLeitor;
    }

    /**
     * Set the value of sexoLeitor
     *
     * @param   mixed  $sexoLeitor  
     *
     * @return  self
     */
    public function setSexoLeitor($sexoLeitor)
    {
        $this->sexoLeitor = $sexoLeitor;
        return $this;
    }

    /**
     * Get the value of avatarLeitor
     *
     * @return  mixed
     */
    public function getAvatarLeitor()
    {
        return $this->avatarLeitor;
    }

    /**
     * Set the value of avatarLeitor
     *
     * @param   mixed  $avatarLeitor  
     *
     * @return  self
     */
    public function setAvatarLeitor($avatarLeitor)
    {
        $this->avatarLeitor = $avatarLeitor;
        return $this;
    }

    /**
     * Get the value of nomeLeitor
     *
     * @return  mixed
     */
    public function getNomeLeitor()
    {
        return $this->nomeLeitor;
    }

    /**
     * Set the value of nomeLeitor
     *
     * @param   mixed  $nomeLeitor  
     *
     * @return  self
     */
    public function setNomeLeitor($nomeLeitor)
    {
        $this->nomeLeitor = $nomeLeitor;
        return $this;
    }

    public function inserir()
    {
        $erros = "";
        $valida = $this->validarDados();
        if (strlen($valida) <= 0) {
            //inserindo dados no cafe dos alunos
            if ($this->getAvatarLeitor()['size'] <= $this->tamanho_upload) {

                $this->setIdLeitor($this->proximoID('leitor', 'idLeitor')[0]['max_id'] + 1);
                $arquivo_tmp = $this->getAvatarLeitor()['tmp_name'];
                $nome = $this->getAvatarLeitor()['name'];
                $extensao = strrchr($nome, '.');
                $extensao = strtolower($extensao);
                if (strstr('.jpg;.jpeg;.gif;.png', $extensao)) {

                    //$novoNome = md5(microtime())  . $extensao;
                    $novoNome = "foto_" . md5(time())  . $extensao;

                    $destino = './web-pages/assets/images/leitor/' . $novoNome;



                    if ($this->compressImage($arquivo_tmp, $destino, 50)) {

                        $dados_leitor = [
                            "idLeitor" => $this->getIdLeitor(),
                            "idTipo" => $this->getIdTipo(),
                            "nomeLeitor" => ($this->getNomeLeitor()),
                            "emailLeitor" => ($this->getEmailLeitor()),
                            "sexoLeitor" => ($this->getSexoLeitor()),
                            "loginLeitor" => ($this->getLoginLeitor()),
                            "senhaLeitor" => md5(($this->getSenhaLeitor())),
                            "avatarLeitor" => $novoNome,
                            "statusLeitor" => ($this->getStatusLeitor()),
                        ];
                        $this->set_transaction($this->insert($dados_leitor, 'leitor'));
                    } else {
                        $erros .= "Falha ao cadastrar o autor, comunique o administrador!<br>";
                    }
                    if (strlen($erros) <= 0) {
                        $retorno = $this->execTransaction();
                    } else {
                        $retorno = $erros;
                    }
                } else {
                    $retorno = $valida;
                }
                return $retorno;
            }
        }
    }

    public function excluir()
    {

        $where = "idLeitor = " . $this->getIdLeitor();
        $retorno = $this->delete($where);

        return $retorno;
    }



    public function listarTodas()
    {

        //COLUNAS DA TABELA
        $places = ['*'];

        //inner join, outer join, todos as ligações que quiser fazer
        $innerjoin = null;

        //condição do select
        $where = null;

        //ordenar select
        $orderby = 'nomeLeitor';

        //limit = quantidade de registros para exibir
        $limit = null;

        //usado junto com o limit por exemplo começa a exibição do segundo registro e mostre mais 5 ficaria limit 5 offset 1
        $offset = null;

        //coluna na qual serão agrupados os valores
        $groupby = null;


        return $this->read($this->_tabela, $where, $limit, $offset, $orderby, $places, $innerjoin, $groupby);
    }

    public function listarPorCodigo($id)
    {

        return $this->read($this->_tabela, "idLeitor = $id", null, null, null, null, null, null);
    }

    public function alterar()
    {
        $erros = "";
        $valida = $this->validarDados();
        if (strlen($valida) <= 0) {
            //inserindo dados no cafe dos alunos
            if ($this->getAvatarLeitor()['size'] <= $this->tamanho_upload) {

                $arquivo_tmp = $this->getAvatarLeitor()['tmp_name'];
                $nome = $this->getAvatarLeitor()['name'];
                $extensao = strrchr($nome, '.');
                $extensao = strtolower($extensao);
                if (strstr('.jpg;.jpeg;.gif;.png', $extensao)) {

                    //                            $novoNome = md5(microtime())  . $extensao;
                    $novoNome = "foto_" . md5(time())  . $extensao;

                    $destino = './web-pages/assets/images/leitor/' . $novoNome;



                    if ($this->compressImage($arquivo_tmp, $destino, 50)) {

                        $dados_leitor = [
                            "idLeitor" => $this->getIdLeitor(),
                            "idTipo" => $this->getIdTipo(),
                            "nomeLeitor" => ($this->getNomeLeitor()),
                            "emailLeitor" => ($this->getEmailLeitor()),
                            "sexoLeitor" => ($this->getSexoLeitor()),
                            "loginLeitor" => ($this->getLoginLeitor()),
                            "senhaLeitor" => md5(($this->getSenhaLeitor())),
                            "avatarLeitor" => $novoNome,
                            "statusLeitor" => ($this->getStatusLeitor()),
                        ];

                        $where = "idLeitor = " . $this->getIdLeitor();
                        $this->set_transaction($this->update($dados_leitor, $where, $this->_tabela));
                    } else {
                        $erros .= "Falha ao cadastrar o autor, comunique o administrador!<br>";
                    }
                    if (strlen($erros) <= 0) {
                        $retorno = $this->execTransaction();
                    } else {
                        $retorno = $erros;
                    }
                } else {
                    $retorno = $valida;
                }
                return $retorno;
            }
            $retorno = $this->execTransaction();
        } else {
            $retorno = $valida;
        }
        return $retorno;
    }



    public function validarDados()
    {

        $erros = "";
        if (strlen($this->getIdTipo()) <= 0) {
            $erros .= "Tipo de leitor inválido!<br>";
        }
        if(!Validar::validaEmail($this->getEmailLeitor())){
            $erros .= "Email do Leitor inválido!<br/>";
        }
        if (strlen($this->getNomeLeitor()) < 3) {
            $erros .= "Nome de Leitor inválido!<br/>";
        }
        if (strlen($this->getLoginLeitor()) < 3) {
            $erros .= "Login do Leitor inválido!<br/>";
        }
        if (strlen($this->getSenhaLeitor()) < 8) {
            $erros .= "Senha do Leitor inválida, minímo 8 caracteres!<br/>";
        }
        if (strlen($this->getAvatarLeitor()['tmp_name']) <= 0) {
            $erros .= "Foto inválida!<br>";
        }
        return $erros;
    }

    function compressImage($source, $destination, $quality)
    {
        $info = getimagesize($source);


        if ($info['mime'] == 'image/jpeg') {
            $image = imagecreatefromjpeg($source);
        } elseif ($info['mime'] == 'image/gif') {
            $image = imagecreatefromgif($source);
        } elseif ($info['mime'] == 'image/png') {
            $image = imagecreatefrompng($source);
        }

        return imagejpeg($image, $destination, 90);
    }
}
