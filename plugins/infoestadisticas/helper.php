<?php
function dropdown(string $name, array $options, $selected = null): string
{
  $dropdown = '<select class="select-dropdow select-dropdown-entities" style="width:270px; height:40px;" name="' . $name . '" id="' . $name . '">' . "\n";
  if($selected == null){
    
    $dropdown .= '<option value="">'.__('Seleccionar', 'infoestadisticas').'</option>'."\n";
  }
  foreach ($options as $key => $option) {
    $select = $selected == $key ? 'selected' : null;

    $dropdown .= '<option value="' . $key . '"' . $select . '>' . $option . '</option>' . "\n";
  }
  $dropdown .= '</select>' . "\n";

  return $dropdown;
}

/**
 * Comprueba si las fechas seleccionadas no esta vacía y "fecha desde" sea menor a "fecha hasta"
 * @param  string $date1 fecha de inicio
 * @param  string $date1 fecha de fin
 * @return object devuelve success = true|false y mensaje en caso de error
 */
function checkDateFields(string $date1, string $date2):object {
  $resp = new stdClass;
  $resp->success = true;
  $resp->msg = "";
  
  if(empty($date1) || empty($date2)){
    $resp->success = false;
    $resp->msg = "Debe seleccionar ambas fechas";
    return $resp;
  }
  
  $dateTime1 = new DateTime($date1);
  $dateTime2 = new DateTime($date2);
  
  if($dateTime1 > $dateTime2){
    $resp->success = false;
    $resp->msg = "La fecha inicial no debe ser mayor a la fecha fin";
    return $resp;
  }  
  return $resp;
}


/**
 * Convierte los segundos a días, horas, minutos y segundos
 * @param  int $totalsec               Segundos que se quieren convertir
 * @return string           String con los días, horas, minutos y segundos
 */
function sectotime($totalsec) {
    $secperday = 86400;
    $secperhour = 3600;
    $secperminute = 60;
  
    $days = floor($totalsec / $secperday);
    $hours = floor(($totalsec % $secperday) / $secperhour);
    $minutes = floor( (($totalsec % $secperday) % $secperhour) / $secperminute );
    $seconds = round((($totalsec % $secperday) % $secperhour) % $secperminute);
  
    $totaltime="";
    if ($days!=0) {
      $totaltime.=$days."d ";
    }
    if ($hours!=0) {
      $totaltime.=$hours."h ";
    }
    if ($minutes!=0) {
      $totaltime.=$minutes."m ";
    }
    if ($seconds!=0) {
      $totaltime.=$seconds."s ";
    }
  
    return $totaltime;
  
  }