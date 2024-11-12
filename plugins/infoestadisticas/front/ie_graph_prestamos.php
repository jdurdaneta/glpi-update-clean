<?php
  /**
   * -------------------------------------------------------------------------
   * Infoestadisticas plugin for GLPI
   * -------------------------------------------------------------------------
   */

  include ("../../../inc/includes.php");
  include ("../../../inc/config.php");

  Session::checkLoginUser();

  Html::header(__("Informes y estadísticas", 'infoestadisticas'), '', 'tools', 'PluginInfoestadisticasCommon');

  $common = new PluginInfoestadisticasCommon();

  echo "Esta es la página que muestra las estadísticas de los préstamos de material.";

Html::footer();
?>
