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

/* pages/login_error.html.twig */
class __TwigTemplate_b5e39ced638c9ee2e1a846093a0104c6 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'content_block' => [$this, 'block_content_block'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 34
        return "layout/page_card_notlogged.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("layout/page_card_notlogged.html.twig", "pages/login_error.html.twig", 34);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 36
    public function block_content_block($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 37
        echo "<div class=\"alert alert-warning\">
    <div class=\"d-flex align-items-center\">
        <div class=\"me-4\">
            <i class=\"ti ti-alert-triangle fa-2x\"></i>
        </div>
        <div>
            <h4 class=\"alert-title\">
                ";
        // line 44
        echo twig_escape_filter($this->env, __("Error"), "html", null, true);
        echo "
            </h4>
            <div>
                ";
        // line 47
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["errors"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
            // line 48
            echo "                    ";
            echo twig_escape_filter($this->env, $context["error"], "html", null, true);
            echo "<br />
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 50
        echo "            </div>

            <a href=\"";
        // line 52
        echo twig_escape_filter($this->env, ($context["login_url"] ?? null), "html", null, true);
        echo "\" class=\"btn btn-primary mt-3\">
                <i class=\"ti ti-login\"></i>
                <span>";
        // line 54
        echo twig_escape_filter($this->env, __("Log in again"), "html", null, true);
        echo "</span>
            </a>
        </div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "pages/login_error.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  87 => 54,  82 => 52,  78 => 50,  69 => 48,  65 => 47,  59 => 44,  50 => 37,  46 => 36,  35 => 34,);
    }

    public function getSourceContext()
    {
        return new Source("{#
 # ---------------------------------------------------------------------
 #
 # GLPI - Gestionnaire Libre de Parc Informatique
 #
 # http://glpi-project.org
 #
 # @copyright 2015-2023 Teclib' and contributors.
 # @copyright 2003-2014 by the INDEPNET Development Team.
 # @licence   https://www.gnu.org/licenses/gpl-3.0.html
 #
 # ---------------------------------------------------------------------
 #
 # LICENSE
 #
 # This file is part of GLPI.
 #
 # This program is free software: you can redistribute it and/or modify
 # it under the terms of the GNU General Public License as published by
 # the Free Software Foundation, either version 3 of the License, or
 # (at your option) any later version.
 #
 # This program is distributed in the hope that it will be useful,
 # but WITHOUT ANY WARRANTY; without even the implied warranty of
 # MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 # GNU General Public License for more details.
 #
 # You should have received a copy of the GNU General Public License
 # along with this program.  If not, see <https://www.gnu.org/licenses/>.
 #
 # ---------------------------------------------------------------------
 #}

{% extends 'layout/page_card_notlogged.html.twig' %}

{% block content_block %}
<div class=\"alert alert-warning\">
    <div class=\"d-flex align-items-center\">
        <div class=\"me-4\">
            <i class=\"ti ti-alert-triangle fa-2x\"></i>
        </div>
        <div>
            <h4 class=\"alert-title\">
                {{ __(\"Error\") }}
            </h4>
            <div>
                {% for error in errors %}
                    {{ error }}<br />
                {% endfor %}
            </div>

            <a href=\"{{ login_url }}\" class=\"btn btn-primary mt-3\">
                <i class=\"ti ti-login\"></i>
                <span>{{ __('Log in again') }}</span>
            </a>
        </div>
    </div>
</div>
{% endblock %}
", "pages/login_error.html.twig", "C:\\xampp\\htdocs\\glpi_7_new\\templates\\pages\\login_error.html.twig");
    }
}
