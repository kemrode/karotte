<?php
namespace src\Controller;

class AbstractController {
    protected $loader;
    protected $twig;

    public function getTwig(){
        return $this->twig;
    }

    public function __construct(){

        $this->loader = new \Twig\Loader\FilesystemLoader($_SERVER["DOCUMENT_ROOT"]."/../templates");
        $this->twig = new \Twig\Environment($this->loader,[
            "debug" => true,
            "cache" => $_SERVER["DOCUMENT_ROOT"]."/../var/cache"
        ]);
        $this->twig->addExtension(new \Twig\Extension\DebugExtension());
    }

    public function getGlobals(){
        return array(
            'session' => $_SESSION,
        );
    }
}