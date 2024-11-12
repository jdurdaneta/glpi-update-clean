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

/* components/infocom.html.twig */
class __TwigTemplate_7e3fcc19690705bc537bd8c717f56590 extends Template
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
        $macros["fields"] = $this->macros["fields"] = $this->loadTemplate("components/form/fields_macros.html.twig", "components/infocom.html.twig", 34)->unwrap();
        // line 35
        echo "
<div class=\"asset\">
   ";
        // line 37
        if ((($context["can_edit"] ?? null) || ($context["can_create"] ?? null))) {
            // line 38
            echo "      <form action=\"";
            echo twig_escape_filter($this->env, $this->extensions['Glpi\Application\View\Extension\RoutingExtension']->path("front/infocom.form.php"), "html", null, true);
            echo "\" method=\"post\" data-submit-once>
   ";
        }
        // line 40
        echo "
   ";
        // line 41
        if (((($__internal_compile_0 = twig_get_attribute($this->env, $this->source, ($context["infocom"] ?? null), "fields", [], "any", false, false, false, 41)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0["id"] ?? null) : null) <= 0)) {
            // line 42
            echo "      ";
            if ((($context["can_create"] ?? null) && (($context["withtemplate"] ?? null) != 2))) {
                // line 43
                echo "         <div class=\"mx-auto my-4\" style=\"width: 400px;\">
               <input type=\"hidden\" name=\"itemtype\" value=\"";
                // line 44
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "getType", [], "method", false, false, false, 44), "html", null, true);
                echo "\" />
               <input type=\"hidden\" name=\"items_id\" value=\"";
                // line 45
                echo twig_escape_filter($this->env, (($__internal_compile_1 = twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "fields", [], "any", false, false, false, 45)) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1["id"] ?? null) : null), "html", null, true);
                echo "\" />
               <button type=\"submit\" class=\"btn btn-primary\" name=\"add\" value=\"1\">
                  <i class=\"fas fa-coins\"></i>
                  <span>";
                // line 48
                echo twig_escape_filter($this->env, __("Enable the financial and administrative information"), "html", null, true);
                echo "</span>
               </button>
         </div>
      ";
            }
            // line 52
            echo "   ";
        } else {
            // line 53
            echo "      ";
            $context["disabled"] = (($context["withtemplate"] ?? null) != 2);
            // line 54
            echo "      ";
            $context["disabled"] = false;
            // line 55
            echo "      ";
            $context["in_modal"] = (array_key_exists("_get", $context) && ((twig_get_attribute($this->env, $this->source, ($context["_get"] ?? null), "_in_modal", [], "any", true, true, false, 55)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["_get"] ?? null), "_in_modal", [], "any", false, false, false, 55), "0")) : ("0")));
            // line 56
            echo "      <input type=\"hidden\" name=\"id\" value=\"";
            echo twig_escape_filter($this->env, (($__internal_compile_2 = twig_get_attribute($this->env, $this->source, ($context["infocom"] ?? null), "fields", [], "any", false, false, false, 56)) && is_array($__internal_compile_2) || $__internal_compile_2 instanceof ArrayAccess ? ($__internal_compile_2["id"] ?? null) : null), "html", null, true);
            echo "\" />
      <div class=\"card-body d-flex flex-wrap p-0 ";
            // line 57
            echo (((($context["in_modal"] ?? null) == "1")) ? ("ps-3 me-2") : (""));
            echo "\">
         <div class=\"col-12 flex-column\">
            <div class=\"d-flex flex-row flex-wrap flex-xl-nowrap\">
               <div class=\"row flex-row align-items-start flex-grow-1\">
                  <div class=\"row flex-row\">
                     ";
            // line 63
            echo "                     ";
            echo twig_call_macro($macros["fields"], "macro_largeTitle", [__("Asset lifecycle"), "fas fa-sync-alt", true], 63, $context, $this->getSourceContext());
            // line 67
            echo "

                     ";
            // line 69
            echo twig_call_macro($macros["fields"], "macro_dateField", ["order_date", (($__internal_compile_3 = twig_get_attribute($this->env, $this->source,             // line 71
($context["infocom"] ?? null), "fields", [], "any", false, false, false, 71)) && is_array($__internal_compile_3) || $__internal_compile_3 instanceof ArrayAccess ? ($__internal_compile_3["order_date"] ?? null) : null), __("Order date"), ["disabled" =>             // line 73
($context["disabled"] ?? null)]], 69, $context, $this->getSourceContext());
            // line 74
            echo "

                     ";
            // line 76
            echo twig_call_macro($macros["fields"], "macro_dateField", ["buy_date", (($__internal_compile_4 = twig_get_attribute($this->env, $this->source,             // line 78
($context["infocom"] ?? null), "fields", [], "any", false, false, false, 78)) && is_array($__internal_compile_4) || $__internal_compile_4 instanceof ArrayAccess ? ($__internal_compile_4["buy_date"] ?? null) : null), __("Date of purchase"), ["disabled" =>             // line 80
($context["disabled"] ?? null)]], 76, $context, $this->getSourceContext());
            // line 81
            echo "

                     ";
            // line 83
            echo twig_call_macro($macros["fields"], "macro_dateField", ["delivery_date", (($__internal_compile_5 = twig_get_attribute($this->env, $this->source,             // line 85
($context["infocom"] ?? null), "fields", [], "any", false, false, false, 85)) && is_array($__internal_compile_5) || $__internal_compile_5 instanceof ArrayAccess ? ($__internal_compile_5["delivery_date"] ?? null) : null), __("Delivery date"), ["disabled" =>             // line 87
($context["disabled"] ?? null)]], 83, $context, $this->getSourceContext());
            // line 88
            echo "

                     ";
            // line 90
            echo twig_call_macro($macros["fields"], "macro_dateField", ["use_date", (($__internal_compile_6 = twig_get_attribute($this->env, $this->source,             // line 92
($context["infocom"] ?? null), "fields", [], "any", false, false, false, 92)) && is_array($__internal_compile_6) || $__internal_compile_6 instanceof ArrayAccess ? ($__internal_compile_6["use_date"] ?? null) : null), __("Startup date"), ["disabled" =>             // line 94
($context["disabled"] ?? null)]], 90, $context, $this->getSourceContext());
            // line 95
            echo "

                     ";
            // line 97
            echo twig_call_macro($macros["fields"], "macro_dateField", ["inventory_date", (($__internal_compile_7 = twig_get_attribute($this->env, $this->source,             // line 99
($context["infocom"] ?? null), "fields", [], "any", false, false, false, 99)) && is_array($__internal_compile_7) || $__internal_compile_7 instanceof ArrayAccess ? ($__internal_compile_7["inventory_date"] ?? null) : null), __("Date of last physical inventory"), ["disabled" =>             // line 101
($context["disabled"] ?? null)]], 97, $context, $this->getSourceContext());
            // line 102
            echo "

                     ";
            // line 104
            echo twig_call_macro($macros["fields"], "macro_dateField", ["decommission_date", (($__internal_compile_8 = twig_get_attribute($this->env, $this->source,             // line 106
($context["infocom"] ?? null), "fields", [], "any", false, false, false, 106)) && is_array($__internal_compile_8) || $__internal_compile_8 instanceof ArrayAccess ? ($__internal_compile_8["decommission_date"] ?? null) : null), __("Decommission date"), ["disabled" =>             // line 108
($context["disabled"] ?? null)]], 104, $context, $this->getSourceContext());
            // line 109
            echo "

                     ";
            // line 112
            echo "                     ";
            echo twig_call_macro($macros["fields"], "macro_largeTitle", [__("Warranty information"), "fas fa-file-contract"], 112, $context, $this->getSourceContext());
            // line 115
            echo "

                     ";
            // line 117
            echo twig_call_macro($macros["fields"], "macro_dateField", ["warranty_date", (($__internal_compile_9 = twig_get_attribute($this->env, $this->source,             // line 119
($context["infocom"] ?? null), "fields", [], "any", false, false, false, 119)) && is_array($__internal_compile_9) || $__internal_compile_9 instanceof ArrayAccess ? ($__internal_compile_9["warranty_date"] ?? null) : null), __("Start date of warranty"), ["disabled" =>             // line 121
($context["disabled"] ?? null)]], 117, $context, $this->getSourceContext());
            // line 122
            echo "

                     ";
            // line 124
            if ((($context["withtemplate"] ?? null) == 2)) {
                // line 125
                echo "                        ";
                if (((($__internal_compile_10 = twig_get_attribute($this->env, $this->source, ($context["infocom"] ?? null), "fields", [], "any", false, false, false, 125)) && is_array($__internal_compile_10) || $__internal_compile_10 instanceof ArrayAccess ? ($__internal_compile_10["warranty_duration"] ?? null) : null) ==  -1)) {
                    // line 126
                    echo "                           ";
                    echo twig_escape_filter($this->env, __("Lifelong"), "html", null, true);
                    echo "
                        ";
                } else {
                    // line 128
                    echo "                           ";
                    echo twig_escape_filter($this->env, twig_sprintf(_n("%d month", "%d months", (($__internal_compile_11 = twig_get_attribute($this->env, $this->source, ($context["infocom"] ?? null), "fields", [], "any", false, false, false, 128)) && is_array($__internal_compile_11) || $__internal_compile_11 instanceof ArrayAccess ? ($__internal_compile_11["warranty_duration"] ?? null) : null)), (($__internal_compile_12 = twig_get_attribute($this->env, $this->source, ($context["infocom"] ?? null), "fields", [], "any", false, false, false, 128)) && is_array($__internal_compile_12) || $__internal_compile_12 instanceof ArrayAccess ? ($__internal_compile_12["warranty_duration"] ?? null) : null)), "html", null, true);
                    echo "
                        ";
                }
                // line 130
                echo "                     ";
            } else {
                // line 131
                echo "                        ";
                $context["warrantyexpir"] = twig_get_attribute($this->env, $this->source, ($context["infocom"] ?? null), "getWarrantyExpir", [0 => (($__internal_compile_13 = twig_get_attribute($this->env, $this->source, ($context["infocom"] ?? null), "fields", [], "any", false, false, false, 131)) && is_array($__internal_compile_13) || $__internal_compile_13 instanceof ArrayAccess ? ($__internal_compile_13["warranty_date"] ?? null) : null), 1 => (($__internal_compile_14 = twig_get_attribute($this->env, $this->source, ($context["infocom"] ?? null), "fields", [], "any", false, false, false, 131)) && is_array($__internal_compile_14) || $__internal_compile_14 instanceof ArrayAccess ? ($__internal_compile_14["warranty_duration"] ?? null) : null), 2 => 0, 3 => true], "method", false, false, false, 131);
                // line 132
                echo "                        ";
                echo twig_call_macro($macros["fields"], "macro_dropdownNumberField", ["warranty_duration", (($__internal_compile_15 = twig_get_attribute($this->env, $this->source,                 // line 134
($context["infocom"] ?? null), "fields", [], "any", false, false, false, 134)) && is_array($__internal_compile_15) || $__internal_compile_15 instanceof ArrayAccess ? ($__internal_compile_15["warranty_duration"] ?? null) : null), __("Warranty duration"), ["min" => 0, "max" => 120, "step" => 1, "toadd" => ["-1" => __("Lifelong")], "unit" => "month", "disabled" =>                 // line 142
($context["disabled"] ?? null), "add_field_html" => (("<span class=\"text-muted\">" . twig_sprintf(__("Valid to %s"),                 // line 143
($context["warrantyexpir"] ?? null))) . "</span>")]], 132, $context, $this->getSourceContext());
                // line 145
                echo "
                     ";
            }
            // line 147
            echo "
                     ";
            // line 148
            echo twig_call_macro($macros["fields"], "macro_textField", ["warranty_info", (($__internal_compile_16 = twig_get_attribute($this->env, $this->source,             // line 150
($context["infocom"] ?? null), "fields", [], "any", false, false, false, 150)) && is_array($__internal_compile_16) || $__internal_compile_16 instanceof ArrayAccess ? ($__internal_compile_16["warranty_info"] ?? null) : null), __("Warranty information"), ["disabled" =>             // line 152
($context["disabled"] ?? null)]], 148, $context, $this->getSourceContext());
            // line 153
            echo "

                     ";
            // line 155
            if ($this->extensions['Glpi\Application\View\Extension\ConfigExtension']->config("use_notifications")) {
                // line 156
                echo "                        ";
                ob_start();
                // line 157
                echo "                           ";
                $this->extensions['Glpi\Application\View\Extension\PhpExtension']->call("Alert::displayLastAlert", [0 => "Infocom", 1 => (($__internal_compile_17 = twig_get_attribute($this->env, $this->source, ($context["infocom"] ?? null), "fields", [], "any", false, false, false, 157)) && is_array($__internal_compile_17) || $__internal_compile_17 instanceof ArrayAccess ? ($__internal_compile_17["id"] ?? null) : null)]);
                // line 158
                echo "                        ";
                $context["alert_html"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
                // line 159
                echo "
                        ";
                // line 160
                $context["alert_field"] = twig_get_attribute($this->env, $this->source, ($context["infocom"] ?? null), "dropdownAlert", [0 => ["name" => "alert", "value" => (($__internal_compile_18 = twig_get_attribute($this->env, $this->source,                 // line 162
($context["infocom"] ?? null), "fields", [], "any", false, false, false, 162)) && is_array($__internal_compile_18) || $__internal_compile_18 instanceof ArrayAccess ? ($__internal_compile_18["alert"] ?? null) : null), "display" => false, "width" => "100%", "class" => "form-select"]], "method", false, false, false, 160);
                // line 167
                echo "
                        ";
                // line 168
                echo twig_call_macro($macros["fields"], "macro_field", ["alert",                 // line 170
($context["alert_field"] ?? null), __("Alarms on financial and administrative information"), ["add_field_html" => (("<span class=\"text-muted\">" .                 // line 172
($context["alert_html"] ?? null)) . "</span>")]], 168, $context, $this->getSourceContext());
                // line 173
                echo "
                     ";
            }
            // line 175
            echo "                     
                     ";
            // line 177
            echo "                     ";
            echo twig_call_macro($macros["fields"], "macro_largeTitle", [__("Financial and administrative information"), "fas fa-coins"], 177, $context, $this->getSourceContext());
            // line 180
            echo "

                     ";
            // line 182
            echo twig_call_macro($macros["fields"], "macro_textField", ["casefile", (($__internal_compile_19 = twig_get_attribute($this->env, $this->source,             // line 184
($context["infocom"] ?? null), "fields", [], "any", false, false, false, 184)) && is_array($__internal_compile_19) || $__internal_compile_19 instanceof ArrayAccess ? ($__internal_compile_19["casefile"] ?? null) : null), __("Case file"), ["disabled" =>             // line 186
($context["disabled"] ?? null)]], 182, $context, $this->getSourceContext());
            // line 187
            echo "
                     
                     ";
            // line 189
            echo twig_call_macro($macros["fields"], "macro_dropdownField", ["Supplier", "suppliers_id", (($__internal_compile_20 = twig_get_attribute($this->env, $this->source,             // line 192
($context["infocom"] ?? null), "fields", [], "any", false, false, false, 192)) && is_array($__internal_compile_20) || $__internal_compile_20 instanceof ArrayAccess ? ($__internal_compile_20["suppliers_id"] ?? null) : null), $this->extensions['Glpi\Application\View\Extension\ItemtypeExtension']->getItemtypeName("Supplier"), ["entity" => (($__internal_compile_21 = twig_get_attribute($this->env, $this->source,             // line 195
($context["item"] ?? null), "fields", [], "any", false, false, false, 195)) && is_array($__internal_compile_21) || $__internal_compile_21 instanceof ArrayAccess ? ($__internal_compile_21["entities_id"] ?? null) : null), "disabled" =>             // line 196
($context["disabled"] ?? null)]], 189, $context, $this->getSourceContext());
            // line 198
            echo "

                     ";
            // line 200
            if ($this->extensions['Glpi\Application\View\Extension\SessionExtension']->hasItemtypeRight("Budget", twig_constant("READ"))) {
                // line 201
                echo "                        ";
                echo twig_call_macro($macros["fields"], "macro_dropdownField", ["Budget", "budgets_id", (($__internal_compile_22 = twig_get_attribute($this->env, $this->source,                 // line 204
($context["infocom"] ?? null), "fields", [], "any", false, false, false, 204)) && is_array($__internal_compile_22) || $__internal_compile_22 instanceof ArrayAccess ? ($__internal_compile_22["budgets_id"] ?? null) : null), $this->extensions['Glpi\Application\View\Extension\ItemtypeExtension']->getItemtypeName("Budget"), ["entity" => (($__internal_compile_23 = twig_get_attribute($this->env, $this->source,                 // line 207
($context["item"] ?? null), "fields", [], "any", false, false, false, 207)) && is_array($__internal_compile_23) || $__internal_compile_23 instanceof ArrayAccess ? ($__internal_compile_23["entities_id"] ?? null) : null), "comments" => 1, "disabled" =>                 // line 209
($context["disabled"] ?? null)]], 201, $context, $this->getSourceContext());
                // line 211
                echo "
                     ";
            }
            // line 213
            echo "
                     ";
            // line 214
            echo twig_call_macro($macros["fields"], "macro_textField", ["order_number", (($__internal_compile_24 = twig_get_attribute($this->env, $this->source,             // line 216
($context["infocom"] ?? null), "fields", [], "any", false, false, false, 216)) && is_array($__internal_compile_24) || $__internal_compile_24 instanceof ArrayAccess ? ($__internal_compile_24["order_number"] ?? null) : null), __("Order number"), ["disabled" =>             // line 218
($context["disabled"] ?? null)]], 214, $context, $this->getSourceContext());
            // line 219
            echo "

                     ";
            // line 221
            echo twig_call_macro($macros["fields"], "macro_autoNameField", ["immo_number",             // line 223
($context["infocom"] ?? null), __("Immobilization number"),             // line 225
($context["withtemplate"] ?? null), ["disabled" =>             // line 226
($context["disabled"] ?? null), "value" => (($__internal_compile_25 = twig_get_attribute($this->env, $this->source, ($context["infocom"] ?? null), "fields", [], "any", false, false, false, 226)) && is_array($__internal_compile_25) || $__internal_compile_25 instanceof ArrayAccess ? ($__internal_compile_25["immo_number"] ?? null) : null)]], 221, $context, $this->getSourceContext());
            // line 227
            echo "

                     ";
            // line 229
            echo twig_call_macro($macros["fields"], "macro_textField", ["bill", (($__internal_compile_26 = twig_get_attribute($this->env, $this->source,             // line 231
($context["infocom"] ?? null), "fields", [], "any", false, false, false, 231)) && is_array($__internal_compile_26) || $__internal_compile_26 instanceof ArrayAccess ? ($__internal_compile_26["bill"] ?? null) : null), __("Invoice number"), ["disabled" =>             // line 233
($context["disabled"] ?? null)]], 229, $context, $this->getSourceContext());
            // line 234
            echo "

                     ";
            // line 236
            echo twig_call_macro($macros["fields"], "macro_textField", ["delivery_number", (($__internal_compile_27 = twig_get_attribute($this->env, $this->source,             // line 238
($context["infocom"] ?? null), "fields", [], "any", false, false, false, 238)) && is_array($__internal_compile_27) || $__internal_compile_27 instanceof ArrayAccess ? ($__internal_compile_27["delivery_number"] ?? null) : null), __("Delivery form"), ["disabled" =>             // line 240
($context["disabled"] ?? null)]], 236, $context, $this->getSourceContext());
            // line 241
            echo "

                     ";
            // line 243
            echo twig_call_macro($macros["fields"], "macro_numberField", ["value", (($__internal_compile_28 = twig_get_attribute($this->env, $this->source,             // line 245
($context["infocom"] ?? null), "fields", [], "any", false, false, false, 245)) && is_array($__internal_compile_28) || $__internal_compile_28 instanceof ArrayAccess ? ($__internal_compile_28["value"] ?? null) : null), _x("price", "Value"), ["disabled" =>             // line 248
($context["disabled"] ?? null), "step" => "any"]], 243, $context, $this->getSourceContext());
            // line 251
            echo "

                     ";
            // line 253
            echo twig_call_macro($macros["fields"], "macro_numberField", ["warranty_value", (($__internal_compile_29 = twig_get_attribute($this->env, $this->source,             // line 255
($context["infocom"] ?? null), "fields", [], "any", false, false, false, 255)) && is_array($__internal_compile_29) || $__internal_compile_29 instanceof ArrayAccess ? ($__internal_compile_29["warranty_value"] ?? null) : null), __("Warranty extension value"), ["disabled" =>             // line 258
($context["disabled"] ?? null), "step" => "any"]], 253, $context, $this->getSourceContext());
            // line 261
            echo "


                     ";
            // line 264
            $context["amort"] = twig_get_attribute($this->env, $this->source, ($context["infocom"] ?? null), "Amort", [0 => (($__internal_compile_30 = twig_get_attribute($this->env, $this->source,             // line 265
($context["infocom"] ?? null), "fields", [], "any", false, false, false, 265)) && is_array($__internal_compile_30) || $__internal_compile_30 instanceof ArrayAccess ? ($__internal_compile_30["sink_type"] ?? null) : null), 1 => (($__internal_compile_31 = twig_get_attribute($this->env, $this->source,             // line 266
($context["infocom"] ?? null), "fields", [], "any", false, false, false, 266)) && is_array($__internal_compile_31) || $__internal_compile_31 instanceof ArrayAccess ? ($__internal_compile_31["value"] ?? null) : null), 2 => (($__internal_compile_32 = twig_get_attribute($this->env, $this->source,             // line 267
($context["infocom"] ?? null), "fields", [], "any", false, false, false, 267)) && is_array($__internal_compile_32) || $__internal_compile_32 instanceof ArrayAccess ? ($__internal_compile_32["sink_time"] ?? null) : null), 3 => (($__internal_compile_33 = twig_get_attribute($this->env, $this->source,             // line 268
($context["infocom"] ?? null), "fields", [], "any", false, false, false, 268)) && is_array($__internal_compile_33) || $__internal_compile_33 instanceof ArrayAccess ? ($__internal_compile_33["sink_coeff"] ?? null) : null), 4 => (($__internal_compile_34 = twig_get_attribute($this->env, $this->source,             // line 269
($context["infocom"] ?? null), "fields", [], "any", false, false, false, 269)) && is_array($__internal_compile_34) || $__internal_compile_34 instanceof ArrayAccess ? ($__internal_compile_34["buy_date"] ?? null) : null), 5 => (($__internal_compile_35 = twig_get_attribute($this->env, $this->source,             // line 270
($context["infocom"] ?? null), "fields", [], "any", false, false, false, 270)) && is_array($__internal_compile_35) || $__internal_compile_35 instanceof ArrayAccess ? ($__internal_compile_35["use_date"] ?? null) : null), 6 => $this->extensions['Glpi\Application\View\Extension\ConfigExtension']->config("date_tax"), 7 => "n"], "method", false, false, false, 264);
            // line 274
            echo "                     ";
            echo twig_call_macro($macros["fields"], "macro_readOnlyField", ["", $this->extensions['Glpi\Application\View\Extension\DataHelpersExtension']->getFormattedNumber(            // line 276
($context["amort"] ?? null)), __("Account net value")], 274, $context, $this->getSourceContext());
            // line 278
            echo "

                     ";
            // line 280
            if (((($context["withtemplate"] ?? null) == 2) || (($context["disabled"] ?? null) == true))) {
                // line 281
                echo "                        ";
                $context["sink_type_field"] = twig_get_attribute($this->env, $this->source, ($context["infocom"] ?? null), "getAmortTypeName", [0 => (($__internal_compile_36 = twig_get_attribute($this->env, $this->source, ($context["infocom"] ?? null), "fields", [], "any", false, false, false, 281)) && is_array($__internal_compile_36) || $__internal_compile_36 instanceof ArrayAccess ? ($__internal_compile_36["sink_type"] ?? null) : null)], "method", false, false, false, 281);
                // line 282
                echo "                     ";
            } else {
                // line 283
                echo "                        ";
                $context["sink_type_field"] = twig_get_attribute($this->env, $this->source, ($context["infocom"] ?? null), "dropdownAmortType", [0 => "sink_type", 1 => (($__internal_compile_37 = twig_get_attribute($this->env, $this->source, ($context["infocom"] ?? null), "fields", [], "any", false, false, false, 283)) && is_array($__internal_compile_37) || $__internal_compile_37 instanceof ArrayAccess ? ($__internal_compile_37["sink_type"] ?? null) : null), 2 => false], "method", false, false, false, 283);
                // line 284
                echo "                     ";
            }
            // line 285
            echo "
                     ";
            // line 286
            echo twig_call_macro($macros["fields"], "macro_field", ["",             // line 288
($context["sink_type_field"] ?? null), __("Amortization type")], 286, $context, $this->getSourceContext());
            // line 290
            echo "

                     ";
            // line 292
            echo twig_call_macro($macros["fields"], "macro_dropdownNumberField", ["sink_time", (($__internal_compile_38 = twig_get_attribute($this->env, $this->source,             // line 294
($context["infocom"] ?? null), "fields", [], "any", false, false, false, 294)) && is_array($__internal_compile_38) || $__internal_compile_38 instanceof ArrayAccess ? ($__internal_compile_38["sink_time"] ?? null) : null), __("Amortization duration"), ["max" => 15, "unit" => "year", "disabled" =>             // line 299
($context["disabled"] ?? null)]], 292, $context, $this->getSourceContext());
            // line 301
            echo "

                     ";
            // line 303
            echo twig_call_macro($macros["fields"], "macro_numberField", ["sink_coeff", (($__internal_compile_39 = twig_get_attribute($this->env, $this->source,             // line 305
($context["infocom"] ?? null), "fields", [], "any", false, false, false, 305)) && is_array($__internal_compile_39) || $__internal_compile_39 instanceof ArrayAccess ? ($__internal_compile_39["sink_coeff"] ?? null) : null), __("Amortization coefficient"), ["disabled" =>             // line 307
($context["disabled"] ?? null)]], 303, $context, $this->getSourceContext());
            // line 308
            echo "

                     ";
            // line 310
            if (!twig_in_filter(twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "getType", [], "method", false, false, false, 310), twig_array_merge(twig_get_attribute($this->env, $this->source, ($context["infocom"] ?? null), "getExcludedTypes", [], "method", false, false, false, 310), [0 => "Cartridge", 1 => "Consumable", 2 => "SoftwareLicense"]))) {
                // line 311
                echo "                        ";
                $context["ticket_tco_value"] = twig_get_attribute($this->env, $this->source, ($context["infocom"] ?? null), "showTco", [0 => (($__internal_compile_40 = twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "fields", [], "any", false, false, false, 311)) && is_array($__internal_compile_40) || $__internal_compile_40 instanceof ArrayAccess ? ($__internal_compile_40["ticket_tco"] ?? null) : null), 1 => (($__internal_compile_41 = twig_get_attribute($this->env, $this->source, ($context["infocom"] ?? null), "fields", [], "any", false, false, false, 311)) && is_array($__internal_compile_41) || $__internal_compile_41 instanceof ArrayAccess ? ($__internal_compile_41["value"] ?? null) : null)], "method", false, false, false, 311);
                // line 312
                echo "                        ";
                echo twig_call_macro($macros["fields"], "macro_readOnlyField", ["ticket_tco",                 // line 314
($context["ticket_tco_value"] ?? null), __("TCO (value + tracking cost)"), ["disabled" =>                 // line 316
($context["disabled"] ?? null)]], 312, $context, $this->getSourceContext());
                // line 317
                echo "

                        ";
                // line 319
                $context["ticket_tco2_value"] = twig_get_attribute($this->env, $this->source, ($context["infocom"] ?? null), "showTco", [0 => (($__internal_compile_42 = twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "fields", [], "any", false, false, false, 319)) && is_array($__internal_compile_42) || $__internal_compile_42 instanceof ArrayAccess ? ($__internal_compile_42["ticket_tco"] ?? null) : null), 1 => (($__internal_compile_43 = twig_get_attribute($this->env, $this->source, ($context["infocom"] ?? null), "fields", [], "any", false, false, false, 319)) && is_array($__internal_compile_43) || $__internal_compile_43 instanceof ArrayAccess ? ($__internal_compile_43["value"] ?? null) : null), 2 => (($__internal_compile_44 = twig_get_attribute($this->env, $this->source, ($context["infocom"] ?? null), "fields", [], "any", false, false, false, 319)) && is_array($__internal_compile_44) || $__internal_compile_44 instanceof ArrayAccess ? ($__internal_compile_44["buy_date"] ?? null) : null)], "method", false, false, false, 319);
                // line 320
                echo "                        ";
                echo twig_call_macro($macros["fields"], "macro_readOnlyField", ["ticket_tco",                 // line 322
($context["ticket_tco2_value"] ?? null), __("Monthly TCO"), ["disabled" =>                 // line 324
($context["disabled"] ?? null)]], 320, $context, $this->getSourceContext());
                // line 325
                echo "
                     ";
            }
            // line 327
            echo "

                     ";
            // line 329
            echo twig_call_macro($macros["fields"], "macro_dropdownField", ["BusinessCriticity", "businesscriticities_id", (($__internal_compile_45 = twig_get_attribute($this->env, $this->source,             // line 332
($context["infocom"] ?? null), "fields", [], "any", false, false, false, 332)) && is_array($__internal_compile_45) || $__internal_compile_45 instanceof ArrayAccess ? ($__internal_compile_45["businesscriticities_id"] ?? null) : null), _n("Business criticity", "Business criticities", 1), ["disabled" =>             // line 335
($context["disabled"] ?? null)]], 329, $context, $this->getSourceContext());
            // line 337
            echo "

                     ";
            // line 339
            echo twig_call_macro($macros["fields"], "macro_textareaField", ["comment", (($__internal_compile_46 = twig_get_attribute($this->env, $this->source,             // line 341
($context["infocom"] ?? null), "fields", [], "any", false, false, false, 341)) && is_array($__internal_compile_46) || $__internal_compile_46 instanceof ArrayAccess ? ($__internal_compile_46["comment"] ?? null) : null), _n("Comment", "Comments", Session::getPluralNumber()), ["disabled" =>             // line 343
($context["disabled"] ?? null)]], 339, $context, $this->getSourceContext());
            // line 344
            echo "

                     

                     ";
            // line 348
            $this->extensions['Glpi\Application\View\Extension\PluginExtension']->callPluginHookFunction(twig_constant("Glpi\\Plugin\\Hooks::INFOCOM"), ($context["item"] ?? null));
            // line 349
            echo "
                     <div class=\"card-body mx-n2 mb-4  border-top\">
                        ";
            // line 351
            if (($context["can_global_update"] ?? null)) {
                // line 352
                echo "                           <button class=\"btn btn-primary me-2\" type=\"submit\" name=\"update\">
                              <i class=\"far fa-save\"></i>
                              <span>";
                // line 354
                echo twig_escape_filter($this->env, _x("button", "Save"), "html", null, true);
                echo "</span>
                           </button>
                        ";
            }
            // line 357
            echo "
                        ";
            // line 358
            if (($context["can_global_purge"] ?? null)) {
                // line 359
                echo "                           <button class=\"btn btn-outline-danger me-2\" type=\"submit\" name=\"purge\">
                              <i class=\"fas fa-trash-alt\"></i>
                              <span>";
                // line 361
                echo twig_escape_filter($this->env, _x("button", "Delete permanently"), "html", null, true);
                echo "</span>
                           </button>
                        ";
            }
            // line 364
            echo "                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

   ";
        }
        // line 372
        echo "
   ";
        // line 373
        if ((($context["can_edit"] ?? null) || ($context["can_create"] ?? null))) {
            // line 374
            echo "      <input type=\"hidden\" name=\"_glpi_csrf_token\" value=\"";
            echo twig_escape_filter($this->env, Session::getNewCSRFToken(), "html", null, true);
            echo "\" />
   </form>
   ";
        }
        // line 377
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "components/infocom.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  499 => 377,  492 => 374,  490 => 373,  487 => 372,  477 => 364,  471 => 361,  467 => 359,  465 => 358,  462 => 357,  456 => 354,  452 => 352,  450 => 351,  446 => 349,  444 => 348,  438 => 344,  436 => 343,  435 => 341,  434 => 339,  430 => 337,  428 => 335,  427 => 332,  426 => 329,  422 => 327,  418 => 325,  416 => 324,  415 => 322,  413 => 320,  411 => 319,  407 => 317,  405 => 316,  404 => 314,  402 => 312,  399 => 311,  397 => 310,  393 => 308,  391 => 307,  390 => 305,  389 => 303,  385 => 301,  383 => 299,  382 => 294,  381 => 292,  377 => 290,  375 => 288,  374 => 286,  371 => 285,  368 => 284,  365 => 283,  362 => 282,  359 => 281,  357 => 280,  353 => 278,  351 => 276,  349 => 274,  347 => 270,  346 => 269,  345 => 268,  344 => 267,  343 => 266,  342 => 265,  341 => 264,  336 => 261,  334 => 258,  333 => 255,  332 => 253,  328 => 251,  326 => 248,  325 => 245,  324 => 243,  320 => 241,  318 => 240,  317 => 238,  316 => 236,  312 => 234,  310 => 233,  309 => 231,  308 => 229,  304 => 227,  302 => 226,  301 => 225,  300 => 223,  299 => 221,  295 => 219,  293 => 218,  292 => 216,  291 => 214,  288 => 213,  284 => 211,  282 => 209,  281 => 207,  280 => 204,  278 => 201,  276 => 200,  272 => 198,  270 => 196,  269 => 195,  268 => 192,  267 => 189,  263 => 187,  261 => 186,  260 => 184,  259 => 182,  255 => 180,  252 => 177,  249 => 175,  245 => 173,  243 => 172,  242 => 170,  241 => 168,  238 => 167,  236 => 162,  235 => 160,  232 => 159,  229 => 158,  226 => 157,  223 => 156,  221 => 155,  217 => 153,  215 => 152,  214 => 150,  213 => 148,  210 => 147,  206 => 145,  204 => 143,  203 => 142,  202 => 134,  200 => 132,  197 => 131,  194 => 130,  188 => 128,  182 => 126,  179 => 125,  177 => 124,  173 => 122,  171 => 121,  170 => 119,  169 => 117,  165 => 115,  162 => 112,  158 => 109,  156 => 108,  155 => 106,  154 => 104,  150 => 102,  148 => 101,  147 => 99,  146 => 97,  142 => 95,  140 => 94,  139 => 92,  138 => 90,  134 => 88,  132 => 87,  131 => 85,  130 => 83,  126 => 81,  124 => 80,  123 => 78,  122 => 76,  118 => 74,  116 => 73,  115 => 71,  114 => 69,  110 => 67,  107 => 63,  99 => 57,  94 => 56,  91 => 55,  88 => 54,  85 => 53,  82 => 52,  75 => 48,  69 => 45,  65 => 44,  62 => 43,  59 => 42,  57 => 41,  54 => 40,  48 => 38,  46 => 37,  42 => 35,  40 => 34,  37 => 33,);
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

