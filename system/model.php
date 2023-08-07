<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Model
 *
 * @author Marketing
 */
class Model
{
    protected  $db;
    private $host = 'localhost';
    private $charset = 'utf8';
    private $username = 'root';
    private $passwd = '724018';
    private $dbname = 'bibliotecadigital';
    private $port = '8443';
    public $_tabela;

    private $_transaction = array();

    function get_transaction()
    {
        return $this->_transaction;
    }

    function set_transaction($_transaction)
    {
        $this->_transaction[] = $_transaction;
    }

    public function __construct()
    {
        if (!isset($this->db)) :
            try {
                $this->db = new PDO("mysql:host={$this->host};dbname={$this->dbname};charset={$this->charset};", $this->username, $this->passwd);
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $ex) {
                die("To aqui" . $ex);
            }
        endif;
    }

    public function insert(array $dados, $tabela)
    {

        try {
            $campos = array_keys($dados);
            $valores = array_values($dados);

            $tabela = $tabela != null ? $tabela : $this->_tabela;

            //echo ("INSERT INTO {$tabela} (".implode(',',$campos).") values (:".implode(",:", array_keys($dados)).")"); die();

            $sql = $this->db->prepare("INSERT INTO {$tabela} (" . implode(',', $campos) . ") values (:" . implode(",:", array_keys($dados)) . ")");

            for ($x = 0; $x < count($dados); $x++) {
                $sql->bindvalue(":$campos[$x]", $valores[$x], is_int($valores[$x]) ? PDO::PARAM_INT : PDO::PARAM_STR);
            }


            return $sql;
        } catch (PDOException $ex) {
            return $ex;
        }
    }
    public function update(array $dados, $where, $tabela)
    {

        $cont = 0;
        foreach ($dados as $indice => $values) {
            $campos[] = $indice . " = :" . $cont;
            $valores[] = $values;
            $bindValue[] = ":" . $cont;
            $bindValue2[] = ":" . $cont;
            $cont++;
        }
        $bindValue = implode(", ", $bindValue);
        $campos = implode(", ", $campos);

        //echo "UPDATE $tabela SET {$campos} WHERE {$where}";        die();

        $sql = $this->db->prepare("UPDATE $tabela SET {$campos} WHERE {$where}");
        for ($x = 0; $x < count($bindValue2); $x++) {
            $sql->bindvalue("$bindValue2[$x]", $valores[$x]);
        }

        return $sql;
    }

    public function read($tabela = null, $where = null, $limit = null, $offset = null, $orderby = null, array $places = null, $innerjoin = null, $groupby = null)
    {

        //campos a serem selecionados
        $places = $places != null ? implode(',', array_values($places)) : "*";
        $tabela = $tabela != null ? $tabela : $this->_tabela;
        $where = ($where != null ? "WHERE {$where}" : "");
        $limit = ($limit != null ? "LIMIT {$limit}" : "");
        $offset = ($offset != null ? "OFFSET {$offset}" : "");
        $orderby = ($orderby != null ? "ORDER BY {$orderby}" : "");
        $groupby = ($groupby != null ? "GROUP BY {$groupby}" : "");
        $innerjoin = ($innerjoin != null ? " {$innerjoin} " : "");
        //echo "SELECT {$places} FROM {$tabela} {$innerjoin} {$where} {$groupby} {$orderby} {$limit} {$offset} <br/><br/>";
        //die();
        $q = $this->db->query("SELECT {$places} FROM {$tabela} {$innerjoin} {$where} {$groupby} {$orderby} {$limit} {$offset}");
        return $q->fetchAll(PDO::FETCH_ASSOC);
    }

    public function readCALL($procedure = null)
    {

        $q = $this->db->query("CALL {$procedure}");
        return $q->fetchAll(PDO::FETCH_ASSOC);
    }

    public function proximoID($tabela, $id)
    {

        //campos a serem selecionados

        $tabela = $tabela != null ? $tabela : $this->_tabela;

        $q = $this->db->query("SELECT MAX({$id}) as max_id FROM {$tabela}");
        return $q->fetchAll(PDO::FETCH_ASSOC);
    }


    public function maiorValorTabela($tabela, $coluna, $where, $orderby)
    {

        //campos a serem selecionados

        $tabela = $tabela != null ? $tabela : $this->_tabela;

        $q = $this->db->query("SELECT {$coluna} as maior FROM {$tabela} WHERE {$where} ORDER BY {$orderby} LIMIT 1");
        return $q->fetchAll(PDO::FETCH_ASSOC);
    }


    public function verExiste($tabela, $where)
    {

        //campos a serem selecionados

        $tabela = $tabela != null ? $tabela : $this->_tabela;

        //echo "SELECT count(*) as existe FROM {$tabela} WHERE {$where} LIMIT 1;<br>";

        $q = $this->db->query("SELECT count(*) as existe FROM {$tabela} WHERE {$where} LIMIT 1");
        return $q->fetchAll(PDO::FETCH_ASSOC);
    }

    public function quantidadeAnteriorEstoque($tabela, $where)
    {

        //campos a serem selecionados

        $tabela = $tabela != null ? $tabela : $this->_tabela;

        $q = $this->db->query("SELECT quantidade_item as quantidade FROM {$tabela} WHERE {$where} LIMIT 1");
        return $q->fetchAll(PDO::FETCH_ASSOC);
    }

