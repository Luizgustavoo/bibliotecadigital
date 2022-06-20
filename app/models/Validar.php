<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Validar
 *
 * @author Marketing Projeto
 */
class Validar
{
    //put your code here


    public static function find_set_mes()
    {
        $dia_atual = date('d');
        $array_dias = array();

        for ($x = (int)$dia_atual; $x <= 31; $x++) {
            $array_dias[] = $x;
        }

        for ($x = 1; $x < $dia_atual; $x++) {
            $array_dias[] = $x;
        }

        //        echo "<pre>";
        //        print_r($array_dias);
        //        echo "<hr>";

        return implode(',', $array_dias);
    }

    public static  function validaEmail($e)
    {
        $conta = "/^[a-zA-Z0-9\._-]+@";
        $domino = "[a-zA-Z0-9\._-]+.[.]";
        $extensao = "([a-zA-Z]{2,4})$/";
        $pattern = $conta . $domino . $extensao;
        if (preg_match($pattern, $e)) {
            return true;
        } else {
            return false;
        }
    }


    public static function somar_horas($times)
    {

        $seconds = 0;

        foreach ($times as $time) {
            list($g, $i) = explode(':', $time);
            $seconds += $g * 3600;
            $seconds += $i * 60;
        }

        $hours = floor($seconds / 3600);
        $seconds -= $hours * 3600;
        $minutes = floor($seconds / 60);

        $segundos = $seconds % 60;

        return "{$hours}:" . str_pad($minutes, 2, '0', STR_PAD_LEFT) . ":" . str_pad($segundos, 2, '0', STR_PAD_LEFT);
    }

    public static function calcular($dados)
    {

        $resultado = array();
        $contador = 0;
        if (count($dados) % 2 == 0) {
            $contador = count($dados);
        } else {
            $contador = count($dados) - 1;
        }

        $tempo  = 0;
        for ($x = 1; $x <= $contador; $x = $x + 2) {

            $total = 0;

            list($horas, $minutos, $segundos) = explode(':', Validar::diferencaHora($dados[$x - 1], $dados[$x]));

            $total = $horas * 3600 + $minutos * 60 + $segundos;

            $tempo += $total;
        }



        $total_hora_dados = Validar::segundos_em_tempo($tempo);

        return $total_hora_dados;
    }

    public static function LimpaArray($x)
    {
        for ($a = 0; $a < count($x); $a++) {
            $x[$a] = "";
            array_shift($x);
            array_pop($x);
        }
        return $x;
    }

    public static function validarData($data)
    {
        $d = DateTime::createFromFormat('d/m/Y', $data);
        if ($d && $d->format('d/m/Y') === $data) {
            return true;
        } else {
            return false;
        }
    }

    public static function converterData($data, $formato)
    {

        if (mb_substr_count($data, '0') > 5) {

            if ($formato === 'pt') {
                return '00/00/0000';
            } elseif ($formato === 'us') {
                return '0000/00/00';
            }
        } else {

            if (strlen($data) >= 8) {
                $d = DateTime::createFromFormat('d/m/Y', $data);

                if ($formato === 'pt') {
                    return $d->format('d/m/Y');
                }
                if ($formato === 'us') {
                    return $d->format('Y/m/d');
                }
            }
        }
    }