{% import 'components/form/fields_macros.html.twig' as fields %}

<div class=\"asset\">
   {% if can_edit or can_create %}
      <form action=\"{{ path('front/infocom.form.php') }}\" method=\"post\" data-submit-once>
   {% endif %}

   {% if infocom.fields['id'] <= 0 %}
      {% if can_create and withtemplate != 2 %}
         <div class=\"mx-auto my-4\" style=\"width: 400px;\">
               <input type=\"hidden\" name=\"itemtype\" value=\"{{ item.getType() }}\" />
               <input type=\"hidden\" name=\"items_id\" value=\"{{ item.fields['id'] }}\" />
               <button type=\"submit\" class=\"btn btn-primary\" name=\"add\" value=\"1\">
                  <i class=\"fas fa-coins\"></i>
                  <span>{{ __('Enable the financial and administrative information') }}</span>
               </button>
         </div>
      {% endif %}
   {% else %}
      {% set disabled = (withtemplate != 2) %}
      {% set disabled = false %}
      {% set in_modal = _get is defined and _get._in_modal|default(\"0\") %}
      <input type=\"hidden\" name=\"id\" value=\"{{ infocom.fields['id'] }}\" />
      <div class=\"card-body d-flex flex-wrap p-0 {{ in_modal == \"1\" ? \"ps-3 me-2\" : \"\" }}\">
         <div class=\"col-12 flex-column\">
            <div class=\"d-flex flex-row flex-wrap flex-xl-nowrap\">
               <div class=\"row flex-row align-items-start flex-grow-1\">
                  <div class=\"row flex-row\">
                     {# ## LIFECYCLE PART ## #}
                     {{ fields.largeTitle(
                        __('Asset lifecycle'),
                        'fas fa-sync-alt',
                        true
                     ) }}

                     {{ fields.dateField(
                        'order_date',
                        infocom.fields['order_date'],
                        __('Order date'),
                        {'disabled': disabled}
                     ) }}

                     {{ fields.dateField(
                        'buy_date',
                        infocom.fields['buy_date'],
                        __('Date of purchase'),
                        {'disabled': disabled}
                     ) }}

                     {{ fields.dateField(
                        'delivery_date',
                        infocom.fields['delivery_date'],
                        __('Delivery date'),
                        {'disabled': disabled}
                     ) }}

                     {{ fields.dateField(
                        'use_date',
                        infocom.fields['use_date'],
                        __('Startup date'),
                        {'disabled': disabled}
                     ) }}

                     {{ fields.dateField(
                        'inventory_date',
                        infocom.fields['inventory_date'],
                        __('Date of last physical inventory'),
                        {'disabled': disabled}
                     ) }}

                     {{ fields.dateField(
                        'decommission_date',
                        infocom.fields['decommission_date'],
                        __('Decommission date'),
                        {'disabled': disabled}
                     ) }}

                     {# ## WARRANTY PART ## #}
                     {{ fields.largeTitle(
                        __('Warranty information'),
                        'fas fa-file-contract'
                     ) }}

                     {{ fields.dateField(
                        'warranty_date',
                        infocom.fields['warranty_date'],
                        __('Start date of warranty'),
                        {'disabled': disabled}
                     ) }}

                     {% if withtemplate == 2 %}
                        {% if infocom.fields['warranty_duration'] == -1 %}
                           {{ __('Lifelong') }}
                        {% else %}
                           {{ _n('%d month', '%d months', infocom.fields['warranty_duration'])|format(infocom.fields['warranty_duration']) }}
                        {% endif %}
                     {% else %}
                        {% set warrantyexpir = infocom.getWarrantyExpir(infocom.fields['warranty_date'], infocom.fields['warranty_duration'], 0, true) %}
                        {{ fields.dropdownNumberField(
                           'warranty_duration',
                           infocom.fields['warranty_duration'],
                           __('Warranty duration'),
                           {
                              'min'            : 0,
                              'max'            : 120,
                              'step'           : 1,
                              'toadd'          : {'-1': __('Lifelong')},
                              'unit'           : 'month',
                              'disabled'       : disabled,
                              'add_field_html' : '<span class=\"text-muted\">' ~ __('Valid to %s')|format(warrantyexpir) ~ '</span>'
                           }
                        ) }}
                     {% endif %}

                     {{ fields.textField(
                        'warranty_info',
                        infocom.fields['warranty_info'],
                        __('Warranty information'),
                        {'disabled': disabled}
                     ) }}

                     {% if config('use_notifications') %}
                        {% set alert_html %}
                           {% do call('Alert::displayLastAlert', ['Infocom', infocom.fields['id']]) %}
                        {% endset %}

                        {% set alert_field = infocom.dropdownAlert({
                              'name'   : 'alert',
                              'value'  : infocom.fields['alert'],
                              'display': false,
                              'width'  : '100%',
                              'class'  : 'form-select'
                           }) %}

                        {{ fields.field(
                           'alert',
                           alert_field,
                           __('Alarms on financial and administrative information'),
                           {'add_field_html': '<span class=\"text-muted\">' ~ alert_html ~ '</span>'}
                        ) }}
                     {% endif %}
                     
                     {# ## FINANCIAL PART ## #}
                     {{ fields.largeTitle(
                        __('Financial and administrative information'),
                        'fas fa-coins'
                     ) }}

                     {{ fields.textField(
                        'casefile',
                        infocom.fields['casefile'],
                        __('Case file'),
                        {'disabled': disabled}
                     ) }}
                     
                     {{ fields.dropdownField(
                        'Supplier',
                        'suppliers_id',
                        infocom.fields['suppliers_id'],
                        'Supplier'|itemtype_name,
                        {
                           'entity'  : item.fields['entities_id'],
                           'disabled': disabled
                        }
                     ) }}

                     {% if has_itemtype_right('Budget', constant('READ')) %}
                        {{ fields.dropdownField(
                           'Budget',
                           'budgets_id',
                           infocom.fields['budgets_id'],
                           'Budget'|itemtype_name,
                           {
                              'entity'  : item.fields['entities_id'],
                              'comments': 1,
                              'disabled': disabled
                           }
                        ) }}
                     {% endif %}

                     {{ fields.textField(
                        'order_number',
                        infocom.fields['order_number'],
                        __('Order number'),
                        {'disabled': disabled}
                     ) }}

                     {{ fields.autoNameField(
                        'immo_number',
                        infocom,
                        __('Immobilization number'),
                        withtemplate,
                        {'disabled': disabled, 'value': infocom.fields['immo_number']}
                     ) }}

                     {{ fields.textField(
                        'bill',
                        infocom.fields['bill'],
                        __('Invoice number'),
                        {'disabled': disabled}
                     ) }}

                     {{ fields.textField(
                        'delivery_number',
                        infocom.fields['delivery_number'],
                        __('Delivery form'),
                        {'disabled': disabled}
                     ) }}

                     {{ fields.numberField(
                        'value',
                        infocom.fields['value'],
                        _x('price', 'Value'),
                        {
                            'disabled': disabled,
                            'step': 'any',
                        }
                     ) }}

                     {{ fields.numberField(
                        'warranty_value',
                        infocom.fields['warranty_value'],
                        __('Warranty extension value'),
                        {
                            'disabled': disabled,
                            'step': 'any',
                        }
                     ) }}


                     {% set amort = infocom.Amort(
                           infocom.fields['sink_type'],
                           infocom.fields['value'],
                           infocom.fields['sink_time'],
                           infocom.fields['sink_coeff'],
                           infocom.fields['buy_date'],
                           infocom.fields['use_date'],
                           config('date_tax'),
                           'n'
                         ) %}
                     {{ fields.readOnlyField(
                        '',
                        amort|formatted_number,
                        __('Account net value'),
                     ) }}

                     {% if withtemplate == 2 or disabled == true %}
                        {% set sink_type_field = infocom.getAmortTypeName(infocom.fields['sink_type']) %}
                     {% else %}
                        {% set sink_type_field = infocom.dropdownAmortType('sink_type', infocom.fields['sink_type'], false) %}
                     {% endif %}

                     {{ fields.field(
                        '',
                        sink_type_field,
                        __('Amortization type'),
                     ) }}

                     {{ fields.dropdownNumberField(
                        'sink_time',
                        infocom.fields['sink_time'],
                        __('Amortization duration'),
                        {
                           'max'      : 15,
                           'unit'     : 'year',
                           'disabled' : disabled
                        }
                     ) }}

                     {{ fields.numberField(
                        'sink_coeff',
                        infocom.fields['sink_coeff'],
                        __('Amortization coefficient'),
                        {'disabled': disabled}
                     ) }}

                     {% if item.getType() not in infocom.getExcludedTypes()|merge(['Cartridge', 'Consumable', 'SoftwareLicense'])  %}
                        {% set ticket_tco_value = infocom.showTco(item.fields['ticket_tco'], infocom.fields['value']) %}
                        {{ fields.readOnlyField(
                           'ticket_tco',
                           ticket_tco_value,
                           __('TCO (value + tracking cost)'),
                           {'disabled': disabled}
                        ) }}

                        {% set ticket_tco2_value = infocom.showTco(item.fields['ticket_tco'], infocom.fields['value'], infocom.fields['buy_date']) %}
                        {{ fields.readOnlyField(
                           'ticket_tco',
                           ticket_tco2_value,
                           __('Monthly TCO'),
                           {'disabled': disabled}
                        ) }}
                     {% endif %}


                     {{ fields.dropdownField(
                        'BusinessCriticity',
                        'businesscriticities_id',
                        infocom.fields['businesscriticities_id'],
                        _n('Business criticity', 'Business criticities', 1),
                        {
                           'disabled': disabled
                        }
                     ) }}

                     {{ fields.textareaField(
                        'comment',
                        infocom.fields['comment'],
                        _n('Comment', 'Comments', get_plural_number()),
                        {'disabled': disabled}
                     ) }}

                     

                     {% do call_plugin_hook_func(constant('Glpi\\\\Plugin\\\\Hooks::INFOCOM'), item) %}

                     <div class=\"card-body mx-n2 mb-4  border-top\">
                        {% if can_global_update %}
                           <button class=\"btn btn-primary me-2\" type=\"submit\" name=\"update\">
                              <i class=\"far fa-save\"></i>
                              <span>{{ _x('button', 'Save') }}</span>
                           </button>
                        {% endif %}

                        {% if can_global_purge %}
                           <button class=\"btn btn-outline-danger me-2\" type=\"submit\" name=\"purge\">
                              <i class=\"fas fa-trash-alt\"></i>
                              <span>{{ _x('button', 'Delete permanently') }}</span>
                           </button>
                        {% endif %}
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

   {% endif %}

   {% if can_edit or can_create %}
      <input type=\"hidden\" name=\"_glpi_csrf_token\" value=\"{{ csrf_token() }}\" />
   </form>
   {% endif %}
</div>
", "components/infocom.html.twig", "C:\\xampp\\htdocs\\glpi_7_new\\templates\\components\\infocom.html.twig");
    }
}
