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

/* generic_show_form.html.twig */
class __TwigTemplate_af0cc283d72c1eaf9abf6cfcc818726e extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'form_fields' => [$this, 'block_form_fields'],
            'more_fields' => [$this, 'block_more_fields'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 33
        echo "
";
        // line 34
        $macros["fields"] = $this->macros["fields"] = $this->loadTemplate("components/form/fields_macros.html.twig", "generic_show_form.html.twig", 34)->unwrap();
        // line 35
        echo "
";
        // line 36
        $context["no_header"] = ((array_key_exists("no_header", $context)) ? (_twig_default_filter(($context["no_header"] ?? null), ( !twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "isNewItem", [], "method", false, false, false, 36) &&  !((twig_get_attribute($this->env, $this->source, ($context["_get"] ?? null), "_in_modal", [], "any", true, true, false, 36)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["_get"] ?? null), "_in_modal", [], "any", false, false, false, 36), false)) : (false))))) : (( !twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "isNewItem", [], "method", false, false, false, 36) &&  !((twig_get_attribute($this->env, $this->source, ($context["_get"] ?? null), "_in_modal", [], "any", true, true, false, 36)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["_get"] ?? null), "_in_modal", [], "any", false, false, false, 36), false)) : (false)))));
        // line 37
        $context["bg"] = "";
        // line 38
        if (twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "isDeleted", [], "method", false, false, false, 38)) {
            // line 39
            echo "   ";
            $context["bg"] = "asset-deleted";
        }
        // line 41
        echo "
<div class=\"asset ";
        // line 42
        echo twig_escape_filter($this->env, ($context["bg"] ?? null), "html", null, true);
        echo "\">
   ";
        // line 43
        echo twig_include($this->env, $context, "components/form/header.html.twig", ["in_twig" => true]);
        echo "

   ";
        // line 45
        $context["rand"] = twig_random($this->env);
        // line 46
        echo "   ";
        $context["params"] = (($context["params"]) ?? ([]));
        // line 47
        echo "   ";
        $context["target"] = (((twig_get_attribute($this->env, $this->source, ($context["params"] ?? null), "target", [], "array", true, true, false, 47) &&  !(null === (($__internal_compile_0 = ($context["params"] ?? null)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0["target"] ?? null) : null)))) ? ((($__internal_compile_1 = ($context["params"] ?? null)) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1["target"] ?? null) : null)) : (twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "getFormURL", [], "method", false, false, false, 47)));
        // line 48
        echo "   ";
        $context["withtemplate"] = (((twig_get_attribute($this->env, $this->source, ($context["params"] ?? null), "withtemplate", [], "array", true, true, false, 48) &&  !(null === (($__internal_compile_2 = ($context["params"] ?? null)) && is_array($__internal_compile_2) || $__internal_compile_2 instanceof ArrayAccess ? ($__internal_compile_2["withtemplate"] ?? null) : null)))) ? ((($__internal_compile_3 = ($context["params"] ?? null)) && is_array($__internal_compile_3) || $__internal_compile_3 instanceof ArrayAccess ? ($__internal_compile_3["withtemplate"] ?? null) : null)) : (""));
        // line 49
        echo "   ";
        $context["item_type"] = twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "getType", [], "method", false, false, false, 49);
        // line 50
        echo "   ";
        $context["item_has_pictures"] = twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "hasItemtypeOrModelPictures", [], "method", false, false, false, 50);
        // line 51
        echo "   ";
        $context["field_options"] = ["locked_fields" => twig_get_attribute($this->env, $this->source,         // line 52
($context["item"] ?? null), "getLockedFields", [], "method", false, false, false, 52)];
        // line 54
        echo "
   <div class=\"card-body d-flex flex-wrap\">
      <div class=\"col-12 col-xxl-";
        // line 56
        echo ((($context["item_has_pictures"] ?? null)) ? ("9") : ("12"));
        echo " flex-column\">
         <div class=\"d-flex flex-row flex-wrap flex-xl-nowrap\">
            <div class=\"row flex-row align-items-start flex-grow-1\">
               <div class=\"row flex-row\">
                  ";
        // line 60
        $this->displayBlock('form_fields', $context, $blocks);
        // line 676
        echo "               </div> ";
        // line 677
        echo "            </div> ";
        // line 678
        echo "         </div> ";
        // line 679
        echo "      </div>
      ";
        // line 680
        if (($context["item_has_pictures"] ?? null)) {
            // line 681
            echo "         <div class=\"col-12 col-xxl-3 flex-column\">
            <div class=\"flex-row asset-pictures\">
               ";
            // line 683
            echo twig_include($this->env, $context, "components/form/pictures.html.twig", ["gallery_type" => ""]);
            echo "
            </div>
         </div>
      ";
        }
        // line 687
        echo "   </div> ";
        // line 688
        echo "
   ";
        // line 689
        if ((($context["item_type"] ?? null) == "Contract")) {
            // line 690
            echo "      ";
            echo twig_include($this->env, $context, "components/form/support_hours.html.twig");
            echo "
   ";
        }
        // line 692
        echo "   ";
        echo twig_include($this->env, $context, "components/form/buttons.html.twig");
        echo "
   ";
        // line 693
        if (( !array_key_exists("no_inventory_footer", $context) || (($context["no_inventory_footer"] ?? null) == false))) {
            // line 694
            echo "      ";
            echo twig_include($this->env, $context, "components/form/inventory_info.html.twig");
            echo "
   ";
        }
        // line 696
        echo "
   ";
        // line 697
        if (((null === (($__internal_compile_4 = ($context["params"] ?? null)) && is_array($__internal_compile_4) || $__internal_compile_4 instanceof ArrayAccess ? ($__internal_compile_4["formfooter"] ?? null) : null)) || ((($__internal_compile_5 = ($context["params"] ?? null)) && is_array($__internal_compile_5) || $__internal_compile_5 instanceof ArrayAccess ? ($__internal_compile_5["formfooter"] ?? null) : null) == true))) {
            // line 698
            echo "      <div class=\"card-footer mx-n2 mb-n2 mt-4\">
         ";
            // line 699
            echo twig_include($this->env, $context, "components/form/dates.html.twig");
            echo "
      </div>
   ";
        }
        // line 702
        echo "</div>
