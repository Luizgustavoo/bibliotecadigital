<?php

class Emprestimo extends Controller
{

    public function index_action()
    {

        session_start();


        // $_SESSION['menu_selecionado'] = '';
        // $_SESSION['categoria_menu'] = '';

        $action = $this->getParams("action");

        $dados['msg'] = $this->getParams("msg");
        $dados['return'] = $this->getParams("return");



        if(!empty($action) && $action == 'update'){
            $id = $this->getParams("id");

            $emprestimo = new EmprestimoModel();
            $dados['tipo_operacao'] = "alterar";
            $dados['update'] = $emprestimo->listarPorId($id);
            $dados['livros_leitor'] = $emprestimo->listarLivrosPorEmprestimo($id);
        }else{
            $dados['tipo_operacao'] = "inserir";
            if(isset($_POST['arr_id_livro'],$_POST['dataEmprestimo'], $_POST['dataDevolucao'], $_POST['idLeitor']) &&
                (int)$_POST['idLeitor'] > 0 &&
                count($_POST['arr_id_livro']) > 0 &&
                strlen($_POST['dataEmprestimo']) == 10 &&
                strlen($_POST['dataDevolucao']) == 10
            ){

                $emprestimo = new EmprestimoModel();
                $emprestimo->setIdLeitor($_POST['idLeitor']);
                $emprestimo->setIdUsuario($_SESSION['idUsuario']);
                $emprestimo->setDataEmprestimo(implode('-',array_reverse(explode('/',$_POST['dataEmprestimo']))));


                $emprestimo->setIdLivro($_POST['arr_id_livro']);
                $emprestimo->setDataDevolucao(implode('-',array_reverse(explode('/',$_POST['dataDevolucao']))));

                $dados['retorno'] = $emprestimo->inserir();

                echo '<script>
                window.open("'.DOMINIO.'emprestimo/printemprestimo/id/'.$_SESSION['emprestimo_print'].'","Impressão comprovante","height=500,width=500");
                </script>';

            }

        }

        $listar = new LivroModel();
        $dados['listagem'] = $listar->listarTodasPorTipo('fisico');

        $leitor = new LeitorModel();
        $dados['leitores'] = $leitor->listarTodas();



        $this->view("create-update-emprestimo", $dados);
        exit();
    }

    public function update()
    {

        if(isset($_POST['arr_id_livro'],$_POST['dataEmprestimo'], $_POST['dataDevolucao'], $_POST['idLeitor']) &&
            (int)$_POST['idLeitor']           > 0  &&
            count($_POST['arr_id_livro'])     > 0  &&
            strlen($_POST['dataEmprestimo']) == 10 &&
            strlen($_POST['dataDevolucao'])  == 10
        ){


            session_start();

            $emprestimo = new EmprestimoModel();
            $emprestimo->setIdEmprestimo($_POST['idEmprestimo']);
            $emprestimo->setIdLeitor($_POST['idLeitor']);
            $emprestimo->setIdUsuario($_SESSION['idUsuario']);
            $emprestimo->setDataEmprestimo(implode('-',array_reverse(explode('/',$_POST['dataEmprestimo']))));


            $emprestimo->setIdLivro($_POST['arr_id_livro']);
            $emprestimo->setDataDevolucao(implode('-',array_reverse(explode('/',$_POST['dataDevolucao']))));


            $retorno = $emprestimo->alterar();

            header('location: ' . DOMINIO . "emprestimo/listagem/return/".$retorno);

        }else{

            header('Location: ' . DOMINIO . "emprestimo/listagem/return/Nenhum dado vÃ¡lido passado por parÃ¢metro!");
        }
    }

    public function listagem()
    {
        $dados['msg'] = $this->getParams("msg");
        $dados['retorno'] = $this->getParams("return");

        $listar = new EmprestimoModel();
        $dados['listagem'] = $listar->listarTodas();
        $this->view("listagem-emprestimo", $dados);
    }

