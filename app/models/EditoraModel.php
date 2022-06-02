<?php

class EditoraModel extends Model
{

    public $_tabela = "editora";
    private $idEditora;
    private $dataCadastro;
    private $descricaoEditora;
    private $imagemEditora;
    private $tamanho_upload = 1024 * 1024 * 5; //5MB


    /**
     * Get the value of idEditora
     *
     * @return  mixed
     */
    public function getIdEditora()
    {
        return $this->idEditora;
    }

    /**
     * Set the value of idEditora
     *
     * @param   mixed  $idEditora  
     *
     * @return  self
     */
    public function setIdEditora($idEditora)
    {
        $this->idEditora = $idEditora;
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
     * Get the value of descricaoEditora
     *
     * @return  mixed
     */
    public function getDescricaoEditora()
    {
        return $this->descricaoEditora;
    }

    /**
     * Set the value of descricaoEditora
     *
     * @param   mixed  $descricaoEditora  
     *
     * @return  self
     */
    public function setDescricaoEditora($descricaoEditora)
    {
        $this->descricaoEditora = $descricaoEditora;
        return $this;
    }

    /**
     * Get the value of imagemEditora
     *
     * @return  mixed
     */
    public function getImagemEditora()
    {
        return $this->imagemEditora;
    }

    /**
     * Set the value of imagemEditora
     *
     * @param   mixed  $imagemEditora  
     *
     * @return  self
     */
    public function setImagemEditora($imagemEditora)
    {
        $this->imagemEditora = $imagemEditora;
        return $this;
    }


    public function inserir()
    {
        $erros = "";
        $valida = $this->validarDados();
        if (strlen($valida) <= 0) {
            //inserindo dados no cafe dos alunos
            if ($this->getImagemEditora()['size'] <= $this->tamanho_upload) {

                $arquivo_tmp = $this->getImagemEditora()['tmp_name'];
                $nome = $this->getImagemEditora()['name'];
                $extensao = strrchr($nome, '.');
                $extensao = strtolower($extensao);
                if (strstr('.jpg;.jpeg;.gif;.png', $extensao)) {

                    //                            $novoNome = md5(microtime())  . $extensao;
                    $novoNome = "foto_" . md5(time())  . $extensao;

                    $destino = './web-pages/assets/images/editora/' . $novoNome;



                    if ($this->compressImage($arquivo_tmp, $destino, 50)) {

                        $dados_editora = [
                            "descricaoEditora" => mb_strtoupper($this->getDescricaoEditora()),
                            "imagemEditora" => $novoNome,
                            "dataCadastro" => mb_strtoupper($this->getDataCadastro()),
                        ];
                        $this->set_transaction($this->insert($dados_editora, 'editora'));
                    } else {
                        $erros .= "Falha ao cadastrar a editora, comunique o administrador!<br>";
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

        $where = "idEditora = " . $this->getIdEditora();
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
        $orderby = 'descricaoEditora';

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

        return $this->read($this->_tabela, "idEditora = $id", null, null, null, null, null, null);
    }

    public function alterar()
    {
        $erros = "";
        $valida = $this->validarDados();
        if (strlen($valida) <= 0) {
            //inserindo dados no cafe dos alunos
            if ($this->getImagemEditora()['size'] <= $this->tamanho_upload) {

                $arquivo_tmp = $this->getImagemEditora()['tmp_name'];
                $nome = $this->getImagemEditora()['name'];
                $extensao = strrchr($nome, '.');
                $extensao = strtolower($extensao);
                if (strstr('.jpg;.jpeg;.gif;.png', $extensao)) {

                    //                            $novoNome = md5(microtime())  . $extensao;
                    $novoNome = "foto_" . md5(time())  . $extensao;

                    $destino = './web-pages/assets/images/editora/' . $novoNome;



                    if ($this->compressImage($arquivo_tmp, $destino, 50)) {

                        $dados_editora = [
                            "imagemEditora" => $novoNome,
                            "descricaoEditora" => mb_strtoupper($this->getDescricaoEditora()),
                            "dataCadastro" => mb_strtoupper($this->getDataCadastro()),
                        ];

                        $where = "idEditora = " . $this->getIdEditora();
                        $this->set_transaction($this->update($dados_editora, $where, $this->_tabela));
                    } else {
                        $erros .= "Falha ao cadastrar a editora, comunique o administrador!<br>";
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

        if (strlen($this->getDescricaoEditora()) < 3) {
            $erros .= "Nome da categoria inválido!<br/>";
        }
        if (strlen($this->getImagemEditora()['tmp_name']) <= 0) {
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
