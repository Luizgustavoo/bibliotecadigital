<?php

class EmprestimoModel extends Model
{

    public $_tabela = "emprestimo";

    /*DADOS DO EMPRÉSTIMO*/

    private $idEmprestimo;
    private $idLeitor;
    private $dataEmprestimo;
    private $idUsuario;
    private $statusEmprestimo;

    /*DADOS DOS LIVROS DO EMPRÉSTIMO*/

    private $idLivro = array();
    private $dataDevolucao;
    private $dataDevolvido;



    /**
     * @return mixed
     */
    public function getIdEmprestimo()
    {
        return $this->idEmprestimo;
    }

    /**
     * @param mixed $idEmprestimo
     */
    public function setIdEmprestimo($idEmprestimo)
    {
        $this->idEmprestimo = $idEmprestimo;
    }

    /**
     * @return mixed
     */
    public function getIdLeitor()
    {
        return $this->idLeitor;
    }

    /**
     * @param mixed $idLeitor
     */
    public function setIdLeitor($idLeitor)
    {
        $this->idLeitor = $idLeitor;
    }

    /**
     * @return mixed
     */
    public function getDataEmprestimo()
    {
        return $this->dataEmprestimo;
    }

    /**
     * @param mixed $dataEmprestimo
     */
    public function setDataEmprestimo($dataEmprestimo)
    {
        $this->dataEmprestimo = $dataEmprestimo;
    }

    /**
     * @return array
     */
    public function getIdLivro(): array
    {
        return $this->idLivro;
    }

    /**
     * @param array $idLivro
     */
    public function setIdLivro(array $idLivro)
    {
        $this->idLivro = $idLivro;
    }

    /**
     * @return mixed
     */
    public function getDataDevolucao()
    {
        return $this->dataDevolucao;
    }

    /**
     * @param mixed $dataDevolucao
     */
    public function setDataDevolucao($dataDevolucao)
    {
        $this->dataDevolucao = $dataDevolucao;
    }

    /**
     * @return mixed
     */
    public function getDataDevolvido()
    {
        return $this->dataDevolvido;
    }

    /**
     * @param mixed $dataDevolvido
     */
    public function setDataDevolvido($dataDevolvido)
    {
        $this->dataDevolvido = $dataDevolvido;
    }

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
    public function getStatusEmprestimo()
    {
        return $this->statusEmprestimo;
    }

    /**
     * @param mixed $statusEmprestimo
     */
    public function setStatusEmprestimo($statusEmprestimo)
    {
        $this->statusEmprestimo = $statusEmprestimo;
    }



    public function inserir(){

        $retorno = "";
        $this->setIdEmprestimo(($this->proximoID('emprestimo','idEmprestimo')[0]['max_id']) + 1);

        $valida = $this->validarDados();
        if (strlen($valida) <= 0) {

            $dados_emprestimo = [
                "idEmprestimo" => $this->getIdEmprestimo(),
                "idLeitor" => $this->getIdLeitor(),
                "dataEmprestimo" => $this->getDataEmprestimo(),
                "idUsuario" => $this->getIdUsuario(),
                "dataCadastro" => date('Y-m-d H:i:s'),
                "dataDevolucao" => $this->getDataDevolucao(),
                "statusEmprestimo" => 'aberto',
            ];
            $this->set_transaction($this->insert($dados_emprestimo, 'emprestimo'));


            foreach($this->getIdLivro() as $livro){
                $dados_livros_emprestimo = [
                    "idEmprestimo" => $this->getIdEmprestimo(),
                    "idLivro" => $livro,
                    "dataDevolucao" => $this->getDataDevolucao()
                ];
                $this->set_transaction($this->insert($dados_livros_emprestimo, 'livrosemprestimo'));
            }


            $retorno = $this->execTransaction();

        }else{

            $retorno = $valida;
        }

        return $retorno;
    }

    public function alterar(){

        $retorno = "";

        $valida = $this->validarDados();
        if (strlen($valida) <= 0) {

            $where = "emprestimo.idEmprestimo = " . $this->getIdEmprestimo();

            $dados_emprestimo = [
                "idLeitor" => $this->getIdLeitor(),
                "dataEmprestimo" => $this->getDataEmprestimo(),
                "idUsuario" => $this->getIdUsuario(),
                "dataDevolucao" => $this->getDataDevolucao(),
                "statusEmprestimo" => 'aberto',
            ];


            $this->set_transaction($this->update($dados_emprestimo,$where, 'emprestimo'));

            $this->set_transaction($this->deleteTransaction("livrosemprestimo.idEmprestimo = " . $this->getIdEmprestimo(), 'livrosemprestimo'));
//            echo "<pre>";
            foreach($this->getIdLivro() as $livro){
                $dados_livros_emprestimo = [
                    "idEmprestimo" => $this->getIdEmprestimo(),
                    "idLivro" => $livro,
                    "dataDevolucao" => $this->getDataDevolucao()
                ];
                $this->set_transaction($this->insert($dados_livros_emprestimo, 'livrosemprestimo'));


            }

            $retorno = $this->execTransaction();

        }else{

            $retorno = $valida;
        }

        return $retorno;
    }