    public static function validaCPF($cpf)
    {

        // Extrai somente os números
        $cpf = preg_replace('/[^0-9]/is', '', $cpf);

        // Verifica se foi informado todos os digitos corretamente
        if (strlen($cpf) != 11) {
            return false;
        }
        // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }
        // Faz o calculo para validar o CPF
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }
        return true;
    }

    public static function validaCNPJ($cnpj)
    {
        //Etapa 1: Cria um array com apenas os digitos numéricos, isso permite receber o cnpj em diferentes formatos como "00.000.000/0000-00", "00000000000000", "00 000 000 0000 00" etc...
        $j = 0;
        for ($i = 0; $i < (strlen($cnpj)); $i++) {
            if (is_numeric($cnpj[$i])) {
                $num[$j] = $cnpj[$i];
                $j++;
            }
        }
        //Etapa 2: Conta os dígitos, um Cnpj válido possui 14 dígitos numéricos.
        if (count($num) != 14) {
            $isCnpjValid = false;
        }
        //Etapa 3: O número 00000000000 embora não seja um cnpj real resultaria um cnpj válido após o calculo dos dígitos verificares e por isso precisa ser filtradas nesta etapa.
        if ($num[0] == 0 && $num[1] == 0 && $num[2] == 0 && $num[3] == 0 && $num[4] == 0 && $num[5] == 0 && $num[6] == 0 && $num[7] == 0 && $num[8] == 0 && $num[9] == 0 && $num[10] == 0 && $num[11] == 0) {
            $isCnpjValid = false;
        }
        //Etapa 4: Calcula e compara o primeiro dígito verificador.
        else {
            $j = 5;
            for ($i = 0; $i < 4; $i++) {
                $multiplica[$i] = $num[$i] * $j;
                $j--;
            }
            $soma = array_sum($multiplica);
            $j = 9;
            for ($i = 4; $i < 12; $i++) {
                $multiplica[$i] = $num[$i] * $j;
                $j--;
            }
            $soma = array_sum($multiplica);
            $resto = $soma % 11;
            if ($resto < 2) {
                $dg = 0;
            } else {
                $dg = 11 - $resto;
            }
            if ($dg != $num[12]) {
                $isCnpjValid = false;
            }
        }
        //Etapa 5: Calcula e compara o segundo dígito verificador.
        if (!isset($isCnpjValid)) {
            $j = 6;
            for ($i = 0; $i < 5; $i++) {
                $multiplica[$i] = $num[$i] * $j;
                $j--;
            }
            $soma = array_sum($multiplica);
            $j = 9;
            for ($i = 5; $i < 13; $i++) {
                $multiplica[$i] = $num[$i] * $j;
                $j--;
            }
            $soma = array_sum($multiplica);
            $resto = $soma % 11;
            if ($resto < 2) {
                $dg = 0;
            } else {
                $dg = 11 - $resto;
            }
            if ($dg != $num[13]) {
                $isCnpjValid = false;
            } else {
                $isCnpjValid = true;
            }
        }
        //Trecho usado para depurar erros.
        /*
        if($isCnpjValid==true)
            {
                echo "<p><font color="GREEN">Cnpj é Válido</font></p>";
            }
        if($isCnpjValid==false)
            {
                echo "<p><font color="RED">Cnpj Inválido</font></p>";
            }
        */
        //Etapa 6: Retorna o Resultado em um valor booleano.
        return $isCnpjValid;
    }

    public static function converterMoedaBancoDados($get_valor)
    {
        $source = array('.', ',');
        $replace = array('', '.');
        $valor = str_replace($source, $replace, $get_valor); //remove os pontos e substitui a virgula pelo ponto

        return str_replace(" ", "", str_replace('R$ ', '', $valor)); //retorna o valor formatado para gravar no banco
    }

    public static function tratarAspas($str)
    {
        $string = str_replace("'", "\'", $str);
        $string2 = str_replace('"', '\"', $string);
        return $string2;
    }


    public static function validarLogin()
    {

        session_start();
        if (!isset($_SESSION)) {
            session_start();
        }
        if (isset($_SESSION['idUsuario']) && isset($_SESSION['nomeUsuario'])) {

            $tempo_ocioso = time() - $_SESSION['hora_login'];

            if ($tempo_ocioso > $_SESSION['limite']) {
                unset($_SESSION['idUsuario']);
                unset($_SESSION['nomeUsuario']);
                unset($_SESSION['loginUsuario']);
                unset($_SESSION['statusUsuario']);
                unset($_SESSION['hora_login']);
                unset($_SESSION['limite']);
                session_destroy();
                header("Location: " . DOMINIO);
            } else {
                $_SESSION['hora_login'] = time();
            }
        } else {
            header("Location: " . DOMINIO);
        }
    }

    public static function validarMenuSolicitacaoCompra()
    {

        session_start();
        if (
            $_SESSION['setor_usuario'] == 'compras' or
            $_SESSION['setor_usuario'] == 'direcao' or
            $_SESSION['tipo_usuario'] == 'administrador' or
            $_SESSION['tipo_usuario'] == 'pilar'
        ) {
            return true;
        } else {
            return false;
        }
    }

    public static function validarMenuCotacaoCompra()
    {

        session_start();
        if (
            $_SESSION['setor_usuario'] == 'compras' or
            $_SESSION['setor_usuario'] == 'direcao' or
            $_SESSION['tipo_usuario'] == 'administrador'
        ) {
            return true;
        } else {
            return false;
        }
    }

    public static function validarMenuCompra()
    {

        session_start();
        if (
            $_SESSION['setor_usuario'] == 'compras' or
            $_SESSION['setor_usuario'] == 'direcao' or
            $_SESSION['tipo_usuario'] == 'administrador'
        ) {
            return true;
        } else {
            return false;
        }
    }

    public static function validarMenuAdministrador()
    {

        session_start();
        if ($_SESSION['tipo_usuario'] == 'administrador') {
            return true;
        } else {
            return false;
        }
    }

    public static function validarMenuCheque()
    {

        session_start();
        if (
            $_SESSION['setor_usuario'] == 'financeiro' or
            $_SESSION['tipo_usuario'] == 'administrador'
        ) {
            return true;
        } else {
            return false;
        }
    }

    public static function validarMenuFinanceiro()
    {

        session_start();
        if (
            $_SESSION['setor_usuario'] == 'financeiro' or
            $_SESSION['tipo_usuario'] == 'administrador'
        ) {
            return true;
        } else {
            return false;
        }
    }

    public static function validarMenuHoras()
    {

        session_start();
        if (
            $_SESSION['setor_usuario'] == 'coordenacao' or
            $_SESSION['setor_usuario'] == 'supervisao' or
            $_SESSION['setor_usuario'] == 'direcao' or
            $_SESSION['setor_usuario'] == 'financeiro' or
            $_SESSION['tipo_usuario'] == 'administrador'
        ) {
            return true;
        } else {
            return false;
        }
    }

    public static function diferencaHora($string1, $string2)
    {
        $hora1 = DateTime::createFromFormat('H:i:s', $string1);
        $hora2 = DateTime::createFromFormat('H:i:s', $string2);

        return $hora1->diff($hora2)->format('%H:%i:%s');
    }

    public static function segundos_em_tempo($segundos)
    {

        $horas = floor($segundos / 3600);
        $minutos = floor($segundos % 3600 / 60);
        $segundos = $segundos % 60;

        return sprintf("%d:%02d:%02d", $horas, $minutos, $segundos);
    }

    public static function validaHoras($campo)
    {
        $retorno = false;
        if (preg_match('/^[0-9]{2}:[0-9]{2}$/', $campo)) {
            $horas = substr($campo, 0, 2);
            $minutos = substr($campo, 3, 2);
            if (((int)$horas > 23) || ((int)$minutos > 59)) {
                $retorno = false;
            } else {
                $retorno = true;
            }
        }

        return $retorno;
    }

    public static function horaMaiorQueZero($campo)
    {
        $retorno = true;
        if (preg_match('/^[0-9]{2}:[0-9]{2}$/', $campo)) {
            $horas = substr($campo, 0, 2);
            $minutos = substr($campo, 3, 2);

            if ((int)$horas > 23 || (int)$minutos > 59) {
                $retorno = false;
            } elseif ((int) $horas <= 0 && (int)$minutos <= 0) {
                $retorno = false;
            } else {
                $retorno = true;
            }
        }

        return $retorno;
    }



    public static  function redirecionar($class_name, $mensagem)
    {

        header("Location: " . DOMINIO . "$class_name/index/return/" . $mensagem);
    }

    public static function cidadeMesAno()
    {
        $diaa = strftime('%d');
        $mess = strftime('%B');
        $anoo = strftime('%Y');

        switch ($mess) {
            case 'January':
                $mess = 'Janeiro';
                break;
            case 'February':
                $mess = 'Fevereiro';
                break;
            case 'March':
                $mess = 'Mar&ccedil;o';
                break;
            case 'April':
                $mess = 'Abril';
                break;
            case 'May':
                $mess = 'Maio';
                break;
            case 'June':
                $mess = 'Junho';
                break;
            case 'July':
                $mess = 'Julho';
                break;
            case 'August':
                $mess = 'Agosto';
                break;
            case 'September':
                $mess = 'Setembro';
                break;
            case 'October':
                $mess = 'Outubro';
                break;
            case 'November':
                $mess = 'Novembro';
                break;
            case 'December':
                $mess = 'Dezembro';
                break;
        }

        return "Arapongas, $diaa de $mess de $anoo";
    }

    public static function campoFormatado($tipo = "", $string, $size = 10)
    {
        $string = preg_replace("[^0-9]", "", $string);

        switch ($tipo) {
            case 'fone':
                if ($size === 10) {
                    $string = '(' . substr($tipo, 0, 2) . ') ' . substr($tipo, 2, 4)
                        . '-' . substr($tipo, 6);
                } else
                    if ($size === 11) {
                    $string = '(' . substr($tipo, 0, 2) . ') ' . substr($tipo, 2, 5)
                        . '-' . substr($tipo, 7);
                }
                break;
            case 'cep':
                $string = substr($string, 0, 5) . '-' . substr($string, 5, 3);
                break;
            case 'cpf':
                $string = substr($string, 0, 3) . '.' . substr($string, 3, 3) .
                    '.' . substr($string, 6, 3) . '-' . substr($string, 9, 2);
                break;
            case 'cnpj':
                $string = substr($string, 0, 2) . '.' . substr($string, 2, 3) .
                    '.' . substr($string, 5, 3) . '/' .
                    substr($string, 8, 4) . '-' . substr($string, 12, 2);
                break;
            case 'rg':
                $string = substr(
                    $string,
                    0,
                    1
                ) . '.' . substr($string, 1, 3) .
                    '.' . substr($string, 4, 3) .
                    '-' . substr($string, 7, 1);
                break;
            default:
                $string = 'É necessário definir um tipo(fone, cep, cpf, cnpj, rg)';
                break;
        }
        return $string;
    }






    public static function DataEhValida($dat)
    {


        if (!empty($dat)) {
            $data = explode("/", "$dat"); // fatia a string $dat em pedados, usando / como referência
            $d = $data[0];
            $m = $data[1];
            $y = $data[2];

            $res = checkdate($m, $d, $y);
            if ($res == 1) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }


    public static function formatCnpjCpf($value)
    {
        $cnpj_cpf = preg_replace("/\D/", '', $value);

        if (strlen($cnpj_cpf) === 11) {
            return preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $cnpj_cpf);
        }

        return preg_replace("/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/", "\$1.\$2.\$3/\$4-\$5", $cnpj_cpf);
    }


    public static function uploadArquivos($file, $local_upload)
    {
        $retorno = array();
        $novoNome = "";
        if (isset($file['name']) && $file["error"] == 0) {
            for ($i = 0; $i < count($file['name']); $i++) {

                $arquivo_tmp = $file['tmp_name'][$i];
                $nome = $file['name'][$i];
                // Pega a extensao
                $extensao = strrchr($nome, '.');
                // Converte a extensao para mimusculo
                $extensao = strtolower($extensao);
                // Somente imagens, .jpg;.jpeg;.gif;.png
                // Aqui eu enfilero as extesões permitidas e separo por ';'
                // Isso server apenas para eu poder pesquisar dentro desta String
                if (strstr('.jpg;.jpeg;.gif;.png', $extensao)) {
                    $novoNome = md5(microtime())  . $extensao;
                    $destino = $local_upload . $novoNome;
                    if (@move_uploaded_file($arquivo_tmp, $destino)) {
                        $retorno[] = $novoNome;
                    }
                } else {
                    $retorno = array();
                }
            }
        }
        return $retorno;
    }

    public static function retornaDatasMes($mes, $ano)
    {

        $numero = cal_days_in_month(CAL_GREGORIAN, $mes, $ano);
        $datas_mes = array();
        $dia_array = array('Domingo', 'Segunda-Feira', 'Terça-Feira', 'Quarta-Feira', 'Quinta-Feira', 'Sexta-Feira', 'Sábado');
        for ($dia = 1; $dia <= $numero; $dia++) {
            $data = $ano . '-' . str_pad($mes, 2, "0", STR_PAD_LEFT) . '-' . str_pad($dia, 2, "0", STR_PAD_LEFT);
            $dia_semana = date('w', strtotime($data));
            $dia_nome  = $dia_array[$dia_semana];
            if ($dia_nome != "Domingo" && $dia_nome != "Sábado") {
                $datas_mes[] = $data;
            }
        }
        return $datas_mes;
    }

    public static function geraCodigoBarra($numero)
    {
        $fino = 1.5;
        $largo = 3.5;
        $altura = 50;

        $barcodes[0] = '00110';
        $barcodes[1] = '10001';
        $barcodes[2] = '01001';
        $barcodes[3] = '11000';
        $barcodes[4] = '00101';
        $barcodes[5] = '10100';
        $barcodes[6] = '01100';
        $barcodes[7] = '00011';
        $barcodes[8] = '10010';
        $barcodes[9] = '01010';

        for ($f1 = 9; $f1 >= 0; $f1--) {
            for ($f2 = 9; $f2 >= 0; $f2--) {
                $f = ($f1 * 10) + $f2;
                $texto = '';
                for ($i = 1; $i < 6; $i++) {
                    $texto .= substr($barcodes[$f1], ($i - 1), 1) . substr($barcodes[$f2], ($i - 1), 1);
                }
                $barcodes[$f] = $texto;
            }
        }

        echo '<img src="http://' . SITE_ROOT . '/web-pages/assets/img/p.gif" width="' . $fino . '" height="' . $altura . '" border="0" />';
        echo '<img src="http://' . SITE_ROOT . '/web-pages/assets/img/b.gif" width="' . $fino . '" height="' . $altura . '" border="0" />';
        echo '<img src="http://' . SITE_ROOT . '/web-pages/assets/img/p.gif" width="' . $fino . '" height="' . $altura . '" border="0" />';
        echo '<img src="http://' . SITE_ROOT . '/web-pages/assets/img/b.gif" width="' . $fino . '" height="' . $altura . '" border="0" />';

        echo '<img ';

        $texto = $numero;

        if ((strlen($texto) % 2) <> 0) {
            $texto = '0' . $texto;
        }

        while (strlen($texto) > 0) {
            $i = round(substr($texto, 0, 2));
            $texto = substr($texto, strlen($texto) - (strlen($texto) - 2), (strlen($texto) - 2));

            if (isset($barcodes[$i])) {
                $f = $barcodes[$i];
            }

            for ($i = 1; $i < 11; $i += 2) {
                if (substr($f, ($i - 1), 1) == '0') {
                    $f1 = $fino;
                } else {
                    $f1 = $largo;
                }

                echo 'src="http://' . SITE_ROOT . '/web-pages/assets/img/p.gif" width="' . $f1 . '" height="' . $altura . '" border="0">';
                echo '<img ';

                if (substr($f, $i, 1) == '0') {
                    $f2 = $fino;
                } else {
                    $f2 = $largo;
                }

                echo 'src="http://' . SITE_ROOT . '/web-pages/assets/img/b.gif" width="' . $f2 . '" height="' . $altura . '" border="0">';
                echo '<img ';
            }
        }
        echo 'src="http://' . SITE_ROOT . '/web-pages/assets/img/p.gif" width="' . $largo . '" height="' . $altura . '" border="0" />';
        echo '<img src="http://' . SITE_ROOT . '/web-pages/assets/img/b.gif" width="' . $fino . '" height="' . $altura . '" border="0" />';
        echo '<img src="http://' . SITE_ROOT . '/web-pages/assets/img/p.gif" width="1" height="' . $altura . '" border="0" />';
    }


    public static function calcularIdade($data)
    {
        $idade = 0;
        $data_nascimento = date('Y-m-d', strtotime($data));
        list($anoNasc, $mesNasc, $diaNasc) = explode('-', $data_nascimento);

        $idade      = date("Y") - $anoNasc;
        if (date("m") < $mesNasc) {
            $idade -= 1;
        } elseif ((date("m") == $mesNasc) && (date("d") <= $diaNasc)) {
            $idade -= 1;
        }

        return $idade;
    }

    public static function abreviarNomesMeio($nome)
    {
        $arr_nome = explode(' ', $nome);
        $primeira_posicao = 0;
        $ultima_posicao = count($arr_nome) - 1;

        $nome_completo = "";

        for ($x = 0; $x < count($arr_nome); $x++) {
            if ($x == $primeira_posicao || $x == $ultima_posicao) {
                $nome_completo .= $arr_nome[$x] . " ";
            } else {
                $nome_completo .= substr($arr_nome[$x], 0, 1) . ". ";
            }
        }

        return $nome_completo;
    }

    public static function removerCaracteres($string)
    {
        $caracteres_sem_acento = array(
            'Š' => 'S', 'š' => 's', 'Ð' => 'Dj', '' => 'Z', '' => 'z', 'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A',
            'Å' => 'A', 'Æ' => 'A', 'Ç' => 'C', 'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I',
            'Ï' => 'I', 'Ñ' => 'N', 'Ń' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ø' => 'O', 'Ù' => 'U', 'Ú' => 'U',
            'Û' => 'U', 'Ü' => 'U', 'Ý' => 'Y', 'Þ' => 'B', 'ß' => 'Ss', 'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a',
            'å' => 'a', 'æ' => 'a', 'ç' => 'c', 'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i',
            'ï' => 'i', 'ð' => 'o', 'ñ' => 'n', 'ń' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ø' => 'o', 'ù' => 'u',
            'ú' => 'u', 'û' => 'u', 'ü' => 'u', 'ý' => 'y', 'ý' => 'y', 'þ' => 'b', 'ÿ' => 'y', 'ƒ' => 'f',
            'ă' => 'a', 'î' => 'i', 'â' => 'a', 'ș' => 's', 'ț' => 't', 'Ă' => 'A', 'Î' => 'I', 'Â' => 'A', 'Ș' => 'S', 'Ț' => 'T',
        );
        $nova_string = strtr($string, $caracteres_sem_acento);
        return $nova_string;
    }
}
