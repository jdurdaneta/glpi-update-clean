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

/* layout/parts/context_links.html.twig */
class __TwigTemplate_27a576b7beb0e2b9ec41b52b86d9be5c extends Template
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
        $context["links"] = (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["menu"] ?? null), ($context["sector"] ?? null), [], "array", false, true, false, 34), "content", [], "array", false, true, false, 34), ($context["item"] ?? null), [], "array", false, true, false, 34), "options", [], "array", false, true, false, 34), ($context["option"] ?? null), [], "array", false, true, false, 34), "links", [], "array", true, true, false, 34) &&  !(null === (($__internal_compile_0 = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["menu"] ?? null), ($context["sector"] ?? null), [], "array", false, true, false, 34), "content", [], "array", false, true, false, 34), ($context["item"] ?? null), [], "array", false, true, false, 34), "options", [], "array", false, true, false, 34), ($context["option"] ?? null), [], "array", false, true, false, 34)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0["links"] ?? null) : null)))) ? ((($__internal_compile_1 = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["menu"] ?? null), ($context["sector"] ?? null), [], "array", false, true, false, 34), "content", [], "array", false, true, false, 34), ($context["item"] ?? null), [], "array", false, true, false, 34), "options", [], "array", false, true, false, 34), ($context["option"] ?? null), [], "array", false, true, false, 34)) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1["links"] ?? null) : null)) : ((($__internal_compile_2 = (($__internal_compile_3 = (($__internal_compile_4 = (($__internal_compile_5 = ($context["menu"] ?? null)) && is_array($__internal_compile_5) || $__internal_compile_5 instanceof ArrayAccess ? ($__internal_compile_5[($context["sector"] ?? null)] ?? null) : null)) && is_array($__internal_compile_4) || $__internal_compile_4 instanceof ArrayAccess ? ($__internal_compile_4["content"] ?? null) : null)) && is_array($__internal_compile_3) || $__internal_compile_3 instanceof ArrayAccess ? ($__internal_compile_3[($context["item"] ?? null)] ?? null) : null)) && is_array($__internal_compile_2) || $__internal_compile_2 instanceof ArrayAccess ? ($__internal_compile_2["links"] ?? null) : null)));
        // line 35
        $context["lists_itemtype"] = (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["menu"] ?? null), ($context["sector"] ?? null), [], "array", false, true, false, 35), "content", [], "array", false, true, false, 35), ($context["item"] ?? null), [], "array", false, true, false, 35), "options", [], "array", false, true, false, 35), ($context["option"] ?? null), [], "array", false, true, false, 35), "lists_itemtype", [], "array", true, true, false, 35) &&  !(null === (($__internal_compile_6 = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["menu"] ?? null), ($context["sector"] ?? null), [], "array", false, true, false, 35), "content", [], "array", false, true, false, 35), ($context["item"] ?? null), [], "array", false, true, false, 35), "options", [], "array", false, true, false, 35), ($context["option"] ?? null), [], "array", false, true, false, 35)) && is_array($__internal_compile_6) || $__internal_compile_6 instanceof ArrayAccess ? ($__internal_compile_6["lists_itemtype"] ?? null) : null)))) ? ((($__internal_compile_7 = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["menu"] ?? null), ($context["sector"] ?? null), [], "array", false, true, false, 35), "content", [], "array", false, true, false, 35), ($context["item"] ?? null), [], "array", false, true, false, 35), "options", [], "array", false, true, false, 35), ($context["option"] ?? null), [], "array", false, true, false, 35)) && is_array($__internal_compile_7) || $__internal_compile_7 instanceof ArrayAccess ? ($__internal_compile_7["lists_itemtype"] ?? null) : null)) : ((($__internal_compile_8 = (($__internal_compile_9 = (($__internal_compile_10 = (($__internal_compile_11 = ($context["menu"] ?? null)) && is_array($__internal_compile_11) || $__internal_compile_11 instanceof ArrayAccess ? ($__internal_compile_11[($context["sector"] ?? null)] ?? null) : null)) && is_array($__internal_compile_10) || $__internal_compile_10 instanceof ArrayAccess ? ($__internal_compile_10["content"] ?? null) : null)) && is_array($__internal_compile_9) || $__internal_compile_9 instanceof ArrayAccess ? ($__internal_compile_9[($context["item"] ?? null)] ?? null) : null)) && is_array($__internal_compile_8) || $__internal_compile_8 instanceof ArrayAccess ? ($__internal_compile_8["lists_itemtype"] ?? null) : null)));
        // line 36
        if (twig_test_empty(($context["lists_itemtype"] ?? null))) {
            // line 37
            echo "    ";
            $context["lists_itemtype"] = ($context["item"] ?? null);
        }
        // line 39
        echo "
