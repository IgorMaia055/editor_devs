<?php

include 'vendor/autoload.php';

use sistem\Nucleo\Helpers;
use Pecee\SimpleRouter\SimpleRouter;
use sistem\Nucleo\Connection;

(new Connection)->getInstancia();
session_start();

try {
    SimpleRouter::setDefaultNamespace('sistem\Controlador');

    SimpleRouter::get(ROUTER_BASE. 'login/', 'SiteControl@login');
    SimpleRouter::get(ROUTER_BASE. 'goLogin/', 'SiteControl@goLogin');

    SimpleRouter::get(ROUTER_BASE. 'home/', 'SiteControl@home');

    SimpleRouter::start();

} catch (Pecee\SimpleRouter\Exceptions\NotFoundHttpException $e) {
    Helpers::redirecionar('login/');
}
