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
class ValidarPagina extends Model{
    //put your code here

    public static function validarPaginaAtual($pagina){

        if(!isset($_SESSION)){session_start();}

        $pg = new PaginaUsuarioModel();
        $where = "idUsuario = '{$_SESSION['idUsuario']}' and descricaoPagina = '{$pagina}'";
        $retorno = $pg->verExiste('paginausuario',$where)[0]['existe'];

        return $retorno;

    }

}