<?php

class PerguntasModel extends Model
{

    public $_tabela = "perguntaselecionaclan";
    private $id;
    private $pergunta;
    private $dataCadastro;


    public function getId()
    {
        return $this->id;
    }

    public function setId($id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getPergunta()
    {
        return $this->pergunta;
    }

    public function setPergunta($pergunta): self
    {
        $this->pergunta = $pergunta;
        return $this;
    }

    public function getDataCadastro()
    {
        return $this->dataCadastro;
    }

    public function setDataCadastro($dataCadastro): self
    {
        $this->dataCadastro = $dataCadastro;
        return $this;
    }


    public function inserir()
    {
        $erros = "";
        $valida = $this->validarDados();
        if (strlen($valida) <= 0) {
            $dados_pergunta = [
                "pergunta" => ($this->getPergunta()),
            ];
            $this->set_transaction($this->insert($dados_pergunta, 'perguntaselecionaclan'));
            $retorno = $this->execTransaction();
        } else {
            $retorno = $valida;
        }
        return $retorno;
    }

    public function validarDados()
    {

        $erros = "";

        if (strlen($this->getPergunta()) < 3) {
            $erros .= "Digite pelo menos 3 palavras!<br/>";
        }
        return $erros;
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
        $orderby = null;

        //limit = quantidade de registros para exibir
        $limit = null;

        //usado junto com o limit por exemplo começa a exibição do segundo registro e mostre mais 5 ficaria limit 5 offset 1
        $offset = null;

        //coluna na qual serão agrupados os valores
        $groupby = null;


        return $this->read($this->_tabela, $where, $limit, $offset, $orderby, $places, $innerjoin, $groupby);
    }

    
}
