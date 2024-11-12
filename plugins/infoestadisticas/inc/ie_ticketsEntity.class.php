<?php

/**
 * -------------------------------------------------------------------------
 * Infoestadisticas plugin for GLPI
 * -------------------------------------------------------------------------
 * Clase que tiene como función operar como un controlador
 * 
 */
include("../inc/ie_ticketsEntityModel.class.php");

final class PluginInfoestadisticasTicketsEntity
{

    final public function index(): void
    {
        // Obtener el ID de la entidad activa donde se encuentra el usuario
        $current_entity_id = isset($_SESSION['glpiactive_entity']) ? $_SESSION['glpiactive_entity'] : null;
        $current_entity_recursive = $_SESSION['glpiactive_entity_recursive'];

        // llamar a las clases a utilizar
        $ticketsEntityModel = new PluginInfoestadisticasTicketsEntityModel($current_entity_id, $current_entity_recursive);

        // Obtención de fecha para los campos del filtro de busqueda
        if (!empty($_GET)) {
            $date_ini =  $_GET["date1"];
            $date_fin = $_GET["date2"];
            $entity_id = $_GET["sel_entity"] ? $_GET["sel_entity"] : $current_entity_id;
            // $current_entity_recursive = $_GET["sel_entity"] ? 0 : $current_entity_recursive;
            $show_SubEntities = (isset($_GET["check_recursive"]) && $_GET["check_recursive"] == "on") ? true : false;
        } else {
            $date_ini = date('Y-m-d', strtotime('-1 year'));
            $date_fin = date("Y-m-d");
            $entity_id = $current_entity_id;
            $show_SubEntities = $current_entity_recursive == 1 ? true : false;
        }

        // Construir Cebecera de página y formulario
        $titlepage = __('Incidencias por entidad', 'infoestadisticas');

        // Action del formulario
        $target = preg_replace("/&/", "&amp;", $_SERVER["REQUEST_URI"]);

        // Listados de las entidades para el Select según la entidad activa
        $options = $ticketsEntityModel->getEntityList();

        // Si la entidad selccionada en el dropdown tiene subentidades
        $childs_entity_num = count($ticketsEntityModel->getEntityList($entity_id));
        $show_SubEntities = ($show_SubEntities && $childs_entity_num > 1) ? true : false;

        // Desactivar Checkbox si no tiene subentidades
        $checkDisabled = '';
        if ($childs_entity_num <= 1) {
            $checkDisabled = 'Disabled';
           
        } 

        // Name del campo select
        $optionName = 'sel_entity';

        // Obtener Nombre de entidad número de incidencias
        $entity_name = $ticketsEntityModel->getEntityName($entity_id);

        if ($show_SubEntities) {
            $total_incis = array_sum($ticketsEntityModel->getEntityAndEntitiesChildTickets($date_ini, $date_fin, $entity_id));
            if ($total_incis < 1) {
                // Mensaje si el usurio no tiene incidencias
                $msg_err = __('No existen incidencias para la entidad: <i>' . $entity_name . '</i>');
                // LLAMAR LA VISTA, EL ARCHIVO QUE CONTIENE EL HTML 
                require_once('../front/ie_ticketsentityView.php');
                return;
            }

            // INCIDENCIAS POR CATEGORÍA DE ENTIDAD Y SUBENTIDADES
            $ticktesEntities = $ticketsEntityModel->getEntityAndEntitiesChildTickets($date_ini, $date_fin, $entity_id);
            $nums_tickets_arr = array_values($ticktesEntities);
            $total_tikets = array_sum($nums_tickets_arr);
            // Crear los datos necesarios para las gráficas highchart 
            $title_mainEntity = __('Incidencias de las entidades de ' . $entity_name, 'infoestadisticas');
            $subtitle_mainEntity = __('Total: ' . $total_tikets, 'infoestadisticas');
            $jsonDataGraphEntities = $this->createSerieData($title_mainEntity, $subtitle_mainEntity, $ticktesEntities);

            // DATOS DE INCIDENCIA POR CATEGORÍA DE ENTIDAD Y SUBENTIDADES
            $ticktes_cat = $ticketsEntityModel->getEntitiesTicketsByCat($date_ini, $date_fin, $entity_id);

            // DATOS DE INCIDENCIA POR ESTADO Y CATEGORÍA DE ENTIDAD Y SUBENTIDADES
            $ticktes_status_cat = $ticketsEntityModel->getEntitiesTicketsStatusCat($date_ini, $date_fin, $entity_id);

            // DATOS DE INCIDENCIA POR POR DE ENTIDAD Y SUBENTIDADES
            $ticketMoth = $ticketsEntityModel->getEntitiesTicketsOpenCloseMonthly($date_ini, $date_fin, $entity_id);

            // DATOS DE INCIDENCIA CERRRADAS POR MES DE ENTIDAD Y SUBENTIDADES
            $ticketClose = $ticketsEntityModel->getEntitiesTicketsCloseOpenByMonthy($date_ini, $date_fin, $entity_id);

            // DATOS DE INCIDENCIA POR GRUPOS DE USUARIOS DE ENTIDAD Y SUBENTIDADES
            $ticketGroup = $ticketsEntityModel->getEntitiesTicketsCatByGroup($date_ini, $date_fin, $entity_id);

            // DATOS DE TIEMPO DE RESPUESTA DE INCIDENCIA POR CATEGORÍA DE ENTIDAD Y SUBENTIDADES
            $tickets_timeResp = $ticketsEntityModel->getEntitiesTicketsTimeResp($date_ini, $date_fin, $entity_id);

            // DATOS DE TIEMPO DE RESPUESTA DE INCIDENCIA POR CATEGORÍA DE ENTIDAD Y SUBENTIDADES
            $tickets_timeSolve = $ticketsEntityModel->getEntitiesTicketsSolveTime($date_ini, $date_fin, $entity_id);
        } else {
            $total_incis = $ticketsEntityModel->getNumsEntityTickets($date_ini, $date_fin, $entity_id);

            if ($total_incis < 1) {
                // Mensaje si el usurio no tiene incidencias
                $msg_err = __('No existen incidencias para la entidad: <i>' . $entity_name . '</i>');
                // LLAMAR LA VISTA, EL ARCHIVO QUE CONTIENE EL HTML 
                require_once('../front/ie_ticketsentityView.php');
                return;
            }

            // DATOS DE INCIDENCIA POR CATEGORÍA DE UNA ENTIDAD
            $ticktes_cat = $ticketsEntityModel->getEntityTicketsByCat($date_ini, $date_fin, $entity_id);

            // DATOS DE INCIDENCIA POR ESTADO Y CATEGORÍA DE UNA ENTIDAD
            $ticktes_status_cat = $ticketsEntityModel->getEntityTicketsStatusCat($date_ini, $date_fin, $entity_id);

            // DATOS DE INCIDENCIA POR POR DE UNA ENTIDAD
            $ticketMoth = $ticketsEntityModel->getEntityTicketsOpenCloseMonthly($date_ini, $date_fin, $entity_id);

            // DATOS DE INCIDENCIA CERRRADAS POR MES DE UNA ENTIDAD
            $ticketClose = $ticketsEntityModel->getEntityTicketsCloseOpenByMonthy($date_ini, $date_fin, $entity_id);

            // DATOS DE INCIDENCIA POR GRUPOS DE USUARIOS DE UNA ENTIDAD
            $ticketGroup = $ticketsEntityModel->getEntityTicketsCatGroup($date_ini, $date_fin, $entity_id);

            // DATOS DE TIEMPO DE RESPUESTA DE INCIDENCIA POR CATEGORÍA DE UNA ENTIDAD
            $tickets_timeResp = $ticketsEntityModel->getEntityTicketsTimeResp($date_ini, $date_fin, $entity_id);

            // DATOS DE TIEMPO DE SOLUCIÓN DE INCIDENCIA POR CATEGORÍA DE UNA ENTIDAD
            $tickets_timeSolve = $ticketsEntityModel->getEntityTicketsSolveTime($date_ini, $date_fin, $entity_id);
        }

        // INCIDENCIAS POR CATEGORÍA CREAR DATOS PARA LA GRÁFICA
        $nums_ticketsCat = array_values($ticktes_cat);
        $total_tiketsCat = array_sum($nums_ticketsCat);
        $titulo_cat = __('Incidencias de ' . $entity_name . ' por categoría', 'infoestadisticas');
        $subtitulo_cat = __('Total: ' . $total_tiketsCat, 'infoestadisticas');
        $jsonDataGraphCat = $this->createSerieData($titulo_cat, $subtitulo_cat, $ticktes_cat);

        // INCIDENCIAS POR ESTADO Y CATAGORÍA CREAR DATOS PARA LA GRÁFICA 
        $dataTable_status = $ticktes_status_cat['main'];
        $nums_status = array_values($dataTable_status);
        $total_status = array_sum($nums_status);
        $titulo_status = __('Estado de incidencias de ' . $entity_name, 'infoestadisticas');
        $subtitulo_status = __('Total: ' . $total_status, 'infoestadisticas');
        $statSerieDataDrill = $this->createSerieDataDrilldown($titulo_status, $subtitulo_status, $ticktes_status_cat);

        // INCIDENCIAS POR MES CREAR DATOS PARA LA GRÁFICA
        $dataTable_tiketsMonth = $ticketMoth['main'];
        $nums_ticketsMonth = array_values($dataTable_tiketsMonth);
        $total_tiketsMonth = array_sum($nums_ticketsMonth);
        $titulo_month = __('Incidencias abiertas por mes de ' . $entity_name, 'infoestadisticas');
        $subtitle_mainEntityMonth = __('Total: ' . $total_tiketsMonth, 'infoestadisticas');
        $jsonDataTicketMonth = $this->createSerieDataDrilldown($titulo_month, $subtitle_mainEntityMonth, $ticketMoth);

        // INCIDENCIAS CERRADAS POR MES CREAR DATOS PARA LA GRÁFICA
        $dataTable_ticketClose = $ticketClose['main'];
        $nums_ticketClose = array_values($dataTable_ticketClose);
        $total_tiketsClose = array_sum($nums_ticketClose);
        $titulo_close = __('Incidencias cerradas por mes de' . $entity_name, 'infoestadisticas');
        $subtitle_tiketsClose = __('Total: ' . $total_tiketsClose, 'infoestadisticas');
        $jsonDataticketClose = $this->createSerieDataDrilldown($titulo_close, $subtitle_tiketsClose, $ticketClose);

        // INCIDENCIAS CERRADAS POR MES CREAR DATOS PARA LA GRÁFICA
        $titulo_close = __('Incidencias cerradas por mes ' . $entity_name, 'infoestadisticas');
        $hasTicketClose = (isset($ticketClose['main']) && !empty($ticketClose['main'])) ? true : false;
        if ($hasTicketClose) {
            $dataTable_ticketClose = $ticketClose['main'];
            $nums_ticketClose = array_values($dataTable_ticketClose);
            $total_tiketsClose = array_sum($nums_ticketClose);
            $subtitle_tiketsClose = __('Total: ' . $total_tiketsClose, 'infoestadisticas');
            $jsonDataticketClose = $this->createSerieDataDrilldown($titulo_close, $subtitle_tiketsClose, $ticketClose);
        } else {
            // Mensaje si la entidad no tiene incidencias Cerradas
            $msg_EntidadCerrada = __('Actualmente la entidad ' . $entity_name . ' no tiene incidencias cerradas en la fecha seleccionada');
        }

        // INCIDENCIAS POR GRUPOS CREAR DATOS PARA LA GRÁFICA
        $hastTicketGroup = !empty($ticketGroup['main']) ? true : false;
        $titulo_group = __('Número de incidencias asignadas a grupos de usuarios', 'infoestadisticas');
        $dataTable_ticketGroup =[];
        if($hastTicketGroup){
            $dataTable_ticketGroup = $ticketGroup['main'];
            arsort($dataTable_ticketGroup);
            $nums_ticketGroup_arr = array_values($dataTable_ticketGroup);
            $total_tiketsGroup = array_sum($nums_ticketGroup_arr);
            $subtitle_group = __('Total: ' . $total_tiketsGroup, 'infoestadisticas');
            $jsonDataGroupSerieData = $this->createSerieDataDrilldown($titulo_group, $subtitle_group, $ticketGroup);
        }else{
            $msg_EntidadGroup = __('Actualmente la entidad ' . $entity_name . ' no tiene incidencias asignadas a grupos de usuarios');
        }
        

        // TIEMPO MEDIO DE RESPUESTA DE LAS INCIDENCIAS CREAR DATOS PARA LA GRÁFICA CON PARAMETROS "X" y "Y"
        $titulo_respTime = __('Tiempo medio de respuesta de ' . $entity_name, 'infoestadisticas');

        $hasTicketResp = isset($tickets_timeResp) && !empty($tickets_timeResp) ? true : false;
        if ($hasTicketResp) {
            // TIEMPO MEDIO DE RESPUESTA DE LAS INCIDENCIAS CREAR DATOS PARA LA GRÁFICA CON PARAMETROS "X" y "Y"
            $datatable_timeResp = [];
            $mediaTimeresp = '';
            $data_resptime_xy = [];
            if (!empty($tickets_timeResp)) {
                foreach ($tickets_timeResp as $cat) {
                    $timeString = sectotime(round($cat['timeavg']));
                    $data_resptime_xy[] = [
                        'name' => $cat['nameCategory'],
                        'y' => intval($cat['timeavg']),
                        'x' => $timeString,
                        'category' => $cat['nameCategory'],
                    ];
                    $timeavg['time_average'][] = $cat['timeavg'];
                    $datatable_timeResp[$cat['nameCategory']] =  $timeString;
                }
                $mediaTimeresp = sectotime(round(array_sum($timeavg['time_average']) / count($timeavg['time_average'])));
            }

            $subtitle_respTime = __($mediaTimeresp, 'infoestadisticas');
            $jsonDataTimeRespData = $this->createSerieData_xy($titulo_respTime,  $subtitle_respTime, $data_resptime_xy);
        } else {
            $msg_ticketNotResp = __('Actualmente la entidad ' . $entity_name . ' no tiene incidencia con respuesta');
        }
        // TIEMPO MEDIO DE Resolucion DE LAS INCIDENCIAS CREAR DATOS PARA LA GRÁFICA CON PARAMETROS "X" y "Y"
        $titulo_solveTime = __('Tiempo medio de resolución de ' . $entity_name, 'infoestadisticas');
        $hasTicketSolve = isset($tickets_timeSolve) && !empty($tickets_timeSolve) ? true : false;
        if ($hasTicketSolve) {
            // TIEMPO MEDIO DE Resolucion DE LAS INCIDENCIAS CREAR DATOS PARA LA GRÁFICA CON PARAMETROS "X" y "Y"
            $datatable_timeSolve = [];
            $mediaresp = '';
            $data_solve_xy = [];
            if (!empty($tickets_timeSolve)) {
                foreach ($tickets_timeSolve as $cat) {
                    $timeString = sectotime(round($cat['timeavg']));
                    $data_solve_xy[] = [
                        'name' => $cat['nameCategory'],
                        'y' => intval($cat['timeavg']),
                        'x' => $timeString,
                    ];
                    $timeavg_solve['time_average'][] = $cat['timeavg'];
                    $datatable_timeSolve[$cat['nameCategory']] =  $timeString;
                }
                $mediaresp = sectotime(round(array_sum($timeavg_solve['time_average']) / count($timeavg_solve['time_average'])));
            }

            $subtitle_solvetime = __($mediaresp, 'infoestadisticas');
            $jsonDataSolveTimeData = $this->createSerieData_xy($titulo_solveTime,  $subtitle_solvetime, $data_solve_xy);
        } else {
            $msg_ticketNotSolve = __('Actualmente la entidad ' . $entity_name . ' no tiene incidencia Resueltas');
        }
        // LLAMAR LA VISTA, EL ARCHIVO QUE CONTIENE EL HTML 
        require_once('../front/ie_ticketsentityView.php');

        // INCLUIR LOS SCRIPT JS CON LOS DATOS NECESARIOS PARA MOSTRAR LAS GRÁFICAS
        if ($total_incis >= 1) {
            if ($show_SubEntities) {
                include("graphs/inc/ie_graph_pie_entities.inc.php");
            }
            include("graphs/inc/ie_graph_pie_bar_category.inc.php");
            include("graphs/inc/ie_graph_drilldown_status_cat.inc.php");
            include("graphs/inc/ie_graph_bar_moths.inc.php");
            if ($hasTicketClose) {
                include("graphs/inc/ie_graph_close_entity.inc.php");
            }
            if($hastTicketGroup){
                include("graphs/inc/ie_graph_bar_group_entity.inc.php");
            }
            if($hasTicketResp){
                include("graphs/inc/ie_graph_pie_resp_entity.inc.php");
            }
            if ($hasTicketSolve) {
                include("graphs/inc/ie_graph_pie_solve_time_entity.inc.php");
            }
        }
    }

