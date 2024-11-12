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

/* debug_panel.html.twig */
class __TwigTemplate_746b1e3a539f24bc2355cd35e5fea049 extends Template
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
        $macros["_self"] = $this->macros["_self"] = $this;
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 33
        echo "
";
        // line 34
        $context["rand"] = ((array_key_exists("rand", $context)) ? (_twig_default_filter(($context["rand"] ?? null), twig_random($this->env))) : (twig_random($this->env)));
        // line 35
        echo "
";
        // line 89
        echo "
";
        // line 103
        echo "
<div id=\"debugpanel";
        // line 104
        echo twig_escape_filter($this->env, ($context["rand"] ?? null), "html", null, true);
        echo "\" class=\"container-fluid card debug-panel ";
        echo ((($context["ajax"] ?? null)) ? ("debug_ajax") : (""));
        echo " p-0 position-sticky bottom-0\">
   <ul class=\"nav nav-tabs\" data-bs-toggle=\"tabs\">
      <li class=\"nav-item\"><a class=\"nav-link active\" data-bs-toggle=\"tab\" href=\"#debugsummary";
        // line 106
        echo twig_escape_filter($this->env, ($context["rand"] ?? null), "html", null, true);
        echo "\">SUMMARY</a></li>
      ";
        // line 107
        if (($context["debug_sql"] ?? null)) {
            // line 108
            echo "         <li class=\"nav-item\"><a class=\"nav-link\" data-bs-toggle=\"tab\" href=\"#debugsql";
            echo twig_escape_filter($this->env, ($context["rand"] ?? null), "html", null, true);
            echo "\">SQL REQUEST</a></li>
      ";
        }
        // line 110
        echo "      ";
        if (($context["debug_vars"] ?? null)) {
            // line 111
            echo "         <li class=\"nav-item\"><a class=\"nav-link\" data-bs-toggle=\"tab\" href=\"#debugpost";
            echo twig_escape_filter($this->env, ($context["rand"] ?? null), "html", null, true);
            echo "\">POST VARIABLE</a></li>
         <li class=\"nav-item\"><a class=\"nav-link\" data-bs-toggle=\"tab\" href=\"#debugget";
            // line 112
            echo twig_escape_filter($this->env, ($context["rand"] ?? null), "html", null, true);
            echo "\">GET VARIABLE</a></li>
         ";
            // line 113
            if (($context["with_session"] ?? null)) {
                // line 114
                echo "            <li class=\"nav-item\"><a class=\"nav-link\" data-bs-toggle=\"tab\" href=\"#debugsession";
                echo twig_escape_filter($this->env, ($context["rand"] ?? null), "html", null, true);
                echo "\">SESSION VARIABLE</a></li>
         ";
            }
            // line 116
            echo "         <li class=\"nav-item\"><a class=\"nav-link\" data-bs-toggle=\"tab\" href=\"#debugserver";
            echo twig_escape_filter($this->env, ($context["rand"] ?? null), "html", null, true);
            echo "\">SERVER VARIABLE</a></li>
      ";
        }
        // line 118
        echo "      ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["plugin_tabs"] ?? null));
        foreach ($context['_seq'] as $context["tab_id"] => $context["tab_info"]) {
            // line 119
            echo "         <li class=\"nav-item\"><a class=\"nav-link\" data-bs-toggle=\"tab\" href=\"#debug";
            echo twig_escape_filter($this->env, ($context["tab_id"] . ($context["rand"] ?? null)), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, (($__internal_compile_0 = $context["tab_info"]) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0["title"] ?? null) : null), "html", null, true);
            echo "</a></li>
      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['tab_id'], $context['tab_info'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 121
        echo "      <li class=\"nav-item ms-auto\">
         <a id=\"close_debug";
        // line 122
        echo twig_escape_filter($this->env, ($context["rand"] ?? null), "html", null, true);
        echo "\" class=\"nav-link\" href=\"#\">
            <i class=\"fas fa-2x fa-times\"></i>
            <span class=\"sr-only\">";
        // line 124
        echo twig_escape_filter($this->env, __("Close"), "html", null, true);
        echo "</span>
         </a>
         <script>
            \$('#close_debug";
        // line 127
        echo twig_escape_filter($this->env, ($context["rand"] ?? null), "html", null, true);
        echo "').on('click', function() {
               \$('#debugpanel";
        // line 128
        echo twig_escape_filter($this->env, ($context["rand"] ?? null), "html", null, true);
        echo "').css('display', 'none');
            });
         </script>
      </li>
   </ul>

   <div class=\"card-body overflow-auto\" style=\"height: 300px\">
      <div class=\"tab-content\">
         <div id=\"debugsummary";
        // line 136
        echo twig_escape_filter($this->env, ($context["rand"] ?? null), "html", null, true);
        echo "\" class=\"tab-pane active\">
            <dl class=\"row\">
               <dt class=\"col-sm-3\">Execution time</dt>
               <dd class=\"col-sm-9\">";
        // line 139
        echo twig_escape_filter($this->env, (($__internal_compile_1 = ($context["summary"] ?? null)) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1["execution_time"] ?? null) : null), "html", null, true);
        echo "</dd>
               <dt class=\"col-sm-3\">Memory usage</dt>
               <dd class=\"col-sm-9\">";
        // line 141
        echo twig_escape_filter($this->env, $this->extensions['Glpi\Application\View\Extension\DataHelpersExtension']->getFormattedSize((($__internal_compile_2 = ($context["summary"] ?? null)) && is_array($__internal_compile_2) || $__internal_compile_2 instanceof ArrayAccess ? ($__internal_compile_2["memory_usage"] ?? null) : null)), "html", null, true);
        echo "</dd>
               ";
        // line 142
        if (($context["debug_sql"] ?? null)) {
            // line 143
            echo "                  <dt class=\"col-sm-3\">SQL queries count</dt>
                  <dd class=\"col-sm-9\">";
            // line 144
            echo twig_escape_filter($this->env, (($__internal_compile_3 = ($context["summary"] ?? null)) && is_array($__internal_compile_3) || $__internal_compile_3 instanceof ArrayAccess ? ($__internal_compile_3["sql_queries_count"] ?? null) : null), "html", null, true);
            echo "</dd>
                  <dt class=\"col-sm-3\">SQL queries duration</dt>
                  <dd class=\"col-sm-9\">";
            // line 146
            echo twig_escape_filter($this->env, (($__internal_compile_4 = ($context["summary"] ?? null)) && is_array($__internal_compile_4) || $__internal_compile_4 instanceof ArrayAccess ? ($__internal_compile_4["sql_queries_duration"] ?? null) : null), "html", null, true);
            echo "</dd>
               ";
        }
        // line 148
        echo "            </dl>
         </div>

         ";
        // line 151
        if (($context["debug_sql"] ?? null)) {
            // line 152
            echo "            <div id=\"debugsql";
            echo twig_escape_filter($this->env, ($context["rand"] ?? null), "html", null, true);
            echo "\" class=\"tab-pane\">
               <h1>";
            // line 153
            echo twig_escape_filter($this->env, (($__internal_compile_5 = ($context["sql_info"] ?? null)) && is_array($__internal_compile_5) || $__internal_compile_5 instanceof ArrayAccess ? ($__internal_compile_5["total_requests"] ?? null) : null), "html", null, true);
            echo " Queries took ";
            echo twig_escape_filter($this->env, (($__internal_compile_6 = ($context["sql_info"] ?? null)) && is_array($__internal_compile_6) || $__internal_compile_6 instanceof ArrayAccess ? ($__internal_compile_6["total_duration"] ?? null) : null), "html", null, true);
            echo "</h1>
               <table id=\"debugsql";
            // line 154
            echo twig_escape_filter($this->env, ($context["rand"] ?? null), "html", null, true);
            echo "_table\" class=\"table card-table\">
                  <thead>
                     <tr>
                        <th>N°</th>
                        <th>Query</th>
                        <th>Time</th>
                        <th>Rows</th>
                        <th>Warnings</th>
                        <th>Errors</th>
                     </tr>
                  </thead>
                  <tbody>
                     ";
            // line 166
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((($__internal_compile_7 = ($context["sql_info"] ?? null)) && is_array($__internal_compile_7) || $__internal_compile_7 instanceof ArrayAccess ? ($__internal_compile_7["queries"] ?? null) : null));
            foreach ($context['_seq'] as $context["_key"] => $context["query"]) {
                // line 167
                echo "                        <tr>
                           <td>";
                // line 168
                echo twig_escape_filter($this->env, (($__internal_compile_8 = $context["query"]) && is_array($__internal_compile_8) || $__internal_compile_8 instanceof ArrayAccess ? ($__internal_compile_8["num"] ?? null) : null), "html", null, true);
                echo "</td>
                           <td>";
                // line 169
                echo twig_call_macro($macros["_self"], "macro_display_clean_sql", [(($__internal_compile_9 = $context["query"]) && is_array($__internal_compile_9) || $__internal_compile_9 instanceof ArrayAccess ? ($__internal_compile_9["query"] ?? null) : null)], 169, $context, $this->getSourceContext());
                echo "</td>
                           <td>";
                // line 170
                echo twig_escape_filter($this->env, (($__internal_compile_10 = $context["query"]) && is_array($__internal_compile_10) || $__internal_compile_10 instanceof ArrayAccess ? ($__internal_compile_10["time"] ?? null) : null), "html", null, true);
                echo "</td>
                           <td>";
                // line 171
                echo twig_escape_filter($this->env, (($__internal_compile_11 = $context["query"]) && is_array($__internal_compile_11) || $__internal_compile_11 instanceof ArrayAccess ? ($__internal_compile_11["rows"] ?? null) : null), "html", null, true);
                echo "</td>
                           <td>";
                // line 172
                echo twig_nl2br(twig_escape_filter($this->env, (($__internal_compile_12 = $context["query"]) && is_array($__internal_compile_12) || $__internal_compile_12 instanceof ArrayAccess ? ($__internal_compile_12["warnings"] ?? null) : null), "html", null, true));
                echo "</td>
                           <td>";
                // line 173
                echo twig_nl2br(twig_escape_filter($this->env, (($__internal_compile_13 = $context["query"]) && is_array($__internal_compile_13) || $__internal_compile_13 instanceof ArrayAccess ? ($__internal_compile_13["errors"] ?? null) : null), "html", null, true));
                echo "</td>
                        </tr>
                     ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['query'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 176
            echo "                  </tbody>
               </table>
               <script>
                  initSortableTable('debugsql";
            // line 179
            echo twig_escape_filter($this->env, ($context["rand"] ?? null), "html", null, true);
            echo "_table');
               </script>
            </div>
         ";
        }
        // line 183
        echo "
         ";
        // line 184
        if (($context["debug_vars"] ?? null)) {
            // line 185
            echo "            <div id=\"debugpost";
            echo twig_escape_filter($this->env, ($context["rand"] ?? null), "html", null, true);
            echo "\" class=\"tab-pane\">
               ";
            // line 186
            echo twig_call_macro($macros["_self"], "macro_print_clean_array", [(($__internal_compile_14 = ($context["vars_info"] ?? null)) && is_array($__internal_compile_14) || $__internal_compile_14 instanceof ArrayAccess ? ($__internal_compile_14["post"] ?? null) : null), 0, true], 186, $context, $this->getSourceContext());
            echo "
            </div>
            <div id=\"debugget";
            // line 188
            echo twig_escape_filter($this->env, ($context["rand"] ?? null), "html", null, true);
            echo "\" class=\"tab-pane\">
               ";
            // line 189
            echo twig_call_macro($macros["_self"], "macro_print_clean_array", [(($__internal_compile_15 = ($context["vars_info"] ?? null)) && is_array($__internal_compile_15) || $__internal_compile_15 instanceof ArrayAccess ? ($__internal_compile_15["get"] ?? null) : null), 0, true], 189, $context, $this->getSourceContext());
            echo "
            </div>
            ";
            // line 191
            if (($context["with_session"] ?? null)) {
                // line 192
                echo "               <div id=\"debugsession";
                echo twig_escape_filter($this->env, ($context["rand"] ?? null), "html", null, true);
                echo "\" class=\"tab-pane\">
                  ";
                // line 193
                echo twig_call_macro($macros["_self"], "macro_print_clean_array", [(($__internal_compile_16 = ($context["vars_info"] ?? null)) && is_array($__internal_compile_16) || $__internal_compile_16 instanceof ArrayAccess ? ($__internal_compile_16["session"] ?? null) : null), 0, true], 193, $context, $this->getSourceContext());
                echo "
               </div>
            ";
            }
            // line 196
            echo "            <div id=\"debugserver";
            echo twig_escape_filter($this->env, ($context["rand"] ?? null), "html", null, true);
            echo "\" class=\"tab-pane\">
               ";
            // line 197
            echo twig_call_macro($macros["_self"], "macro_print_clean_array", [(($__internal_compile_17 = ($context["vars_info"] ?? null)) && is_array($__internal_compile_17) || $__internal_compile_17 instanceof ArrayAccess ? ($__internal_compile_17["server"] ?? null) : null), 0, true], 197, $context, $this->getSourceContext());
            echo "
            </div>
         ";
        }
        // line 200
        echo "
         ";
        // line 201
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["plugin_tabs"] ?? null));
        foreach ($context['_seq'] as $context["tab_id"] => $context["tab_info"]) {
            // line 202
            echo "            ";
            if (twig_get_attribute($this->env, $this->source, $context["tab_info"], "display_callable", [], "array", true, true, false, 202)) {
                // line 203
                echo "               <div id=\"debug";
                echo twig_escape_filter($this->env, ($context["tab_id"] . ($context["rand"] ?? null)), "html", null, true);
                echo "\" class=\"tab-pane\">
                  ";
                // line 204
                echo twig_escape_filter($this->env, $this->extensions['Glpi\Application\View\Extension\PhpExtension']->call((($__internal_compile_18 = $context["tab_info"]) && is_array($__internal_compile_18) || $__internal_compile_18 instanceof ArrayAccess ? ($__internal_compile_18["display_callable"] ?? null) : null), ["with_session" =>                 // line 205
($context["with_session"] ?? null), "ajax" =>                 // line 206
($context["ajax"] ?? null), "rand" =>                 // line 207
($context["rand"] ?? null)]), "html", null, true);
                // line 208
                echo "
               </div>
            ";
            }
            // line 211
            echo "         ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['tab_id'], $context['tab_info'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 212
        echo "      </div>
   </div>
</div>
";
    }

    // line 36
    public function macro_print_clean_array($__data__ = null, $__pad__ = 0, $__js_expand__ = false, ...$__varargs__)
    {
        $macros = $this->macros;
        $context = $this->env->mergeGlobals([
            "data" => $__data__,
            "pad" => $__pad__,
            "js_expand" => $__js_expand__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start();
        try {
            // line 37
            echo "   ";
            if ((twig_length_filter($this->env, ($context["data"] ?? null)) > 0)) {
                // line 38
                echo "      <table class=\"array-debug table table-striped card-table\">
         <tr>
            <th>KEY</th>
            <th>=&gt;</th>
            <th>VALUE</th>
         </tr>
         ";
                // line 44
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["data"] ?? null));
                foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                    // line 45
                    echo "            ";
                    $context["row_rand"] = twig_random($this->env);
                    // line 46
                    echo "            <tr>
               <td>";
                    // line 47
                    echo twig_escape_filter($this->env, $context["key"], "html", null, true);
                    echo "</td>
               <td>
                  ";
                    // line 49
                    if ((($context["js_expand"] ?? null) && (is_array($context["value"]) || is_object($context["value"])))) {
                        // line 50
                        echo "                     <a class=\"fw-bolder\" href=\"javascript:showHideDiv('content";
                        echo twig_escape_filter($this->env, ($context["key"] . ($context["row_rand"] ?? null)), "html", null, true);
                        echo "', '', '', '')\">=&gt;</a>
                  ";
                    } else {
                        // line 52
                        echo "                     =&gt;
                  ";
                    }
                    // line 54
                    echo "               </td>
               <td>
                  ";
                    // line 56
                    if (is_array($context["value"])) {
                        // line 57
                        echo "                     ";
                        if (($context["js_expand"] ?? null)) {
                            // line 58
                            echo "                        <a class=\"fw-bolder\" href=\"javascript:showHideDiv('content";
                            echo twig_escape_filter($this->env, ($context["key"] . ($context["row_rand"] ?? null)), "html", null, true);
                            echo "', '', '', '')\">array(";
                            echo twig_escape_filter($this->env, twig_length_filter($this->env, $context["value"]), "html", null, true);
                            echo ")</a>
                     ";
                        } else {
                            // line 60
                            echo "                        array(";
                            echo twig_escape_filter($this->env, twig_length_filter($this->env, $context["value"]), "html", null, true);
                            echo ")
                     ";
                        }
                        // line 62
                        echo "                     <div id=\"content";
                        echo twig_escape_filter($this->env, ($context["key"] . ($context["row_rand"] ?? null)), "html", null, true);
                        echo "\" ";
                        echo ((($context["js_expand"] ?? null)) ? ("style=\"display: none\"") : (""));
                        echo ">
                        ";
                        // line 63
                        echo twig_call_macro($macros["_self"], "macro_print_clean_array", [$context["value"], (($context["pad"] ?? null) + 1)], 63, $context, $this->getSourceContext());
                        echo "
                     </div>
                  ";
                    } else {
                        // line 66
                        echo "                     ";
                        if (is_object($context["value"])) {
                            // line 67
                            echo "                        ";
                            // line 68
                            echo "                        ";
                            $context["out"] = twig_split_filter($this->env, twig_trim_filter(twig_var_dump($this->env, $context, ...[0 => $context["value"]])), " ", 2);
                            // line 69
                            echo "                        ";
                            if (($context["js_expand"] ?? null)) {
                                // line 70
                                echo "                           <a class=\"fw-bolder\" href=\"javascript:showHideDiv('content";
                                echo twig_escape_filter($this->env, ($context["key"] . ($context["row_rand"] ?? null)), "html", null, true);
                                echo "', '', '', '')\">";
                                echo twig_escape_filter($this->env, (($__internal_compile_19 = ($context["out"] ?? null)) && is_array($__internal_compile_19) || $__internal_compile_19 instanceof ArrayAccess ? ($__internal_compile_19[0] ?? null) : null), "html", null, true);
                                echo "</a>
                        ";
                            } else {
                                // line 72
                                echo "                           ";
                                echo twig_escape_filter($this->env, (($__internal_compile_20 = ($context["out"] ?? null)) && is_array($__internal_compile_20) || $__internal_compile_20 instanceof ArrayAccess ? ($__internal_compile_20[0] ?? null) : null), "html", null, true);
                                echo "
                        ";
                            }
                            // line 74
                            echo "                        <div id=\"content";
                            echo twig_escape_filter($this->env, ($context["key"] . ($context["row_rand"] ?? null)), "html", null, true);
                            echo "\" ";
                            echo ((($context["js_expand"] ?? null)) ? ("style=\"display: none\"") : (""));
                            echo ">
                           <pre>";
                            // line 75
                            echo twig_escape_filter($this->env, twig_trim_filter((($__internal_compile_21 = ($context["out"] ?? null)) && is_array($__internal_compile_21) || $__internal_compile_21 instanceof ArrayAccess ? ($__internal_compile_21[1] ?? null) : null)), "html", null, true);
                            echo "</pre>
                        </div>
                     ";
                        } else {
                            // line 78
                            echo "                        ";
                            echo twig_escape_filter($this->env, twig_var_dump($this->env, $context, ...[0 => $context["value"]]), "html", null, true);
                            echo "
                     ";
                        }
                        // line 80
                        echo "                  ";
                    }
                    // line 81
                    echo "               </td>
            </tr>
         ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 84
                echo "      </table>
   ";
            } else {
                // line 86
                echo "      ";
                echo twig_escape_filter($this->env, __("Empty array"), "html", null, true);
                echo "
   ";
            }

            return ('' === $tmp = ob_get_contents()) ? '' : new Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    // line 90
    public function macro_display_clean_sql($__query__ = null, ...$__varargs__)
    {
        $macros = $this->macros;
        $context = $this->env->mergeGlobals([
            "query" => $__query__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start();
        try {
            // line 91
            echo "   ";
            echo twig_replace_filter(($context["query"] ?? null), ["UNION" => "</br>UNION</br>", "FROM" => "</br>FROM", "WHERE" => "</br>WHERE", "INNER JOIN" => "</br>INNER JOIN", "LEFT JOIN" => "</br>LEFT JOIN", "ORDER BY" => "</br>ORDER BY", "SORT" => "</br>SORT", ">" => "&gt;", "<" => "&lt;"]);
            // line 101
            echo "
";

            return ('' === $tmp = ob_get_contents()) ? '' : new Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    public function getTemplateName()
    {
        return "debug_panel.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  516 => 101,  513 => 91,  500 => 90,  487 => 86,  483 => 84,  475 => 81,  472 => 80,  466 => 78,  460 => 75,  453 => 74,  447 => 72,  439 => 70,  436 => 69,  433 => 68,  431 => 67,  428 => 66,  422 => 63,  415 => 62,  409 => 60,  401 => 58,  398 => 57,  396 => 56,  392 => 54,  388 => 52,  382 => 50,  380 => 49,  375 => 47,  372 => 46,  369 => 45,  365 => 44,  357 => 38,  354 => 37,  339 => 36,  332 => 212,  326 => 211,  321 => 208,  319 => 207,  318 => 206,  317 => 205,  316 => 204,  311 => 203,  308 => 202,  304 => 201,  301 => 200,  295 => 197,  290 => 196,  284 => 193,  279 => 192,  277 => 191,  272 => 189,  268 => 188,  263 => 186,  258 => 185,  256 => 184,  253 => 183,  246 => 179,  241 => 176,  232 => 173,  228 => 172,  224 => 171,  220 => 170,  216 => 169,  212 => 168,  209 => 167,  205 => 166,  190 => 154,  184 => 153,  179 => 152,  177 => 151,  172 => 148,  167 => 146,  162 => 144,  159 => 143,  157 => 142,  153 => 141,  148 => 139,  142 => 136,  131 => 128,  127 => 127,  121 => 124,  116 => 122,  113 => 121,  102 => 119,  97 => 118,  91 => 116,  85 => 114,  83 => 113,  79 => 112,  74 => 111,  71 => 110,  65 => 108,  63 => 107,  59 => 106,  52 => 104,  49 => 103,  46 => 89,  43 => 35,  41 => 34,  38 => 33,);
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

{% set rand = rand|default(random()) %}

{% macro print_clean_array(data, pad = 0, js_expand = false) %}
   {% if data|length > 0 %}
      <table class=\"array-debug table table-striped card-table\">
         <tr>
            <th>KEY</th>
            <th>=&gt;</th>
            <th>VALUE</th>
         </tr>
         {% for key, value in data %}
            {% set row_rand = random() %}
            <tr>
               <td>{{ key }}</td>
               <td>
                  {% if js_expand and (value is array or value is object) %}
                     <a class=\"fw-bolder\" href=\"javascript:showHideDiv('content{{ key ~ row_rand }}', '', '', '')\">=&gt;</a>
                  {% else %}
                     =&gt;
                  {% endif %}
               </td>
               <td>
                  {% if value is array %}
                     {% if js_expand %}
                        <a class=\"fw-bolder\" href=\"javascript:showHideDiv('content{{ key ~ row_rand }}', '', '', '')\">array({{ value|length }})</a>
                     {% else %}
                        array({{ value|length }})
                     {% endif %}
                     <div id=\"content{{ key ~ row_rand }}\" {{ js_expand ? 'style=\"display: none\"' : '' }}>
                        {{ _self.print_clean_array(value, pad + 1) }}
                     </div>
                  {% else %}
                     {% if value is object %}
                        {# Split the type info and object contents #}
                        {% set out = dump(value)|trim|split(' ', 2) %}
                        {% if js_expand %}
                           <a class=\"fw-bolder\" href=\"javascript:showHideDiv('content{{ key ~ row_rand }}', '', '', '')\">{{ out[0] }}</a>
                        {% else %}
                           {{ out[0] }}
                        {% endif %}
                        <div id=\"content{{ key ~ row_rand }}\" {{ js_expand ? 'style=\"display: none\"' : '' }}>
                           <pre>{{ out[1]|trim }}</pre>
                        </div>
                     {% else %}
                        {{ dump(value) }}
                     {% endif %}
                  {% endif %}
               </td>
            </tr>
         {% endfor %}
      </table>
   {% else %}
      {{ __('Empty array') }}
   {% endif %}
{% endmacro %}

{% macro display_clean_sql(query) %}
   {{ query|replace({
      'UNION': '</br>UNION</br>',
      'FROM': '</br>FROM',
      'WHERE': '</br>WHERE',
      'INNER JOIN': '</br>INNER JOIN',
      'LEFT JOIN': '</br>LEFT JOIN',
      'ORDER BY': '</br>ORDER BY',
      'SORT': '</br>SORT',
      '>': '&gt;',
      '<': '&lt;',
   })|raw }}
{% endmacro %}

<div id=\"debugpanel{{ rand }}\" class=\"container-fluid card debug-panel {{ ajax ? \"debug_ajax\" : \"\" }} p-0 position-sticky bottom-0\">
   <ul class=\"nav nav-tabs\" data-bs-toggle=\"tabs\">
      <li class=\"nav-item\"><a class=\"nav-link active\" data-bs-toggle=\"tab\" href=\"#debugsummary{{ rand }}\">SUMMARY</a></li>
      {% if debug_sql %}
         <li class=\"nav-item\"><a class=\"nav-link\" data-bs-toggle=\"tab\" href=\"#debugsql{{ rand }}\">SQL REQUEST</a></li>
      {% endif %}
      {% if debug_vars %}
         <li class=\"nav-item\"><a class=\"nav-link\" data-bs-toggle=\"tab\" href=\"#debugpost{{ rand }}\">POST VARIABLE</a></li>
         <li class=\"nav-item\"><a class=\"nav-link\" data-bs-toggle=\"tab\" href=\"#debugget{{ rand }}\">GET VARIABLE</a></li>
         {% if with_session %}
            <li class=\"nav-item\"><a class=\"nav-link\" data-bs-toggle=\"tab\" href=\"#debugsession{{ rand }}\">SESSION VARIABLE</a></li>
         {% endif %}
         <li class=\"nav-item\"><a class=\"nav-link\" data-bs-toggle=\"tab\" href=\"#debugserver{{ rand }}\">SERVER VARIABLE</a></li>
      {% endif %}
      {% for tab_id, tab_info in plugin_tabs %}
         <li class=\"nav-item\"><a class=\"nav-link\" data-bs-toggle=\"tab\" href=\"#debug{{ tab_id ~ rand }}\">{{ tab_info['title'] }}</a></li>
      {% endfor %}
      <li class=\"nav-item ms-auto\">
         <a id=\"close_debug{{ rand }}\" class=\"nav-link\" href=\"#\">
            <i class=\"fas fa-2x fa-times\"></i>
            <span class=\"sr-only\">{{ __('Close') }}</span>
         </a>
         <script>
            \$('#close_debug{{ rand }}').on('click', function() {
               \$('#debugpanel{{ rand }}').css('display', 'none');
            });
         </script>
      </li>
   </ul>

   <div class=\"card-body overflow-auto\" style=\"height: 300px\">
      <div class=\"tab-content\">
         <div id=\"debugsummary{{ rand }}\" class=\"tab-pane active\">
            <dl class=\"row\">
               <dt class=\"col-sm-3\">Execution time</dt>
               <dd class=\"col-sm-9\">{{ summary['execution_time'] }}</dd>
               <dt class=\"col-sm-3\">Memory usage</dt>
               <dd class=\"col-sm-9\">{{ summary['memory_usage']|formatted_size }}</dd>
               {% if debug_sql %}
                  <dt class=\"col-sm-3\">SQL queries count</dt>
                  <dd class=\"col-sm-9\">{{ summary['sql_queries_count'] }}</dd>
                  <dt class=\"col-sm-3\">SQL queries duration</dt>
                  <dd class=\"col-sm-9\">{{ summary['sql_queries_duration'] }}</dd>
               {% endif %}
            </dl>
         </div>

         {% if debug_sql %}
            <div id=\"debugsql{{ rand }}\" class=\"tab-pane\">
               <h1>{{ sql_info['total_requests'] }} Queries took {{ sql_info['total_duration'] }}</h1>
               <table id=\"debugsql{{ rand }}_table\" class=\"table card-table\">
                  <thead>
                     <tr>
                        <th>N°</th>
                        <th>Query</th>
                        <th>Time</th>
                        <th>Rows</th>
                        <th>Warnings</th>
                        <th>Errors</th>
                     </tr>
                  </thead>
                  <tbody>
                     {% for query in sql_info['queries'] %}
                        <tr>
                           <td>{{ query['num'] }}</td>
                           <td>{{ _self.display_clean_sql(query['query']) }}</td>
                           <td>{{ query['time'] }}</td>
                           <td>{{ query['rows'] }}</td>
                           <td>{{ query['warnings']|nl2br }}</td>
                           <td>{{ query['errors']|nl2br }}</td>
                        </tr>
                     {% endfor %}
                  </tbody>
               </table>
               <script>
                  initSortableTable('debugsql{{ rand }}_table');
               </script>
            </div>
         {% endif %}

         {% if debug_vars %}
            <div id=\"debugpost{{ rand }}\" class=\"tab-pane\">
               {{ _self.print_clean_array(vars_info['post'], 0, true) }}
            </div>
            <div id=\"debugget{{ rand }}\" class=\"tab-pane\">
               {{ _self.print_clean_array(vars_info['get'], 0, true) }}
            </div>
            {% if with_session %}
               <div id=\"debugsession{{ rand }}\" class=\"tab-pane\">
                  {{ _self.print_clean_array(vars_info['session'], 0, true) }}
               </div>
            {% endif %}
            <div id=\"debugserver{{ rand }}\" class=\"tab-pane\">
               {{ _self.print_clean_array(vars_info['server'], 0, true) }}
            </div>
         {% endif %}

         {% for tab_id, tab_info in plugin_tabs %}
            {% if tab_info['display_callable'] is defined %}
               <div id=\"debug{{ tab_id ~ rand }}\" class=\"tab-pane\">
                  {{ call(tab_info['display_callable'], {
                     'with_session': with_session,
                     'ajax': ajax,
                     'rand': rand,
                  }) }}
               </div>
            {% endif %}
         {% endfor %}
      </div>
   </div>
</div>
", "debug_panel.html.twig", "C:\\xampp\\htdocs\\glpi_7_new\\templates\\debug_panel.html.twig");
    }
}
