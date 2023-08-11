<?php

class Leitor extends Controller
{

    public function index_action()
    {

        session_start();


        // $_SESSION['menu_selecionado'] = '';
        // $_SESSION['categoria_menu'] = '';

        $action = $this->getParams("action");

        $dados['msg'] = $this->getParams("msg");
        $dados['return'] = $this->getParams("return");

        $tipoleitor = new TipoLeitorModel();
        $dados['tipoLeitor'] = $tipoleitor->listarTodas();



        if (!empty($action) && $action == 'update') {
            $id = $this->getParams("id");

            $leitor = new LeitorModel();
            $dados['tipo_operacao'] = "alterar";
            $dados['update'] = $leitor->listarPorCodigo($id);
        } else {
            $dados['tipo_operacao'] = "inserir";
        }


        $this->view("create-update-leitor", $dados);
        exit();
    }

    public function cadastro()
    {
        
        $leitor = new LeitorModel();
        
        $nomeLeitor = $_POST['nomeLeitor'];
        $nomeCompleto = explode(" ", $nomeLeitor);
        $primeiroNome = $nomeCompleto[0];
        $ultimoNome = $nomeCompleto[count($nomeCompleto) - 1];
        $dataNascimento = str_replace("/", "", $_POST['data_nascimento']);

        $leitor->setLoginLeitor(strtolower($primeiroNome . $ultimoNome));
        $leitor->setSenhaLeitor($dataNascimento);
        $leitor->setNomeLeitor($_POST['nomeLeitor']);
        $leitor->setAvatarLeitor($_FILES['avatarLeitor']);
        $leitor->setEmailLeitor($_POST['emailLeitor']);
        $leitor->setSexoLeitor($_POST['sexoLeitor']);
        $leitor->setStatusLeitor($_POST['statusLeitor']);
        $leitor->setPeriodo($_POST['periodo']);
        $leitor->setInstituicao($_POST['instituicao']);
        $leitor->setMatricula($_POST['matricula']);
        $leitor->setDataNascimento(isset($_POST['data_nascimento']) ? date('Y-m-d', strtotime(str_replace('/', '-', $_POST['data_nascimento']))) : null);
        $leitor->setIdTipo($_POST['idTipo']);

        if ($_POST['idTipo'] == 2 || $_POST['idTipo'] == 3) {
            $maximo = uniqid();
            $leitor->setMatricula($maximo);
        }
        $dados['tipo_operacao'] = "inserir";
        $dados['retorno'] = $leitor->inserir();

        $tipoleitor = new TipoLeitorModel();
        $dados['tipoLeitor'] = $tipoleitor->listarTodas();

        $this->view("create-update-leitor", $dados);
    }

    public function listagem()
    {
        $listar = new LeitorModel();
        $dados['listagem'] = $listar->listarTodas();
        $this->view("listagem-leitor", $dados);
    }

    public function excluir()
    {
        session_start();

        if (isset($_POST['id']) && $_POST['id'] > 0) {

            $leitor = new LeitorModel();
            $leitor->setIdLeitor($_POST['id']);
            $retorno = $leitor->excluir();
            echo $retorno;
        } else {
            echo "Falha!";
        }
    }

    public function alterar()
    {
        session_start();

        if (isset($_POST)) {
            $leitor = new LeitorModel();
            $leitor->setIdLeitor($_POST['idLeitor']);
            $leitor->setNomeLeitor($_POST['nomeLeitor']);
            $leitor->setAvatarLeitor($_FILES['avatarLeitor']);
            $leitor->setLoginLeitor($_POST['loginLeitor']);
            $leitor->setEmailLeitor($_POST['emailLeitor']);
            $leitor->setSenhaLeitor($_POST['senhaLeitor']);
            $leitor->setStatusLeitor($_POST['statusLeitor']);
            $leitor->setSexoLeitor($_POST['sexoLeitor']);
            $leitor->setPeriodo($_POST['periodo']);
            $leitor->setInstituicao($_POST['instituicao']);
            $leitor->setMatricula($_POST['matricula']);
            $leitor->setDataNascimento($_POST['data_nascimento']);
            $leitor->setIdTipo($_POST['idTipo']);
            $dados['tipo_operacao'] = "alterar";
            $dados['retorno_update'] = $leitor->alterar();
            header("Location: " . DOMINIO . strtolower(get_class($this)) . "/listagem/return/" . $dados['retorno_update']);
        } else {

            header("Location: " . DOMINIO . strtolower(get_class($this)) . "/listagem/return/Falha ao atualizar registro!");
        }
    }
}
