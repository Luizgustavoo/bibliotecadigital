<?php

class CidadeModel extends Model
{

    public $_tabela = "cidade";
    private $idCidade;
    private $nomeCidade;
    private $idEstado;

    /**
     * @return mixed
     */
    public function getIdCidade()
    {
        return $this->idCidade;
    }

    /**
     * @param mixed $idCidade
     */
    public function setIdCidade($idCidade)
    {
        $this->idCidade = $idCidade;
    }

    /**
     * @return mixed
     */
    public function getNomeCidade()
    {
        return $this->nomeCidade;
    }

    /**
     * @param mixed $nomeCidade
     */
    public function setNomeCidade($nomeCidade)
    {
        $this->nomeCidade = $nomeCidade;
    }

    /**
     * @return mixed
     */
    public function getIdEstado()
    {
        return $this->idEstado;
    }

    /**
     * @param mixed $idEstado
     */
    public function setIdEstado($idEstado)
    {
        $this->idEstado = $idEstado;
    }




    public function inserir(){

        $dados_cidade = [
            "nomeCidade" => $this->getNomeCidade(),
            "idEstado" => 1,
        ];
        $this->set_transaction($this->insert($dados_cidade, 'cidade'));

        $retorno = $this->execTransaction();

        return $retorno;
    }




































    public function listarTodas(){

        //COLUNAS DA TABELA
        $places = ['nome_cidade','estado_cidade','pais_cidade'];

        //inner join, outer join, todos as ligações que quiser fazer
        $innerjoin = null;

        //condição do select
        $where = null;

        //ordenar select
        $orderby = 'nome_cidade';

        //limit = quantidade de registros para exibir
        $limit = null;

        //usado junto com o limit por exemplo começa a exibição do segundo registro e mostre mais 5 ficaria limit 5 offset 1
        $offset = null;

        //coluna na qual serão agrupados os valores
        $groupby = null;


        return $this->read($this->_tabela, $where, $limit, $offset, $orderby, $places, $innerjoin, $groupby);

    }

}