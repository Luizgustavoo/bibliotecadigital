<?php

class AutorModel extends Model
{

    public $_tabela = "autor";
    private $idAutor;
    private $dataCadastro;
    private $descricaoAutor;
    private $imagemAutor;
    private $tamanho_upload = 1024 * 1024 * 5; //5MB



    /**
     * Get the value of idAutor
     */
    public function getIdAutor()
    {
        return $this->idAutor;
    }

    /**
     * Set the value of idAutor
     *
     * @return  self
     */
    public function setIdAutor($idAutor)
    {
        $this->idAutor = $idAutor;

        return $this;
    }

    /**
     * Get the value of descricaoAutor
     */
    public function getDescricaoAutor()
    {
        return $this->descricaoAutor;
    }

    /**
     * Set the value of descricaoAutor
     *
     * @return  self
     */
    public function setDescricaoAutor($descricaoAutor)
    {
        $this->descricaoAutor = $descricaoAutor;

        return $this;
    }

    /**
     * Get the value of imagemAutor
     */
    public function getImagemAutor()
    {
        return $this->imagemAutor;
    }

    /**
     * Set the value of imagemAutor
     *
     * @return  self
     */
    public function setImagemAutor($imagemAutor)
    {
        $this->imagemAutor = $imagemAutor;

        return $this;
    }
    /**
     * Get the value of dataCadastro
     */
    public function getDataCadastro()
    {
        return $this->dataCadastro;
    }

    /**
     * Set the value of dataCadastro
     *
     * @return  self
     */
    public function setDataCadastro($dataCadastro)
    {
        $this->dataCadastro = $dataCadastro;

        return $this;
    }


    public function inserir()
    {
        $erros = "";
        $valida = $this->validarDados();
        if (strlen($valida) <= 0) {
            //inserindo dados no autor
            if ($this->getImagemAutor()['size'] <= $this->tamanho_upload) {

                $arquivo_tmp = $this->getImagemAutor()['tmp_name'];
                $nome = $this->getImagemAutor()['name'];
                $extensao = strrchr($nome, '.');
                $extensao = strtolower($extensao);
                if (strstr('.jpg;.jpeg;.gif;.png', $extensao)) {

                    //                            $novoNome = md5(microtime())  . $extensao;
                    $novoNome = "foto_" . md5(time())  . $extensao;

                    $destino = './web-pages/assets/images/autor/' . $novoNome;



                    if ($this->compressImage($arquivo_tmp, $destino, 50)) {

                        $dados_autor = [
                            "descricaoAutor" => mb_strtoupper($this->getDescricaoAutor()),
                            "imagemAutor" => $novoNome,
                            "dataCadastro" => mb_strtoupper($this->getDataCadastro()),
                        ];
                        $this->set_transaction($this->insert($dados_autor, 'autor'));
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

        $where = "idAutor = " . $this->getIdAutor();
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
        $orderby = 'descricaoAutor';

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

        return $this->read($this->_tabela, "idAutor = $id", null, null, null, null, null, null);
    }

    public function alterar()
    {
        $erros = "";
        $valida = $this->validarDados();
        if (strlen($valida) <= 0) {
            //inserindo dados no cafe dos alunos
            if ($this->getImagemAutor()['size'] <= $this->tamanho_upload) {

                $arquivo_tmp = $this->getImagemAutor()['tmp_name'];
                $nome = $this->getImagemAutor()['name'];
                $extensao = strrchr($nome, '.');
                $extensao = strtolower($extensao);
                if (strstr('.jpg;.jpeg;.gif;.png', $extensao)) {

                    //                            $novoNome = md5(microtime())  . $extensao;
                    $novoNome = "foto_" . md5(time())  . $extensao;

                    $destino = './web-pages/assets/images/autor/' . $novoNome;



                    if ($this->compressImage($arquivo_tmp, $destino, 50)) {

                        $dados_autor = [
                            "imagemAutor" => $novoNome,
                            "descricaoAutor" => mb_strtoupper($this->getDescricaoAutor()),
                            "dataCadastro" => mb_strtoupper($this->getDataCadastro()),
                        ];

                        $where = "idAutor = " . $this->getIdAutor();
                        $this->set_transaction($this->update($dados_autor, $where, $this->_tabela));
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

        if (strlen($this->getDescricaoAutor()) < 3) {
            $erros .= "Nome da autor inválido!<br/>";
        }
        if (strlen($this->getImagemAutor()['tmp_name']) <= 0) {
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
