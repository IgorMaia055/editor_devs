<?php

namespace sistem\Suporte;

use Twig\Lexer;
use sistem\Nucleo\Helpers;

class Template
{
    private \Twig\Environment $twig;

    public function __construct(string $diretorio)
    {
        $loader = new \Twig\Loader\FilesystemLoader($diretorio);
        $this->twig = new \Twig\Environment($loader);

        $lexer = new Lexer($this->twig, array(
            $this->Helpers()
        ));

        $this->twig->setLexer($lexer);
    }

    public function renderizar(string $view, array $dados)
    {
        return $this->twig->render($view, $dados);
    }

    public function Helpers(): void 
    {
        array(
            $this->twig->addFunction(
                new \Twig\TwigFunction('url', function(string $url = null){
                    return Helpers::url($url);
                })
            ),
            $this->twig->addFunction(
                new \Twig\TwigFunction('dataFormat', function(){
                    return Helpers::dataFormat();
                })
            ),
            $this->twig->addFunction(
                new \Twig\TwigFunction('contarTempo', function(string $date){
                    return Helpers::contarTempo($date);
                })
            ),
            $this->twig->addFunction(
                new \Twig\TwigFunction('dateNew', function(){
                    return Helpers::dateNew();
                })
            ),
            $this->twig->addFunction(
                new \Twig\TwigFunction('diferencaTempo', function(string $entrega, string $dataR){
                    return Helpers::diferencaTempo($entrega, $dataR);
                })
            ),
            $this->twig->addFunction(
                new \Twig\TwigFunction('diferencaTempoDia', function(string $entrega, string $dataR){
                    return Helpers::diferencaTempoDia($entrega, $dataR);
                })
            ),
            $this->twig->addFunction(
                new \Twig\TwigFunction('diferencaTempoService', function(string $entrega, string $data){
                    return Helpers::diferencaTempoService($entrega, $data);
                })
            ),
            $this->twig->addFunction(
                new \Twig\TwigFunction('confirmacao', function(string $id){
                    return Helpers::confirmacao($id);
                })
            ),
            $this->twig->addFunction(
                new \Twig\TwigFunction('enviar', function(string $emailUser){
                    return Helpers::enviar($emailUser);
                })
            )
        );
    }
}