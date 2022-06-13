<?php

class Index extends Controller{

    public function index_action(){

        //inicia a sessão do menu selecionado

        $tempo_session_cache = 500; // 500 minutos o tempo máximo da sessão

        $limite_inativo = 60 * 120;

        //DEFINE UM TEMPO PARA EXPIRAR A SESSÃO
        session_cache_limiter('private');
        $cache_limiter = session_cache_limiter();
        session_cache_expire($tempo_session_cache);
        $cache_expire = session_cache_expire();

        //INICIA A SESSÃO
        session_start();



        $_SESSION['menu_selecionado'] = 'index';


        if(isset($_POST['login']) && isset($_POST['password'])){

            $user = new UsuarioModel();
            $user->setLoginUsuario(Validar::tratarAspas($_POST['login']));
            $user->setSenhaUsuario(Validar::tratarAspas($_POST['password']));

            $usuario = $user->listarUsuario();

            if(count($usuario) == 1 && ($usuario[0]['senhaUsuario'] == md5(md5($_POST['password'])))){


                $_SESSION['hora_login'] = time();
                $_SESSION['limite'] = $limite_inativo;

                foreach ($usuario as $v) {
                    $_SESSION['idUsuario'] = $v['idUsuario'];
                    $_SESSION['nomeUsuario'] = $v['nomeUsuario'];
                    $_SESSION['loginUsuario'] = $v['loginUsuario'];
                    $_SESSION['statusUsuario'] = $v['statusUsuario'];

                }

                header("Location: ./home");
            }else{
                
                header("Location: ./?return=Usuário não encontrado!");
            }
        }



        $this->view("index",$dados);
        exit();
    }

    public function login(){

        $user = new UsuarioModel();
        $user->setLogin_usuario(Validar::tratarAspas($_POST['login']));
        $user->setSenha_usuario(Validar::tratarAspas($_POST['senha']));

        $usuario = $user->listarUsuario();


        if(count($usuario) == 1){
            session_start();
            foreach ($usuario as $v) {
                $_SESSION['idUsuario'] = $v['idUsuario'];
                $_SESSION['nomeUsuario'] = $v['nomeUsuario'];
                $_SESSION['loginUsuario'] = $v['loginUsuario'];
                $_SESSION['statusUsuario'] = $v['statusUsuario'];
            }

            header("Location: " . DOMINIO . "home");
        }else{
            header("Location: " . DOMINIO);
        }

    }

    public function alterarsessao(){

        //$action = $this->getParams("action");

        // $url = $_GET['url'];

        /*echo 'PHP_SELF: ' .$_SERVER['PHP_SELF'];
        echo "<br>";
        echo 'SERVER_NAME: ' . $_SERVER['SERVER_NAME'];
        echo "<br>";
        echo 'HTTP_HOST: ' .$_SERVER['HTTP_HOST'];
        echo "<br>";
        echo 'HTTP_REFERER: ' .$_SERVER['HTTP_REFERER'];
        echo "<br>";
        echo 'HTTP_USER_AGENT: ' .$_SERVER['HTTP_USER_AGENT'];
        echo "<br>";
        echo 'SCRIPT_NAME: ' .$_SERVER['SCRIPT_NAME'];*/

        session_start();
        $instituicao = $_SESSION['id_instituicao'];
        if($instituicao == '1'){
            $_SESSION['id_instituicao'] = '2';
            $_SESSION['descricao_instituicao'] = 'Projeto Crescer II';
        }else{
            $_SESSION['id_instituicao'] = '1';
            $_SESSION['descricao_instituicao'] = 'Projeto Crescer I';
        }


        header("Location: " . $_SERVER['HTTP_REFERER']);

    }


    public function logout(){
        session_start();

        unset($_SESSION['idUsuario']);
        unset($_SESSION['nomeUsuario']);
        unset($_SESSION['loginUsuario']);
        unset($_SESSION['statusUsuario']);

        session_destroy();
        header("Location: " . DOMINIO);



    }

    public function inserir(){
//        $index = new IndexModel();
//        if(isset($_POST)){
//
//         $index->setAlternativa1(Validar::tratarAspas($_POST['alternativa01']));
//         $index->setAlternativa2(Validar::tratarAspas($_POST['alternativa02']));
//         $index->setAlternativa3(Validar::tratarAspas($_POST['alternativa03']));
//         $index->setAlternativa4(Validar::tratarAspas($_POST['alternativa04']));
//         $index->setAlternativa5(Validar::tratarAspas($_POST['alternativa05']));
//
//         $index->setId_disciplina(Validar::tratarAspas($_POST['id_disciplina']));
//         $index->setId_serie(Validar::tratarAspas($_POST['id_serie']));
//         $index->setQuestao(Validar::tratarAspas($_POST['questao']));
//
//         $index->setId_alternativa_correta(Validar::tratarAspas($_POST['alternativa_correta']));
//
//        $retorno = $index->inserir();
//
//        }else{
//           $retorno = "Nenhum dado foi passado por parâmetro!";
//        }
//        header("Location: /avaliacaodiagnostica/?".$retorno);


    }

