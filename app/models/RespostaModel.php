<?php

class RespostaModel extends Model
{

	public $_tabela = "respostaperguntaselecionaclan";
	private $id;
	private $perguntaId;
	private $resposta;
	private $claId;
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


	public function getPerguntaId()
	{
		return $this->perguntaId;
	}


	public function setPerguntaId($perguntaId): self
	{
		$this->perguntaId = $perguntaId;
		return $this;
	}


	public function getResposta()
	{
		return $this->resposta;
	}


	public function setResposta($resposta): self
	{
		$this->resposta = $resposta;
		return $this;
	}


	public function getClaId()
	{
		return $this->claId;
	}

	public function setClaId($claId): self
	{
		$this->claId = $claId;
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
		if (strlen($this->getPerguntaId()) <= 0) {
			$erros .= "Selecione uma pergunta!<br/>";
		}
		if (strlen($this->getClaId()) <= 0) {
			$erros .= "Selecione um clã!<br/>";
		}
		return $erros;
	}


	public function listarTodas()
	{
		$places = ['*'];
		$innerjoin = null;
		$where = null;
		$orderby = null;
		$limit = null;
		$offset = null;
		$groupby = null;


		return $this->read($this->_tabela, $where, $limit, $offset, $orderby, $places, $innerjoin, $groupby);
	}

	public function listarPorCodigo($id)
	{

		return $this->read($this->_tabela, "id = $id", null, null, null, null, null, null);
	}


	public function alterar()
	{
		$erros = "";
		$valida = $this->validarDados();
		if (strlen($valida) <= 0) {
			$dados_resposta = [
				"pergunta_id" => ($this->getPerguntaId()),
				"resposta" => ($this->getResposta()),
				"cla_id" => ($this->getClaId()),
			];
			$where = "id = " . $this->getId();
			$this->set_transaction($this->update($dados_resposta, $where, $this->_tabela));
			$retorno = $this->execTransaction();
		} else {
			$retorno = $valida;
		}
		return $retorno;
	}


	public function excluir()
	{

		$where = "id = " . $this->getId();
		$retorno = $this->delete($where);

		return $retorno;
	}
}
