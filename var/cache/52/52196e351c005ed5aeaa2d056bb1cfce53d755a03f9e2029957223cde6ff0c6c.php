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

/* seller/layoutMapAndMenu.html.twig */
class __TwigTemplate_9267eabbd66e28a4f898f70a4b47260e0fa78badab33a3bf8893283d6f32396c extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
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
        <link rel=\"shortcut icon\" type=\"image/ico\" href=\"/assets/favicon.ico\">
        <link rel = \"stylesheet\" href = \"/assets/css/materialize.css\" />
        <link rel = \"stylesheet\" href = \"/assets/css/reset.css\" />
        <link rel=\"stylesheet\" href=\"https://unpkg.com/leaflet@1.7.1/dist/leaflet.css\"
              integrity=\"sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==\"
              crossorigin=\"\"/>
        <link rel = \"stylesheet\" href = \"/assets/css/seller.css\" />
        <link rel=\"stylesheet\" href=\"/assets/css/header.scss\">

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
                <div class=\"widgetContainer SellerCarousel\">
                    <h2>Liste des Vendeurs autour de vous </h2>
                    <div class=\"SellerList\">
                        ";
        // line 40
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["sellerList"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["seller"]) {
            // line 41
            echo "                            <p>";
            echo twig_escape_filter($this->env, (($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = $context["seller"]) && is_array($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4) || $__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 instanceof ArrayAccess ? ($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4["SELL_NAME"] ?? null) : null), "html", null, true);
            echo "</p>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['seller'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 43
        echo "                    </div>

                </div>
            </div>

        </div>
    </body>

    <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js\"></script>
    <script src=\"https://code.iconify.design/1/1.0.6/iconify.min.js\"></script>
    <script type=\"text/javascript\" src=\"/assets/js/header.js\"></script>
    <script src=\"https://unpkg.com/leaflet@1.7.1/dist/leaflet.js\"
            integrity=\"sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==\"
            crossorigin=\"\"></script>
    <scrip src=\"/assets/js/materialize.js\"></scrip>
    <script src=\"/assets/js/seller.js\"></script>
</html>";
    }

    public function getTemplateName()
    {
        return "seller/layoutMapAndMenu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  91 => 43,  82 => 41,  78 => 40,  37 => 1,);
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
        <link rel=\"shortcut icon\" type=\"image/ico\" href=\"/assets/favicon.ico\">
        <link rel = \"stylesheet\" href = \"/assets/css/materialize.css\" />
        <link rel = \"stylesheet\" href = \"/assets/css/reset.css\" />
        <link rel=\"stylesheet\" href=\"https://unpkg.com/leaflet@1.7.1/dist/leaflet.css\"
              integrity=\"sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==\"
              crossorigin=\"\"/>
        <link rel = \"stylesheet\" href = \"/assets/css/seller.css\" />
        <link rel=\"stylesheet\" href=\"/assets/css/header.scss\">

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
                <div class=\"widgetContainer SellerCarousel\">
                    <h2>Liste des Vendeurs autour de vous </h2>
                    <div class=\"SellerList\">
                        {% for seller in sellerList %}
                            <p>{{ seller['SELL_NAME'] }}</p>
                        {% endfor %}
                    </div>

                </div>
            </div>

        </div>
    </body>

    <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js\"></script>
    <script src=\"https://code.iconify.design/1/1.0.6/iconify.min.js\"></script>
    <script type=\"text/javascript\" src=\"/assets/js/header.js\"></script>
    <script src=\"https://unpkg.com/leaflet@1.7.1/dist/leaflet.js\"
            integrity=\"sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==\"
            crossorigin=\"\"></script>
    <scrip src=\"/assets/js/materialize.js\"></scrip>
    <script src=\"/assets/js/seller.js\"></script>
</html>", "seller/layoutMapAndMenu.html.twig", "C:\\wamp64\\www\\karotte\\templates\\seller\\layoutMapAndMenu.html.twig");
    }
}
