<?php

class CategoriaModel extends Model
{

    public $_tabela = "categoria";
    private $idCategoria;
    private $dataCadastro;
    private $descricaoCategoria;
    private $imagemCategoria;
    private $tamanho_upload = 1024 * 1024 * 5; //5MB


    /**
* Get the value of idCategoria
*
* @return  mixed
*/
public function getIdCategoria()
{
return $this->idCategoria;
}

/**
* Set the value of idCategoria
*
* @param   mixed  $idCategoria  
*
* @return  self
*/
public function setIdCategoria($idCategoria)
{
$this->idCategoria = $idCategoria;
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
* Get the value of imagemCategoria
*
* @return  mixed
*/
public function getImagemCategoria()
{
return $this->imagemCategoria;
}

/**
* Set the value of imagemCategoria
*
* @param   mixed  $imagemCategoria  
*
* @return  self
*/
public function setImagemCategoria($imagemCategoria)
{
$this->imagemCategoria = $imagemCategoria;
return $this;
}

/**
* Get the value of descricaoCategoria
*
* @return  mixed
*/
public function getDescricaoCategoria()
{
return $this->descricaoCategoria;
}

/**
* Set the value of descricaoCategoria
*
* @param   mixed  $descricaoCategoria  
*
* @return  self
*/
public function setDescricaoCategoria($descricaoCategoria)
{
$this->descricaoCategoria = $descricaoCategoria;
return $this;
}
    
  

    public function inserir()
    {
        $erros = "";
        $valida = $this->validarDados();
        if (strlen($valida) <= 0) {
            //inserindo dados no cafe dos alunos
            if ($this->getImagemCategoria()['size'] <= $this->tamanho_upload) {

                $arquivo_tmp = $this->getImagemCategoria()['tmp_name'];
                $nome = $this->getImagemCategoria()['name'];
                $extensao = strrchr($nome, '.');
                $extensao = strtolower($extensao);
                if (strstr('.jpg;.jpeg;.gif;.png', $extensao)) {

                    //                            $novoNome = md5(microtime())  . $extensao;
                    $novoNome = "foto_" . md5(time())  . $extensao;

                    $destino = './web-pages/assets/images/autor/' . $novoNome;



                    if ($this->compressImage($arquivo_tmp, $destino, 50)) {

                        $dados_categoria = [
                            "descricaoCategoria" => mb_strtoupper($this->getDescricaoCategoria()),
                            "imagemCategoria" => $novoNome,
                            "dataCadastro" => mb_strtoupper($this->getDataCadastro()),
                        ];
                        $this->set_transaction($this->insert($dados_categoria, 'categoria'));
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

        $where = "idCategoria = " . $this->getIdCategoria();
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
        $orderby = 'descricaoCategoria';

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

        return $this->read($this->_tabela, "idCategoria = $id", null, null, null, null, null, null);
    }

    public function alterar()
    {
        $erros = "";
        $valida = $this->validarDados();
        if (strlen($valida) <= 0) {
            //inserindo dados no cafe dos alunos
            if ($this->getImagemCategoria()['size'] <= $this->tamanho_upload) {

                $arquivo_tmp = $this->getImagemCategoria()['tmp_name'];
                $nome = $this->getImagemCategoria()['name'];
                $extensao = strrchr($nome, '.');
                $extensao = strtolower($extensao);
                if (strstr('.jpg;.jpeg;.gif;.png', $extensao)) {

                    //                            $novoNome = md5(microtime())  . $extensao;
                    $novoNome = "foto_" . md5(time())  . $extensao;

                    $destino = './web-pages/assets/images/categoria/' . $novoNome;



                    if ($this->compressImage($arquivo_tmp, $destino, 50)) {

                        $dados_categoria = [
                            "imagemCategoria" => $novoNome,
                            "descricaoCategoria" => mb_strtoupper($this->getDescricaoCategoria()),
                            "dataCadastro" => mb_strtoupper($this->getDataCadastro()),
                        ];

                        $where = "idCategoria = " . $this->getIdCategoria();
                        $this->set_transaction($this->update($dados_categoria, $where, $this->_tabela));
                    } else {
                        $erros .= "Falha ao cadastrar a categoria, comunique o administrador!<br>";
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

        if (strlen($this->getDescricaoCategoria()) < 3) {
            $erros .= "Nome da categoria inválido!<br/>";
        }
        if (strlen($this->getImagemCategoria()['tmp_name']) <= 0) {
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
