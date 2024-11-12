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

/* components/dropdown/limit.html.twig */
class __TwigTemplate_eb7078fdf812e7450f5a5d85429d4f92 extends Template
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
";
        // line 34
        if ( !array_key_exists("additional_params", $context)) {
            // line 35
            echo "   ";
            $context["additional_params"] = "";
        } else {
            // line 37
            echo "   ";
            if (((twig_length_filter($this->env, ($context["additional_params"] ?? null)) > 0) &&  !(is_string($__internal_compile_0 = ($context["additional_params"] ?? null)) && is_string($__internal_compile_1 = "&") && ('' === $__internal_compile_1 || 0 === strpos($__internal_compile_0, $__internal_compile_1))))) {
                // line 38
                echo "      ";
                $context["additional_params"] = ("&" . ($context["additional_params"] ?? null));
                // line 39
                echo "   ";
            }
        }
        // line 41
        echo "
";
        // line 42
        if ( !($context["no_onchange"] ?? null)) {
            // line 43
            echo "   ";
            $context["href"] = (((("location.href='" . ($context["href"] ?? null)) . "glpilist_limit='+this.value+'") . ($context["additional_params"] ?? null)) . "'");
            // line 44
            echo "   ";
            if ((array_key_exists("is_tab", $context) && (($context["is_tab"] ?? null) == true))) {
                // line 45
                echo "      ";
                $context["href"] = (("javascript:reloadTab('glpilist_limit='+this.value+'" . ($context["additional_params"] ?? null)) . "');");
                // line 46
                echo "   ";
            }
        }
        // line 48
        echo "
";
        // line 49
        $context["options"] = [];
        // line 50
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(range(5, 19, 5));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 51
            echo "   ";
            $context["options"] = twig_array_merge(($context["options"] ?? null), [0 => $context["i"]]);
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 53
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(range(20, 49, 10));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 54
            echo "   ";
            $context["options"] = twig_array_merge(($context["options"] ?? null), [0 => $context["i"]]);
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 56
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(range(50, 249, 50));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 57
            echo "   ";
            $context["options"] = twig_array_merge(($context["options"] ?? null), [0 => $context["i"]]);
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 59
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(range(250, 999, 250));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 60
            echo "   ";
            $context["options"] = twig_array_merge(($context["options"] ?? null), [0 => $context["i"]]);
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 62
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(range(1000, 4999, 1000));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 63
            echo "   ";
            $context["options"] = twig_array_merge(($context["options"] ?? null), [0 => $context["i"]]);
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 65
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(range(5000, 10000, 5000));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 66
            echo "   ";
            $context["options"] = twig_array_merge(($context["options"] ?? null), [0 => $context["i"]]);
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 68
        $context["options"] = twig_array_merge(($context["options"] ?? null), [0 => 9999999]);
        // line 69
        $context["max"] = $this->extensions['Glpi\Application\View\Extension\PhpExtension']->phpConfig("max_input_vars");
        // line 70
        if ((($context["max"] ?? null) > 10)) {
            // line 71
            echo "   ";
            $context["options"] = twig_array_merge(($context["options"] ?? null), [0 => (($context["max"] ?? null) - 10)]);
        }
        // line 73
        echo "<select class=\"form-select form-select-sm mx-1 d-inline-block w-auto ";
        echo twig_escape_filter($this->env, ((array_key_exists("select_class", $context)) ? (_twig_default_filter(($context["select_class"] ?? null), "")) : ("")), "html", null, true);
        echo "\"
        ";
        // line 74
        if ( !($context["no_onchange"] ?? null)) {
            echo "onChange=\"";
            echo twig_escape_filter($this->env, ($context["href"] ?? null), "html", null, true);
            echo "\"";
        }
        echo ">
   ";
        // line 75
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_sort_filter($this->env, ($context["options"] ?? null)));
        foreach ($context['_seq'] as $context["_key"] => $context["value"]) {
            // line 76
            echo "      <option value=\"";
            echo twig_escape_filter($this->env, $context["value"], "html", null, true);
            echo "\" ";
            echo ((($context["value"] == $this->extensions['Glpi\Application\View\Extension\SessionExtension']->userPref("list_limit"))) ? ("selected") : (""));
            echo ">
         ";
            // line 77
            echo twig_escape_filter($this->env, $context["value"], "html", null, true);
            echo "
      </option>
   ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['value'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 80
        echo "</select>
";
    }

    public function getTemplateName()
    {
        return "components/dropdown/limit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  188 => 80,  179 => 77,  172 => 76,  168 => 75,  160 => 74,  155 => 73,  151 => 71,  149 => 70,  147 => 69,  145 => 68,  138 => 66,  134 => 65,  127 => 63,  123 => 62,  116 => 60,  112 => 59,  105 => 57,  101 => 56,  94 => 54,  90 => 53,  83 => 51,  79 => 50,  77 => 49,  74 => 48,  70 => 46,  67 => 45,  64 => 44,  61 => 43,  59 => 42,  56 => 41,  52 => 39,  49 => 38,  46 => 37,  42 => 35,  40 => 34,  37 => 33,);
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

{% if additional_params is not defined %}
   {% set additional_params = '' %}
{% else %}
   {% if additional_params|length > 0 and not (additional_params starts with '&') %}
      {% set additional_params = '&' ~ additional_params %}
   {% endif %}
{% endif %}

{% if not no_onchange %}
   {% set href = \"location.href='\" ~ href ~ \"glpilist_limit='+this.value+'\" ~ additional_params ~ \"'\" %}
   {% if is_tab is defined and is_tab == true %}
      {% set href = \"javascript:reloadTab('glpilist_limit='+this.value+'\" ~ additional_params ~ \"');\" %}
   {% endif %}
{% endif %}

{% set options = [] %}
{% for i in range(5, 19, 5) %}
   {% set options = options|merge([i]) %}
{% endfor %}
{% for i in range(20, 49, 10) %}
   {% set options = options|merge([i]) %}
{% endfor %}
{% for i in range(50, 249, 50) %}
   {% set options = options|merge([i]) %}
{% endfor %}
{% for i in range(250, 999, 250) %}
   {% set options = options|merge([i]) %}
{% endfor %}
{% for i in range(1000, 4999, 1000) %}
   {% set options = options|merge([i]) %}
{% endfor %}
{% for i in range(5000, 10000, 5000) %}
   {% set options = options|merge([i]) %}
{% endfor %}
{% set options = options|merge([9999999]) %}
{% set max = php_config('max_input_vars') %}
{% if max > 10 %}
   {% set options = options|merge([max - 10]) %}
{% endif %}
<select class=\"form-select form-select-sm mx-1 d-inline-block w-auto {{ select_class|default('') }}\"
        {% if not no_onchange %}onChange=\"{{ href }}\"{% endif %}>
   {% for value in options|sort %}
      <option value=\"{{ value }}\" {{ value == user_pref('list_limit') ? 'selected' : '' }}>
         {{ value }}
      </option>
   {% endfor %}
</select>
", "components/dropdown/limit.html.twig", "C:\\xampp\\htdocs\\glpi_7_new\\templates\\components\\dropdown\\limit.html.twig");
    }
}
