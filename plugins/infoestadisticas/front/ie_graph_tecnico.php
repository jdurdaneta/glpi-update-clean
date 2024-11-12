<?php
/**
 * -------------------------------------------------------------------------
 * Infoestadisticas plugin for GLPI
 * -------------------------------------------------------------------------
 */

 include("../../../inc/includes.php");
 include("../../../inc/config.php");
 include("../helper.php");
 include("../inc/ie_ticketsTech.class.php");
 
 
 Session::checkLoginUser();
 
 Html::header(__("Informes y estadísticas", 'infoestadisticas'), '', 'tools', 'PluginInfoestadisticasCommon');
 
 $ticketsEntityClass = new PluginInfoestadisticasTicketsTech();
 $ticketsEntityClass->index();
 
 Html::footer();
 