    public function quantidadeItemlAtualEstoque($tabela, $where)
    {

        //campos a serem selecionados

        $tabela = $tabela != null ? $tabela : $this->_tabela;

        //echo "SELECT sum(quantidade_item) as quantidade FROM {$tabela} WHERE {$where}"; die;

        $q = $this->db->query("SELECT sum(quantidade_item) as quantidade FROM {$tabela} WHERE {$where}");
        return $q->fetchAll(PDO::FETCH_ASSOC);
    }

    public function possiveisVencimentosProduto($id_produto)
    {

        //campos a serem selecionados

        $tabela = $tabela != null ? $tabela : $this->_tabela;

        //echo "SELECT sum(quantidade_item) as quantidade FROM {$tabela} WHERE {$where}"; die;

        $q = $this->db->query("select data_vencimento, quantidade_item, posicao
from (select t.id_produto, t.data_vencimento, t.quantidade_item, dense_rank() over (order by t.data_vencimento asc) as posicao from estoque t where t.id_produto = {$id_produto} and t.quantidade_item > 0) as tbl_temp
");
        return $q->fetchAll(PDO::FETCH_ASSOC);
    }

    public function dataVencimentoPorPosicao($id_produto, $posicao)
    {

        //campos a serem selecionados

        $tabela = $tabela != null ? $tabela : $this->_tabela;

        //echo "SELECT sum(quantidade_item) as quantidade FROM {$tabela} WHERE {$where}"; die;

        $q = $this->db->query("select data_vencimento, quantidade_item, posicao
from (select t.id_produto, t.data_vencimento, t.quantidade_item, dense_rank() over (order by t.data_vencimento asc) as posicao 
from estoque t where t.id_produto = {$id_produto} and t.quantidade_item > 0) as tbl_temp where  posicao = {$posicao}");
        return $q->fetchAll(PDO::FETCH_ASSOC);
    }

    public function menorDataItemEstoque($tabela, $where)
    {

        //campos a serem selecionados

        $tabela = $tabela != null ? $tabela : $this->_tabela;

        //echo "SELECT sum(quantidade_item) as quantidade FROM {$tabela} WHERE {$where}"; die;

        $q = $this->db->query("SELECT min(data_vencimento) as menor_data, quantidade_item as quantidade  FROM {$tabela} WHERE {$where}");
        return $q->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete($where)
    {

        try {
            if ($this->db->query("DELETE FROM {$this->_tabela} WHERE {$where}")) {
                return "Operação realizada com sucesso!";
            } else {
                return "Falha ao realizar operação!";
            }
        } catch (Exception $ex) {
            if ($ex->getCode() == 23000) {
                return "O registro não pode ser excluído, pois é referenciado em outra tabela!";
            }
        }
    }






    public function deleteTransaction($where, $tabela)
    {

        $sql = $this->db->prepare("DELETE FROM $tabela WHERE {$where}");

        return $sql;
    }






    public function execTransaction()
    {

        try {
            $this->db->beginTransaction();
            $ret = true;
            foreach ($this->get_transaction() as $value) {
                if (!$value->execute()) {
                    $ret = false;
                }
            }
            if ($ret) {
                $this->db->commit();
                return "Operação realizada com sucesso.";
            } else {
                $this->db->rollBack();
                return "Falha ao realizar a operação.";
            }
        } catch (PDOException $ex) {

            if ($ex->getCode() == '2300') {
                $msg = "Ja existe um registro com mesmas chaves.<br>";
            }

            $erro = "Código erro: " . $ex->getCode() . "<br>Mensagem: " . $ex->getMessage() . $msg;



            return "Falha ao realizao a operação!<br>" . $erro;
        }
    }
    public function getLastId($Tabela, $Id)
    {
        $q = $this->db->query("SELECT MAX({$Id}) as maior FROM {$Tabela}");
        $ultimo = "";
        foreach ($q->fetchAll(PDO::FETCH_ASSOC) as $value) {
            $ultimo = $value['maior'];
        }
        return $ultimo;
    }



    public function insertSemTransaction(array $dados, $tabela)
    {

        try {
            $campos = array_keys($dados);
            $valores = array_values($dados);

            $tabela = $tabela != null ? $tabela : $this->_tabela;

            //echo ("INSERT INTO {$tabela} (".implode(',',$campos).") values (:".implode(",:", array_keys($dados)).")"); die();

            $sql = $this->db->prepare("INSERT INTO {$tabela} (" . implode(',', $campos) . ") values (:" . implode(",:", array_keys($dados)) . ")");

            for ($x = 0; $x < count($dados); $x++) {
                $sql->bindvalue(":$campos[$x]", $valores[$x], is_int($valores[$x]) ? PDO::PARAM_INT : PDO::PARAM_STR);
            }


            return $sql->execute();
        } catch (PDOException $ex) {
            return $ex;
        }
    }


    public function updateSemTransaction(array $dados, $where, $tabela)
    {

        $cont = 0;
        foreach ($dados as $indice => $values) {
            $campos[] = $indice . " = :" . $cont;
            $valores[] = $values;
            $bindValue[] = ":" . $cont;
            $bindValue2[] = ":" . $cont;
            $cont++;
        }
        $bindValue = implode(", ", $bindValue);
        $campos = implode(", ", $campos);

        //echo "UPDATE $tabela SET {$campos} WHERE {$where}";        die();

        $sql = $this->db->prepare("UPDATE $tabela SET {$campos} WHERE {$where}");
        for ($x = 0; $x < count($bindValue2); $x++) {
            $sql->bindvalue("$bindValue2[$x]", $valores[$x]);
        }

        return $sql->execute();
    }
}
