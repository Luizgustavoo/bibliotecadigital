<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of controller
 *
 * @author Marketing
 */
class Controller extends System{
    protected  function view($nome, $vars = null){
        
        if(is_array($vars) && count($vars) > 0){
            extract($vars, EXTR_PREFIX_ALL, 'view');
        }
        
        return require_once VIEWS . $nome . '.phtml';
        
    }
}
