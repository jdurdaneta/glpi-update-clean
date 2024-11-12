<?php
/**
 * -------------------------------------------------------------------------
 * Infoestadisticas plugin for GLPI
 * -------------------------------------------------------------------------
 */

 include("../../../inc/includes.php");
 include("../../../inc/config.php");
 include("../helper.php");
 include("../inc/ie_ticketsUserGroup.class.php");
 
 
 Session::checkLoginUser();
 
 Html::header(__("Informes y estadísticas", 'infoestadisticas'), '', 'tools', 'PluginInfoestadisticasCommon');
 
 $ticketsEntityClass = new PluginInfoestadisticasTicketsUserGroup();
 $ticketsEntityClass->index();
 
 Html::footer();