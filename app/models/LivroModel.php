<?php

class LivroModel extends Model
{

    public $_tabela = "livro";
    private $idLivro;
    private $idEditora;
    private $idAutor;
    private $idCategoria;
    private $tituloLivro;
    private $tipoLivro;
    private $sinopseLivro;
    private $observacoesLivro;
    private $dataLancamento;
    private $dataCadastro;
    private $totalPaginas;
    private $pdfLivro;
    private $imagemCapa;
    private $imagemThumb;
    private $verificaPdf;
    private $tamanho_upload = 1024 * 1024 * 5; //5MB
    private $uploadOk = false;

    private $tipoOperacao;
    private $quantidadeLivros;

    /**
     * @return mixed
     */
    public function getIdCategoria()
    {
        return $this->idCategoria;
    }

    /**
     * @param mixed $idCategoria
     */
    public function setIdCategoria($idCategoria)
    {
        $this->idCategoria = $idCategoria;
    }



    /**
     * @return mixed
     */
    public function getQuantidadeLivros()
    {
        return $this->quantidadeLivros;
    }

    /**
     * @param mixed $quantidadeLivros
     */
    public function setQuantidadeLivros($quantidadeLivros)
    {
        $this->quantidadeLivros = $quantidadeLivros;
    }



    /**
     * @return mixed
     */
    public function getTipoOperacao()
    {
        return $this->tipoOperacao;
    }

    /**
     * @param mixed $tipoOperacao
     */
    public function setTipoOperacao($tipoOperacao)
    {
        $this->tipoOperacao = $tipoOperacao;
    }





    public function getTipoLivro()
    {
        return $this->tipoLivro;
    }

    public function setTipoLivro($tipoLivro)
    {
        $this->tipoLivro = $tipoLivro;
        return $this;
    }

    public function getIdLivro()
    {
        return $this->idLivro;
    }

    public function setIdLivro($idLivro)
    {
        $this->idLivro = $idLivro;
        return $this;
    }

    public function getIdAutor()
    {
        return $this->idAutor;
    }


    public function getVerificaPdf()
    {
        return $this->verificaPdf;
    }


    public function setVerificaPdf($verificaPdf)
    {
        $this->verificaPdf = $verificaPdf;
        return $this;
    }