";
        // line 41
        echo "<ul class=\"nav navbar-nav border-start border-left ps-1 ps-sm-2 flex-row\">

";
        // line 43
        if (twig_get_attribute($this->env, $this->source, ($context["links"] ?? null), "add", [], "array", true, true, false, 43)) {
            // line 44
            echo "<li class=\"nav-item\">
   <a href=\"";
            // line 45
            echo twig_escape_filter($this->env, $this->extensions['Glpi\Application\View\Extension\RoutingExtension']->path((($__internal_compile_12 = ($context["links"] ?? null)) && is_array($__internal_compile_12) || $__internal_compile_12 instanceof ArrayAccess ? ($__internal_compile_12["add"] ?? null) : null)), "html", null, true);
            echo "\" class=\"btn btn-icon btn-sm btn-secondary me-1 pe-2\" title=\"";
            echo twig_escape_filter($this->env, __("Add"), "html", null, true);
            echo "\">
      <i class=\"ti ti-plus\"></i>
      <span class=\"d-none d-xxl-block\">";
            // line 47
            echo twig_escape_filter($this->env, __("Add"), "html", null, true);
            echo "</span>
   </a>
</li>
";
        }
        // line 51
        echo "
";
        // line 52
        if (twig_get_attribute($this->env, $this->source, ($context["links"] ?? null), "search", [], "array", true, true, false, 52)) {
            // line 53
            echo "<li class=\"nav-item\">
   <a href=\"";
            // line 54
            echo twig_escape_filter($this->env, $this->extensions['Glpi\Application\View\Extension\RoutingExtension']->path((($__internal_compile_13 = ($context["links"] ?? null)) && is_array($__internal_compile_13) || $__internal_compile_13 instanceof ArrayAccess ? ($__internal_compile_13["search"] ?? null) : null)), "html", null, true);
            echo "\" class=\"btn btn-icon btn-sm btn-outline-secondary me-1 pe-2\" title=\"";
            echo twig_escape_filter($this->env, __("Search"), "html", null, true);
            echo "\">
      <i class=\"ti ti-search\"></i>
      <span class=\"d-none d-xxl-block\">";
            // line 56
            echo twig_escape_filter($this->env, __("Search"), "html", null, true);
            echo "</span>
   </a>
</li>
";
        }
        // line 60
        echo "
";
        // line 61
        if (twig_get_attribute($this->env, $this->source, ($context["links"] ?? null), "lists", [], "array", true, true, false, 61)) {
            // line 62
            echo "<li class=\"nav-item\">
   <a href=\"#\" class=\"btn btn-icon btn-sm btn-outline-secondary me-1 pe-2 show-saved-searches\"
      data-itemtype=\"";
            // line 64
            echo twig_escape_filter($this->env, ($context["lists_itemtype"] ?? null), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, __("Lists"), "html", null, true);
            echo "\">
      <i class=\"ti ti-star\"></i>
      <span class=\"d-none d-xxl-block\">";
            // line 66
            echo twig_escape_filter($this->env, __("Lists"), "html", null, true);
            echo "</span>
   </a>
</li>
";
        }
        // line 70
        echo "
