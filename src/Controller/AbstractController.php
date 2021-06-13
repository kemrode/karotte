<?php
namespace src\Controller;

abstract class AbstractController {
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
        $this->twig->addGlobal('session', $_SESSION);
        $this->twig->addGlobal('root', ROOT);
    }

    public function InputTreatment($input)
    {
        $input = trim($input);
        $input = stripcslashes($input);
        return htmlspecialchars($input);
    }
    public function GetTreatedValueFromPostIfIsset($input)
    {
        if(isset($_POST[$input]))
            return $this->InputTreatment($_POST[$input]);
        else
            return null;
    }

    public function getFlashMessage(string $key, $default = null) {
        $_SESSION[$key] = isset($_SESSION[$key]) ? $_SESSION[$key] : $default;
        $message = $_SESSION[$key];
        unset($_SESSION[$key]);
        return $message;
    }

}