    public function setIdAutor($idAutor)
    {
        $this->idAutor = $idAutor;
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


    public function inserirBKP()
    {
        $erros = "";
        $valida = $this->validarDados();
        if (strlen($valida) <= 0) {
            //inserindo dados no autor
            if (
                $this->getImagemCapa()['size'] <= $this->tamanho_upload &&
                $this->getImagemThumb()['size'] <= $this->tamanho_upload
            ) {

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



                    if ($this->compressImage($arquivo_tmp, $destino, 50) && $this->compressImage($arquivo_tmp2, $destino2, 50)) {
                        $upload = $this->uploadPdf($this->getPdfLivro());
                        if ($this->uploadOk) {
                            $dados_livro = [
                                "idLivro" => ($this->getIdLivro()),
                                "idEditora" => ($this->getIdEditora()),
                                "tituloLivro" => ($this->getTituloLivro()),
                                "observacoesLivro" => ($this->getObservacoesLivro()),
                                "sinopseLivro" => ($this->getSinopseLivro()),
                                "dataLancamento" => ($this->getDataLancamento()),
                                "tipoLivro" => ($this->getTipoLivro()),
                                "dataCadastro" => ($this->getDataCadastro()),
                                "totalPaginas" => ($this->getTotalPaginas()),
                                "pdfLivro" => ($upload),
                                "imagemThumb" => $novoNome2,
                                "imagemCapa" => $novoNome,
                            ];
                            $this->set_transaction($this->insert($dados_livro, 'livro'));
                            foreach($this->getIdAutor() as $autor){
                                $dados_autorLivro = [
                                    "idLivro" => ($this->getIdLivro()),
                                    "dataCadastro" => ($this->getDataCadastro()),
                                    "idAutor" => $autor
                                ];
                                $this->set_transaction(($this->insert($dados_autorLivro, 'autorlivro')));
                            }
                        }
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
        } else {
            $retorno = $valida;
        }
        return $retorno;
    }

    public function inserir()
    {
        $erros = "";
        $valida = $this->validarDados();
        if (strlen($valida) <= 0) {

            $arquivo_tmp = $this->getImagemCapa()['tmp_name'];
            $arquivo_tmp2 = $this->getImagemThumb()['tmp_name'];
            $nome = $this->getImagemCapa()['name'];
            $nome2 = $this->getImagemThumb()['name'];
            $extensao = strrchr($nome, '.');
            $extensao2 = strrchr($nome2, '.');
            $extensao = strtolower($extensao);
            $extensao2 = strtolower($extensao2);

            $dados_livro = [
<<<<<<< HEAD
                "idLivro" => ($this->getIdLivro()),
=======
>>>>>>> a5d2bc4845fc02b51a477d6ad8a15714ea4e5c9e
                "idEditora" => ($this->getIdEditora()),
                "tituloLivro" => ($this->getTituloLivro()),
                "observacoesLivro" => ($this->getObservacoesLivro()),
                "sinopseLivro" => ($this->getSinopseLivro()),
                "dataLancamento" => ($this->getDataLancamento()),
                "tipoLivro" => ($this->getTipoLivro()),
                "dataCadastro" => ($this->getDataCadastro()),
                "totalPaginas" => ($this->getTotalPaginas()),
                "quantidadeLivros" => ($this->getQuantidadeLivros())
            ];



            if ($this->getImagemCapa()['tmp_name'] != null && $this->getImagemCapa()['size'] <= $this->tamanho_upload && strstr('.jpg;.jpeg;.gif;.png', $extensao)){
                $novoNome = "foto_" . md5(time())  . $extensao;
                $destino = './web-pages/assets/images/livro/' . $novoNome;
                $this->compressImage($arquivo_tmp, $destino, 50);
                $dados_livro["imagemCapa"] = $novoNome;
            }

            if ($this->getImagemThumb()['tmp_name'] != null && $this->getImagemThumb()['size'] <= $this->tamanho_upload && strstr('.jpg;.jpeg;.gif;.png', $extensao2)) {
                $novoNome2 = "foto_" . md5(time())  . $extensao2;
                $destino2 = './web-pages/assets/images/livro/thumb/' . $novoNome2;
                $this->compressImage($arquivo_tmp2, $destino2, 50);
                $dados_livro["imagemThumb"] = $novoNome2;
            }

            if ($this->getPdfLivro()['tmp_name'] != null) {
                $upload = $this->uploadPdf($this->getPdfLivro());
                if ($this->uploadOk) {
                    $dados_livro["pdfLivro"] = $upload;
                }
            }

            $this->set_transaction($this->insert($dados_livro, 'livro'));


            foreach($this->getIdAutor() as $autor){
                $dados_autorLivro = [
                    "idLivro" => ($this->getIdLivro()),
                    "dataCadastro" => ($this->getDataCadastro()),
                    "idAutor" => $autor
                ];
                $this->set_transaction(($this->insert($dados_autorLivro, 'autorlivro')));
            }



            foreach($this->getIdCategoria() as $cate){
                $dados_categoria = [
                    "idLivro" => ($this->getIdLivro()),
                    "idCategoria" => $cate,
                    "dataCadastro" => ($this->getDataCadastro())
                ];
                $this->set_transaction(($this->insert($dados_categoria, 'categorialivro')));
            }

            $retorno = $this->execTransaction();

        } else {
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
        $places = ['livro.*', 'editora.descricaoEditora'];

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

    public function listarTodasPorTipo($tipo)
    {

        //COLUNAS DA TABELA
        $places = ['livro.*', 'editora.descricaoEditora'];

        //inner join, outer join, todos as ligações que quiser fazer
        $innerjoin = 'inner join editora on livro.idEditora = editora.idEditora';

        //condição do select
        $where = "tipoLivro = '$tipo'";

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

                $arquivo_tmp = $this->getImagemCapa()['tmp_name'];
                $arquivo_tmp2 = $this->getImagemThumb()['tmp_name'];
                $nome = $this->getImagemCapa()['name'];
                $nome2 = $this->getImagemThumb()['name'];
                $extensao = strrchr($nome, '.');
                $extensao2 = strrchr($nome2, '.');
                $extensao = strtolower($extensao);
                $extensao2 = strtolower($extensao2);

                    $dados_livro = [
                        "idEditora" => ($this->getIdEditora()),
                        "tituloLivro" => ($this->getTituloLivro()),
                        "observacoesLivro" => ($this->getObservacoesLivro()),
                        "sinopseLivro" => ($this->getSinopseLivro()),
                        "dataLancamento" => ($this->getDataLancamento()),
                        "tipoLivro" => ($this->getTipoLivro()),
                        "dataCadastro" => ($this->getDataCadastro()),
                        "totalPaginas" => ($this->getTotalPaginas()),
                        "quantidadeLivros" => ($this->getQuantidadeLivros())
                    ];


                    if ($this->getImagemCapa()['tmp_name'] != null && $this->getImagemCapa()['size'] <= $this->tamanho_upload && strstr('.jpg;.jpeg;.gif;.png', $extensao)){
                        $novoNome = "foto_" . md5(time())  . $extensao;
                        $destino = './web-pages/assets/images/livro/' . $novoNome;
                        $this->compressImage($arquivo_tmp, $destino, 50);
                    $dados_livro["imagemCapa"] = $novoNome;
                    }

                    if ($this->getImagemThumb()['tmp_name'] != null && $this->getImagemThumb()['size'] <= $this->tamanho_upload && strstr('.jpg;.jpeg;.gif;.png', $extensao2)) {
                        $novoNome2 = "foto_" . md5(time())  . $extensao2;
                        $destino2 = './web-pages/assets/images/livro/thumb/' . $novoNome2;
                        $this->compressImage($arquivo_tmp2, $destino2, 50);
                        $dados_livro["imagemThumb"] = $novoNome2;
                    }

                        if ($this->getPdfLivro()['tmp_name'] != null) {
                            $upload = $this->uploadPdf($this->getPdfLivro());
                            if ($this->uploadOk) {
                                $dados_livro["pdfLivro"] = $upload;
                            }
                        }


            $where = "idLivro = '" . $this->getIdLivro() ."'";
            $this->set_transaction($this->update($dados_livro, $where, $this->_tabela));

            $this->set_transaction($this->deleteTransaction($where, 'autorlivro'));
            foreach($this->getIdAutor() as $autor){
                $dados_autorLivro = [
                    "idLivro" => ($this->getIdLivro()),
                    "dataCadastro" => ($this->getDataCadastro()),
                    "idAutor" => $autor
                ];
                $this->set_transaction(($this->insert($dados_autorLivro, 'autorlivro')));
            }



            $this->set_transaction($this->deleteTransaction($where, 'categorialivro'));
            foreach($this->getIdCategoria() as $cate){
                $dados_categoria = [
                    "idLivro" => ($this->getIdLivro()),
                    "idCategoria" => $cate,
                    "dataCadastro" => ($this->getDataCadastro())
                ];
                $this->set_transaction(($this->insert($dados_categoria, 'categorialivro')));
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
        if (strlen($this->getTipoLivro()) <= 0) {
            $erros .= "Tipo do livro inválido!<br>";
        } else {
<<<<<<< HEAD
            if($this->getTipoLivro() == 'digital'){
                if(trim(strtolower($this->getTipoOperacao())) == 'inserir'){
                    if (strlen($this->getImagemCapa()['tmp_name']) <= 0) {
                        $erros .= "Foto inválida!<br>";
                    }
                    if (strlen($this->getPdfLivro()['tmp_name']) <= 0 && strlen($this->getVerificaPdf()) <= 0)  {
                        $erros .= "Pdf inválido!<br>";
                    }
                    if (($this->getTotalPaginas()) <= 0) {
                        $erros .= "Total de páginas inválido!<br>";
                    }
=======
            if(trim(strtolower($this->getTipoOperacao())) == 'inserir'){
                if (strlen($this->getImagemCapa()['tmp_name']) <= 0) {
                    $erros .= "Foto inválida!<br>";
                }
                if (strlen($this->getPdfLivro()['tmp_name']) <= 0 && strlen($this->getVerificaPdf()) <= 0)  {
                    $erros .= "Pdf inválido!<br>";
                }
                if (($this->getTotalPaginas()) <= 0) {
                    $erros .= "Total de páginas inválido!<br>";
>>>>>>> a5d2bc4845fc02b51a477d6ad8a15714ea4e5c9e
                }
            }

        }

        if ($this->getIdAutor() == null || count($this->getIdAutor()) <= 0) {
            $erros .= "Selecione o autor!<br>";
        }
        if (strlen($this->getIdLivro()) <= 0) {
            $erros .= "Id do livro inválido!<br>";
        }

        if (strlen($this->getTituloLivro()) < 3) {
            $erros .= "Nome do livro inválido!<br>";
        }
        if (strlen($this->getObservacoesLivro()) < 6) {
            $erros .= "Observações do livro inválida!<br>";
        }
        if (strlen($this->getSinopseLivro()) < 10) {
            $erros .= "Sinopse do livro inválida!<br>";
        }
        if (strlen($this->getDataLancamento()) < 10) {
            $erros .= "Data de lançamento do livro inválida!<br>";
        }
        return $erros;
    }

    function extensao($arquivo)
    {
        $arquivo = strtolower($arquivo);
        $explode = explode(".", $arquivo);
        $arquivo = end($explode);

        return ($arquivo);
    }

    public function uploadPdf($pdf)
    {
        define('KB', 1024);
        define('MB', 1048576); // 1024 * 1024
        define('GB', 1073741824); // 1024 * 1024 * 1024
        define('TB', 1099511627776); // 1024 * 1024 * 1024 * 1024

        $mensagem = "";

        if (isset($pdf)) {
            // arquivo
            $arquivo = $pdf;

            // Tamanho máximo do arquivo (em Bytes)
            $tamanhoPermitido = 1024 * 1024 * 40; // 40Mb

            //Define o diretorio para onde enviaremos o arquivo
            $diretorio = './web-pages/assets/images/livro/pdfLivro/';

            // verifica se arquivo foi enviado e sem erros
            if ($arquivo['error'] == UPLOAD_ERR_OK) {

                // pego a extensão do arquivo
                $extensao = $this->extensao($arquivo['name']);

                // valida a extensão
                if (in_array($extensao, array("pdf"))) {

                    // verifica tamanho do arquivo
                    if ($arquivo['size'] > $tamanhoPermitido) {
                        $mensagem = "Tamanho inválido!";
                    } else {

                        // atribui novo nome ao arquivo
                        $novo_nome  = md5(time()) . "." . $extensao;

                        // faz o upload
                        $pdfLivro = move_uploaded_file($pdf['tmp_name'], $diretorio . $novo_nome);

                        if ($pdfLivro) {
                            $mensagem = $novo_nome;
                            $this->uploadOk = true;
                        } else {
                            $mensagem = "Falha ao enviar o pdf!";
                        }
                    }
                } else {
                    $mensagem = "Somente arquivos PDF são permitidos.";
                }
            } else {
                $mensagem = "Você deve enviar um arquivo.";
            }
        }
        return $mensagem;
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