    /**
     * Funcíon para crear data de la propiedad Serie de la gráfica highchart
     */
    public function createSerieData(string $title, string $subtitle, array $data): string
    {
        $highcartData = [];
        $serie = [];
        $categories = [];

        $highcartData['title'] = $title;
        $highcartData['subtitle'] = $subtitle;
        $highcartData['nameSerie'] = __('Incidencias', 'infoestadisticas');

        foreach ($data as $key => $value) {
            $serie[] = ['name' => $key, "y" => $value];
            $categories[] = $key;
        }

        $highcartData['serie'] = json_encode($serie);
        $highcartData['categories'] = json_encode($categories);

        // Convertir toda la data en un json para ser intrepetado en JS
        $jsonDataObject = $this->graphDataObjectJs($highcartData);
        return $jsonDataObject;
    }
    /**
     * Funcíon para crear data de la propiedad Serie de la gráfica highchart con propiedades "XY"
     */
    public function createSerieData_xy(string $title, string $subtitle, array $data)
    {
        $highcartData = [];
        $serie = [];
        $categories = [];

        $highcartData['title'] = $title;
        $highcartData['subtitle'] = $subtitle;
        $highcartData['nameSerie'] = __('Incidencias', 'infoestadisticas');

        $serie = array_map(
            fn ($item) => [
                'name' => $item['name'],
                'y'    => $item['y'],
                'x'    => $item['x'],
            ],
            $data
        );
        $highcartData['categories'] = json_encode($categories);
        $highcartData['serie'] = json_encode($serie);
        $jsonDataObject = $this->graphDataObjectJs($highcartData);
        return $jsonDataObject;
    }
    /**
     * Funcíon para crear data de la propiedad Drilldown de la gráfica highchart
     */
    public function createSerieDataDrilldown(string $title, string $subtitle, array $data): string
    {
        $highcartData = [];
        $serie = ['main' => [], 'drilldown' => []];
        $categories = [];

        $highcartData['title'] = $title;
        $highcartData['subtitle'] = $subtitle;
        $highcartData['nameSerie'] = __('Incidencias', 'infoestadisticas');

        // Estrucura para la gráfica principal 
        foreach ($data['main'] as $key => $value) {
            // $serie .= '{name: "' . $key . '",y: ' . $value . '},';
            $serie['main'][] = ['name' => $key, "y" => $value, "drilldown" => $key];
            $categories['main']['categories'][] = $key;
        }

        // Estrucura para la gráfica generada por DrillDown 
        foreach ($data['drilldown'] as $key => $value) {

            foreach ($value as $k => $v) {
                $dataDrill[$key][] = [$k, $v];
            }
            $serie['drilldown'][] = ['name' => $key, 'id' => $key, "data" => $dataDrill[$key]];
            $categories['drilldown']['categories'][] = $key;
        }

        $highcartData['serie'] = json_encode($serie);
        $highcartData['categories'] = json_encode($categories);

        // Convertir toda la data en un json para ser intrepetado en JS
        $jsonDataObject = $this->graphDataObjectJs($highcartData);
        return $jsonDataObject;
    }


    /**
     * Funcíon para crear json para JavaScript con datos necesarios para Highchart 
     */
    public function graphDataObjectJs(array $dataCreated): string
    {
        // Convertir propiedades específicas del array a objetos JavaScript
        $jsObject = new stdClass(); // Crear un objeto vacío

        foreach ($dataCreated as $key => $value) {
            if ($key === 'serie' || $key === 'categories') {
                $jsObject->$key = json_decode($value, true);
                // $jsObject->$key = $value;
            } else {
                $jsObject->$key = $value;
            }
        }
        // Convertir el resultado final a una cadena JSON
        $jsonResult = json_encode($jsObject);
        return $jsonResult;
    }
}