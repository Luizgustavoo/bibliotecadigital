<?php

class Livro extends Controller
{

    public function index_action()
    {

        session_start();


        // $_SESSION['menu_selecionado'] = '';
        // $_SESSION['categoria_menu'] = '';

        $action = $this->getParams("action");

        $dados['msg'] = $this->getParams("msg");
        $dados['return'] = $this->getParams("return");

        $editora = new EditoraModel();
        $dados['editora'] = $editora->listarTodas();


        if(!empty($action) && $action == 'update'){
            $id = $this->getParams("id");
            $livro = new LivroModel();
            $dados['tipo_operacao'] = "alterar";
            $dados['update'] = $livro ->listarPorCodigo($id);
        }else{
            $dados['tipo_operacao'] = "inserir";
        }


        $this->view("create-update-livro", $dados);
        exit();
    }

    public function cadastro()
    {
        $livro = new LivroModel();
        $livro->setIdEditora($_POST['idEditora']);
        $livro->setTituloLivro($_POST['tituloLivro']);
        $livro->setObservacoesLivro($_POST['observacoesLivro']);
        $livro->setSinopseLivro($_POST['sinopseLivro']);
        $livro->setDataCadastro(date('Y-m-d H:i:s'));
        $livro->setDataLancamento(date('Y-m-d H:i:s'));
        $livro->setTotalPaginas($_POST['totalPaginas']);
        $livro->setPdfLivro($_FILES['pdfLivro']);
        $livro->setImagemCapa($_FILES['imagemCapa']);
        $livro->setImagemThumb($_FILES['imagemThumb']);
        
        $dados['retorno'] = $livro->inserir();
        $dados['tipo_operacao'] = "inserir";

        $this->view("create-update-livro", $dados);
    }

    public function listagem()
    {
        $listar = new LivroModel();
        $dados['listagem'] = $listar->listarTodas();
        $this->view("listagem-livro", $dados);
    }

    public function excluir()
    {
        session_start();

        if (isset($_POST['id']) && $_POST['id'] > 0) {

            $autor = new AutorModel();
            $autor->setIdAutor($_POST['id']);
            $retorno = $autor->excluir();
            echo $retorno;
        } else {
            echo "Falha!";
        }
    }

    public function alterar()
    {
        session_start();

        if (isset($_POST)) {
            $autor = new AutorModel();
            $autor->setIdAutor($_POST['idAutor']);
            $autor->setImagemAutor($_FILES['imagemAutor']);
            $autor->setDataCadastro(date('Y-m-d H:i:s'));
            $autor->setDescricaoAutor($_POST['descricaoAutor']);
            $dados['retorno_update'] = $autor->alterar();
            $dados['tipo_operacao'] = "alterar";
            header("Location: ".DOMINIO. strtolower(get_class($this)) ."/listagem/return/".$dados['retorno_update']); 
        } else {
            
            header("Location: ".DOMINIO. strtolower(get_class($this)) ."/listagem/return/Falha ao atualizar registro!"); 
            
        }
    }
}
