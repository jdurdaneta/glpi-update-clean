<?php

/**
 * -------------------------------------------------------------------------
 * Infoestadisticas plugin for GLPI
 * -------------------------------------------------------------------------
 */

class PluginInfoestadisticasCommon extends CommonDBTM
{

  // static $rightname = 'plugin_infoestadisticas_use';

  /**
   * Returns the type name with consideration of plural
   *
   * @param number $nb Number of item(s)
   * @return string Itemtype name
   */
  public static function getTypeName($nb = 0)
  {
    return __("Informes y estadísticas", 'infoestadisticas');
  }

  public static function canCreate()
  {
    return false;
  }

  /**
   * @see CommonGLPI::getMenuName()
   **/
  static function getMenuName()
  {
    return __('Informes y estadísticas', 'infoestadisticas');
  }

  /**
   * @see CommonGLPI::getAdditionalMenuLinks()
   **/
  // static function getAdditionalMenuLinks() {
  //    global $CFG_GLPI;
  //    $links = [];
  //
  //    $links['config'] = '/plugins/infoestadisticas/config.php';
  //    $links["<img  src='".$CFG_GLPI["root_doc"]."/pics/menu_showall.png' title='".__s('Show all')."' alt='".__s('Show all')."'>"] = '/plugins/infoestadisticas/config.php';
  //    $links[__s('Test link', 'infoestadisticas')] = '/plugins/infoestadisticas/config.php';
  //
  //    return $links;
  // }


  static function getMenuContent()
  {
    global $CFG_GLPI;

    $web_rel_dir   = Plugin::getWebDir('infoestadisticas', false);
    $url_central   = "/$web_rel_dir/front/central.php";

    $menu = parent::getMenuContent() !== false ? parent::getMenuContent() : [];

    $menu['title'] = self::getMenuName();
    $menu['page'] = $url_central;
    $menu['icon'] = self::getIcon();

    $menu['config'] = '/plugins/infoestadisticas/front/config.php';

    return $menu;
  }

  static function getIcon()
  {
    return 'fab fa-wpforms';
  }

  /**
   * showCentral carga los apartados con los enlaces a las estadísticas e informes
   * @param  [type] $params               [description]
   * @return [type]         [description]
   */

