<?php

/**
 * -------------------------------------------------------------------------
 * Infoestadisticas plugin for GLPI
 * -------------------------------------------------------------------------
 */


// Entry menu case
include ("../../../inc/includes.php");

// Session::checkRight("config", UPDATE);

// Check if plugin is activated...
$plugin = new Plugin();
if (!$plugin->isInstalled('infoestadisticas') || !$plugin->isActivated('infoestadisticas')) {
   Html::displayNotFoundError();
} else {
  Html::header(__("Informes y estadísticas", 'infoestadisticas'), $_SERVER['PHP_SELF'], 'config', 'PluginInfoestadisticasCommon');
  // Html::header(__("Reports and stats", 'infoestadisticas'), '', 'tools', 'plugins');
  echo __("Esta es la página de configuración para el plugin infoestadisticas (Informes y estadísticas)", 'infoestadisticas');
}

// To be available when plugin is not activated
// Plugin::load('infoestadisticas');

Html::footer();
