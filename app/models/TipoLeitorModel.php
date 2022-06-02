<?php

class TipoLeitorModel extends Model
{

    public $_tabela = "tipoLeitor";
    private $idTipo;
    private $descricaoTipo;
    private $statusTipo;

    /**
* Get the value of statusTipo
*
* @return  mixed
*/
public function getStatusTipo()
{
return $this->statusTipo;
}

/**
* Set the value of statusTipo
*
* @param   mixed  $statusTipo  
*
* @return  self
*/
public function setStatusTipo($statusTipo)
{
$this->statusTipo = $statusTipo;
return $this;
}

    public function getIdTipo(){
        return $this->idTipo;
    }
    public function setIdTipo($idTipo){
        $this->idTipo = $idTipo;
        return $this;
    }

    public function getDescricaoTipo(){
        return $this->descricaoTipo;
    }
    public function setDescricaoTipo($descricaoTipo){
        $this->descricaoTipo = $descricaoTipo;
        return $this;
    }

    public function inserir()
    {
        $erros = "";
        $valida = $this->validarDados();
        if (strlen($valida) <= 0) {
                        $dados_tipoleitor = [
                            "descricaoTipo" => ($this->getDescricaoTipo()),
                            "statusTipo" => ($this->getStatusTipo()),
                        ];
                        $this->set_transaction($this->insert($dados_tipoleitor, 'tipoleitor'));
                        $retorno = $this->execTransaction();
                    }else{
                        $retorno = $valida;
                    }
                    return $retorno;
    }            


    public function excluir()
    {

        $where = "idTipo = " . $this->getIdTipo();
        $retorno = $this->delete($where);

        return $retorno;
    }



    public function listarTodas()
    {


        $places = ['*'];


        $innerjoin = null;


        $where = null;


        $orderby = 'descricaoTipo';


        $limit = null;


        $offset = null;


        $groupby = null;


        return $this->read($this->_tabela, $where, $limit, $offset, $orderby, $places, $innerjoin, $groupby);
    }

    public function listarPorCodigo($id)
    {

        return $this->read($this->_tabela, "idTipo = $id", null, null, null, null, null, null);
    }

    public function alterar()
    {
        $erros = "";
        $valida = $this->validarDados();
        if (strlen($valida) <= 0) {
                        $dados_tipoleitor = [
                            "descricaoTipo" => ($this->getDescricaoTipo()),
                            "statusTipo" => ($this->getStatusTipo()),
                        ];
                        $where = "idTipo = " . $this->getIdTipo();
                        $this->set_transaction($this->update($dados_tipoleitor, $where, $this->_tabela));
                        $retorno = $this->execTransaction();
                    }else{
                        $retorno = $valida;
                    }
                    return $retorno;
        }            

    public function validarDados()
    {

        $erros = "";

        if (strlen($this->getDescricaoTipo()) < 3) {
            $erros .= "Nome do tipo de leitor inválido!<br/>";
        }
        return $erros;
    }


}
