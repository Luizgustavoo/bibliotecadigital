<?php

class Helpers
{
    public static function validaData($p_data)
    {
        // data é menor que 8
        if (strlen($p_data) < 8) {
            return false;
        } else {
            // verifica se a data possui
            // a barra (/) de separação
            if (strpos($p_data, "/") !== FALSE) {
                $partes = explode("/", $p_data);
                // pega o dia da data
                $dia = $partes[0];
                // pega o mês da data
                $mes = $partes[1];
                // prevenindo Notice: Undefined offset: 2
                // caso informe data com uma única barra (/)
                $ano = isset($partes[2]) ? $partes[2] : 0;

                if (strlen($ano) < 4) {
                    return false;
                } else {
                    // verifica se a data é válida
                    if (checkdate($mes, $dia, $ano)) {
                        return true;
                    } else {
                        return false;
                    }
                }
            } else {
                return false;
            }
        }
    }
    public static function convertDataPTBRUS($p_data)
    {
        $data = explode('/', $p_data);
        return $data[2] . '-' . $data[1] . '-' . $data[0];
    }
    public static function convertDataUSPTBR($p_data, $p_explode, $p_caracter_limiter)
    {
        $data = explode($p_explode, $p_data);
        return $data[2] . $p_caracter_limiter . $data[1] . $p_caracter_limiter . $data[0];
    }
    public static function removerFormatacaoNumero($strNumero)
    {
        $strNumero = trim(str_replace("R$", null, $strNumero));
        $vetVirgula = explode(",", $strNumero);
        if (count($vetVirgula) == 1) {
            $acentos = array(".");
            $resultado = str_replace($acentos, "", $strNumero);
            return $resultado;
        } else if (count($vetVirgula) != 2) {
            return $strNumero;
        }
        $strNumero = $vetVirgula[0];
        $strDecimal = mb_substr($vetVirgula[1], 0, 2);
        $acentos = array(".");
        $resultado = str_replace($acentos, "", $strNumero);
        $resultado = $resultado . "." . $strDecimal;
        return $resultado;
    }
    public static function converte($valor = 0, $bolExibirMoeda = true, $bolPalavraFeminina = false)
    {
        $valor = self::removerFormatacaoNumero($valor);
        $singular = null;
        $plural = null;
        if ($bolExibirMoeda) {
            $singular = array("centavo", "real", "mil", "milhão", "bilhão", "trilhão", "quatrilhão");
            $plural = array("centavos", "reais", "mil", "milhões", "bilhões", "trilhões", "quatrilhões");
        } else {
            $singular = array("", "", "mil", "milhão", "bilhão", "trilhão", "quatrilhão");
            $plural = array("", "", "mil", "milhões", "bilhões", "trilhões", "quatrilhões");
        }
        $c = array("", "cem", "duzentos", "trezentos", "quatrocentos", "quinhentos", "seiscentos", "setecentos", "oitocentos", "novecentos");
        $d = array("", "dez", "vinte", "trinta", "quarenta", "cinquenta", "sessenta", "setenta", "oitenta", "noventa");
        $d10 = array("dez", "onze", "doze", "treze", "quatorze", "quinze", "dezesseis", "dezesete", "dezoito", "dezenove");
        $u = array("", "um", "dois", "três", "quatro", "cinco", "seis", "sete", "oito", "nove");
        if ($bolPalavraFeminina) {
            if ($valor == 1)
                $u = array("", "uma", "duas", "três", "quatro", "cinco", "seis", "sete", "oito", "nove");
            else
                $u = array("", "um", "duas", "três", "quatro", "cinco", "seis", "sete", "oito", "nove");
            $c = array("", "cem", "duzentas", "trezentas", "quatrocentas", "quinhentas", "seiscentas", "setecentas", "oitocentas", "novecentas");
        }
        $z = 0;
        $valor = number_format($valor, 2, ".", ".");
        $inteiro = explode(".", $valor);
        for ($i = 0; $i < count($inteiro); $i++)
            for ($ii = mb_strlen($inteiro[$i]); $ii < 3; $ii++)
                $inteiro[$i] = "0" . $inteiro[$i];
        // $fim identifica onde que deve se dar junção de centenas por "e" ou por "," ;)
        $rt = null;
        $fim = count($inteiro) - ($inteiro[count($inteiro) - 1] > 0 ? 1 : 2);
        for ($i = 0; $i < count($inteiro); $i++) {
            $valor = $inteiro[$i];
            $rc = (($valor > 100) && ($valor < 200)) ? "cento" : $c[$valor[0]];
            $rd = ($valor[1] < 2) ? "" : $d[$valor[1]];
            $ru = ($valor > 0) ? (($valor[1] == 1) ? $d10[$valor[2]] : $u[$valor[2]]) : "";
            $r = $rc . (($rc && ($rd || $ru)) ? " e " : "") . $rd . (($rd && $ru) ? " e " : "") . $ru;
            $t = count($inteiro) - 1 - $i;
            $r .= $r ? " " . ($valor > 1 ? $plural[$t] : $singular[$t]) : "";
            if ($valor == "000")
                $z++;
            elseif ($z > 0)
                $z--;
            if (($t == 1) && ($z > 0) && ($inteiro[0] > 0))
                $r .= (($z > 1) ? " de " : "") . $plural[$t];
            if ($r)
                $rt = $rt . ((($i > 0) && ($i <= $fim) && ($inteiro[0] > 0) && ($z < 1)) ? (($i < $fim) ? ", " : " e ") : " ") . $r;
        }
        $rt = mb_substr($rt, 1);
        return ($rt ? trim($rt) : "zero");
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

    public static function URL_exists(string $url): bool
    {
        return str_contains(get_headers($url)[0], "200 OK");
    }


    public static function validaHoras($campo)
    {
        if (preg_match('/^[0-9]{2}:[0-9]{2}$/', $campo)) {
            $horas = substr($campo, 0, 2);
            $minutos = substr($campo, 3, 2);
            if (($horas > "23") || ($minutos > "59")) {
                return false;
            }
            return true;
        }
        return false;
    }
}