";
    }

    // line 60
    public function block_form_fields($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 61
        echo "                     ";
        if (twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "isField", [0 => "name"], "method", false, false, false, 61)) {
            // line 62
            echo "                        ";
            echo twig_call_macro($macros["fields"], "macro_autoNameField", ["name",             // line 64
($context["item"] ?? null), (((            // line 65
($context["item_type"] ?? null) == "Contact")) ? (__("Surname")) : (__("Name"))),             // line 66
($context["withtemplate"] ?? null),             // line 67
($context["field_options"] ?? null)], 62, $context, $this->getSourceContext());
            // line 68
            echo "
                     ";
        }
        // line 70
        echo "
                     ";
        // line 71
        if (twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "isField", [0 => "firstname"], "method", false, false, false, 71)) {
            // line 72
            echo "                        ";
            echo twig_call_macro($macros["fields"], "macro_autoNameField", ["firstname",             // line 74
($context["item"] ?? null), __("First name"),             // line 76
($context["withtemplate"] ?? null),             // line 77
($context["field_options"] ?? null)], 72, $context, $this->getSourceContext());
            // line 78
            echo "
                     ";
        }
        // line 80
        echo "
                     ";
        // line 81
        if (((twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "isField", [0 => "template_name"], "method", false, false, false, 81) && (($context["withtemplate"] ?? null) == 1)) && ($context["no_header"] ?? null))) {
            // line 82
            echo "                        ";
            echo twig_call_macro($macros["fields"], "macro_autoNameField", ["template_name",             // line 84
($context["item"] ?? null), __("Template name"), 0,             // line 87
($context["field_options"] ?? null)], 82, $context, $this->getSourceContext());
            // line 88
            echo "
                     ";
        }
        // line 90
        echo "
                     ";
        // line 91
        if (twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "isField", [0 => "is_active"], "method", false, false, false, 91)) {
            // line 92
            echo "                        ";
            if (( !twig_test_empty(($context["withtemplate"] ?? null)) || (($context["withtemplate"] ?? null) == 1))) {
                // line 93
                echo "                           ";
                echo twig_call_macro($macros["fields"], "macro_hiddenField", ["is_active", (($__internal_compile_6 = twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "fields", [], "any", false, false, false, 93)) && is_array($__internal_compile_6) || $__internal_compile_6 instanceof ArrayAccess ? ($__internal_compile_6["is_active"] ?? null) : null), __("Is active"), ["add_field_html" => __("No")]], 93, $context, $this->getSourceContext());
                // line 95
                echo "
                        ";
            } else {
                // line 97
                echo "                        ";
            }
            // line 98
            echo "                     ";
        }
        // line 99
        echo "
                     ";
        // line 100
        if (twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "isField", [0 => "states_id"], "method", false, false, false, 100)) {
            // line 101
            echo "                        ";
            $context["condition"] = ((twig_in_filter(twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "getType", [], "method", false, false, false, 101), $this->extensions['Glpi\Application\View\Extension\ConfigExtension']->config("state_types"))) ? ([("is_visible_" . twig_lower_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "getType", [], "method", false, false, false, 101))) => 1]) : ([]));
            // line 102
            echo "                        ";
            echo twig_call_macro($macros["fields"], "macro_dropdownField", ["State", "states_id", (($__internal_compile_7 = twig_get_attribute($this->env, $this->source,             // line 105
($context["item"] ?? null), "fields", [], "any", false, false, false, 105)) && is_array($__internal_compile_7) || $__internal_compile_7 instanceof ArrayAccess ? ($__internal_compile_7["states_id"] ?? null) : null), __("Status"), twig_array_merge(            // line 107
($context["field_options"] ?? null), ["entity" => (($__internal_compile_8 = twig_get_attribute($this->env, $this->source,             // line 108
($context["item"] ?? null), "fields", [], "any", false, false, false, 108)) && is_array($__internal_compile_8) || $__internal_compile_8 instanceof ArrayAccess ? ($__internal_compile_8["entities_id"] ?? null) : null), "condition" =>             // line 109
($context["condition"] ?? null)])], 102, $context, $this->getSourceContext());
            // line 111
            echo "
                     ";
        }
        // line 113
        echo "
                     ";
        // line 114
        $context["fk"] = twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "getForeignKeyField", [], "method", false, false, false, 114);
        // line 115
        echo "                     ";
        if ((twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "isField", [0 => ($context["fk"] ?? null)], "method", false, false, false, 115) && (($context["item_type"] ?? null) != "Software"))) {
            // line 116
            echo "                        ";
            echo twig_call_macro($macros["fields"], "macro_dropdownField", [            // line 117
($context["item_type"] ?? null),             // line 118
($context["fk"] ?? null), (($__internal_compile_9 = twig_get_attribute($this->env, $this->source,             // line 119
($context["item"] ?? null), "fields", [], "any", false, false, false, 119)) && is_array($__internal_compile_9) || $__internal_compile_9 instanceof ArrayAccess ? ($__internal_compile_9[($context["fk"] ?? null)] ?? null) : null), __("As child of"), twig_array_merge(            // line 121
($context["field_options"] ?? null), ["entity" => (($__internal_compile_10 = twig_get_attribute($this->env, $this->source,             // line 122
($context["item"] ?? null), "fields", [], "any", false, false, false, 122)) && is_array($__internal_compile_10) || $__internal_compile_10 instanceof ArrayAccess ? ($__internal_compile_10["entities_id"] ?? null) : null)])], 116, $context, $this->getSourceContext());
            // line 124
            echo "
                     ";
        }
        // line 126
        echo "
                     ";
        // line 127
        if (((($context["item_type"] ?? null) != "SoftwareLicense") && twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "isField", [0 => "is_helpdesk_visible"], "method", false, false, false, 127))) {
            // line 128
            echo "                        ";
            // line 129
            echo "                        ";
            echo twig_call_macro($macros["fields"], "macro_checkboxField", ["is_helpdesk_visible", (($__internal_compile_11 = twig_get_attribute($this->env, $this->source,             // line 131
($context["item"] ?? null), "fields", [], "any", false, false, false, 131)) && is_array($__internal_compile_11) || $__internal_compile_11 instanceof ArrayAccess ? ($__internal_compile_11["is_helpdesk_visible"] ?? null) : null), __("Associable to a ticket"),             // line 133
($context["field_options"] ?? null)], 129, $context, $this->getSourceContext());
            // line 134
            echo "
                     ";
        }
        // line 136
        echo "
                     ";
        // line 137
        $context["dc_breadcrumbs"] = (($this->extensions['Glpi\Application\View\Extension\PhpExtension']->isUsingTrait(($context["item"] ?? null), "Glpi\\Features\\DCBreadcrumb")) ? (twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "getDcBreadcrumb", [], "method", false, false, false, 137)) : ([]));
        // line 138
        echo "                     ";
        if ((twig_length_filter($this->env, ($context["dc_breadcrumbs"] ?? null)) > 0)) {
            // line 139
            echo "                        ";
            ob_start();
            // line 140
            echo "                           <ol class=\"breadcrumb breadcrumb-arrows\" aria-label=\"breadcrumbs\">
                              ";
            // line 141
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_reverse_filter($this->env, ($context["dc_breadcrumbs"] ?? null)));
            foreach ($context['_seq'] as $context["_key"] => $context["dc_item"]) {
                // line 142
                echo "                                 <li class=\"breadcrumb-item text-nowrap\">";
                echo $context["dc_item"];
                echo "</li>
                              ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['dc_item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 144
            echo "                           </ol>
                        ";
            $context["dc_breadcrumbs"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
            // line 146
            echo "
                        ";
            // line 147
            echo twig_call_macro($macros["fields"], "macro_htmlField", ["",             // line 149
($context["dc_breadcrumbs"] ?? null), __("Data center position")], 147, $context, $this->getSourceContext());
            // line 151
            echo "

                        ";
            // line 153
            echo twig_call_macro($macros["fields"], "macro_nullField", [], 153, $context, $this->getSourceContext());
            echo " ";
            // line 154
            echo "                     ";
        }
        // line 155
        echo "
                     ";
        // line 156
        if (twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "isField", [0 => "locations_id"], "method", false, false, false, 156)) {
            // line 157
            echo "                        ";
            echo twig_call_macro($macros["fields"], "macro_dropdownField", ["Location", "locations_id", (($__internal_compile_12 = twig_get_attribute($this->env, $this->source,             // line 160
($context["item"] ?? null), "fields", [], "any", false, false, false, 160)) && is_array($__internal_compile_12) || $__internal_compile_12 instanceof ArrayAccess ? ($__internal_compile_12["locations_id"] ?? null) : null), $this->extensions['Glpi\Application\View\Extension\ItemtypeExtension']->getItemtypeName("Location"), twig_array_merge(            // line 162
($context["field_options"] ?? null), ["entity" => (($__internal_compile_13 = twig_get_attribute($this->env, $this->source,             // line 163
($context["item"] ?? null), "fields", [], "any", false, false, false, 163)) && is_array($__internal_compile_13) || $__internal_compile_13 instanceof ArrayAccess ? ($__internal_compile_13["entities_id"] ?? null) : null)])], 157, $context, $this->getSourceContext());
            // line 165
            echo "
                     ";
        }
        // line 167
        echo "
                     ";
        // line 168
        if (((($context["item_type"] ?? null) == "Unmanaged") && twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "isField", [0 => "item_type"], "method", false, false, false, 168))) {
            // line 169
            echo "                        ";
            echo twig_call_macro($macros["fields"], "macro_dropdownArrayField", ["item_type", (($__internal_compile_14 = twig_get_attribute($this->env, $this->source,             // line 171
($context["item"] ?? null), "fields", [], "any", false, false, false, 171)) && is_array($__internal_compile_14) || $__internal_compile_14 instanceof ArrayAccess ? ($__internal_compile_14["itemtype"] ?? null) : null), _n("Type", "Types", 1), [0 => "Computer", 1 => "NetworkEquipment", 2 => "Printer", 3 => "Peripheral", 4 => "Phone"],             // line 176
($context["field_options"] ?? null)], 169, $context, $this->getSourceContext());
            // line 177
            echo "
                     ";
        }
        // line 179
        echo "
                     ";
        // line 180
        if (twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "isField", [0 => "date_domaincreation"], "method", false, false, false, 180)) {
            // line 181
            echo "                        ";
            echo twig_call_macro($macros["fields"], "macro_datetimeField", ["date_domaincreation", (($__internal_compile_15 = twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "fields", [], "any", false, false, false, 181)) && is_array($__internal_compile_15) || $__internal_compile_15 instanceof ArrayAccess ? ($__internal_compile_15["date_domaincreation"] ?? null) : null), __("Registration date")], 181, $context, $this->getSourceContext());
            echo "
                     ";
        }
        // line 183
        echo "
                     ";
        // line 184
        $context["type_itemtype"] = twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "getTypeClass", [], "method", false, false, false, 184);
        // line 185
        echo "                     ";
        $context["type_fk"] = twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "getTypeForeignKeyField", [], "method", false, false, false, 185);
        // line 186
        echo "                     ";
        if (twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "isField", [0 => ($context["type_fk"] ?? null)], "method", false, false, false, 186)) {
            // line 187
            echo "                        ";
            echo twig_call_macro($macros["fields"], "macro_dropdownField", [            // line 188
($context["type_itemtype"] ?? null),             // line 189
($context["type_fk"] ?? null), (($__internal_compile_16 = twig_get_attribute($this->env, $this->source,             // line 190
($context["item"] ?? null), "fields", [], "any", false, false, false, 190)) && is_array($__internal_compile_16) || $__internal_compile_16 instanceof ArrayAccess ? ($__internal_compile_16[($context["type_fk"] ?? null)] ?? null) : null), $this->extensions['Glpi\Application\View\Extension\ItemtypeExtension']->getItemtypeName(            // line 191
($context["type_itemtype"] ?? null)),             // line 192
($context["field_options"] ?? null)], 187, $context, $this->getSourceContext());
            // line 193
            echo "
                     ";
        }
        // line 195
        echo "
                     ";
        // line 196
        if (twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "isField", [0 => "usertitles_id"], "method", false, false, false, 196)) {
            // line 197
            echo "                        ";
            echo twig_call_macro($macros["fields"], "macro_dropdownField", ["UserTitle", "usertitles_id", (($__internal_compile_17 = twig_get_attribute($this->env, $this->source,             // line 200
($context["item"] ?? null), "fields", [], "any", false, false, false, 200)) && is_array($__internal_compile_17) || $__internal_compile_17 instanceof ArrayAccess ? ($__internal_compile_17["usertitles_id"] ?? null) : null), $this->extensions['Glpi\Application\View\Extension\ItemtypeExtension']->getItemtypeName("UserTitle"), twig_array_merge(            // line 202
($context["field_options"] ?? null), ["entity" => (($__internal_compile_18 = twig_get_attribute($this->env, $this->source,             // line 203
($context["item"] ?? null), "fields", [], "any", false, false, false, 203)) && is_array($__internal_compile_18) || $__internal_compile_18 instanceof ArrayAccess ? ($__internal_compile_18["entities_id"] ?? null) : null)])], 197, $context, $this->getSourceContext());
            // line 205
            echo "
                     ";
        }
        // line 207
        echo "
                     ";
        // line 208
        if (twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "isField", [0 => "registration_number"], "method", false, false, false, 208)) {
            // line 209
            echo "                        ";
            echo twig_call_macro($macros["fields"], "macro_autoNameField", ["registration_number",             // line 211
($context["item"] ?? null), (((is_string($__internal_compile_19 =             // line 212
($context["item_type"] ?? null)) && is_string($__internal_compile_20 = "User") && ('' === $__internal_compile_20 || 0 === strpos($__internal_compile_19, $__internal_compile_20)))) ? (_x("user", "Administrative number")) : (_x("infocom", "Administrative number"))),             // line 213
($context["withtemplate"] ?? null),             // line 214
($context["field_options"] ?? null)], 209, $context, $this->getSourceContext());
            // line 215
            echo "
                     ";
        }
        // line 217
        echo "
                     ";
        // line 218
        if (twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "isField", [0 => "phone"], "method", false, false, false, 218)) {
            // line 219
            echo "                        ";
            echo twig_call_macro($macros["fields"], "macro_autoNameField", ["phone",             // line 221
($context["item"] ?? null), $this->extensions['Glpi\Application\View\Extension\ItemtypeExtension']->getItemtypeName("Phone"),             // line 223
($context["withtemplate"] ?? null),             // line 224
($context["field_options"] ?? null)], 219, $context, $this->getSourceContext());
            // line 225
            echo "
                     ";
        }
        // line 227
        echo "
                     ";
        // line 228
        if (twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "isField", [0 => "phone2"], "method", false, false, false, 228)) {
            // line 229
            echo "                        ";
            echo twig_call_macro($macros["fields"], "macro_autoNameField", ["phone2",             // line 231
($context["item"] ?? null), __("Phone 2"),             // line 233
($context["withtemplate"] ?? null),             // line 234
($context["field_options"] ?? null)], 229, $context, $this->getSourceContext());
            // line 235
            echo "
                     ";
        }
        // line 237
        echo "
                     ";
        // line 238
        if (twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "isField", [0 => "phonenumber"], "method", false, false, false, 238)) {
            // line 239
            echo "                        ";
            echo twig_call_macro($macros["fields"], "macro_autoNameField", ["phonenumber",             // line 241
($context["item"] ?? null), $this->extensions['Glpi\Application\View\Extension\ItemtypeExtension']->getItemtypeName("Phone"),             // line 243
($context["withtemplate"] ?? null),             // line 244
($context["field_options"] ?? null)], 239, $context, $this->getSourceContext());
            // line 245
            echo "
                     ";
        }
        // line 247
        echo "
                     ";
        // line 248
        if (twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "isField", [0 => "mobile"], "method", false, false, false, 248)) {
            // line 249
            echo "                        ";
            echo twig_call_macro($macros["fields"], "macro_autoNameField", ["mobile",             // line 251
($context["item"] ?? null), __("Mobile phone"),             // line 253
($context["withtemplate"] ?? null),             // line 254
($context["field_options"] ?? null)], 249, $context, $this->getSourceContext());
            // line 255
            echo "
                     ";
        }
        // line 257
        echo "
                     ";
        // line 258
        if (twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "isField", [0 => "fax"], "method", false, false, false, 258)) {
            // line 259
            echo "                        ";
            echo twig_call_macro($macros["fields"], "macro_autoNameField", ["fax",             // line 261
($context["item"] ?? null), __("Fax"),             // line 263
($context["withtemplate"] ?? null),             // line 264
($context["field_options"] ?? null)], 259, $context, $this->getSourceContext());
            // line 265
            echo "
                     ";
        }
        // line 267
        echo "
                     ";
        // line 268
        if (twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "isField", [0 => "website"], "method", false, false, false, 268)) {
            // line 269
            echo "                        ";
            echo twig_call_macro($macros["fields"], "macro_autoNameField", ["website",             // line 271
($context["item"] ?? null), __("Website"),             // line 273
($context["withtemplate"] ?? null),             // line 274
($context["field_options"] ?? null)], 269, $context, $this->getSourceContext());
            // line 275
            echo "
                     ";
        }
        // line 277
        echo "
                     ";
        // line 278
        if (twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "isField", [0 => "email"], "method", false, false, false, 278)) {
            // line 279
            echo "                        ";
            echo twig_call_macro($macros["fields"], "macro_autoNameField", ["email",             // line 281
($context["item"] ?? null), _n("Email", "Emails", 1),             // line 283
($context["withtemplate"] ?? null),             // line 284
($context["field_options"] ?? null)], 279, $context, $this->getSourceContext());
            // line 285
            echo "
                     ";
        }
        // line 287
        echo "
                     ";
        // line 288
        if (twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "isField", [0 => "address"], "method", false, false, false, 288)) {
            // line 289
            echo "                        ";
            echo twig_call_macro($macros["fields"], "macro_textareaField", ["address", (($__internal_compile_21 = twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "fields", [], "any", false, false, false, 289)) && is_array($__internal_compile_21) || $__internal_compile_21 instanceof ArrayAccess ? ($__internal_compile_21["address"] ?? null) : null), __("Address")], 289, $context, $this->getSourceContext());
            echo "
                     ";
        }
        // line 291
        echo "
                     ";
        // line 292
        if (twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "isField", [0 => "postalcode"], "method", false, false, false, 292)) {
            // line 293
            echo "                        ";
            echo twig_call_macro($macros["fields"], "macro_autoNameField", ["postalcode",             // line 295
($context["item"] ?? null), __("Postal code"),             // line 297
($context["withtemplate"] ?? null),             // line 298
($context["field_options"] ?? null)], 293, $context, $this->getSourceContext());
            // line 299
            echo "
                     ";
        }
        // line 301
        echo "
                     ";
        // line 302
        if (twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "isField", [0 => "town"], "method", false, false, false, 302)) {
            // line 303
            echo "                        ";
            echo twig_call_macro($macros["fields"], "macro_autoNameField", ["town",             // line 305
($context["item"] ?? null), __("City"),             // line 307
($context["withtemplate"] ?? null),             // line 308
($context["field_options"] ?? null)], 303, $context, $this->getSourceContext());
            // line 309
            echo "
                     ";
        }
        // line 311
        echo "
                     ";
        // line 313
        echo "                     ";
        if (twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "isField", [0 => "postcode"], "method", false, false, false, 313)) {
            // line 314
            echo "                        ";
            echo twig_call_macro($macros["fields"], "macro_autoNameField", ["postcode",             // line 316
($context["item"] ?? null), __("Postal code"),             // line 318
($context["withtemplate"] ?? null),             // line 319
($context["field_options"] ?? null)], 314, $context, $this->getSourceContext());
            // line 320
            echo "
                     ";
        }
        // line 322
        echo "
                     ";
        // line 323
        if (((($context["item_type"] ?? null) == "Supplier") || (($context["item_type"] ?? null) == "Contact"))) {
            // line 324
            echo "                        ";
            echo twig_call_macro($macros["fields"], "macro_autoNameField", ["state",             // line 326
($context["item"] ?? null), _x("location", "State"),             // line 328
($context["withtemplate"] ?? null),             // line 329
($context["field_options"] ?? null)], 324, $context, $this->getSourceContext());
            // line 330
            echo "
                     ";
        }
        // line 332
        echo "
                     ";
        // line 333
        if (twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "isField", [0 => "country"], "method", false, false, false, 333)) {
            // line 334
            echo "                        ";
            echo twig_call_macro($macros["fields"], "macro_autoNameField", ["country",             // line 336
($context["item"] ?? null), __("Country"),             // line 338
($context["withtemplate"] ?? null),             // line 339
($context["field_options"] ?? null)], 334, $context, $this->getSourceContext());
            // line 340
            echo "
                     ";
        }
        // line 342
        echo "
                     ";
        // line 343
        if (twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "isField", [0 => "date_expiration"], "method", false, false, false, 343)) {
            // line 344
            echo "                        ";
            if ((($context["item_type"] ?? null) == "Certificate")) {
                // line 345
                echo "                           ";
                echo twig_call_macro($macros["fields"], "macro_dateField", ["date_expiration", (($__internal_compile_22 = twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "fields", [], "any", false, false, false, 345)) && is_array($__internal_compile_22) || $__internal_compile_22 instanceof ArrayAccess ? ($__internal_compile_22["date_expiration"] ?? null) : null), __("Expiration date"), twig_array_merge(["helper" => __("Empty for infinite"), "checkIsExpired" => false, "expiration_class" => twig_get_attribute($this->env, $this->source,                 // line 348
($context["params"] ?? null), "expiration_class", [], "any", false, false, false, 348)],                 // line 349
($context["field_options"] ?? null))], 345, $context, $this->getSourceContext());
                echo "
                        ";
            } elseif ((            // line 350
($context["item_type"] ?? null) == "ComputerAntivirus")) {
                // line 351
                echo "                           ";
                echo twig_call_macro($macros["fields"], "macro_dateField", ["date_expiration", (($__internal_compile_23 = twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "fields", [], "any", false, false, false, 351)) && is_array($__internal_compile_23) || $__internal_compile_23 instanceof ArrayAccess ? ($__internal_compile_23["date_expiration"] ?? null) : null), __("Expiration date"), twig_array_merge(["helper" => __("Empty for infinite"), "checkIsExpired" => true],                 // line 354
($context["field_options"] ?? null))], 351, $context, $this->getSourceContext());
                echo "
                        ";
            } else {
                // line 356
                echo "                           ";
                echo twig_call_macro($macros["fields"], "macro_datetimeField", ["date_expiration", (($__internal_compile_24 = twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "fields", [], "any", false, false, false, 356)) && is_array($__internal_compile_24) || $__internal_compile_24 instanceof ArrayAccess ? ($__internal_compile_24["date_expiration"] ?? null) : null), __("Expiration date"), twig_array_merge(["helper" => __("Empty for infinite"), "checkIsExpired" => true],                 // line 359
($context["field_options"] ?? null))], 356, $context, $this->getSourceContext());
                echo "
                        ";
            }
            // line 361
            echo "                     ";
        }
        // line 362
        echo "
                     ";
        // line 363
        if (twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "isField", [0 => "ref"], "method", false, false, false, 363)) {
            // line 364
            echo "                        ";
            echo twig_call_macro($macros["fields"], "macro_textField", ["ref", (($__internal_compile_25 = twig_get_attribute($this->env, $this->source,             // line 366
($context["item"] ?? null), "fields", [], "any", false, false, false, 366)) && is_array($__internal_compile_25) || $__internal_compile_25 instanceof ArrayAccess ? ($__internal_compile_25["ref"] ?? null) : null), __("Reference"),             // line 368
($context["field_options"] ?? null)], 364, $context, $this->getSourceContext());
            // line 369
            echo "
                     ";
        }
        // line 371
        echo "
                     ";
        // line 372
        if (twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "isField", [0 => "users_id_tech"], "method", false, false, false, 372)) {
            // line 373
            echo "                        ";
            echo twig_call_macro($macros["fields"], "macro_dropdownField", ["User", "users_id_tech", (($__internal_compile_26 = twig_get_attribute($this->env, $this->source,             // line 376
($context["item"] ?? null), "fields", [], "any", false, false, false, 376)) && is_array($__internal_compile_26) || $__internal_compile_26 instanceof ArrayAccess ? ($__internal_compile_26["users_id_tech"] ?? null) : null), __("Technician in charge of the hardware"), twig_array_merge(            // line 378
($context["field_options"] ?? null), ["entity" => (($__internal_compile_27 = twig_get_attribute($this->env, $this->source,             // line 379
($context["item"] ?? null), "fields", [], "any", false, false, false, 379)) && is_array($__internal_compile_27) || $__internal_compile_27 instanceof ArrayAccess ? ($__internal_compile_27["entities_id"] ?? null) : null), "right" => "own_ticket"])], 373, $context, $this->getSourceContext());
            // line 382
            echo "
                     ";
        }
        // line 384
        echo "
                     ";
        // line 385
        if (twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "isField", [0 => "manufacturers_id"], "method", false, false, false, 385)) {
            // line 386
            echo "                        ";
            echo twig_call_macro($macros["fields"], "macro_dropdownField", ["Manufacturer", "manufacturers_id", (($__internal_compile_28 = twig_get_attribute($this->env, $this->source,             // line 389
($context["item"] ?? null), "fields", [], "any", false, false, false, 389)) && is_array($__internal_compile_28) || $__internal_compile_28 instanceof ArrayAccess ? ($__internal_compile_28["manufacturers_id"] ?? null) : null), (((is_string($__internal_compile_29 =             // line 390
($context["item_type"] ?? null)) && is_string($__internal_compile_30 = "Software") && ('' === $__internal_compile_30 || 0 === strpos($__internal_compile_29, $__internal_compile_30)))) ? (__("Publisher")) : ($this->extensions['Glpi\Application\View\Extension\ItemtypeExtension']->getItemtypeName("Manufacturer"))),             // line 391
($context["field_options"] ?? null)], 386, $context, $this->getSourceContext());
            // line 392
            echo "
                     ";
        }
        // line 394
        echo "
                     ";
        // line 395
        if (twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "isField", [0 => "groups_id_tech"], "method", false, false, false, 395)) {
            // line 396
            echo "                        ";
            echo twig_call_macro($macros["fields"], "macro_dropdownField", ["Group", "groups_id_tech", (($__internal_compile_31 = twig_get_attribute($this->env, $this->source,             // line 399
($context["item"] ?? null), "fields", [], "any", false, false, false, 399)) && is_array($__internal_compile_31) || $__internal_compile_31 instanceof ArrayAccess ? ($__internal_compile_31["groups_id_tech"] ?? null) : null), __("Group in charge of the hardware"), twig_array_merge(            // line 401
($context["field_options"] ?? null), ["entity" => (($__internal_compile_32 = twig_get_attribute($this->env, $this->source,             // line 402
($context["item"] ?? null), "fields", [], "any", false, false, false, 402)) && is_array($__internal_compile_32) || $__internal_compile_32 instanceof ArrayAccess ? ($__internal_compile_32["entities_id"] ?? null) : null), "condition" => ["is_assign" => 1]])], 396, $context, $this->getSourceContext());
            // line 405
            echo "
                     ";
        }
        // line 407
        echo "
                     ";
        // line 408
        $context["model_itemtype"] = twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "getModelClass", [], "method", false, false, false, 408);
        // line 409
        echo "                     ";
        $context["model_fk"] = twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "getModelForeignKeyField", [], "method", false, false, false, 409);
        // line 410
        echo "                     ";
        if (twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "isField", [0 => ($context["model_fk"] ?? null)], "method", false, false, false, 410)) {
            // line 411
            echo "                        ";
            echo twig_call_macro($macros["fields"], "macro_dropdownField", [            // line 412
($context["model_itemtype"] ?? null),             // line 413
($context["model_fk"] ?? null), (($__internal_compile_33 = twig_get_attribute($this->env, $this->source,             // line 414
($context["item"] ?? null), "fields", [], "any", false, false, false, 414)) && is_array($__internal_compile_33) || $__internal_compile_33 instanceof ArrayAccess ? ($__internal_compile_33[($context["model_fk"] ?? null)] ?? null) : null), _n("Model", "Models", 1),             // line 416
($context["field_options"] ?? null)], 411, $context, $this->getSourceContext());
            // line 417
            echo "
                     ";
        }
        // line 419
        echo "
                     ";
        // line 420
        if (((($context["item_type"] ?? null) != "SoftwareLicense") && twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "isField", [0 => "contact_num"], "method", false, false, false, 420))) {
            // line 421
            echo "                        ";
            // line 422
            echo "                        ";
            echo twig_call_macro($macros["fields"], "macro_textField", ["contact_num", (($__internal_compile_34 = twig_get_attribute($this->env, $this->source,             // line 424
($context["item"] ?? null), "fields", [], "any", false, false, false, 424)) && is_array($__internal_compile_34) || $__internal_compile_34 instanceof ArrayAccess ? ($__internal_compile_34["contact_num"] ?? null) : null), __("Alternate username number"),             // line 426
($context["field_options"] ?? null)], 422, $context, $this->getSourceContext());
            // line 427
            echo "
                     ";
        }
        // line 429
        echo "
                     ";
        // line 430
        if (twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "isField", [0 => "serial"], "method", false, false, false, 430)) {
            // line 431
            echo "                        ";
            echo twig_call_macro($macros["fields"], "macro_textField", ["serial", (($__internal_compile_35 = twig_get_attribute($this->env, $this->source,             // line 433
($context["item"] ?? null), "fields", [], "any", false, false, false, 433)) && is_array($__internal_compile_35) || $__internal_compile_35 instanceof ArrayAccess ? ($__internal_compile_35["serial"] ?? null) : null), __("Serial number"),             // line 435
($context["field_options"] ?? null)], 431, $context, $this->getSourceContext());
            // line 436
            echo "
                     ";
        }
        // line 438
        echo "                                          

                     ";
        // line 440
        if (((($context["item_type"] ?? null) != "SoftwareLicense") && twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "isField", [0 => "contact"], "method", false, false, false, 440))) {
            // line 441
            echo "                        ";
            // line 442
            echo "                        ";
            echo twig_call_macro($macros["fields"], "macro_textField", ["contact", (($__internal_compile_36 = twig_get_attribute($this->env, $this->source,             // line 444
($context["item"] ?? null), "fields", [], "any", false, false, false, 444)) && is_array($__internal_compile_36) || $__internal_compile_36 instanceof ArrayAccess ? ($__internal_compile_36["contact"] ?? null) : null), __("Alternate username"),             // line 446
($context["field_options"] ?? null)], 442, $context, $this->getSourceContext());
            // line 447
            echo "
                     ";
        }
        // line 449
        echo "
                     ";
        // line 450
        if (twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "isField", [0 => "otherserial"], "method", false, false, false, 450)) {
            // line 451
            echo "                        ";
            echo twig_call_macro($macros["fields"], "macro_autoNameField", ["otherserial",             // line 453
($context["item"] ?? null), __("Inventory number"),             // line 455
($context["withtemplate"] ?? null),             // line 456
($context["field_options"] ?? null)], 451, $context, $this->getSourceContext());
            // line 457
            echo "
                     ";
        }
        // line 459
        echo "
                     ";
        // line 460
        if (twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "isField", [0 => "sysdescr"], "method", false, false, false, 460)) {
            // line 461
            echo "                        ";
            echo twig_call_macro($macros["fields"], "macro_textareaField", ["sysdescr", (($__internal_compile_37 = twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "fields", [], "any", false, false, false, 461)) && is_array($__internal_compile_37) || $__internal_compile_37 instanceof ArrayAccess ? ($__internal_compile_37["sysdescr"] ?? null) : null), __("Sysdescr")], 461, $context, $this->getSourceContext());
            echo "
                     ";
        }
        // line 463
        echo "
                     ";
        // line 464
        if (twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "isField", [0 => "snmpcredentials_id"], "method", false, false, false, 464)) {
            // line 465
            echo "                        ";
            echo twig_call_macro($macros["fields"], "macro_dropdownField", ["SNMPCredential", "snmpcredentials_id", (($__internal_compile_38 = twig_get_attribute($this->env, $this->source,             // line 468
($context["item"] ?? null), "fields", [], "any", false, false, false, 468)) && is_array($__internal_compile_38) || $__internal_compile_38 instanceof ArrayAccess ? ($__internal_compile_38["snmpcredentials_id"] ?? null) : null), $this->extensions['Glpi\Application\View\Extension\ItemtypeExtension']->getItemtypeName("SNMPCredential"),             // line 470
($context["field_options"] ?? null)], 465, $context, $this->getSourceContext());
            // line 471
            echo "
                     ";
        }
        // line 473
        echo "
                     ";
        // line 474
        if (twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "isField", [0 => "users_id"], "method", false, false, false, 474)) {
            // line 475
            echo "                        ";
            echo twig_call_macro($macros["fields"], "macro_dropdownField", ["User", "users_id", (($__internal_compile_39 = twig_get_attribute($this->env, $this->source,             // line 478
($context["item"] ?? null), "fields", [], "any", false, false, false, 478)) && is_array($__internal_compile_39) || $__internal_compile_39 instanceof ArrayAccess ? ($__internal_compile_39["users_id"] ?? null) : null), $this->extensions['Glpi\Application\View\Extension\ItemtypeExtension']->getItemtypeName("User"), twig_array_merge(            // line 480
($context["field_options"] ?? null), ["entity" => (($__internal_compile_40 = twig_get_attribute($this->env, $this->source,             // line 481
($context["item"] ?? null), "fields", [], "any", false, false, false, 481)) && is_array($__internal_compile_40) || $__internal_compile_40 instanceof ArrayAccess ? ($__internal_compile_40["entities_id"] ?? null) : null), "right" => "all"])], 475, $context, $this->getSourceContext());
            // line 484
            echo "
                     ";
        }
        // line 486
        echo "
                     ";
        // line 487
        if (twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "isField", [0 => "is_global"], "method", false, false, false, 487)) {
            // line 488
            echo "                        ";
            $context["management_restrict"] = 0;
            // line 489
            echo "                        ";
            if ((($context["item_type"] ?? null) == "Monitor")) {
                // line 490
                echo "                           ";
                $context["management_restrict"] = $this->extensions['Glpi\Application\View\Extension\ConfigExtension']->config("monitors_management_restrict");
                // line 491
                echo "                        ";
            } elseif ((($context["item_type"] ?? null) == "Peripheral")) {
                // line 492
                echo "                           ";
                $context["management_restrict"] = $this->extensions['Glpi\Application\View\Extension\ConfigExtension']->config("peripherals_management_restrict");
                // line 493
                echo "                        ";
            } elseif ((($context["item_type"] ?? null) == "Phone")) {
                // line 494
                echo "                           ";
                $context["management_restrict"] = $this->extensions['Glpi\Application\View\Extension\ConfigExtension']->config("phones_management_restrict");
                // line 495
                echo "                        ";
            } elseif ((($context["item_type"] ?? null) == "Printer")) {
                // line 496
                echo "                           ";
                $context["management_restrict"] = $this->extensions['Glpi\Application\View\Extension\ConfigExtension']->config("printers_management_restrict");
                // line 497
                echo "                        ";
            } else {
                // line 498
                echo "                           ";
                $context["management_restrict"] = 0;
                // line 499
                echo "                        ";
            }
            // line 500
            echo "                        ";
            ob_start();
            // line 501
            echo "                           ";
            $this->extensions['Glpi\Application\View\Extension\PhpExtension']->call("Dropdown::showGlobalSwitch", [0 => (($__internal_compile_41 = twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "fields", [], "any", false, false, false, 501)) && is_array($__internal_compile_41) || $__internal_compile_41 instanceof ArrayAccess ? ($__internal_compile_41["id"] ?? null) : null), 1 => ["withtemplate" =>             // line 502
($context["withtemplate"] ?? null), "value" => (($__internal_compile_42 = twig_get_attribute($this->env, $this->source,             // line 503
($context["item"] ?? null), "fields", [], "any", false, false, false, 503)) && is_array($__internal_compile_42) || $__internal_compile_42 instanceof ArrayAccess ? ($__internal_compile_42["is_global"] ?? null) : null), "management_restrict" =>             // line 504
($context["management_restrict"] ?? null), "target" =>             // line 505
($context["target"] ?? null), "width" => "100%"]]);
            // line 508
            echo "                        ";
            $context["dd_globalswitch"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
            // line 509
            echo "                        ";
            echo twig_call_macro($macros["fields"], "macro_htmlField", ["is_global",             // line 511
($context["dd_globalswitch"] ?? null), __("Management type")], 509, $context, $this->getSourceContext());
            // line 513
            echo "
                     ";
        }
        // line 515
        echo "
                     ";
        // line 516
        if (twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "isField", [0 => "size"], "method", false, false, false, 516)) {
            // line 517
            echo "                        ";
            echo twig_call_macro($macros["fields"], "macro_numberField", ["size", (($__internal_compile_43 = twig_get_attribute($this->env, $this->source,             // line 519
($context["item"] ?? null), "fields", [], "any", false, false, false, 519)) && is_array($__internal_compile_43) || $__internal_compile_43 instanceof ArrayAccess ? ($__internal_compile_43["size"] ?? null) : null), __("Size"), twig_array_merge(            // line 521
($context["field_options"] ?? null), ["min" => 0, "step" => 0.01])], 517, $context, $this->getSourceContext());
            // line 525
            echo "
                     ";
        }
        // line 527
        echo "
                     ";
        // line 528
        if (twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "isField", [0 => "networks_id"], "method", false, false, false, 528)) {
            // line 529
            echo "                        ";
            echo twig_call_macro($macros["fields"], "macro_dropdownField", ["Network", "networks_id", (($__internal_compile_44 = twig_get_attribute($this->env, $this->source,             // line 532
($context["item"] ?? null), "fields", [], "any", false, false, false, 532)) && is_array($__internal_compile_44) || $__internal_compile_44 instanceof ArrayAccess ? ($__internal_compile_44["networks_id"] ?? null) : null), _n("Network", "Networks", 1),             // line 534
($context["field_options"] ?? null)], 529, $context, $this->getSourceContext());
            // line 535
            echo "
                     ";
        }
        // line 537
        echo "
                     ";
        // line 538
        if (twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "isField", [0 => "groups_id"], "method", false, false, false, 538)) {
            // line 539
            echo "                        ";
            echo twig_call_macro($macros["fields"], "macro_dropdownField", ["Group", "groups_id", (($__internal_compile_45 = twig_get_attribute($this->env, $this->source,             // line 542
($context["item"] ?? null), "fields", [], "any", false, false, false, 542)) && is_array($__internal_compile_45) || $__internal_compile_45 instanceof ArrayAccess ? ($__internal_compile_45["groups_id"] ?? null) : null), $this->extensions['Glpi\Application\View\Extension\ItemtypeExtension']->getItemtypeName("Group"), twig_array_merge(            // line 544
($context["field_options"] ?? null), ["entity" => (($__internal_compile_46 = twig_get_attribute($this->env, $this->source,             // line 545
($context["item"] ?? null), "fields", [], "any", false, false, false, 545)) && is_array($__internal_compile_46) || $__internal_compile_46 instanceof ArrayAccess ? ($__internal_compile_46["entities_id"] ?? null) : null), "condition" => ["is_itemgroup" => 1]])], 539, $context, $this->getSourceContext());
            // line 548
            echo "
                     ";
        }
        // line 550
        echo "
                     ";
        // line 551
        if (twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "isField", [0 => "uuid"], "method", false, false, false, 551)) {
            // line 552
            echo "                        ";
            echo twig_call_macro($macros["fields"], "macro_textField", ["uuid", (($__internal_compile_47 = twig_get_attribute($this->env, $this->source,             // line 554
($context["item"] ?? null), "fields", [], "any", false, false, false, 554)) && is_array($__internal_compile_47) || $__internal_compile_47 instanceof ArrayAccess ? ($__internal_compile_47["uuid"] ?? null) : null), __("UUID"),             // line 556
($context["field_options"] ?? null)], 552, $context, $this->getSourceContext());
            // line 557
            echo "
                     ";
        }
        // line 559
        echo "
                     ";
        // line 560
        if (twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "isField", [0 => "version"], "method", false, false, false, 560)) {
            // line 561
            echo "                        ";
            echo twig_call_macro($macros["fields"], "macro_autoNameField", ["version",             // line 563
($context["item"] ?? null), _n("Version", "Versions", 1),             // line 565
($context["withtemplate"] ?? null),             // line 566
($context["field_options"] ?? null)], 561, $context, $this->getSourceContext());
            // line 567
            echo "
                     ";
        }
        // line 569
        echo "
                     ";
        // line 570
        if (twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "isField", [0 => "tag"], "method", false, false, false, 570)) {
            // line 571
            echo "                        ";
            echo twig_call_macro($macros["fields"], "macro_dropdownYesNo", ["tag", (($__internal_compile_48 = twig_get_attribute($this->env, $this->source,             // line 573
($context["item"] ?? null), "fields", [], "any", false, false, false, 573)) && is_array($__internal_compile_48) || $__internal_compile_48 instanceof ArrayAccess ? ($__internal_compile_48["tag"] ?? null) : null), __("Tag"),             // line 575
($context["field_options"] ?? null)], 571, $context, $this->getSourceContext());
            // line 576
            echo "
                     ";
        }
        // line 578
        echo "                     
                     ";
        // line 579
        if (twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "isField", [0 => "comment"], "method", false, false, false, 579)) {
            // line 580
            echo "                        ";
            echo twig_call_macro($macros["fields"], "macro_textareaField", ["comment", (($__internal_compile_49 = twig_get_attribute($this->env, $this->source,             // line 582
($context["item"] ?? null), "fields", [], "any", false, false, false, 582)) && is_array($__internal_compile_49) || $__internal_compile_49 instanceof ArrayAccess ? ($__internal_compile_49["comment"] ?? null) : null), _n("Comment", "Comments", Session::getPluralNumber()),             // line 584
($context["field_options"] ?? null)], 580, $context, $this->getSourceContext());
            // line 585
            echo "
                     ";
        }
        // line 587
        echo "
                     ";
        // line 588
        if (twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "isField", [0 => "ram"], "method", false, false, false, 588)) {
            // line 589
            echo "                        ";
            echo twig_call_macro($macros["fields"], "macro_numberField", ["ram", (($__internal_compile_50 = twig_get_attribute($this->env, $this->source,             // line 591
($context["item"] ?? null), "fields", [], "any", false, false, false, 591)) && is_array($__internal_compile_50) || $__internal_compile_50 instanceof ArrayAccess ? ($__internal_compile_50["ram"] ?? null) : null), twig_sprintf(__("%1\$s (%2\$s)"), _n("Memory", "Memories", 1), __("Mio")),             // line 593
($context["field_options"] ?? null)], 589, $context, $this->getSourceContext());
            // line 594
            echo "
                     ";
        }
        // line 596
        echo "
                     ";
        // line 597
        if (twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "isField", [0 => "alarm_threshold"], "method", false, false, false, 597)) {
            // line 598
            echo "                        ";
            ob_start();
            // line 599
            echo "                           ";
            $this->extensions['Glpi\Application\View\Extension\PhpExtension']->call("Dropdown::showNumber", [0 => "alarm_threshold", 1 => twig_array_merge(["value" => (($__internal_compile_51 = twig_get_attribute($this->env, $this->source,             // line 600
($context["item"] ?? null), "fields", [], "any", false, false, false, 600)) && is_array($__internal_compile_51) || $__internal_compile_51 instanceof ArrayAccess ? ($__internal_compile_51["alarm_threshold"] ?? null) : null), "rand" =>             // line 601
($context["rand"] ?? null), "width" => "100%", "min" => 0, "max" => 100, "step" => 1, "toadd" => ["-1" => __("Never")]],             // line 607
($context["params"] ?? null))]);
            // line 608
            echo "                        ";
            $context["dd_alarm_treshold"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
            // line 609
            echo "                        ";
            ob_start();
            // line 610
            echo "                           <span class=\"text-muted\">
                              ";
            // line 611
            $this->extensions['Glpi\Application\View\Extension\PhpExtension']->call("Alert::displayLastAlert", [0 => ($context["item_type"] ?? null), 1 => (($__internal_compile_52 = twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "fields", [], "any", false, false, false, 611)) && is_array($__internal_compile_52) || $__internal_compile_52 instanceof ArrayAccess ? ($__internal_compile_52["id"] ?? null) : null)]);
            // line 612
            echo "                           </span>
                        ";
            $context["last_alert_html"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
            // line 614
            echo "                        ";
            echo twig_call_macro($macros["fields"], "macro_htmlField", ["alarm_threshold",             // line 616
($context["dd_alarm_treshold"] ?? null), __("Alert threshold"), twig_array_merge(            // line 618
($context["field_options"] ?? null), ["add_field_html" =>             // line 619
($context["last_alert_html"] ?? null)])], 614, $context, $this->getSourceContext());
            // line 621
            echo "
                     ";
        }
        // line 623
        echo "
                     ";
        // line 624
        if (twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "isField", [0 => "brand"], "method", false, false, false, 624)) {
            // line 625
            echo "                        ";
            echo twig_call_macro($macros["fields"], "macro_textField", ["brand", (($__internal_compile_53 = twig_get_attribute($this->env, $this->source,             // line 627
($context["item"] ?? null), "fields", [], "any", false, false, false, 627)) && is_array($__internal_compile_53) || $__internal_compile_53 instanceof ArrayAccess ? ($__internal_compile_53["brand"] ?? null) : null), __("Brand"),             // line 629
($context["field_options"] ?? null)], 625, $context, $this->getSourceContext());
            // line 630
            echo "
                     ";
        }
        // line 632
        echo "
                     ";
        // line 633
        if (twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "isField", [0 => "begin_date"], "method", false, false, false, 633)) {
            // line 634
            echo "                        ";
            echo twig_call_macro($macros["fields"], "macro_dateField", ["begin_date", (($__internal_compile_54 = twig_get_attribute($this->env, $this->source,             // line 636
($context["item"] ?? null), "fields", [], "any", false, false, false, 636)) && is_array($__internal_compile_54) || $__internal_compile_54 instanceof ArrayAccess ? ($__internal_compile_54["begin_date"] ?? null) : null), __("Start date"),             // line 638
($context["field_options"] ?? null)], 634, $context, $this->getSourceContext());
            // line 639
            echo "
                     ";
        }
        // line 641
        echo "
                     ";
        // line 642
        if (twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "isField", [0 => "autoupdatesystems_id"], "method", false, false, false, 642)) {
            // line 643
            echo "                        ";
            echo twig_call_macro($macros["fields"], "macro_dropdownField", ["AutoUpdateSystem", "autoupdatesystems_id", (($__internal_compile_55 = twig_get_attribute($this->env, $this->source,             // line 646
($context["item"] ?? null), "fields", [], "any", false, false, false, 646)) && is_array($__internal_compile_55) || $__internal_compile_55 instanceof ArrayAccess ? ($__internal_compile_55["autoupdatesystems_id"] ?? null) : null), $this->extensions['Glpi\Application\View\Extension\ItemtypeExtension']->getItemtypeName("AutoUpdateSystem"),             // line 648
($context["field_options"] ?? null)], 643, $context, $this->getSourceContext());
            // line 649
            echo "
                     ";
        }
        // line 651
        echo "
                     ";
        // line 652
        if (twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "isField", [0 => "pictures"], "method", false, false, false, 652)) {
            // line 653
            echo "                        ";
            echo twig_call_macro($macros["fields"], "macro_fileField", ["pictures", null, _n("Picture", "Pictures", Session::getPluralNumber()), ["onlyimages" => true, "multiple" => true]], 653, $context, $this->getSourceContext());
            // line 656
            echo "
                     ";
        }
        // line 658
        echo "
                     ";
        // line 659
        if (twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "isField", [0 => "is_active"], "method", false, false, false, 659)) {
            // line 660
            echo "                        ";
            echo twig_call_macro($macros["fields"], "macro_dropdownYesNo", ["is_active", (($__internal_compile_56 = twig_get_attribute($this->env, $this->source,             // line 662
($context["item"] ?? null), "fields", [], "any", false, false, false, 662)) && is_array($__internal_compile_56) || $__internal_compile_56 instanceof ArrayAccess ? ($__internal_compile_56["is_active"] ?? null) : null), __("Active"),             // line 664
($context["field_options"] ?? null)], 660, $context, $this->getSourceContext());
            // line 665
            echo "
                     ";
        }
        // line 667
        echo "
                     ";
        // line 669
        echo "                     ";
        if (((twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "isField", [0 => "last_boot"], "method", false, false, false, 669) && twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "isField", [0 => "is_dynamic"], "method", false, false, false, 669)) && (($__internal_compile_57 = twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "fields", [], "any", false, false, false, 669)) && is_array($__internal_compile_57) || $__internal_compile_57 instanceof ArrayAccess ? ($__internal_compile_57["is_dynamic"] ?? null) : null))) {
            // line 670
            echo "                        ";
            echo twig_call_macro($macros["fields"], "macro_htmlField", ["last_boot", $this->extensions['Glpi\Application\View\Extension\DataHelpersExtension']->getFormattedDatetime((($__internal_compile_58 = twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "fields", [], "any", false, false, false, 670)) && is_array($__internal_compile_58) || $__internal_compile_58 instanceof ArrayAccess ? ($__internal_compile_58["last_boot"] ?? null) : null), true), __("Last boot date")], 670, $context, $this->getSourceContext());
            echo "
                     ";
        }
        // line 672
        echo "
                     ";
        // line 673
        $this->displayBlock('more_fields', $context, $blocks);
        // line 675
        echo "                  ";
    }

    // line 673
    public function block_more_fields($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 674
        echo "                     ";
    }

    public function getTemplateName()
    {
        return "generic_show_form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1151 => 674,  1147 => 673,  1143 => 675,  1141 => 673,  1138 => 672,  1132 => 670,  1129 => 669,  1126 => 667,  1122 => 665,  1120 => 664,  1119 => 662,  1117 => 660,  1115 => 659,  1112 => 658,  1108 => 656,  1105 => 653,  1103 => 652,  1100 => 651,  1096 => 649,  1094 => 648,  1093 => 646,  1091 => 643,  1089 => 642,  1086 => 641,  1082 => 639,  1080 => 638,  1079 => 636,  1077 => 634,  1075 => 633,  1072 => 632,  1068 => 630,  1066 => 629,  1065 => 627,  1063 => 625,  1061 => 624,  1058 => 623,  1054 => 621,  1052 => 619,  1051 => 618,  1050 => 616,  1048 => 614,  1044 => 612,  1042 => 611,  1039 => 610,  1036 => 609,  1033 => 608,  1031 => 607,  1030 => 601,  1029 => 600,  1027 => 599,  1024 => 598,  1022 => 597,  1019 => 596,  1015 => 594,  1013 => 593,  1012 => 591,  1010 => 589,  1008 => 588,  1005 => 587,  1001 => 585,  999 => 584,  998 => 582,  996 => 580,  994 => 579,  991 => 578,  987 => 576,  985 => 575,  984 => 573,  982 => 571,  980 => 570,  977 => 569,  973 => 567,  971 => 566,  970 => 565,  969 => 563,  967 => 561,  965 => 560,  962 => 559,  958 => 557,  956 => 556,  955 => 554,  953 => 552,  951 => 551,  948 => 550,  944 => 548,  942 => 545,  941 => 544,  940 => 542,  938 => 539,  936 => 538,  933 => 537,  929 => 535,  927 => 534,  926 => 532,  924 => 529,  922 => 528,  919 => 527,  915 => 525,  913 => 521,  912 => 519,  910 => 517,  908 => 516,  905 => 515,  901 => 513,  899 => 511,  897 => 509,  894 => 508,  892 => 505,  891 => 504,  890 => 503,  889 => 502,  887 => 501,  884 => 500,  881 => 499,  878 => 498,  875 => 497,  872 => 496,  869 => 495,  866 => 494,  863 => 493,  860 => 492,  857 => 491,  854 => 490,  851 => 489,  848 => 488,  846 => 487,  843 => 486,  839 => 484,  837 => 481,  836 => 480,  835 => 478,  833 => 475,  831 => 474,  828 => 473,  824 => 471,  822 => 470,  821 => 468,  819 => 465,  817 => 464,  814 => 463,  808 => 461,  806 => 460,  803 => 459,  799 => 457,  797 => 456,  796 => 455,  795 => 453,  793 => 451,  791 => 450,  788 => 449,  784 => 447,  782 => 446,  781 => 444,  779 => 442,  777 => 441,  775 => 440,  771 => 438,  767 => 436,  765 => 435,  764 => 433,  762 => 431,  760 => 430,  757 => 429,  753 => 427,  751 => 426,  750 => 424,  748 => 422,  746 => 421,  744 => 420,  741 => 419,  737 => 417,  735 => 416,  734 => 414,  733 => 413,  732 => 412,  730 => 411,  727 => 410,  724 => 409,  722 => 408,  719 => 407,  715 => 405,  713 => 402,  712 => 401,  711 => 399,  709 => 396,  707 => 395,  704 => 394,  700 => 392,  698 => 391,  697 => 390,  696 => 389,  694 => 386,  692 => 385,  689 => 384,  685 => 382,  683 => 379,  682 => 378,  681 => 376,  679 => 373,  677 => 372,  674 => 371,  670 => 369,  668 => 368,  667 => 366,  665 => 364,  663 => 363,  660 => 362,  657 => 361,  652 => 359,  650 => 356,  645 => 354,  643 => 351,  641 => 350,  637 => 349,  636 => 348,  634 => 345,  631 => 344,  629 => 343,  626 => 342,  622 => 340,  620 => 339,  619 => 338,  618 => 336,  616 => 334,  614 => 333,  611 => 332,  607 => 330,  605 => 329,  604 => 328,  603 => 326,  601 => 324,  599 => 323,  596 => 322,  592 => 320,  590 => 319,  589 => 318,  588 => 316,  586 => 314,  583 => 313,  580 => 311,  576 => 309,  574 => 308,  573 => 307,  572 => 305,  570 => 303,  568 => 302,  565 => 301,  561 => 299,  559 => 298,  558 => 297,  557 => 295,  555 => 293,  553 => 292,  550 => 291,  544 => 289,  542 => 288,  539 => 287,  535 => 285,  533 => 284,  532 => 283,  531 => 281,  529 => 279,  527 => 278,  524 => 277,  520 => 275,  518 => 274,  517 => 273,  516 => 271,  514 => 269,  512 => 268,  509 => 267,  505 => 265,  503 => 264,  502 => 263,  501 => 261,  499 => 259,  497 => 258,  494 => 257,  490 => 255,  488 => 254,  487 => 253,  486 => 251,  484 => 249,  482 => 248,  479 => 247,  475 => 245,  473 => 244,  472 => 243,  471 => 241,  469 => 239,  467 => 238,  464 => 237,  460 => 235,  458 => 234,  457 => 233,  456 => 231,  454 => 229,  452 => 228,  449 => 227,  445 => 225,  443 => 224,  442 => 223,  441 => 221,  439 => 219,  437 => 218,  434 => 217,  430 => 215,  428 => 214,  427 => 213,  426 => 212,  425 => 211,  423 => 209,  421 => 208,  418 => 207,  414 => 205,  412 => 203,  411 => 202,  410 => 200,  408 => 197,  406 => 196,  403 => 195,  399 => 193,  397 => 192,  396 => 191,  395 => 190,  394 => 189,  393 => 188,  391 => 187,  388 => 186,  385 => 185,  383 => 184,  380 => 183,  374 => 181,  372 => 180,  369 => 179,  365 => 177,  363 => 176,  362 => 171,  360 => 169,  358 => 168,  355 => 167,  351 => 165,  349 => 163,  348 => 162,  347 => 160,  345 => 157,  343 => 156,  340 => 155,  337 => 154,  334 => 153,  330 => 151,  328 => 149,  327 => 147,  324 => 146,  320 => 144,  311 => 142,  307 => 141,  304 => 140,  301 => 139,  298 => 138,  296 => 137,  293 => 136,  289 => 134,  287 => 133,  286 => 131,  284 => 129,  282 => 128,  280 => 127,  277 => 126,  273 => 124,  271 => 122,  270 => 121,  269 => 119,  268 => 118,  267 => 117,  265 => 116,  262 => 115,  260 => 114,  257 => 113,  253 => 111,  251 => 109,  250 => 108,  249 => 107,  248 => 105,  246 => 102,  243 => 101,  241 => 100,  238 => 99,  235 => 98,  232 => 97,  228 => 95,  225 => 93,  222 => 92,  220 => 91,  217 => 90,  213 => 88,  211 => 87,  210 => 84,  208 => 82,  206 => 81,  203 => 80,  199 => 78,  197 => 77,  196 => 76,  195 => 74,  193 => 72,  191 => 71,  188 => 70,  184 => 68,  182 => 67,  181 => 66,  180 => 65,  179 => 64,  177 => 62,  174 => 61,  170 => 60,  165 => 702,  159 => 699,  156 => 698,  154 => 697,  151 => 696,  145 => 694,  143 => 693,  138 => 692,  132 => 690,  130 => 689,  127 => 688,  125 => 687,  118 => 683,  114 => 681,  112 => 680,  109 => 679,  107 => 678,  105 => 677,  103 => 676,  101 => 60,  94 => 56,  90 => 54,  88 => 52,  86 => 51,  83 => 50,  80 => 49,  77 => 48,  74 => 47,  71 => 46,  69 => 45,  64 => 43,  60 => 42,  57 => 41,  53 => 39,  51 => 38,  49 => 37,  47 => 36,  44 => 35,  42 => 34,  39 => 33,);
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

{% set no_header = no_header|default(not item.isNewItem() and not _get._in_modal|default(false)) %}
{% set bg = '' %}
{% if item.isDeleted() %}
   {% set bg = 'asset-deleted' %}
{% endif %}

<div class=\"asset {{ bg }}\">
   {{ include('components/form/header.html.twig', {'in_twig': true}) }}

   {% set rand = random() %}
   {% set params  = params ?? [] %}
   {% set target       = params['target'] ?? item.getFormURL() %}
   {% set withtemplate = params['withtemplate'] ?? '' %}
   {% set item_type = item.getType() %}
   {% set item_has_pictures = item.hasItemtypeOrModelPictures() %}
   {% set field_options = {
       'locked_fields': item.getLockedFields(),
   } %}

   <div class=\"card-body d-flex flex-wrap\">
      <div class=\"col-12 col-xxl-{{ item_has_pictures ? '9' : '12' }} flex-column\">
         <div class=\"d-flex flex-row flex-wrap flex-xl-nowrap\">
            <div class=\"row flex-row align-items-start flex-grow-1\">
               <div class=\"row flex-row\">
                  {% block form_fields %}
                     {% if item.isField('name') %}
                        {{ fields.autoNameField(
                           'name',
                           item,
                           (item_type == 'Contact' ? __('Surname') : __('Name')),
                           withtemplate,
                           field_options
                        ) }}
                     {% endif %}

                     {% if item.isField('firstname') %}
                        {{ fields.autoNameField(
                           'firstname',
                           item,
                           __('First name'),
                           withtemplate,
                           field_options
                        ) }}
                     {% endif %}

                     {% if item.isField('template_name') and withtemplate == 1 and no_header %}
                        {{ fields.autoNameField(
                           'template_name',
                           item,
                           __('Template name'),
                           0,
                           field_options
                        ) }}
                     {% endif %}

                     {% if item.isField('is_active') %}
                        {% if withtemplate is not empty or withtemplate == 1 %}
                           {{ fields.hiddenField('is_active', item.fields['is_active'], __('Is active'), {
                              'add_field_html': __('No')
                           }) }}
                        {% else %}
                        {% endif %}
                     {% endif %}

                     {% if item.isField('states_id') %}
                        {% set condition = item.getType() in config('state_types') ? {('is_visible_' ~ item.getType()|lower): 1} : {} %}
                        {{ fields.dropdownField(
                           'State',
                           'states_id',
                           item.fields['states_id'],
                           __('Status'),
                           field_options|merge({
                              'entity': item.fields['entities_id'],
                              'condition': condition
                           })
                        ) }}
                     {% endif %}

                     {% set fk = item.getForeignKeyField() %}
                     {% if item.isField(fk) and item_type != 'Software' %}
                        {{ fields.dropdownField(
                           item_type,
                           fk,
                           item.fields[fk],
                           __('As child of'),
                           field_options|merge({
                              'entity': item.fields['entities_id'],
                           })
                        ) }}
                     {% endif %}

                     {% if item_type != 'SoftwareLicense' and item.isField('is_helpdesk_visible') %}
                        {# TODO Drop unused 'is_helpdesk_visible' field in SoftwareLicense schema? #}
                        {{ fields.checkboxField(
                           'is_helpdesk_visible',
                           item.fields['is_helpdesk_visible'],
                           __('Associable to a ticket'),
                           field_options
                        ) }}
                     {% endif %}

                     {% set dc_breadcrumbs = item is usingtrait('Glpi\\\\Features\\\\DCBreadcrumb') ? item.getDcBreadcrumb() : [] %}
                     {% if dc_breadcrumbs|length > 0 %}
                        {% set dc_breadcrumbs %}
                           <ol class=\"breadcrumb breadcrumb-arrows\" aria-label=\"breadcrumbs\">
                              {% for dc_item in dc_breadcrumbs|reverse %}
                                 <li class=\"breadcrumb-item text-nowrap\">{{ dc_item|raw }}</li>
                              {% endfor %}
                           </ol>
                        {% endset %}

                        {{ fields.htmlField(
                           '',
                           dc_breadcrumbs,
                           __('Data center position'),
                        ) }}

                        {{ fields.nullField() }} {# set an empty space in front of dc breadcrumb #}
                     {% endif %}

                     {% if item.isField('locations_id') %}
                        {{ fields.dropdownField(
                           'Location',
                           'locations_id',
                           item.fields['locations_id'],
                           'Location'|itemtype_name,
                           field_options|merge({
                              'entity': item.fields['entities_id'],
                           })
                        ) }}
                     {% endif %}

                     {% if item_type == 'Unmanaged' and item.isField('item_type') %}
                        {{ fields.dropdownArrayField(
                            'item_type',
                            item.fields['itemtype'],
                            _n('Type', 'Types', 1),
                            [
                                'Computer', 'NetworkEquipment', 'Printer', 'Peripheral', 'Phone'
                            ],
                            field_options
                        ) }}
                     {% endif %}

                     {% if item.isField('date_domaincreation') %}
                        {{ fields.datetimeField('date_domaincreation', item.fields['date_domaincreation'], __('Registration date')) }}
                     {% endif %}

                     {% set type_itemtype = item.getTypeClass() %}
                     {% set type_fk = item.getTypeForeignKeyField() %}
                     {% if item.isField(type_fk) %}
                        {{ fields.dropdownField(
                           type_itemtype,
                           type_fk,
                           item.fields[type_fk],
                           type_itemtype|itemtype_name,
                           field_options
                        ) }}
                     {% endif %}

                     {% if item.isField('usertitles_id') %}
                        {{ fields.dropdownField(
                           'UserTitle',
                           'usertitles_id',
                           item.fields['usertitles_id'],
                           'UserTitle'|itemtype_name,
                           field_options|merge({
                              'entity': item.fields['entities_id'],
                           })
                        ) }}
                     {% endif %}

                     {% if item.isField('registration_number') %}
                        {{ fields.autoNameField(
                           'registration_number',
                           item,
                           (item_type starts with 'User' ? _x('user', 'Administrative number') : _x('infocom', 'Administrative number')),
                           withtemplate,
                           field_options
                        ) }}
                     {% endif %}

                     {% if item.isField('phone') %}
                        {{ fields.autoNameField(
                           'phone',
                           item,
                           'Phone'|itemtype_name,
                           withtemplate,
                           field_options
                        ) }}
                     {% endif %}

                     {% if item.isField('phone2') %}
                        {{ fields.autoNameField(
                           'phone2',
                           item,
                           __('Phone 2'),
                           withtemplate,
                           field_options
                        ) }}
                     {% endif %}

                     {% if item.isField('phonenumber') %}
                        {{ fields.autoNameField(
                           'phonenumber',
                           item,
                           'Phone'|itemtype_name,
                           withtemplate,
                           field_options
                        ) }}
                     {% endif %}

                     {% if item.isField('mobile') %}
                        {{ fields.autoNameField(
                           'mobile',
                           item,
                           __('Mobile phone'),
                           withtemplate,
                           field_options
                        ) }}
                     {% endif %}

                     {% if item.isField('fax') %}
                        {{ fields.autoNameField(
                           'fax',
                           item,
                           __('Fax'),
                           withtemplate,
                           field_options
                        ) }}
                     {% endif %}

                     {% if item.isField('website') %}
                        {{ fields.autoNameField(
                           'website',
                           item,
                           __('Website'),
                           withtemplate,
                           field_options
                        ) }}
                     {% endif %}

                     {% if item.isField('email') %}
                        {{ fields.autoNameField(
                           'email',
                           item,
                           _n('Email', 'Emails', 1),
                           withtemplate,
                           field_options
                        ) }}
                     {% endif %}

                     {% if item.isField('address') %}
                        {{ fields.textareaField('address', item.fields['address'], __('Address')) }}
                     {% endif %}

                     {% if item.isField('postalcode') %}
                        {{ fields.autoNameField(
                           'postalcode',
                           item,
                           __('Postal code'),
                           withtemplate,
                           field_options
                        ) }}
                     {% endif %}

                     {% if item.isField('town') %}
                        {{ fields.autoNameField(
                           'town',
                           item,
                           __('City'),
                           withtemplate,
                           field_options
                        ) }}
                     {% endif %}

                     {# Post code field named differently for Suppliers. Placed after town to maintain field order from 9.5)#}
                     {% if item.isField('postcode') %}
                        {{ fields.autoNameField(
                           'postcode',
                           item,
                           __('Postal code'),
                           withtemplate,
                           field_options
                        ) }}
                     {% endif %}

                     {% if item_type == 'Supplier' or item_type == 'Contact' %}
                        {{ fields.autoNameField(
                           'state',
                           item,
                           _x('location', 'State'),
                           withtemplate,
                           field_options
                        ) }}
                     {% endif %}

                     {% if item.isField('country') %}
                        {{ fields.autoNameField(
                           'country',
                           item,
                           __('Country'),
                           withtemplate,
                           field_options
                        ) }}
                     {% endif %}

                     {% if item.isField('date_expiration') %}
                        {% if item_type == 'Certificate' %}
                           {{ fields.dateField('date_expiration', item.fields['date_expiration'], __('Expiration date'), {
                              'helper': __('Empty for infinite'),
                              'checkIsExpired': false,
                              'expiration_class' : params.expiration_class
                           }|merge(field_options)) }}
                        {% elseif item_type == 'ComputerAntivirus' %}
                           {{ fields.dateField('date_expiration', item.fields['date_expiration'], __('Expiration date'), {
                              'helper': __('Empty for infinite'),
                              'checkIsExpired': true,
                           }|merge(field_options)) }}
                        {% else %}
                           {{ fields.datetimeField('date_expiration', item.fields['date_expiration'], __('Expiration date'), {
                              'helper': __('Empty for infinite'),
                              'checkIsExpired': true
                           }|merge(field_options)) }}
                        {% endif %}
                     {% endif %}

                     {% if item.isField('ref') %}
                        {{ fields.textField(
                           'ref',
                           item.fields['ref'],
                           __('Reference'),
                           field_options
                        ) }}
                     {% endif %}

                     {% if item.isField('users_id_tech') %}
                        {{ fields.dropdownField(
                           'User',
                           'users_id_tech',
                           item.fields['users_id_tech'],
                           __('Technician in charge of the hardware'),
                           field_options|merge({
                              'entity': item.fields['entities_id'],
                              'right': 'own_ticket',
                           })
                        ) }}
                     {% endif %}

                     {% if item.isField('manufacturers_id') %}
                        {{ fields.dropdownField(
                           'Manufacturer',
                           'manufacturers_id',
                           item.fields['manufacturers_id'],
                           (item_type starts with 'Software' ? __('Publisher') : 'Manufacturer'|itemtype_name),
                           field_options
                        ) }}
                     {% endif %}

                     {% if item.isField('groups_id_tech') %}
                        {{ fields.dropdownField(
                           'Group',
                           'groups_id_tech',
                           item.fields['groups_id_tech'],
                           __('Group in charge of the hardware'),
                           field_options|merge({
                              'entity': item.fields['entities_id'],
                              'condition': {'is_assign': 1},
                           })
                        ) }}
                     {% endif %}

                     {% set model_itemtype = item.getModelClass() %}
                     {% set model_fk = item.getModelForeignKeyField() %}
                     {% if item.isField(model_fk) %}
                        {{ fields.dropdownField(
                           model_itemtype,
                           model_fk,
                           item.fields[model_fk],
                           _n('Model', 'Models', 1),
                           field_options
                        ) }}
                     {% endif %}

                     {% if item_type != 'SoftwareLicense' and item.isField('contact_num') %}
                        {# TODO Drop unused 'contact_num' field in Software License schema? #}
                        {{ fields.textField(
                           'contact_num',
                           item.fields['contact_num'],
                           __('Alternate username number'),
                           field_options
                        ) }}
                     {% endif %}

                     {% if item.isField('serial') %}
                        {{ fields.textField(
                           'serial',
                           item.fields['serial'],
                           __('Serial number'),
                           field_options
                        ) }}
                     {% endif %}
                                          

                     {% if item_type != 'SoftwareLicense' and item.isField('contact') %}
                        {# TODO Drop unused 'contact' field in Software License schema? #}
                        {{ fields.textField(
                           'contact',
                           item.fields['contact'],
                           __('Alternate username'),
                           field_options
                        ) }}
                     {% endif %}

                     {% if item.isField('otherserial') %}
                        {{ fields.autoNameField(
                           'otherserial',
                           item,
                           __('Inventory number'),
                           withtemplate,
                           field_options
                        ) }}
                     {% endif %}

                     {% if item.isField('sysdescr') %}
                        {{ fields.textareaField('sysdescr', item.fields['sysdescr'], __('Sysdescr')) }}
                     {% endif %}

                     {% if item.isField('snmpcredentials_id') %}
                        {{ fields.dropdownField(
                           'SNMPCredential',
                           'snmpcredentials_id',
                           item.fields['snmpcredentials_id'],
                           'SNMPCredential'|itemtype_name,
                           field_options
                        ) }}
                     {% endif %}

                     {% if item.isField('users_id') %}
                        {{ fields.dropdownField(
                           'User',
                           'users_id',
                           item.fields['users_id'],
                           'User'|itemtype_name,
                           field_options|merge({
                              'entity': item.fields['entities_id'],
                              'right': 'all',
                           })
                        ) }}
                     {% endif %}

                     {% if item.isField('is_global') %}
                        {% set management_restrict = 0 %}
                        {% if item_type == 'Monitor' %}
                           {% set management_restrict = config('monitors_management_restrict') %}
                        {% elseif item_type == 'Peripheral' %}
                           {% set management_restrict = config('peripherals_management_restrict') %}
                        {% elseif item_type == 'Phone' %}
                           {% set management_restrict = config('phones_management_restrict') %}
                        {% elseif item_type == 'Printer' %}
                           {% set management_restrict = config('printers_management_restrict') %}
                        {% else %}
                           {% set management_restrict = 0 %}
                        {% endif %}
                        {% set dd_globalswitch %}
                           {% do call('Dropdown::showGlobalSwitch', [item.fields['id'], {
                              'withtemplate': withtemplate,
                              'value': item.fields['is_global'],
                              'management_restrict': management_restrict,
                              'target': target,
                              'width': '100%',
                           }]) %}
                        {% endset %}
                        {{ fields.htmlField(
                           'is_global',
                           dd_globalswitch,
                           __('Management type'),
                        ) }}
                     {% endif %}

                     {% if item.isField('size') %}
                        {{ fields.numberField(
                           'size',
                           item.fields['size'],
                           __('Size'),
                           field_options|merge({
                              'min': 0,
                              'step': 0.01
                           }),
                        ) }}
                     {% endif %}

                     {% if item.isField('networks_id') %}
                        {{ fields.dropdownField(
                           'Network',
                           'networks_id',
                           item.fields['networks_id'],
                           _n('Network', 'Networks', 1),
                           field_options
                        ) }}
                     {% endif %}

                     {% if item.isField('groups_id') %}
                        {{ fields.dropdownField(
                           'Group',
                           'groups_id',
                           item.fields['groups_id'],
                           'Group'|itemtype_name,
                           field_options|merge({
                              'entity': item.fields['entities_id'],
                              'condition': {'is_itemgroup': 1},
                           })
                        ) }}
                     {% endif %}

                     {% if item.isField('uuid') %}
                        {{ fields.textField(
                           'uuid',
                           item.fields['uuid'],
                           __('UUID'),
                           field_options
                        ) }}
                     {% endif %}

                     {% if item.isField('version') %}
                        {{ fields.autoNameField(
                           'version',
                           item,
                           _n('Version', 'Versions', 1),
                           withtemplate,
                           field_options
                        ) }}
                     {% endif %}

                     {% if item.isField('tag') %}
                        {{ fields.dropdownYesNo(
                            'tag',
                            item.fields['tag'],
                            __('Tag'),
                            field_options
                        ) }}
                     {% endif %}
                     
                     {% if item.isField('comment') %}
                        {{ fields.textareaField(
                           'comment',
                           item.fields['comment'],
                           _n('Comment', 'Comments', get_plural_number()),
                           field_options
                        ) }}
                     {% endif %}

                     {% if item.isField('ram') %}
                        {{ fields.numberField(
                           'ram',
                           item.fields['ram'],
                           __('%1\$s (%2\$s)')|format(_n('Memory', 'Memories', 1), __('Mio')),
                           field_options
                        ) }}
                     {% endif %}

                     {% if item.isField('alarm_threshold') %}
                        {% set dd_alarm_treshold %}
                           {% do call('Dropdown::showNumber', ['alarm_threshold', {
                              'value': item.fields['alarm_threshold'],
                              'rand': rand,
                              'width': '100%',
                              'min': 0,
                              'max': 100,
                              'step': 1,
                              'toadd': {'-1': __('Never')}
                           }|merge(params)]) %}
                        {% endset %}
                        {% set last_alert_html %}
                           <span class=\"text-muted\">
                              {% do call('Alert::displayLastAlert', [item_type, item.fields['id']]) %}
                           </span>
                        {% endset %}
                        {{ fields.htmlField(
                           'alarm_threshold',
                           dd_alarm_treshold,
                           __('Alert threshold'),
                           field_options|merge({
                               add_field_html: last_alert_html
                            })
                        ) }}
                     {% endif %}

                     {% if item.isField('brand') %}
                        {{ fields.textField(
                           'brand',
                           item.fields['brand'],
                           __('Brand'),
                           field_options
                        ) }}
                     {% endif %}

                     {% if item.isField('begin_date') %}
                        {{ fields.dateField(
                            'begin_date',
                            item.fields['begin_date'],
                            __('Start date'),
                            field_options
                        ) }}
                     {% endif %}

                     {% if item.isField('autoupdatesystems_id') %}
                        {{ fields.dropdownField(
                           'AutoUpdateSystem',
                           'autoupdatesystems_id',
                           item.fields['autoupdatesystems_id'],
                           'AutoUpdateSystem'|itemtype_name,
                           field_options
                        ) }}
                     {% endif %}

                     {% if item.isField('pictures') %}
                        {{ fields.fileField('pictures', null, _n('Picture', 'Pictures', get_plural_number()), {
                           'onlyimages': true,
                           'multiple': true,
                        }) }}
                     {% endif %}

                     {% if item.isField('is_active') %}
                        {{ fields.dropdownYesNo(
                            'is_active',
                            item.fields['is_active'],
                            __('Active'),
                            field_options
                        ) }}
                     {% endif %}

                     {# display last_boot data only if item is dynamic and have field #}
                     {% if item.isField('last_boot') and item.isField('is_dynamic') and item.fields['is_dynamic'] %}
                        {{ fields.htmlField('last_boot', item.fields['last_boot']|formatted_datetime(true), __('Last boot date')) }}
                     {% endif %}

                     {% block more_fields %}
                     {% endblock %}
                  {% endblock %}
               </div> {# .row #}
            </div> {# .row #}
         </div> {# .flex-row #}
      </div>
      {% if item_has_pictures %}
         <div class=\"col-12 col-xxl-3 flex-column\">
            <div class=\"flex-row asset-pictures\">
               {{ include('components/form/pictures.html.twig', {'gallery_type': ''}) }}
            </div>
         </div>
      {% endif %}
   </div> {# .card-body #}

   {% if item_type == 'Contract' %}
      {{ include('components/form/support_hours.html.twig') }}
   {% endif %}
   {{ include('components/form/buttons.html.twig') }}
   {% if no_inventory_footer is not defined or no_inventory_footer == false %}
      {{ include('components/form/inventory_info.html.twig') }}
   {% endif %}

   {% if params['formfooter'] is null or params['formfooter'] == true %}
      <div class=\"card-footer mx-n2 mb-n2 mt-4\">
         {{ include('components/form/dates.html.twig') }}
      </div>
   {% endif %}
</div>
", "generic_show_form.html.twig", "C:\\xampp\\htdocs\\glpi_7_new\\templates\\generic_show_form.html.twig");
    }
}