    public function validarDados()
    {

        $erros = "";

        if (strlen($this->getIdEmprestimo()) <= 0 || (int)$this->getIdEmprestimo() <= 0) {
            $erros .= "Id do empréstimo inválido!<br/>";
        }
        if (strlen($this->getIdLeitor()) <= 0 || (int)$this->getIdLeitor() <= 0) {
            $erros .= "Leitor inválido!<br/>";
        }
        if (strlen($this->getDataEmprestimo()) < 10) {
            $erros .= "Data do empréstimo inválida!<br>";
        }
        if (strlen($this->getDataDevolucao()) < 10) {
            $erros .= "Data de devolução inválida!<br>";
        }
        if (strlen($this->getIdUsuario()) <= 0 || (int)$this->getIdUsuario() <= 0) {
            $erros .= "Usuário inválido!<br/>";
        }
        if($this->getIdLivro() == null || count($this->getIdLivro()) <= 0){
            $erros .= "Nenhum livro selecionado!<br/>";
        }

        return $erros;
    }

    public function devolverLivro($emprestimo, $livro){

        if(isset($emprestimo, $livro) && !empty($emprestimo) && !empty($livro)){

            $dados_devolver = [
                "dataDevolvido" => date('Y-m-d')
            ];
            $where = "idEmprestimo = {$emprestimo} and idLivro = '{$livro}'";
            $this->set_transaction($this->update($dados_devolver, $where,'livrosemprestimo'));
            $retorno = $this->execTransaction();

            $quantidade = $this->read('livrosemprestimo','idEmprestimo = '.$emprestimo.' and dataDevolvido is null','','','',['count(*) as quantidade'],null,null);

            if($quantidade[0]['quantidade'] <= 0){
                $dados_emprestimo_fechado = [
                    "statusEmprestimo" => 'fechado'
                ];
                $this->set_transaction($this->update($dados_emprestimo_fechado, 'idEmprestimo = '.$emprestimo,'emprestimo'));
                $retorno = $this->execTransaction();
            }

        }else{
            $retorno = "Falha ao realizar a operação, parâmetros inválidos!";
        }

        return $retorno;
    }

    public function excluirEmprestimo(){

        if((int)$this->getIdEmprestimo() > 0){

            $where_delete_emprestimo = "idEmprestimo = " . $this->getIdEmprestimo();
            $this->set_transaction($this->deleteTransaction($where_delete_emprestimo. " and idLivro != ''",'livrosemprestimo'));
            $this->set_transaction($this->deleteTransaction($where_delete_emprestimo,'emprestimo'));
            $retorno = $this->execTransaction();

        }else{
            $retorno = "Falha ao realizar a operação, parâmetros inválidos!";
        }

        return $retorno;
    }

    public function excluirLivro($emprestimo, $livro){

        if(isset($emprestimo, $livro) && !empty($emprestimo) && !empty($livro)){

            $where_delete_livro = "idLivro = '$livro' and idEmprestimo = $emprestimo";
            $this->set_transaction($this->deleteTransaction($where_delete_livro,'livrosemprestimo'));
            $retorno = $this->execTransaction();

        }else{
            $retorno = "Falha ao realizar a operação, parâmetros inválidos!";
        }

        return $retorno;
    }

    public function listarTodas(){

        //COLUNAS DA TABELA
        $places = ['emprestimo.*','leitor.nomeLeitor'];

        //inner join, outer join, todos as ligações que quiser fazer
        $innerjoin = "inner join leitor on emprestimo.idLeitor = leitor.idLeitor
inner join usuario on emprestimo.idUsuario = usuario.idUsuario";

        //condição do select
        $where = null;

        //ordenar select
        $orderby = 'emprestimo.statusEmprestimo, emprestimo.dataEmprestimo desc';

        //limit = quantidade de registros para exibir
        $limit = null;

        //usado junto com o limit por exemplo começa a exibição do segundo registro e mostre mais 5 ficaria limit 5 offset 1
        $offset = null;

        //coluna na qual serão agrupados os valores
        $groupby = null;


        return $this->read($this->_tabela, $where, $limit, $offset, $orderby, $places, $innerjoin, $groupby);

    }

    public function listarPorId($id){

        //COLUNAS DA TABELA
        $places = ['emprestimo.*','leitor.nomeLeitor'];

        //inner join, outer join, todos as ligações que quiser fazer
        $innerjoin = "inner join leitor on emprestimo.idLeitor = leitor.idLeitor
        inner join usuario on emprestimo.idUsuario = usuario.idUsuario";

        //condição do select
        $where = "emprestimo.idEmprestimo = $id";

        //ordenar select
        $orderby = null;

        //limit = quantidade de registros para exibir
        $limit = null;

        //usado junto com o limit por exemplo começa a exibição do segundo registro e mostre mais 5 ficaria limit 5 offset 1
        $offset = null;

        //coluna na qual serão agrupados os valores
        $groupby = null;


        return $this->read($this->_tabela, $where, $limit, $offset, $orderby, $places, $innerjoin, $groupby);

    }

    public function listarLivrosPorEmprestimo($id){

        //COLUNAS DA TABELA
        $places = ['*'];

        //inner join, outer join, todos as ligações que quiser fazer
        $innerjoin = "inner join livro on livro.idLivro = livrosemprestimo.idLivro
inner join editora on livro.idEditora = editora.idEditora";

        //condição do select
        $where = "livrosemprestimo.idEmprestimo = " . $id;

        //ordenar select
        $orderby = null;

        //limit = quantidade de registros para exibir
        $limit = null;

        //usado junto com o limit por exemplo começa a exibição do segundo registro e mostre mais 5 ficaria limit 5 offset 1
        $offset = null;

        //coluna na qual serão agrupados os valores
        $groupby = null;


        return $this->read('livrosemprestimo', $where, $limit, $offset, $orderby, $places, $innerjoin, $groupby);

    }

}