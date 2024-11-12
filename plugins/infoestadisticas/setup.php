<?php

/**
 * -------------------------------------------------------------------------
 * Infoestadisticas plugin for GLPI
 * Copyright (C) 2022 by the Infoestadisticas Development Team.
 * -------------------------------------------------------------------------
 *
 * MIT License
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 *
 * --------------------------------------------------------------------------
 */

use Glpi\Plugin\Hooks;

define('PLUGIN_INFOESTADISTICAS_VERSION', '3.0');
// Minimal GLPI version, inclusive
define('PLUGIN_INFOESTADISTICAS_MIN_GLPI', '9.5.0');
// Maximum GLPI version, exclusive
define('PLUGIN_INFOESTADISTICAS_MAX_GLPI', '10.0.20');

/**
 * Init hooks of the plugin.
 * REQUIRED
 *
 * @return void
 */
function plugin_init_infoestadisticas()
{
   global $PLUGIN_HOOKS, $CFG_GLPI;

   $PLUGIN_HOOKS['csrf_compliant']['infoestadisticas'] = true;

   $plugin = new Plugin();

   // Plugin::registerClass('PluginInfoestadisticasCommon', ['addtabon' => 'Config']);
   Plugin::registerClass('PluginInfoestadisticasProfile', ['addtabon' => ['Profile']]);

   /* Menu */
   if (Session::haveRight('plugin_infoestadisticas_estadisticas', READ) || Session::haveRight('plugin_infoestadisticas_informes', READ)) {
      $PLUGIN_HOOKS['menu_toadd']['infoestadisticas'] = ['tools' => 'PluginInfoestadisticasCommon'];
   }
   // $PLUGIN_HOOKS["menu_toadd"]['infoestadisticas'] = array('tools'  => 'PluginInfoestadisticasConfig');

   /* Config page */
   // if (Session::haveRight('config', READ)) {
   //    $PLUGIN_HOOKS['config_page']['infoestadisticas'] = 'front/config.php';
   // }

   if(Plugin::isPluginActive("infoestadisticas")){

      if (strpos($_SERVER['REQUEST_URI'] ?? '', "/infoestadisticas/front/ie_graph_incidencias.php") !== false) {
         // Add specific files to add to the header : javascript
         $PLUGIN_HOOKS['add_javascript']['infoestadisticas'] = [
            'js/ie_script.js',
         ];
   
         //Add specific files to add to the header : css
         $PLUGIN_HOOKS['add_css']['infoestadisticas'] = [
            'css/ie_style.css',
         ];
      }
      if (strpos($_SERVER['REQUEST_URI'] ?? '', "/infoestadisticas/front/ie_graph_tecnico.php") !== false) {
         // Add specific files to add to the header : javascript
         $PLUGIN_HOOKS['add_javascript']['infoestadisticas'] = [
            'js/ie_script.js',
         ];
   
         //Add specific files to add to the header : css
         $PLUGIN_HOOKS['add_css']['infoestadisticas'] = [
            'css/ie_style.css',
         ];
      }

      if (strpos($_SERVER['REQUEST_URI'] ?? '', "/infoestadisticas/front/ie_graph_usergroup.php") !== false) {
         // Add specific files to add to the header : javascript
         $PLUGIN_HOOKS['add_javascript']['infoestadisticas'] = [
            'js/ie_script.js',
         ];
   
         //Add specific files to add to the header : css
         $PLUGIN_HOOKS['add_css']['infoestadisticas'] = [
            'css/ie_style.css',
         ];
      }
   }
}


/**
 * Get the name and the version of the plugin
 * REQUIRED
 *
 * @return array
 */
function plugin_version_infoestadisticas()
{
   return [
      'name'           => __('Informes y estadísticas', 'infoestadisticas'),
      'version'        => PLUGIN_INFOESTADISTICAS_VERSION,
      'author'         => 'Infoestadisticas team',
      'license'        => '',
      'homepage'       => '',
      'requirements'   => [
         'glpi' => [
            'min' => PLUGIN_INFOESTADISTICAS_MIN_GLPI,
            'max' => PLUGIN_INFOESTADISTICAS_MAX_GLPI,
         ]
      ]
   ];
}

/**
 * Check pre-requisites before install
 * OPTIONNAL, but recommanded
 *
 * @return boolean
 */
function plugin_infoestadisticas_check_prerequisites()
{

   return true;
}


/**
 * Check configuration process
 *
 * @param boolean $verbose Whether to display message on failure. Defaults to false
 *
 * @return boolean
 */
function plugin_infoestadisticas_check_config($verbose = false)
{
   if (true) { // Your configuration check
      return true;
   }

   if ($verbose) {
      echo __('Instalado, pero no configurado', 'infoestadisticas');
   }
   return false;
}
