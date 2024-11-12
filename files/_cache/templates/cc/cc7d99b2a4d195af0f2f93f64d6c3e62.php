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

/* central/messages.html.twig */
class __TwigTemplate_04b1facb0d8c985290027558ec7e5140 extends Template
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
        // line 33
        echo "
<div class=\"message-area\">
   ";
        // line 35
        if ((twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "errors", [], "any", true, true, false, 35) && (twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "errors", [], "any", false, false, false, 35)) > 0))) {
            // line 36
            echo "      <div class=\"alert alert-important alert-danger d-flex\" role=\"alert\">
         <i class=\"fas fa-3x fa-exclamation-triangle\"></i>
         <ul>
            ";
            // line 39
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "errors", [], "any", false, false, false, 39));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 40
                echo "               <li>";
                echo $context["error"];
                echo "</li>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 42
            echo "         </ul>
      </div>
   ";
        }
        // line 45
        echo "   ";
        if ((twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "warnings", [], "any", true, true, false, 45) && (twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "warnings", [], "any", false, false, false, 45)) > 0))) {
            // line 46
            echo "      <div class=\"alert alert-important alert-warning d-flex\" role=\"alert\">
         <i class=\"fas fa-3x fa-exclamation-triangle\"></i>
         <ul>
            ";
            // line 49
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "warnings", [], "any", false, false, false, 49));
            foreach ($context['_seq'] as $context["_key"] => $context["warning"]) {
                // line 50
                echo "               <li>";
                echo $context["warning"];
                echo "</li>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['warning'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 52
            echo "         </ul>
      </div>
   ";
        }
        // line 55
        echo "   ";
        if ((twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "infos", [], "any", true, true, false, 55) && (twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "infos", [], "any", false, false, false, 55)) > 0))) {
            // line 56
            echo "      <div class=\"alert alert-important alert-info d-flex\" role=\"alert\">
         <i class=\"fas fa-3x fa-info-circle\"></i>
         <ul>
            ";
            // line 59
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "infos", [], "any", false, false, false, 59));
            foreach ($context['_seq'] as $context["_key"] => $context["info"]) {
                // line 60
                echo "               <li>";
                echo $context["info"];
                echo "</li>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['info'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 62
            echo "         </ul>
      </div>
   ";
        }
        // line 65
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "central/messages.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  118 => 65,  113 => 62,  104 => 60,  100 => 59,  95 => 56,  92 => 55,  87 => 52,  78 => 50,  74 => 49,  69 => 46,  66 => 45,  61 => 42,  52 => 40,  48 => 39,  43 => 36,  41 => 35,  37 => 33,);
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

<div class=\"message-area\">
   {% if messages.errors is defined and messages.errors|length > 0 %}
      <div class=\"alert alert-important alert-danger d-flex\" role=\"alert\">
         <i class=\"fas fa-3x fa-exclamation-triangle\"></i>
         <ul>
            {% for error in messages.errors %}
               <li>{{ error|raw }}</li>
            {% endfor %}
         </ul>
      </div>
   {% endif %}
   {% if messages.warnings is defined and messages.warnings|length > 0 %}
      <div class=\"alert alert-important alert-warning d-flex\" role=\"alert\">
         <i class=\"fas fa-3x fa-exclamation-triangle\"></i>
         <ul>
            {% for warning in messages.warnings %}
               <li>{{ warning|raw }}</li>
            {% endfor %}
         </ul>
      </div>
   {% endif %}
   {% if messages.infos is defined and messages.infos|length > 0 %}
      <div class=\"alert alert-important alert-info d-flex\" role=\"alert\">
         <i class=\"fas fa-3x fa-info-circle\"></i>
         <ul>
            {% for info in messages.infos %}
               <li>{{ info|raw }}</li>
            {% endfor %}
         </ul>
      </div>
   {% endif %}
</div>
", "central/messages.html.twig", "C:\\xampp\\htdocs\\glpi_7_new\\templates\\central\\messages.html.twig");
    }
}
