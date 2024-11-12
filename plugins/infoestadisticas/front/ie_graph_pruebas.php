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

  echo json_encode($_POST);

  global $DB;

  if(!empty($_POST))
  {
  	$data_ini =  $_POST["date1"];
  	$data_fin = $_POST["date2"];
    // echo "1";
  } else {
  	$data_ini = date('Y-m-d', strtotime('-1 year'));
  	$data_fin = date("Y-m-d");
    // echo "2";
  }

  // echo json_encode($_SESSION)."</br>";

?>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<?php

  $cleantarget = preg_replace("/[&]date[12]=[0-9-]*/", "", $_SERVER['QUERY_STRING']);
  $cleantarget = preg_replace("/[&]*id=([0-9]+[&]{0,1})/", "", $cleantarget);
  $cleantarget = preg_replace("/&/", "&amp;", $cleantarget);

  $title   = __('PRUEBAS', 'infoestadisticas');
  $parent  = 0;

  $target = preg_replace("/&/", "&amp;", $_SERVER["REQUEST_URI"]);

  echo '<table class="tab_cadre_fixe">';
  echo '<tbody>';
  echo '<tr>';
  echo '<th colspan="2" class="">'.$title.'</th>';
  echo '</tr>';
  echo '<tr class="tab_bg_1">';
  echo '<td class="center">';

  echo "<form method='post' name='form' action='$target'><div class='center'>";
  echo "<table class='tab_cadre'>";
  echo "<tr class='tab_bg_2'><td class='right'>".__('Start date')."</td><td>";
  Html::showDateField("date1", ['value' => $data_ini]);
  echo "</td><td rowspan='2' class='center'>";
  // echo "<input type='hidden' name='itemtype' value=\"".$_GET['itemtype']."\">";
  echo "<input type='submit' class='submit' value=\"".__s('Display report')."\"></td></tr>";
  echo "<tr class='tab_bg_2'><td class='right'>".__('End date')."</td><td>";
  Html::showDateField("date2", ['value' => $data_fin]);
  echo "</td></tr>";
  echo "</table></div>";
  // form using GET method : CRSF not needed
  Html::closeForm();

  echo '</td>';
  echo '</tr>';
  echo '</tbody>';
  echo '</table>';



?>

<figure class="highcharts-figure">
  <!-- ie_grafbar_cat_mes.inc.php -->
  <div id="graf1" class="col-md-12 col-sm-12" style="margin-top: 25px; margin-left: -5px;">
  	<?php  include ("graphs/inc/ie_grafbar_cat_mes.inc.php"); ?>
  </div>
</figure>

<figure class="highcharts-figure">
  
  <div id="graf2" class="col-md-6 col-sm-6" >
  	<?php
    if(!empty($_POST)&&$_POST["sel_tec"]!="0")
    {
      include ("graphs/inc/grafpie_stat_tec.inc.php");
    }
      ?>
  </div>
</figure>

<figure class="highcharts-figure">
  <div id="graf_tipo" class="col-md-6 col-sm-6">
    <?php
    if(!empty($_POST)&&$_POST["sel_tec"]!="0")
    {
      include ("graphs/inc/grafpie_tipo_tec.inc.php");
    }
      ?>
  </div>
</figure>

<figure class="highcharts-figure">
  <div id="graf4" class="col-md-12 col-sm-12">
    <?php
    if(!empty($_POST)&&$_POST["sel_tec"]!="0")
    {
      include ("graphs/inc/grafcat_tec.inc.php");
    }
      ?>
  </div>
</figure>

<figure class="highcharts-figure">
  <div id="graf_time" class="col-md-6 col-sm-6">
    <?php
    if(!empty($_POST)&&$_POST["sel_tec"]!="0")
    {
      include ("graphs/inc/grafbar_age_tecnico.inc.php");
    }
      ?>
  </div>
</figure>

<figure class="highcharts-figure">
  <div id="graf_prio" class="col-md-6 col-sm-6">
    <?php
    if(!empty($_POST)&&$_POST["sel_tec"]!="0")
    {
      include ("graphs/inc/grafpie_prio_tecnico.inc.php");
    }
      ?>
  </div>
</figure>

<figure class="highcharts-figure">
<div id="graf_time1" class="col-md-6 col-sm-6" style="height: 450px; margin-top:30px; margin-bottom:0px; margin-left: 0px;">
  <?php
  if(!empty($_POST)&&$_POST["sel_tec"]!="0")
  {
    include ("graphs/inc/grafpie_time_tecnico.inc.php");
  }
    ?>
</div>
</figure>

<figure class="highcharts-figure">
  <div id="graf_source" class="col-md-6 col-sm-6" style="height: 450px; margin-top:30px; margin-bottom:0px; margin-left: 0px;">

    <?php
    if(!empty($_POST)&&$_POST["sel_tec"]!="0")
    {
      include ("graphs/inc/grafpie_origem_tecnico.inc.php");
    }
      ?>
  </div>
</figure>

<figure class="highcharts-figure">
  <div id="graf_sat" class="col-md-12 col-sm-12" style="height: 450px; margin-top:30px !important; margin-bottom:30px; margin-left: 0px;">
    <?php
    if(!empty($_POST)&&$_POST["sel_tec"]!="0")
    {
      include ("graphs/inc/grafcol_sat_tec.inc.php");
    }
      ?>
  </div>
</figure>

<figure class="highcharts-figure">
  <div id="container"></div>
  <p class="highcharts-description">
    Los gráficos circulares son muy populares para mostrar una descripción general compacta de una composición o comparación. Si bien pueden ser más difíciles de leer que los gráficos de columnas, siguen siendo una opción popular para conjuntos de datos pequeños.
  </p>
</figure>


<script>
Highcharts.chart('container', {
  chart: {
      plotBackgroundColor: null,
      plotBorderWidth: null,
      plotShadow: false,
      type: 'pie'
  },
  title: {
      text: __('Incidencias por técnico.', 'infoestadisticas')
  },
  tooltip: {
      pointFormat: '<b>{point.percentage:.1f}%</b>'
  },
  accessibility: {
      point: {
          valueSuffix: '%'
      }
  },
  plotOptions: {
      pie: {
          allowPointSelect: true,
          cursor: 'pointer',
          dataLabels: {
              enabled: true,
              format: '<b>{point.name}</b>: {point.percentage:.1f} %'
          }
      }
  },
  series: [{
      colorByPoint: true,
      data: [{
          name: 'Chrome',
          y: 61.41
      }, {
          name: 'Internet Explorer',
          y: 11.84
      }, {
          name: 'Firefox',
          y: 10.85
      }, {
          name: 'Edge',
          y: 4.67
      }, {
          name: 'Safari',
          y: 4.18
      }, {
          name: 'Sogou Explorer',
          y: 1.64
      }, {
          name: 'Opera',
          y: 1.6
      }, {
          name: 'QQ',
          y: 1.2
      }, {
          name: 'Other',
          y: 2.61
      }]
  }]
});
</script>


<?php
// $common->showGraph($_REQUEST);

Html::footer();
?>
