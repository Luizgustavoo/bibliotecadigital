<?php

class LivroModel extends Model
{

    public $_tabela = "livro";
    private $idLivro;
    private $idEditora;
    private $tituloLivro;
    private $sinopseLivro;
    private $observacoesLivro;
    private $dataLancamento;
    private $dataCadastro;
    private $totalPaginas;
    private $pdfLivro;
    private $imagemCapa;
    private $imagemThumb;
    private $tamanho_upload = 1024 * 1024 * 5; //5MB

    public function getIdLivro()
    {
        return $this->idLivro;
    }

    public function setIdLivro($idLivro)
    {
        $this->idLivro = $idLivro;
        return $this;
    }

    public function getIdEditora()
    {
        return $this->idEditora;
    }

    public function setIdEditora($idEditora)
    {
        $this->idEditora = $idEditora;
        return $this;
    }

    public function getTituloLivro()
    {
        return $this->tituloLivro;
    }

    public function setTituloLivro($tituloLivro)
    {
        $this->tituloLivro = $tituloLivro;
        return $this;
    }

    public function getSinopseLivro()
    {
        return $this->sinopseLivro;
    }

    public function setSinopseLivro($sinopseLivro)
    {
        $this->sinopseLivro = $sinopseLivro;
        return $this;
    }

    public function getObservacoesLivro()
    {
    return $this->observacoesLivro;
    }
    
    
    public function setObservacoesLivro($observacoesLivro)
    {
    $this->observacoesLivro = $observacoesLivro;
    return $this;
    }

    public function getDataLancamento()
    {
        return $this->dataLancamento;
    }

    public function setDataLancamento($dataLancamento)
    {
        $this->dataLancamento = $dataLancamento;
        return $this;
    }

    public function getDataCadastro()
    {
        return $this->dataCadastro;
    }

    public function setDataCadastro($dataCadastro)
    {
        $this->dataCadastro = $dataCadastro;
        return $this;
    }

    public function getTotalPaginas()
    {
        return $this->totalPaginas;
    }

    public function setTotalPaginas($totalPaginas)
    {
        $this->totalPaginas = $totalPaginas;
        return $this;
    }

    public function getPdfLivro()
    {
        return $this->pdfLivro;
    }

    public function setPdfLivro($pdfLivro)
    {
        $this->pdfLivro = $pdfLivro;
        return $this;
    }


    public function getImagemCapa()
    {
        return $this->imagemCapa;
    }


    public function setImagemCapa($imagemCapa)
    {
        $this->imagemCapa = $imagemCapa;
        return $this;
    }


    public function getImagemThumb()
    {
        return $this->imagemThumb;
    }

    public function setImagemThumb($imagemThumb)
    {
        $this->imagemThumb = $imagemThumb;
        return $this;
    }


    public function inserir()
    {
        $erros = "";
        $valida = $this->validarDados();
        if (strlen($valida) <= 0) {
            //inserindo dados no autor
            if ($this->getImagemCapa()['size'] <= $this->tamanho_upload &&
            $this->getImagemThumb()['size'] <= $this->tamanho_upload)  {

                $arquivo_tmp = $this->getImagemCapa()['tmp_name'];
                $arquivo_tmp2 = $this->getImagemThumb()['tmp_name'];
                $nome = $this->getImagemCapa()['name'];
                $nome2 = $this->getImagemThumb()['name'];
                $extensao = strrchr($nome, '.');
                $extensao2 = strrchr($nome2, '.');
                $extensao = strtolower($extensao);
                $extensao2 = strtolower($extensao2);
                if (strstr('.jpg;.jpeg;.gif;.png', $extensao) && strstr('.jpg;.jpeg;.gif;.png', $extensao2)) {

                    //                            $novoNome = md5(microtime())  . $extensao;
                    $novoNome = "foto_" . md5(time())  . $extensao;
                    $novoNome2 = "foto_" . md5(time())  . $extensao2;

                    $destino = './web-pages/assets/images/livro/' . $novoNome;
                    $destino2 = './web-pages/assets/images/livro/thumb/' . $novoNome2;



                    if ($this->compressImage($arquivo_tmp, $destino, 50)&& $this->compressImage($arquivo_tmp2, $destino2, 50)) {

                        $dados_livro = [
                            "idEditora" => ($this->getIdEditora()),
                            "tituloLivro" => ($this->getTituloLivro()),
                            "observacoesLivro" => ($this->getObservacoesLivro()),
                            "sinopseLivro" => ($this->getSinopseLivro()),
                            "dataLancamento" => ($this->getDataLancamento()),
                            "dataCadastro" => ($this->getDataCadastro()),
                            "totalPaginas" => ($this->getTotalPaginas()),
                            "pdfLivro" => ($this->getPdfLivro()),
                            "imagemThumb" => $novoNome2,
                            "imagemCapa" => $novoNome,
                        ];
                        $this->set_transaction($this->insert($dados_livro, 'livro'));
                    } else {
                        $erros .= "Falha ao cadastrar o livro, comunique o administrador!<br>";
                    }
                    if (strlen($erros) <= 0) {
                        $retorno = $this->execTransaction();
                    } else {
                        $retorno = $erros;
                    }
                } else {
                    $retorno = 'Extensão inválida!';
                }
                
            }
        }else {
            $retorno = $valida;
        }
        return $retorno;
    }

    public function excluir()
    {

        $where = "idLivro = " . $this->getIdLivro();
        $retorno = $this->delete($where);

        return $retorno;
    }



    public function listarTodas()
    {

        //COLUNAS DA TABELA
        $places = ['livro.*', 'editora.descricaoEditora' ];

        //inner join, outer join, todos as ligações que quiser fazer
        $innerjoin = 'inner join editora on livro.idEditora = editora.idEditora';

        //condição do select
        $where = null;

        //ordenar select
        $orderby = 'tituloLivro';

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

        return $this->read($this->_tabela, "idLivro = $id", null, null, null, null, null, null);
    }

    public function alterar()
    {
        $erros = "";
        $valida = $this->validarDados();
        if (strlen($valida) <= 0) {
            //inserindo dados no cafe dos alunos
            if ($this->getImagemCapa()['size'] <= $this->tamanho_upload) {

                $arquivo_tmp = $this->getImagemCapa()['tmp_name'];
                $nome = $this->getImagemCapa()['name'];
                $extensao = strrchr($nome, '.');
                $extensao = strtolower($extensao);
                if (strstr('.jpg;.jpeg;.gif;.png', $extensao)) {

                    //                            $novoNome = md5(microtime())  . $extensao;
                    $novoNome = "foto_" . md5(time())  . $extensao;

                    $destino = './web-pages/assets/images/livro/' . $novoNome;



                    if ($this->compressImage($arquivo_tmp, $destino, 50)) {

                        $dados_livro = [
                            "imagemCapa" => $novoNome,
                            "tituloLivro" => mb_strtoupper($this->getTituloLivro()),
                            "dataCadastro" => mb_strtoupper($this->getDataCadastro()),
                        ];

                        $where = "idLivro = " . $this->getIdLivro();
                        $this->set_transaction($this->update($dados_livro, $where, $this->_tabela));
                    } else {
                        $erros .= "Falha ao cadastrar o livro, comunique o administrador!<br>";
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

        if (strlen($this->getTituloLivro()) < 3) {
            $erros .= "Nome do livro inválido!<br/>";
        }
        if (strlen($this->getImagemCapa()['tmp_name']) <= 0) {
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
