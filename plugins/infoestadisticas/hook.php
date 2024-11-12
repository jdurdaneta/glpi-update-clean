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

/**
 * Plugin install process
 *
 * @return boolean
 */
function plugin_infoestadisticas_install() {
  global $DB;

  $version   = plugin_version_infoestadisticas();
  $migration = new Migration($version['version']);

  $config = new Config();
  $config->setConfigurationValues('plugin:Infoestadisticas', ['configuration' => false]);

  // Creamos la tabla para guardar las búsquedas de los informes predeterminados
  if (!$DB->tableExists("glpi_plugin_infoestadisticas_savedsearches")) {
     $query = "CREATE TABLE `glpi_plugin_infoestadisticas_savedsearches` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
                `type` int(11) NOT NULL DEFAULT 0 COMMENT 'see SavedSearch:: constants',
                `itemtype` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
                `users_id` int(11) NOT NULL DEFAULT 0,
                `is_private` tinyint(1) NOT NULL DEFAULT 1,
                `entities_id` int(11) NOT NULL DEFAULT -1,
                `is_recursive` tinyint(1) NOT NULL DEFAULT 0,
                `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
                `query` text COLLATE utf8_unicode_ci DEFAULT NULL,
                `last_execution_time` int(11) DEFAULT NULL,
                `do_count` tinyint(1) NOT NULL DEFAULT 2 COMMENT 'Do or do not count results on list display see SavedSearch::COUNT_* constants',
                `last_execution_date` timestamp NULL DEFAULT NULL,
                `counter` int(11) NOT NULL DEFAULT 0,
                PRIMARY KEY (`id`),
                KEY `type` (`type`),
                KEY `itemtype` (`itemtype`),
                KEY `entities_id` (`entities_id`),
                KEY `users_id` (`users_id`),
                KEY `is_private` (`is_private`),
                KEY `is_recursive` (`is_recursive`),
                KEY `last_execution_time` (`last_execution_time`),
                KEY `last_execution_date` (`last_execution_date`),
                KEY `do_count` (`do_count`)
                ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";

     $DB->query($query) or die("error creating glpi_plugin_infoestadisticas_savedsearches ". $DB->error());
  }

  // Borramos todos los regitros que pudiera haber en la tabla
  $DB->queryOrDie("DELETE FROM `glpi_plugin_infoestadisticas_savedsearches` WHERE 1;", $DB->error());

  // Insertamos las búsquedas de informes predeterminados (son públicos, es decir: is_private=0)
  $query = "INSERT INTO `glpi_plugin_infoestadisticas_savedsearches`
            VALUES ('1','Incidencias abiertas último año','1','Ticket','1','0','0','1','front/ticket.php','is_deleted=0&as_map=0&criteria%5B0%5D%5Blink%5D=AND&criteria%5B0%5D%5Bfield%5D=15&criteria%5B0%5D%5Bsearchtype%5D=morethan&criteria%5B0%5D%5Bvalue%5D=-1YEAR&_select_criteria%5B0%5D%5Bvalue%5D=-1YEAR&search=Buscar&itemtype=Ticket',NULL,'2',NULL,'0'),
            ('2','Dispositivos activos','1','AllAssets','1','0','0','1','front/allassets.php','as_map=0&criteria%5B0%5D%5Blink%5D=AND&criteria%5B0%5D%5Bfield%5D=31&criteria%5B0%5D%5Bsearchtype%5D=contains&criteria%5B0%5D%5Bvalue%5D=Activo&search=Buscar&itemtype=AllAssets',NULL,'2',NULL,'0'),
            ('3','Computadores activos','1','Computer','1','0','0','1','front/computer.php','is_deleted=0&as_map=0&criteria%5B0%5D%5Blink%5D=AND&criteria%5B0%5D%5Bfield%5D=31&criteria%5B0%5D%5Bsearchtype%5D=contains&criteria%5B0%5D%5Bvalue%5D=Activo&search=Buscar&itemtype=Computer',NULL,'2',NULL,'0'),
            ('4','Monitores activos','1','Monitor','1','0','0','1','front/monitor.php','is_deleted=0&as_map=0&criteria%5B0%5D%5Blink%5D=AND&criteria%5B0%5D%5Bfield%5D=31&criteria%5B0%5D%5Bsearchtype%5D=contains&criteria%5B0%5D%5Bvalue%5D=Activo&search=Buscar&itemtype=Monitor',NULL,'2',NULL,'0'),
            ('5','Dispositivos de red activos','1','NetworkEquipment','1','0','0','1','front/networkequipment.php','is_deleted=0&as_map=0&criteria%5B0%5D%5Blink%5D=AND&criteria%5B0%5D%5Bfield%5D=31&criteria%5B0%5D%5Bsearchtype%5D=contains&criteria%5B0%5D%5Bvalue%5D=Activo&search=Buscar&itemtype=NetworkEquipment',NULL,'2',NULL,'0'),
            ('6','Periféricos activos','1','Peripheral','1','0','0','1','front/peripheral.php','is_deleted=0&as_map=0&criteria%5B0%5D%5Blink%5D=AND&criteria%5B0%5D%5Bfield%5D=31&criteria%5B0%5D%5Bsearchtype%5D=contains&criteria%5B0%5D%5Bvalue%5D=Activo&search=Buscar&itemtype=Peripheral',NULL,'2',NULL,'0'),
            ('7','Dispositivos activos','1','Printer','1','0','0','1','front/printer.php','is_deleted=0&as_map=0&criteria%5B0%5D%5Blink%5D=AND&criteria%5B0%5D%5Bfield%5D=31&criteria%5B0%5D%5Bsearchtype%5D=contains&criteria%5B0%5D%5Bvalue%5D=Activo&search=Buscar&itemtype=Printer',NULL,'2',NULL,'0')";
  $DB->query($query) or die("error populate glpi_plugin_infoestadisticas_savedsearches". $DB->error());

  include_once ("../inc/profile.class.php");
  PluginInfoestadisticasProfile::createFirstAccess($_SESSION["glpiactiveprofile"]["id"]);

  return true;
}

/**
 * Plugin uninstall process
 *
 * @return boolean
 */
function plugin_infoestadisticas_uninstall() {
  global $DB;

  include_once ("../inc/profile.class.php");
  PluginInfoestadisticasProfile::uninstall();

  if ($DB->tableExists("glpi_plugin_infoestadisticas_savedsearches")) {
    // Eliminamos la tabla.
    $DB->queryOrDie("DROP TABLE IF EXISTS `glpi_plugin_infoestadisticas_savedsearches`;", $DB->error());
  }

   return true;
}