";
        // line 71
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["links"] ?? null));
        foreach ($context['_seq'] as $context["type"] => $context["link"]) {
            // line 72
            echo "   ";
            if (((($context["type"] == "add") || ($context["type"] == "search")) || ($context["type"] == "lists"))) {
                // line 73
                echo "   ";
            } elseif (($context["type"] == "template")) {
                // line 74
                echo "      <li class=\"nav-item\">
         <a href=\"";
                // line 75
                echo twig_escape_filter($this->env, $this->extensions['Glpi\Application\View\Extension\RoutingExtension']->path($context["link"]), "html", null, true);
                echo "\" class=\"btn btn-icon btn-sm btn-outline-secondary me-1 pe-2\" title=\"";
                echo twig_escape_filter($this->env, __("Manage templates..."), "html", null, true);
                echo "\">
            <i class=\"ti ti-template\"></i>
            <span class=\"d-none d-xxl-block\">";
                // line 77
                echo twig_escape_filter($this->env, __("Templates"), "html", null, true);
                echo "</span>
         </a>
      </li>
   ";
            } elseif ((            // line 80
$context["type"] == "showall")) {
                // line 81
                echo "      <li class=\"nav-item\">
         <a href=\"";
                // line 82
                echo twig_escape_filter($this->env, $this->extensions['Glpi\Application\View\Extension\RoutingExtension']->path($context["link"]), "html", null, true);
                echo "\" class=\"btn btn-icon btn-sm btn-outline-secondary me-1 pe-2\" title=\"";
                echo twig_escape_filter($this->env, __("Show all"), "html", null, true);
                echo "\">
            <i class=\"ti ti-eye-check\"></i>
            <span class=\"d-none d-xxl-block\">";
                // line 84
                echo twig_escape_filter($this->env, __("Show all"), "html", null, true);
                echo "</span>
         </a>
      </li>
   ";
            } elseif ((            // line 87
$context["type"] == "summary")) {
                // line 88
                echo "      <li class=\"nav-item\">
         <a href=\"";
                // line 89
                echo twig_escape_filter($this->env, $this->extensions['Glpi\Application\View\Extension\RoutingExtension']->path($context["link"]), "html", null, true);
                echo "\" class=\"btn btn-icon btn-sm btn-outline-secondary me-1 pe-2\" title=\"";
                echo twig_escape_filter($this->env, __("Summary"), "html", null, true);
                echo "\">
            <i class=\"ti ti-notes\"></i>
            <span class=\"d-none d-xxl-block\">";
                // line 91
                echo twig_escape_filter($this->env, __("Summary"), "html", null, true);
                echo "</span>
         </a>
      </li>
   ";
            } elseif ((            // line 94
$context["type"] == "summary_kanban")) {
                // line 95
                echo "      <li class=\"nav-item\">
         <a href=\"";
                // line 96
                echo twig_escape_filter($this->env, $this->extensions['Glpi\Application\View\Extension\RoutingExtension']->path($context["link"]), "html", null, true);
                echo "\" class=\"btn btn-icon btn-sm btn-outline-secondary me-1 pe-2\" title=\"";
                echo twig_escape_filter($this->env, __("Global Kanban"), "html", null, true);
                echo "\">
            <i class=\"ti ti-layout-columns\"></i>
            <span class=\"d-none d-xxl-block\">";
                // line 98
                echo twig_escape_filter($this->env, __("Global Kanban"), "html", null, true);
                echo "</span>
         </a>
      </li>
   ";
            } elseif ((            // line 101
$context["type"] == "transfer_list")) {
                // line 102
                echo "      <li class=\"nav-item\">
         <a href=\"";
                // line 103
                echo twig_escape_filter($this->env, $this->extensions['Glpi\Application\View\Extension\RoutingExtension']->path($context["link"]), "html", null, true);
                echo "\" class=\"btn btn-icon btn-sm btn-outline-secondary me-1 pe-2\" title=\"";
                echo twig_escape_filter($this->env, __("Transfer list"), "html", null, true);
                echo "\">
            <i class=\"ti ti-list-check\"></i>
            <span class=\"d-none d-xxl-block\">";
                // line 105
                echo twig_escape_filter($this->env, __("Transfer list"), "html", null, true);
                echo "</span>
         </a>
      </li>
   ";
            } elseif ((            // line 108
$context["type"] == "config")) {
                // line 109
                echo "      <li class=\"nav-item\">
         <a href=\"";
                // line 110
                echo twig_escape_filter($this->env, $this->extensions['Glpi\Application\View\Extension\RoutingExtension']->path($context["link"]), "html", null, true);
                echo "\" class=\"btn btn-icon btn-sm btn-outline-secondary me-1 pe-2\" title=\"";
                echo twig_escape_filter($this->env, __("Setup"), "html", null, true);
                echo "\">
            <i class=\"ti ti-tool\"></i>
            <span class=\"d-none d-xxl-block\">";
                // line 112
                echo twig_escape_filter($this->env, __("Setup"), "html", null, true);
                echo "</span>
         </a>
      </li>
   ";
            } else {
                // line 116
                echo "      <li class=\"nav-item\">
         <a href=\"";
                // line 117
                echo twig_escape_filter($this->env, $this->extensions['Glpi\Application\View\Extension\RoutingExtension']->path($context["link"]), "html", null, true);
                echo "\" class=\"btn btn-icon btn-sm btn-outline-secondary me-1 pe-2\">
            ";
                // line 118
                echo $context["type"];
                echo "
         </a>
      </li>
   ";
            }
            // line 122
            echo "
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['type'], $context['link'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 124
        echo "</ul>
";
    }

    public function getTemplateName()
    {
        return "layout/parts/context_links.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  262 => 124,  255 => 122,  248 => 118,  244 => 117,  241 => 116,  234 => 112,  227 => 110,  224 => 109,  222 => 108,  216 => 105,  209 => 103,  206 => 102,  204 => 101,  198 => 98,  191 => 96,  188 => 95,  186 => 94,  180 => 91,  173 => 89,  170 => 88,  168 => 87,  162 => 84,  155 => 82,  152 => 81,  150 => 80,  144 => 77,  137 => 75,  134 => 74,  131 => 73,  128 => 72,  124 => 71,  121 => 70,  114 => 66,  107 => 64,  103 => 62,  101 => 61,  98 => 60,  91 => 56,  84 => 54,  81 => 53,  79 => 52,  76 => 51,  69 => 47,  62 => 45,  59 => 44,  57 => 43,  53 => 41,  50 => 39,  46 => 37,  44 => 36,  42 => 35,  40 => 34,  37 => 33,);
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

{% set links = menu[sector]['content'][item]['options'][option]['links'] ?? menu[sector]['content'][item]['links'] %}
{% set lists_itemtype = menu[sector]['content'][item]['options'][option]['lists_itemtype'] ?? menu[sector]['content'][item]['lists_itemtype'] %}
{% if lists_itemtype is empty %}
    {% set lists_itemtype = item %}
{% endif %}

{# @TODO  border-start is not implemented in current boostrap beta (remove border-left when done)  #}
<ul class=\"nav navbar-nav border-start border-left ps-1 ps-sm-2 flex-row\">

{% if links['add'] is defined %}
<li class=\"nav-item\">
   <a href=\"{{ path(links['add']) }}\" class=\"btn btn-icon btn-sm btn-secondary me-1 pe-2\" title=\"{{ __('Add') }}\">
      <i class=\"ti ti-plus\"></i>
      <span class=\"d-none d-xxl-block\">{{ __('Add') }}</span>
   </a>
</li>
{% endif %}

{% if links['search'] is defined %}
<li class=\"nav-item\">
   <a href=\"{{ path(links['search']) }}\" class=\"btn btn-icon btn-sm btn-outline-secondary me-1 pe-2\" title=\"{{ __('Search') }}\">
      <i class=\"ti ti-search\"></i>
      <span class=\"d-none d-xxl-block\">{{ __('Search') }}</span>
   </a>
</li>
{% endif %}

{% if links['lists'] is defined %}
<li class=\"nav-item\">
   <a href=\"#\" class=\"btn btn-icon btn-sm btn-outline-secondary me-1 pe-2 show-saved-searches\"
      data-itemtype=\"{{ lists_itemtype }}\" title=\"{{ __('Lists') }}\">
      <i class=\"ti ti-star\"></i>
      <span class=\"d-none d-xxl-block\">{{ __('Lists') }}</span>
   </a>
</li>
{% endif %}

{% for type, link in links %}
   {% if type == 'add' or type == 'search' or type == 'lists' %}
   {% elseif type == 'template' %}
      <li class=\"nav-item\">
         <a href=\"{{ path(link) }}\" class=\"btn btn-icon btn-sm btn-outline-secondary me-1 pe-2\" title=\"{{ __('Manage templates...') }}\">
            <i class=\"ti ti-template\"></i>
            <span class=\"d-none d-xxl-block\">{{ __('Templates') }}</span>
         </a>
      </li>
   {% elseif type == 'showall' %}
      <li class=\"nav-item\">
         <a href=\"{{ path(link) }}\" class=\"btn btn-icon btn-sm btn-outline-secondary me-1 pe-2\" title=\"{{ __('Show all') }}\">
            <i class=\"ti ti-eye-check\"></i>
            <span class=\"d-none d-xxl-block\">{{ __('Show all') }}</span>
         </a>
      </li>
   {% elseif type == 'summary' %}
      <li class=\"nav-item\">
         <a href=\"{{ path(link) }}\" class=\"btn btn-icon btn-sm btn-outline-secondary me-1 pe-2\" title=\"{{ __('Summary') }}\">
            <i class=\"ti ti-notes\"></i>
            <span class=\"d-none d-xxl-block\">{{ __('Summary') }}</span>
         </a>
      </li>
   {% elseif type == 'summary_kanban' %}
      <li class=\"nav-item\">
         <a href=\"{{ path(link) }}\" class=\"btn btn-icon btn-sm btn-outline-secondary me-1 pe-2\" title=\"{{ __('Global Kanban') }}\">
            <i class=\"ti ti-layout-columns\"></i>
            <span class=\"d-none d-xxl-block\">{{ __('Global Kanban') }}</span>
         </a>
      </li>
   {% elseif type == 'transfer_list' %}
      <li class=\"nav-item\">
         <a href=\"{{ path(link) }}\" class=\"btn btn-icon btn-sm btn-outline-secondary me-1 pe-2\" title=\"{{ __('Transfer list') }}\">
            <i class=\"ti ti-list-check\"></i>
            <span class=\"d-none d-xxl-block\">{{ __('Transfer list') }}</span>
         </a>
      </li>
   {% elseif type == 'config' %}
      <li class=\"nav-item\">
         <a href=\"{{ path(link) }}\" class=\"btn btn-icon btn-sm btn-outline-secondary me-1 pe-2\" title=\"{{ __('Setup') }}\">
            <i class=\"ti ti-tool\"></i>
            <span class=\"d-none d-xxl-block\">{{ __('Setup') }}</span>
         </a>
      </li>
   {% else %}
      <li class=\"nav-item\">
         <a href=\"{{ path(link) }}\" class=\"btn btn-icon btn-sm btn-outline-secondary me-1 pe-2\">
            {{ type|raw }}
         </a>
      </li>
   {% endif %}

{% endfor %}
</ul>
", "layout/parts/context_links.html.twig", "C:\\xampp\\htdocs\\glpi_7_new\\templates\\layout\\parts\\context_links.html.twig");
    }
}