    public function redefinir(){


        $this->view("redefinir-senha",@$dados);


        exit();
    }

    public function redefinirsenha(){


        if(isset($_POST['loginusuario'])){

            $user = new UsuarioModel();

            $usuario = $user->listarPorLogin(Validar::tratarAspas($_POST['loginusuario']));


            if(count($usuario) == 1){


                $email_usuario = "";

                foreach ($usuario as $v) {
                    $nome_usuario = $v['nome_usuario'];
                    $email_usuario = $v['email'];
                    $chave = sha1($v['id_usuario'].$v['senha_usuario']);
                    $ret = $user->salvarChave($v['id_usuario'],$chave);
                }

                if($ret){

                    $inicio_email = substr($email_usuario, 0,3);
                    $fim_email = substr($email_usuario, strlen($email_usuario)-4,strlen($email_usuario));

                    $dados['resposta'] = "Um link de redefinição de senha foi enviado para <b>" . $inicio_email."***********".$fim_email."</b>. Verifique sua caixa de entrada, lixo eletrônico e spam.";

                    //aqui vamos enviar o email

                    $conteudo_email = '<a href="http://192.168.25.232/sistemaalunos/forgotpasswordkey/index/key/'.$chave.'">Redefinir senha</a>';

                    /*********************ENVIAR EMAIL************************/


                    require_once MODELS . 'class.phpmailer.php';
//   Inicia a classe PHPMailer
                    $mail = new PHPMailer();

//Define os dados do servidor e tipo de conexão
                    $mail->IsSMTP(); // Define que a mensagem será SMTP
//$mail->Host = "mail.projetocrescerarapongas.org.br"; // Endereço do servidor SMTP
                    $mail->Host = "smtp.gmail.com";
                    $mail->SMTPSecure = 'ssl';
                    $mail->Port = 465;
                    $mail->SMTPAuth = true; // Autenticação
                    $mail->Username = 'informacao@projetocrescerarapongas.org.br'; // Usuário do servidor SMTP
                    $mail->Password = '@di1988di@'; // Senha da caixa postal utilizada

//Define o remetente
                    $mail->From = "informacao@projetocrescerarapongas.org.br";
                    $mail->FromName = utf8_decode("Recuperação de Senha Sistema Alunos Projeto Crescer");

//Define os destinatário(s)
//$mail->AddAddress('contato@projetocrescerarapongas.org.br', 'Contato');
//$mail->AddAddress('casabommenino@hotmail.com','Marisa P. F. Bazana');
//$mail->AddCC('dinei_aparecido@hotmail.com','Claudinei A. Fernandes');

//$mail->AddCC('coordenacao@projetocrescerarapongas.org.br','Aline de Oliveira');
//$mail->AddCC('supervisao@projetocrescerarapongas.org.br','Patricia Barroso');

                    $mail->AddCC($email_usuario,$nome_usuario);

//$mail->AddCC('casabommenino@hotmail.com','Marisa Padovezi Ferreira Bazana');


//$mail->AddBCC('CopiaOculta@dominio.com.br', 'Copia Oculta');

//Define os dados técnicos da Mensagem
                    $mail->IsHTML(true); // Define que o e-mail será enviado como HTML
                    $mail->CharSet = 'iso-8859-1'; // Charset da mensagem (opcional)

//Texto e Assunto
                    $mail->Subject  = utf8_decode("Recuperação de Senha Sistema Alunos Projeto Crescer"); // Assunto da mensagem

                    $LINK  =  $conteudo_email;

                    $mail->Body = "Segue abaixo o link para redefinição de senha do sistema de alunos do Projeto Crescer.<br>" . $LINK;

//Anexos (opcional)
//$mail->AddAttachment("e:\home\login\web\documento.pdf", "novo_nome.pdf");

//Envio da Mensagem
                    $enviado = $mail->Send();

//Limpa os destinatários e os anexos
                    $mail->ClearAllRecipients();
                    $mail->ClearAttachments();


                    /*********************FINAL EMAIL************************/

                    $this->view("resposta-redefinir-senha",$dados);


                }else{
                    header("Location: ./home");
                }

            }else{
                header("Location: " . DOMINIO ."index/return/Usuário não encontrado!");

            }
        }else{
            header("Location: " . DOMINIO ."index/return/Dados inválidos!");
        }




        exit();
    }

}