  function showCentral($params)
  {

    echo "<table class='tab_cadre_fixe'>";
    echo '<tbody>';

    if ($params["classname"] == "PluginInfoestadisticasEstadisticas" || $params["classname"] == "PluginInfoestadisticasTodo") {

      echo '<tr class="tab_bg_1">';
      echo '<th colspan="4" class="">' . __('Incidencias', 'infoestadisticas') . '</th>';
      echo '</tr>';
      echo '<tr class="tab_bg_1" valign="top">';
      echo '<td>
                  <a href="ie_graph_incidencias.php">
                  <img src="../pics/chart-pie.png">&nbsp;' . __('Estadísticas de incidencias por entidad', 'infoestadisticas') . '
                  </a>
                  </td>';
      echo '<td>
                  <a href="ie_graph_tecnico.php">
                  <img src="../pics/chart-pie.png">&nbsp;' . __('Estadísticas de incidencias por técnico', 'infoestadisticas') . '
                  </a>
                  </td>';
      echo '<td>
                  <a href="ie_graph_usergroup.php">
                  <img src="../pics/chart-pie.png">&nbsp;' . __('Estadísticas de incidencias por grupo', 'infoestadisticas') . '
                  </a>
            </td>';
      echo '</tr>';

      // echo '<tr class="tab_bg_1">';
      //   echo '<th colspan="4" class="">'.__('Préstamos', 'infoestadisticas').'</th>';
      // echo '</tr>';
      // echo '<tr class="tab_bg_1" valign="top">';
      //   echo '<td>
      //         <a href="ie_graph_prestamos.php">
      //         <img src="../pics/chart-pie.png">&nbsp;'.__('Estadísticas de préstamos de material', 'infoestadisticas').'
      //         </a>
      //         </td>';
      //   echo '<td>
      //         &nbsp;
      //         </td>';
      // echo '</tr>';

      // echo '<tr class="tab_bg_1">';
      //   echo '<th colspan="4" class="">'.__('Reservas Salas', 'infoestadisticas').'</th>';
      // echo '</tr>';
      // echo '<tr class="tab_bg_1" valign="top">';
      //   echo '<td>
      //         <a href="ie_graph_reservas.php">
      //         <img src="../pics/chart-pie.png">&nbsp;'.__('Estadísticas de reserva de salas', 'infoestadisticas').'
      //         </a>
      //         </td>';
      //   echo '<td>
      //         &nbsp;
      //         </td>';
      // echo '</tr>';

    }

    if ($params["classname"] == "PluginInfoestadisticasInformes" || $params["classname"] == "PluginInfoestadisticasTodo") {

      echo '<tr class="tab_bg_1">';
      echo '<th colspan="4" class="">' . __('Incidencias', 'infoestadisticas') . '</th>';
      echo '</tr>';
      echo '<tr class="tab_bg_1" valign="top">';
      echo '<td>
                  <a href="../front/ie_savedsearch.php?action=load&id=1">
                  <img src="../pics/report_icon3_24.png">&nbsp;' . __('Informe de incidencias', 'infoestadisticas') . '
                  </a>
                  </td>';
      echo '<td>
                  &nbsp;
                  </td>';
      echo '</tr>';

      echo '<tr class="tab_bg_1">';
      echo '<th colspan="4" class="">' . __('Inventario', 'infoestadisticas') . '</th>';
      echo '</tr>';

      echo '<tr class="tab_bg_1" valign="top">';
      echo '<td>
                  <a href="../front/ie_savedsearch.php?action=load&id=2">
                  <img src="../pics/report_icon3_24.png">&nbsp;' . __('Informe Global de inventario', 'infoestadisticas') . '
                  </a>
                  </td>';
      echo '<td>
                  <a href="../front/ie_savedsearch.php?action=load&id=3">
                  <img src="../pics/report_icon3_24.png">&nbsp;' . __('Inventario de Computadores', 'infoestadisticas') . '
                  </a>
                  </td>';
      echo '</tr>';
      echo '<tr class="tab_bg_1" valign="top">';
      echo '<td>
                  <a href="../front/ie_savedsearch.php?action=load&id=4">
                  <img src="../pics/report_icon3_24.png">&nbsp;' . __('Inventario de Monitores', 'infoestadisticas') . '
                  </a>
                  </td>';
      echo '<td>
                  <a href="../front/ie_savedsearch.php?action=load&id=5">
                  <img src="../pics/report_icon3_24.png">&nbsp;' . __('Inventario de Dispositivos de red', 'infoestadisticas') . '
                  </a>
                  </td>';
      echo '</tr>';
      echo '<tr class="tab_bg_1" valign="top">';
      echo '<td>
                  <a href="../front/ie_savedsearch.php?action=load&id=6">
                  <img src="../pics/report_icon3_24.png">&nbsp;' . __('Inventario de Periféricos', 'infoestadisticas') . '
                  </a>
                  </td>';
      echo '<td>
                  <a href="../front/ie_savedsearch.php?action=load&id=7">
                  <img src="../pics/report_icon3_24.png">&nbsp;' . __('Inventario de Impresoras', 'infoestadisticas') . '
                  </a>
                  </td>';

      echo '</tr>';

      // echo '<tr class="tab_bg_1">';
      //   echo '<th colspan="4" class="">'.__('Reserva de Salas', 'infoestadisticas').'</th>';
      // echo '</tr>';
      // echo '<tr class="tab_bg_1" valign="top">';
      //   echo '<td>
      //         <a href="report.php">
      //         <img src="../pics/report_icon3_24.png">&nbsp;'.__('Informe de reserva de salas', 'infoestadisticas').'
      //         </a>
      //         </td>';
      //   echo '<td
      //         >&nbsp;
      //         </td>';
      // echo '</tr>';
      //
      // echo '<tr class="tab_bg_1">';
      //   echo '<th colspan="4" class="">'.__('Préstamos de material', 'infoestadisticas').'</th>';
      // echo '</tr>';
      // echo '<tr class="tab_bg_1" valign="top">';
      //   echo '<td>
      //         <a href="report.php">
      //         <img src="../pics/report_icon3_24.png">&nbsp;'.__('Informe de préstamos de material', 'infoestadisticas').'
      //         </a>
      //         </td>';
      //   echo '<td>
      //         &nbsp;
      //         </td>';
      // echo '</tr>';

      echo '<tr class="tab_bg_1">';
      echo '<td colspan="4" class=""></td>';
      echo '</tr>';

      $nota = 'Los informes que se muestran son predeterminados, se pueden personalizar las búsquedas usando filtros. Más información <a href="../docs/Filtrado_busquedas_GLPI-Infomes-1.0.0.pdf" target="_blank" style="font-size:12px;">aquí</a>.';
      echo '<tr class="tab_bg_1">';
      echo '<td colspan="4" class="warning" style="cursor:default">' . $nota . '</td>';
      echo '</tr>';
    }

    echo '</tbody>';
    echo "</table>";
  }
}
