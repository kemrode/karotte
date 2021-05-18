<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* layout/layoutMapAndMenu.html.twig */
class __TwigTemplate_7bc86b43020a4668ab1f68ecd3a9f2d908648fc2ae919b01a1a31272b35804d7 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!doctype html>
<html lang=\"en\">
    <head>
        <meta charset=\"UTF-8\">
        <meta name=\"viewport\"
              content=\"width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0\">
        <meta http-equiv=\"X-UA-Compatible\" content=\"ie=edge\">
        <link rel=\"stylesheet\" href = \"/assets/css/header.css\" />
        <link rel=\"shortcut icon\" type=\"image/ico\" href=\"/assets/favicon.ico\">
        <link rel=\"stylesheet\" href=\"/assets/css/reset.css\" />
        <link rel=\"stylesheet\" href=\"https://unpkg.com/leaflet@1.7.1/dist/leaflet.css\"
              integrity=\"sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==\"
              crossorigin=\"\"/>
        <link rel=\"stylesheet\" href = \"/assets/css/seller.css\" />

        <title>Karotte</title>
    </head>

    <body>
        <div id =\"seller\"></div>
        <div id=\"overMapContainer\">
            <header>
                <button id=\"burger-menu\" data-toggle=\"burger-nav\" class=\"burger-menu-button\">
                    <span class=\"burger-menu-button-open\"></span>
                </button>
                <nav id=\"burger-nav\" class=\"main-menu\">
                    <ul class=\"menu\">
                        <li><a href=\"#\"><span class=\"iconify\" data-inline=\"false\" data-icon=\"ant-design:home-filled\"></span></a></li>
                        <li><a href=\"#\"><span class=\"iconify\" data-inline=\"false\" data-icon=\"fa-solid:shopping-basket\" ></span></a></li>
                        <li><a href=\"#\"><span class=\"iconify\" data-inline=\"false\" data-icon=\"bi:gear-fill\"></span></a></li>
                        <li><a href=\"#\"><span class=\"iconify\" data-inline=\"false\" data-icon=\"carbon:user-avatar-filled\"></span></a></li>
                    </ul>
                </nav>
            </header>
            <div class=\"main\">
                ";
        // line 36
        $this->displayBlock('content', $context, $blocks);
        // line 37
        echo "            </div>

        </div>
    </body>

    <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js\"></script>
    <script src=\"https://code.iconify.design/1/1.0.6/iconify.min.js\"></script>
    <script type=\"text/javascript\" src=\"/assets/js/header.js\"></script>
    <script src=\"https://unpkg.com/leaflet@1.7.1/dist/leaflet.js\"
            integrity=\"sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==\"
            crossorigin=\"\"></script>
    <script src=\"/assets/js/seller.js\"></script>
</html>";
    }

    // line 36
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    public function getTemplateName()
    {
        return "layout/layoutMapAndMenu.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  93 => 36,  77 => 37,  75 => 36,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!doctype html>
<html lang=\"en\">
    <head>
        <meta charset=\"UTF-8\">
        <meta name=\"viewport\"
              content=\"width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0\">
        <meta http-equiv=\"X-UA-Compatible\" content=\"ie=edge\">
        <link rel=\"stylesheet\" href = \"/assets/css/header.css\" />
        <link rel=\"shortcut icon\" type=\"image/ico\" href=\"/assets/favicon.ico\">
        <link rel=\"stylesheet\" href=\"/assets/css/reset.css\" />
        <link rel=\"stylesheet\" href=\"https://unpkg.com/leaflet@1.7.1/dist/leaflet.css\"
              integrity=\"sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==\"
              crossorigin=\"\"/>
        <link rel=\"stylesheet\" href = \"/assets/css/seller.css\" />

        <title>Karotte</title>
    </head>

    <body>
        <div id =\"seller\"></div>
        <div id=\"overMapContainer\">
            <header>
                <button id=\"burger-menu\" data-toggle=\"burger-nav\" class=\"burger-menu-button\">
                    <span class=\"burger-menu-button-open\"></span>
                </button>
                <nav id=\"burger-nav\" class=\"main-menu\">
                    <ul class=\"menu\">
                        <li><a href=\"#\"><span class=\"iconify\" data-inline=\"false\" data-icon=\"ant-design:home-filled\"></span></a></li>
                        <li><a href=\"#\"><span class=\"iconify\" data-inline=\"false\" data-icon=\"fa-solid:shopping-basket\" ></span></a></li>
                        <li><a href=\"#\"><span class=\"iconify\" data-inline=\"false\" data-icon=\"bi:gear-fill\"></span></a></li>
                        <li><a href=\"#\"><span class=\"iconify\" data-inline=\"false\" data-icon=\"carbon:user-avatar-filled\"></span></a></li>
                    </ul>
                </nav>
            </header>
            <div class=\"main\">
                {% block content %}{% endblock %}
            </div>

        </div>
    </body>

    <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js\"></script>
    <script src=\"https://code.iconify.design/1/1.0.6/iconify.min.js\"></script>
    <script type=\"text/javascript\" src=\"/assets/js/header.js\"></script>
    <script src=\"https://unpkg.com/leaflet@1.7.1/dist/leaflet.js\"
            integrity=\"sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==\"
            crossorigin=\"\"></script>
    <script src=\"/assets/js/seller.js\"></script>
</html>", "layout/layoutMapAndMenu.html.twig", "C:\\wamp64\\www\\karotte\\templates\\layout\\layoutMapAndMenu.html.twig");
    }
}