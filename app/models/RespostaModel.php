<?php

class RespostaModel extends Model
{

    public $_tabela = "respostaperguntaselecionaclan";
    private $id;
    private $perguntaId;
    private $resposta;
    private $claId;
    private $dataCadastro;
    

    public function inserir()
    {
        $erros = "";
        $valida = $this->validarDados();
        if (strlen($valida) <= 0) {
            $dados_pergunta = [
                "pergunta_id" => ($this->getPerguntaId()),
                "resposta" => ($this->getResposta()),
                "cla_id" => ($this->getClaId()),
            ];
            $this->set_transaction($this->insert($dados_pergunta, 'respostaperguntaselecionaclan'));
            $retorno = $this->execTransaction();
        } else {
            $retorno = $valida;
        }
        return $retorno;
    }

    public function validarDados()
    {

        $erros = "";

        if (strlen($this->getResposta()) < 3) {
            $erros .= "Digite uma resposta!<br/>";
        }
		if(strlen($this->getPerguntaId()) <= 0){
			$erros .= "Selecione uma pergunta!<br/>";
		}
		if(strlen($this->getClaId()) <= 0){
			$erros .= "Selecione um clã!<br/>";
		}
        return $erros;
    }


	/**
	 * @return mixed
	 */
	public function getId() {
		return $this->id;
	}
	
	/**
	 * @param mixed $id 
	 * @return self
	 */
	public function setId($id): self {
		$this->id = $id;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getPerguntaId() {
		return $this->perguntaId;
	}
	
	/**
	 * @param mixed $perguntaId 
	 * @return self
	 */
	public function setPerguntaId($perguntaId): self {
		$this->perguntaId = $perguntaId;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getResposta() {
		return $this->resposta;
	}
	
	/**
	 * @param mixed $resposta 
	 * @return self
	 */
	public function setResposta($resposta): self {
		$this->resposta = $resposta;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getClaId() {
		return $this->claId;
	}
	
	/**
	 * @param mixed $claId 
	 * @return self
	 */
	public function setClaId($claId): self {
		$this->claId = $claId;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getDataCadastro() {
		return $this->dataCadastro;
	}
	
	/**
	 * @param mixed $dataCadastro 
	 * @return self
	 */
	public function setDataCadastro($dataCadastro): self {
		$this->dataCadastro = $dataCadastro;
		return $this;
	}
}
