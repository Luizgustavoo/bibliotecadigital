<?php
date_default_timezone_set( 'America/Sao_Paulo' );

//VARIÁVEIS DO SISTEMA
define("CONTROLLERS", "app/controllers/");
define("VIEWS", "app/views/");
define("MODELS", "app/models/");
define("HELPERS", "system/helpers/");
define("ARQUIVOS", "app/views/_arquivos/");
define("DOMINIO", "/bibliotecadigitaladm/");

define("SALARIO_MINIMO", 1030.40);
define("MEDIA_MINIMO", 6.0);


define("TITLE", "Agenda Projeto Crescer");



define("ENCODING", mb_internal_encoding());


$server = explode('/',$_SERVER["SCRIPT_NAME"]);

define('SITE_ROOT',$_SERVER["HTTP_HOST"].'/'.$server[1]."/");

//error_reporting(E_ALL ^E_NOTICE);
error_reporting(0);


//ini_set('display_errors',1);
//ini_set('display_startup_erros',1);
//error_reporting(E_ALL);

require_once 'system/system.php';
require_once 'system/controller.php';
require_once 'system/model.php';

spl_autoload_register(function($file){
    //echo $file;
    //$file = lcfirst($file);
    if(file_exists(MODELS .$file.".php"))
        require_once MODELS .$file.".php";
    else if(file_exists(HELPERS .$file.".php"))
        require_once HELPERS .$file.".php";
    else if(file_exists(ARQUIVOS .$file.".php"))
        require_once ARQUIVOS .$file.".php";
    else
        die("Arquivo de inclusão $file MODEL ou HELPER não encontrado");
});

$start = new System();
$start->run();
?>