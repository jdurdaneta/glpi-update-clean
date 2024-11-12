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

/* layout/parts/goto_button.html.twig */
class __TwigTemplate_0f3c66ebc62352e608c13eee0bd746a6 extends Template
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
        if (($this->extensions['Glpi\Application\View\Extension\SessionExtension']->getCurrentInterface() == "central")) {
            // line 35
            echo "    ";
            $context["shortcut"] = __("Ctrl+Alt+G");
            // line 36
            echo "    ";
            if ((($context["platform"] ?? null) == twig_constant("donatj\\UserAgent\\Platforms::MACINTOSH"))) {
                // line 37
                echo "        ";
                $context["shortcut"] = __("Option+Command+G");
                // line 38
                echo "    ";
            }
            // line 39
            echo "
   <button class=\"btn btn-icon btn-sm btn-ghost-secondary trigger-fuzzy justify-content-start mb-md-2 ps-1\"
           title=\"";
            // line 41
            echo twig_escape_filter($this->env, ($context["shortcut"] ?? null), "html", null, true);
            echo "\"
           data-bs-toggle=\"tooltip\"
           data-bs-placement=\"right\">
      <i class=\"ti ti-arrow-big-right me-1\"></i>
      <span class=\"menu-label ";
            // line 45
            echo (( !($context["is_vertical"] ?? null)) ? ("d-block d-xl-none d-xxl-block") : (""));
            echo "\">
         ";
            // line 46
            echo twig_escape_filter($this->env, __("Find menu"), "html", null, true);
            echo "
      </span>
   </button>
";
        }
    }

    public function getTemplateName()
    {
        return "layout/parts/goto_button.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  69 => 46,  65 => 45,  58 => 41,  54 => 39,  51 => 38,  48 => 37,  45 => 36,  42 => 35,  40 => 34,  37 => 33,);
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

{% if get_current_interface() == 'central' %}
    {% set shortcut = __('Ctrl+Alt+G') %}
    {% if platform == constant(\"donatj\\\\UserAgent\\\\Platforms::MACINTOSH\") %}
        {% set shortcut = __('Option+Command+G') %}
    {% endif %}

   <button class=\"btn btn-icon btn-sm btn-ghost-secondary trigger-fuzzy justify-content-start mb-md-2 ps-1\"
           title=\"{{ shortcut }}\"
           data-bs-toggle=\"tooltip\"
           data-bs-placement=\"right\">
      <i class=\"ti ti-arrow-big-right me-1\"></i>
      <span class=\"menu-label {{ not is_vertical ? \"d-block d-xl-none d-xxl-block\" : \"\" }}\">
         {{ __('Find menu') }}
      </span>
   </button>
{% endif %}
", "layout/parts/goto_button.html.twig", "C:\\xampp\\htdocs\\glpi_7_new\\templates\\layout\\parts\\goto_button.html.twig");
    }
}
