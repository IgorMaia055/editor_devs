<?php

/**
 * Classe para a controlação da aplicação, com ela todas as rotas são conectadas, dados são encontrados e arquivos html são renderizados atravez do twig template. 
 * @author Igor Maia <igormaia055@gmail.com>
 * @copyright Copyright (c) 2023
 */

namespace sistem\Controlador;

// Classes bases
use sistem\Nucleo\Controlador;
use sistem\Nucleo\Helpers;
use sistem\Nucleo\Connection;

use sistem\Database\select\SelectDev;

class SiteControl extends Controlador
{
    public function __construct()
    {
        parent::__construct('views/');
    }
    public function login(): void 
    {
        echo $this->template->renderizar('login.html', []);
    }

    public function goLogin(): void 
    {
        $login =  filter_input(INPUT_GET,'login', FILTER_DEFAULT);
        $senha =  filter_input(INPUT_GET,'senha', FILTER_DEFAULT);

        $selectDev = (new SelectDev)->select($login, $senha);
        if(count($selectDev) > 0){
            $_SESSION['id'] = $selectDev[0]->id;
            Helpers::redirecionar('home/');
        }else{
            Helpers::redirecionar('login/');
        }
    }

    public function home(): void 
    {
        if(!isset($_SESSION["nome"])){
            Helpers::redirecionar('login/');
        }else{
            echo $this->template->renderizar('home.html', []);
        }
    }
}


?>