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

include ("../../../inc/includes.php");

Session::checkLoginUser();
Html::header(__("Informes y estadísticas", 'infoestadisticas'), '', 'tools', 'PluginInfoestadisticasCommon');

/*** Regular Tab ***/
$tabs = [];
if (Session::haveRight('plugin_infoestadisticas_estadisticas', READ)) {
  $tabs["PluginInfoestadisticasEstadisticas"]=['title'=>__("Estadísticas", 'infoestadisticas'),
                     'url'=>Plugin::getWebDir('infoestadisticas')."/ajax/common.tabs.php",
                     'params'=>"target=".$_SERVER['PHP_SELF']."&classname=PluginInfoestadisticasEstadisticas"];
}

if (Session::haveRight('plugin_infoestadisticas_informes', READ)) {
  $tabs["PluginInfoestadisticasInformes"]=['title'=>__("Informes", 'infoestadisticas'),
                    'url'=>Plugin::getWebDir('infoestadisticas')."/ajax/common.tabs.php",
                    'params'=>"target=".$_SERVER['PHP_SELF']."&classname=PluginInfoestadisticasInformes"];
}

if (Session::haveRight('plugin_infoestadisticas_estadisticas', READ) && Session::haveRight('plugin_infoestadisticas_informes', READ)) {
  $tabs["PluginInfoestadisticasTodo"]=['title'=>__("Todos", 'infoestadisticas'),
                     'url'=>Plugin::getWebDir('infoestadisticas')."/ajax/common.tabs.php",
                     'params'=>"target=".$_SERVER['PHP_SELF']."&classname=PluginInfoestadisticasTodo"];
}


Ajax::createTabs('tabspanel', 'tabcontent', $tabs, 'PluginInfoestadisticasCommon');

Html::footer();