    public function excluiremprestimo()
    {
        session_start();

        if (isset($_POST['id_emprestimo']) && (int)$_POST['id_emprestimo'] > 0) {
            $emprestimo = new EmprestimoModel();
            $emprestimo->setIdEmprestimo($_POST['id_emprestimo']);
            $retorno = $emprestimo->excluirEmprestimo($_POST['id_emprestimo']);
            echo $retorno;
        } else {
            echo "Falha!";
        }
    }

    public function excluirlivro()
    {
        session_start();

        if (isset($_POST['id_emprestimo'], $_POST['id_livro']) && (int)$_POST['id_emprestimo'] > 0 && strlen($_POST['id_livro']) > 0) {
            $emprestimo = new EmprestimoModel();
            $retorno = $emprestimo->excluirLivro($_POST['id_emprestimo'], $_POST['id_livro']);
            echo $retorno;
        } else {
            echo "Falha!";
        }
    }

    public function alterar()
    {
        session_start();

        if (isset($_POST)) {
            $tipoLeitor = new TipoLeitorModel();
            $tipoLeitor->setIdTipo($_POST['idTipo']);
            $tipoLeitor->setDescricaoTipo($_POST['descricaoTipo']);
            $tipoLeitor->setStatusTipo($_POST['statusTipo']);
            $dados['retorno_update'] = $tipoLeitor->alterar();
            header("Location: ".DOMINIO. strtolower(get_class($this)) ."/listagem/return/".$dados['retorno_update']); 
        } else {
            
            header("Location: ".DOMINIO. strtolower(get_class($this)) ."/listagem/return/Falha ao atualizar registro!"); 
            
        }
    }

    public function veremprestimo(){
        session_start();

        $id_emprestimo = $this->getParams("id");

        if(isset($id_emprestimo) && $id_emprestimo != null && (int)$id_emprestimo > 0){

            $emprestimo = new EmprestimoModel();
            $dados['emprestimo'] = $emprestimo->listarPorId($id_emprestimo);
            $dados['livros'] = $emprestimo->listarLivrosPorEmprestimo($id_emprestimo);

            $this->view("listagem-livros-emprestados-leitor", $dados);
            exit();

        }else{
            header("Location: " . DOMINIO . "emprestimo/listagem");
        }


    }

    public function printemprestimo(){
        session_start();

        $id_emprestimo = $this->getParams("id");

        if(isset($id_emprestimo) && $id_emprestimo != null && (int)$id_emprestimo > 0){

            $emprestimo = new EmprestimoModel();
            $dados['emprestimo'] = $emprestimo->listarPorId($id_emprestimo);
            $dados['livros'] = $emprestimo->listarLivrosPorEmprestimo($id_emprestimo);

            $this->view("print-emprestimo", $dados);
            exit();

        }else{
            header("Location: " . DOMINIO . "emprestimo/listagem");
        }


    }

    public function devolverlivro()
    {
        session_start();

        if (isset($_POST['id_emprestimo'], $_POST['id_livro']) && (int)$_POST['id_emprestimo'] > 0 && strlen($_POST['id_livro']) > 0) {
            $emprestimo = new EmprestimoModel();
            $retorno = $emprestimo->devolverLivro($_POST['id_emprestimo'], $_POST['id_livro']);
            echo $retorno;
        } else {
            echo "Falha!";
        }
    }

    public function renovarlivro()
    {
        session_start();

        if (isset($_POST['idLivro'], $_POST['idLeitor'], $_POST['dataVencimento'], $_POST['dataRenovacao'], $_POST['emprestimo'])) {
            $emprestimo = new EmprestimoModel();
            $retorno = $emprestimo->renovarlivro($_POST['idLivro'], $_POST['idLeitor'], $_POST['dataVencimento'], $_POST['dataRenovacao'], $_POST['emprestimo']);
            echo $retorno;
        } else {
            echo "Falha!";
        }
    }
}
