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

/* seller/Seller.html.twig */
class __TwigTemplate_7544df047881a9a8944cd3385327f4719e9ff6c9d2197122e7fd7d3fc0b1418a extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'css' => [$this, 'block_css'],
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "layoutMapAndMenu.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("layoutMapAndMenu.html.twig", "seller/Seller.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_css($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "     <link rel=\"stylesheet\" href=\"/assets/css/seller.css\">
 ";
    }

    // line 7
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 8
        echo "     <div class=\"widgetContainer SellerCarousel\">
         <h2>Liste des Vendeurs autour de vous </h2>
         <div class=\"SellerList\">
             ";
        // line 11
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["sellerList"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["seller"]) {
            // line 12
            echo "                 <p>";
            echo twig_escape_filter($this->env, (($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = $context["seller"]) && is_array($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4) || $__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 instanceof ArrayAccess ? ($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4["SELL_NAME"] ?? null) : null), "html", null, true);
            echo "</p>
             ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['seller'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 14
        echo "         </div>

     </div>
 ";
    }

    public function getTemplateName()
    {
        return "seller/Seller.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 14,  69 => 12,  65 => 11,  60 => 8,  56 => 7,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends\"layoutMapAndMenu.html.twig\" %}

 {% block css %}
     <link rel=\"stylesheet\" href=\"/assets/css/seller.css\">
 {% endblock %}

 {% block content %}
     <div class=\"widgetContainer SellerCarousel\">
         <h2>Liste des Vendeurs autour de vous </h2>
         <div class=\"SellerList\">
             {% for seller in sellerList %}
                 <p>{{ seller['SELL_NAME'] }}</p>
             {% endfor %}
         </div>

     </div>
 {% endblock %}
", "seller/Seller.html.twig", "C:\\wamp64\\www\\karotte\\templates\\seller\\Seller.html.twig");
    }
}
