<?php
/**
 * -------------------------------------------------------------------------
 * Infoestadisticas plugin for GLPI
 * -------------------------------------------------------------------------
 */

if (!isset($_REQUEST['submit']) && !isset($_REQUEST['reset'])) {
   $USEDBREPLICATE = 1;
}
$DBCONNECTION_REQUIRED  = 0; // Not really a big SQL request

include ("../../../inc/includes.php");

Session::checkLoginUser();

Html::header(__("Informes y estadísticas", 'infoestadisticas'), '', 'tools', 'PluginInfoestadisticasCommon');

$common = new PluginInfoestadisticasCommon();

echo "Esta es la página que muestra los informes.";
// $common->showGraph($_REQUEST);

Html::footer();
