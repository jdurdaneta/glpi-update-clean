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

/* layout/parts/impersonate_banner.html.twig */
class __TwigTemplate_5e573e6a6c0e12e357168cdd7f931c50 extends Template
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
        if (($context["is_impersonate_active"] ?? null)) {
            // line 35
            echo "<div class=\"banner-impersonate\">
   <form name=\"form\" method=\"post\" action=\"";
            // line 36
            echo twig_escape_filter($this->env, $this->extensions['Glpi\Application\View\Extension\ItemtypeExtension']->getItemtypeFormPath("User"), "html", null, true);
            echo "\" data-submit-once>
      ";
            // line 37
            echo twig_escape_filter($this->env, twig_sprintf(__("You are impersonating %s."), $this->extensions['Glpi\Application\View\Extension\ItemtypeExtension']->getItemName(($context["user"] ?? null))), "html", null, true);
            echo "
      <input type=\"hidden\" name=\"_glpi_csrf_token\" value=\"";
            // line 38
            echo twig_escape_filter($this->env, Session::getNewCSRFToken(), "html", null, true);
            echo "\" />
      <button type=\"submit\" name=\"impersonate\" class=\"btn btn-outline-danger\" value=\"0\">
         ";
            // line 40
            echo twig_escape_filter($this->env, __("Stop impersonating"), "html", null, true);
            echo "
      </button>
   </form>
</div>
";
        }
    }

    public function getTemplateName()
    {
        return "layout/parts/impersonate_banner.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  58 => 40,  53 => 38,  49 => 37,  45 => 36,  42 => 35,  40 => 34,  37 => 33,);
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

{% if is_impersonate_active %}
<div class=\"banner-impersonate\">
   <form name=\"form\" method=\"post\" action=\"{{ 'User'|itemtype_form_path }}\" data-submit-once>
      {{ __('You are impersonating %s.')|format(get_item_name(user)) }}
      <input type=\"hidden\" name=\"_glpi_csrf_token\" value=\"{{ csrf_token() }}\" />
      <button type=\"submit\" name=\"impersonate\" class=\"btn btn-outline-danger\" value=\"0\">
         {{ __('Stop impersonating') }}
      </button>
   </form>
</div>
{% endif %}
", "layout/parts/impersonate_banner.html.twig", "C:\\xampp\\htdocs\\glpi_7_new\\templates\\layout\\parts\\impersonate_banner.html.twig");
    }
}
