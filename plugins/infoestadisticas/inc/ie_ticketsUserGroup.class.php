<?php

/**
 * -------------------------------------------------------------------------
 * Infoestadisticas plugin for GLPI
 * -------------------------------------------------------------------------
 * Clase que tiene como función operar como un controlador de las incdencias por técnico
 * 
 */
include("../inc/ie_ticketsUserGroupModel.class.php");


final class PluginInfoestadisticasTicketsUserGroup
{

    final public function index(): void
    {
        // Obtener el ID de la entidad activa donde se encuentra el usuario
        $activeentities_string = isset($_SESSION['glpiactiveentities_string']) ? $_SESSION['glpiactiveentities_string'] : null;
        $current_entity_recursive = $_SESSION['glpiactive_entity_recursive'];
        $current_id_user = $_SESSION['glpiID'];
        $current_userName = $_SESSION['glpifriendlyname'];
        $current_user_groups = $_SESSION['glpigroups'];

        // llamar a las clases a utilizar
        $ticketsUserGroupModel = new PluginInfoestadisticasTicketsUserGroupModel();
        $userGroup_id = null;
        if (!empty($current_user_groups)) {
            $user_has_group = TRUE;
            $userGroup_ids = implode(',', $current_user_groups);
            $userGroup_id = $ticketsUserGroupModel->getIdGroupMaxTicket($userGroup_ids);
        }

        // Obtención de fecha para los campos del filtro de busqueda
        if (!empty($_GET)) {
            $date_ini =  $_GET["date1"];
            $date_fin = $_GET["date2"];
            $userGroup_id = $_GET["sel_userGroup"] ? $_GET["sel_userGroup"] : Null;
        } else {
            $date_ini = date('Y-m-d', strtotime('-1 year'));
            $date_fin = date("Y-m-d");
            // $userGroup_id = 40;
        }

        $userTicketType = 2; // Tipo de ticket asignada al usuario

        // Construir Cebecera de página y formulario
        $titlepage = __('Incidencias por Grupo', 'infoestadisticas');

        // Action del formulario
        $target = preg_replace("/&/", "&amp;", $_SERVER["REQUEST_URI"]);

        // Listados de los usuarios para el Select según la entidad activa
        $options = $ticketsUserGroupModel::getUserGroupList($activeentities_string);
        $select_value = $userGroup_id; // Para el Select

        // Name del campo select
        $optionName = 'sel_userGroup';

        // comprobar que se haya seleccionado las fechas de manera correcta
        $check_dates = checkDateFields($date_ini, $date_fin);
        if ($check_dates->success == false) {
            $msg_err = __($check_dates->msg);

            // LLAMAR LA VISTA, EL ARCHIVO QUE CONTIENE EL HTML 
            require_once('../front/ie_ticketsusergroupView.php');
            return;
        }

        if ($userGroup_id == null) {
            // Mensaje si el grupo no tiene incidencias
            $msg_err = __('Seleccione un grupo de usuario');
            // LLAMAR LA VISTA, EL ARCHIVO QUE CONTIENE EL HTML 
            require_once('../front/ie_ticketsusergroupView.php');
            return;
        }
        // Nombre de el usuario a consultar
        $userGruoupName =  $ticketsUserGroupModel->getUserGroupName($userGroup_id);

        // Verificar si un grupo tiene tickets
        $has_Ticket = $ticketsUserGroupModel->hasUserGroupTickets($date_ini, $date_fin, $userGroup_id, $userTicketType);

        if (!$has_Ticket) {
            // Mensaje si el grupo no tiene incidencias
            $msg_err = __('Este grupo no tiene incidencias en las fechas seleccionadas');
            // LLAMAR LA VISTA, EL ARCHIVO QUE CONTIENE EL HTML 
            require_once('../front/ie_ticketsusergroupView.php');
            return;
        }

        // Verificar si el Grupo tiene tickets resuertos
        $has_TicketSolve = $ticketsUserGroupModel->hasUserGroupTicketsSolve($date_ini, $date_fin, $userGroup_id, $userTicketType);

        // DATOS DE INCIDENCIAS POR CATEGORÍA
        $ticker_incis_category = $ticketsUserGroupModel::getUserGroupInciCategory($date_ini, $date_fin, $userGroup_id, $userTicketType);
        $titulo_cat = __('Incidencias por categoría asignadas a ' . $userGruoupName, 'infoestadisticas');
        $subtitulo_cat = __('Total: ' . array_sum($ticker_incis_category), 'infoestadisticas');
        $jsonDataGraphCat = $this->createSerieData($titulo_cat, $subtitulo_cat, $ticker_incis_category);


        // DATOS DE INCIDENCIA POR ESTADO Y CATEGORÍA
        $tickets_status_cat = $ticketsUserGroupModel->getUserGroupInciStateCat($date_ini, $date_fin, $userGroup_id, $userTicketType);
        $dataTable_status = $tickets_status_cat['main'];
        $nums_status = array_values($dataTable_status);
        $total_status = array_sum($nums_status);
        $titulo_status = __('Estado de incidencias asignadas a ' . $userGruoupName, 'infoestadisticas');
        $subtitulo_status = __('Total: ' . $total_status, 'infoestadisticas');
        $statSerieDataDrill = $this->createSerieDataDrilldown($titulo_status, $subtitulo_status, $tickets_status_cat);


        // INCIDENCIAS POR MES DE UN Grupo - CREAR DATOS PARA LA GRÁFICA
        $ticketMoth = $ticketsUserGroupModel->getUserGroupTicketsOpenCloseMonthly($date_ini, $date_fin, $userGroup_id, $userTicketType);
        $dataTable_tiketsMonth = $ticketMoth['main'];
        $nums_ticketsMonth = array_values($dataTable_tiketsMonth);
        $total_tiketsMonth = array_sum($nums_ticketsMonth);
        $titulo_month = __('Incidencias abiertas asignadas a ' . $userGruoupName . ' por mes', 'infoestadisticas');
        $subtitle_mainEntityMonth = __('Total: ' . $total_tiketsMonth, 'infoestadisticas');
        $jsonDataTicketMonth = $this->createSerieDataDrilldown($titulo_month, $subtitle_mainEntityMonth, $ticketMoth);


        // INCIDENCIAS CERRADAS POR MES CREAR DATOS PARA LA GRÁFICA
        $titulo_close = __('Incidencias cerradas asignadas a ' . $userGruoupName . ' por mes', 'infoestadisticas');
        $ticketCloseMonths = $ticketsUserGroupModel->getUserGroupTicketsCloseOpenMonthly($date_ini, $date_fin, $userGroup_id, $userTicketType);
        $hasTicketClose = (isset($ticketCloseMonths['main']) && !empty($ticketCloseMonths['main'])) ? TRUE : FALSE;
        if ($hasTicketClose) {
            $dataTable_ticketClose = $ticketCloseMonths['main'];
            $nums_ticketClose = array_values($dataTable_ticketClose);
            $total_tiketsClose = array_sum($nums_ticketClose);
            $subtitle_tiketsClose = __('Total: ' . $total_tiketsClose, 'infoestadisticas');
            $jsonDataticketClose = $this->createSerieDataDrilldown($titulo_close, $subtitle_tiketsClose, $ticketCloseMonths);
        } else {
            // Mensaje si el usuario no tiene incidencias Cerradas
            $msg_inciCerrada = __('Actualmente el grupo no tiene incidencias cerradas en la fecha seleccionada');
        }


        // DATOS DE ANTIGUEDAD DE INCIDENCIAS ABIERTAS
        $titulo_ticketAge = __('Antigüedad de incidencias abiertas asignadas a ' . $userGruoupName, 'infoestadisticas');
        $ticktesStatusOpen = ['Nuevo', 'En curso (asignada)', 'En curso (planificada)', 'En espera'];
        $hasTicketOpenStatus = !empty(array_intersect($ticktesStatusOpen, array_keys($dataTable_status)));
        if ($hasTicketOpenStatus) {
            $dataTicketAge = $this->dataAgeOfOpenTickets($ticketsUserGroupModel, $userGroup_id, $userTicketType);
            $dataTable_ticketAge = $dataTicketAge['main'];
            $total_ticketAge = array_sum($dataTable_ticketAge);
            $subtitulo_ticketAge = __('Total: ' . $total_ticketAge, 'infoestadisticas');
            $jsonDataTechAge = $this->createSerieDataDrilldown($titulo_ticketAge, $subtitulo_ticketAge, $dataTicketAge);
        } else {
            // Mensaje si el usuario no tiene  ANTIGUEDAD DE INCIDENCIAS ABIERTAS
            $msg_inciAntiguedad = __('Actualmente el grupo no tiene incidencias abiertas');
        }

        // DATOS DE INCIDENCIAS POR PRIORIDAD

        $dataTicketpriority = $ticketsUserGroupModel::getUserGroupPriority($date_ini, $date_fin, $userGroup_id, $userTicketType);
        $dataTable_ticketPriority = $dataTicketpriority['main'];
        $total_ticketPriority = array_sum($dataTable_ticketPriority);
        $titulo_ticketPriority = __('Incidencias por prioridad asignadas a ' . $userGruoupName, 'infoestadisticas');
        $subtitulo_ticketPriority = __('Total: ' . $total_ticketPriority, 'infoestadisticas');
        $jsonDataTicketPriority = $this->createSerieDataDrilldown($titulo_ticketPriority, $subtitulo_ticketPriority, $dataTicketpriority);



        $titulo_resolTime = __('Periodo de resolución de incidencias asignadas a ' . $userGruoupName, 'infoestadisticas');
        $titulo_hourWork = __('Horas trabajadas en incidencias resueltas asignadas a ' . $userGruoupName, 'infoestadisticas');
        if (!$has_TicketSolve) {
            $msg_inciNotSolve = __('Actualmente el grupo ' . $userGruoupName . ' no tiene incidencias resueltas');
        } else {

            // DATOS PERIODO DE RESOLUCION DE INCIDENCIAS
            $resolTime = $ticketsUserGroupModel::getUserGroupResolTime($date_ini, $date_fin, $userGroup_id, $userTicketType);
            $total_resolTime = array_sum($resolTime);
            $subtitulo_resolTime = __('Total: ' . $total_resolTime, 'infoestadisticas');
            $jsonDataTechResolTime = $this->createSerieData($titulo_resolTime, $subtitulo_resolTime, $resolTime);

            // DATOS HORAS TRABAJADAS EN LAS INCIDENCIAS
            $dataHourWork  = $ticketsUserGroupModel::getUserGroupHourWork($date_ini, $date_fin, $userGroup_id, $userTicketType);
            $datatable_hourWork = [];
            $totalHoras = 0;
            if (isset($dataHourWork['main']) && !empty($dataHourWork['main'])) {
                $datatable_hourWork = $dataHourWork['main'];
                arsort($datatable_hourWork);
                $totalHoras = array_sum($datatable_hourWork);

                foreach ($datatable_hourWork as $key => $value) {
                    $datatable_hourWork[$key] = $this->calcularHorasYMinutos($value);
                }
            }

            $totalHorasStr = $this->calcularHorasYMinutos($totalHoras);
            $subtitulo_hourWork = __('<small>(No se toma en cuenta el tiempo de espera)</small><br>Total: ' . $totalHorasStr, 'infoestadisticas');

            $jsonDataTechHourWork = $this->createSerieDataDrilldown($titulo_hourWork, $subtitulo_hourWork, $dataHourWork);
        }


        // LLAMAR LA VISTA, EL ARCHIVO QUE CONTIENE EL HTML 
        include('../front/ie_ticketsusergroupView.php');

        /*---------------------------------------
            BEGIN - INCLUIR LOS FICHEROS DE LAS GRÁFICAS
            ---------------------------------------*/

        if ($has_Ticket) {
            include('graphs/inc/ie_graph_pie_bar_category.inc.php');
            include('graphs/inc/ie_graph_drilldown_status_cat.inc.php');
            include("graphs/inc/ie_graph_bar_moths.inc.php");
            if ($hasTicketClose) {
                include("graphs/inc/ie_graph_close_entity.inc.php");
            }
            if ($hasTicketOpenStatus) {
                include('graphs/inc/ie_graph_bar_tech_age.inc.php');
            }
            include('graphs/inc/ie_graph_bar_tech_pri.inc.php');
            if ($has_TicketSolve) {
                include('graphs/inc/ie_graph_bar_tech_hour_work.inc.php');
                include('graphs/inc/ie_graph_bar_tech_solveTime.inc.php');
            }
        }

        /*---------------------------------------
            END - INCLUIR LOS FICHEROS DE LAS GRÁFICAS
        ---------------------------------------*/
    }


    private function dataAgeOfOpenTickets(object $ticketsUserGroupModel, int $userGroup_id, $userTicketType): array
    {
        $dataFinal_sem = date("Y-m-d");  //hoje
        $dataIni_sem = date('Y-m-d', strtotime('-6 days'));
        $semanal = $ticketsUserGroupModel::getAgeOfOpenTickets($dataIni_sem, $dataFinal_sem, $userGroup_id, $userTicketType);
        $diaAge['main']['1-7 días'] = $semanal['conta'];
        $diaAge['drilldown']['1-7 días'] = $semanal['drilldown'];

        $dataFinal_quinze = date('Y-m-d', strtotime('-6 days'));
        $dataIni_quinze = date('Y-m-d', strtotime('-14 days'));
        $quinzenal = $ticketsUserGroupModel::getAgeOfOpenTickets($dataIni_quinze, $dataFinal_quinze, $userGroup_id, $userTicketType);
        $diaAge['main']['7-15 días'] = $quinzenal['conta'];
        $diaAge['drilldown']['7-15 días'] = $quinzenal['drilldown'];

        $dataFinal_month = date('Y-m-d', strtotime('-15 days'));
        $dataIni_month = date('Y-m-d', strtotime('-29 days'));
        $month = $ticketsUserGroupModel::getAgeOfOpenTickets($dataIni_month, $dataFinal_month, $userGroup_id, $userTicketType);
        $diaAge['main']['15-30 días'] = $month['conta'];
        $diaAge['drilldown']['15-30 días'] = $month['drilldown'];

        $dataFinal_m1 = date('Y-m-d', strtotime('-30 days'));
        $dataIni_m1 = date('Y-m-d', strtotime('-59 days'));
        $month1 = $ticketsUserGroupModel::getAgeOfOpenTickets($dataIni_m1, $dataFinal_m1, $userGroup_id, $userTicketType);
        $diaAge['main']['>30 días'] = $month1['conta'];
        $diaAge['drilldown']['>30 días'] = $month1['drilldown'];

        $dataFinal_m2 = date('Y-m-d', strtotime('-60 days'));
        $dataIni_m2 = date('Y-m-d', strtotime('-365 days'));
        $month2 = $ticketsUserGroupModel::getAgeOfOpenTickets($dataIni_m2, $dataFinal_m2, $userGroup_id, $userTicketType);
        $diaAge['main']['>60 días'] = $month2['conta'];
        $diaAge['drilldown']['>60 días'] = $month2['drilldown'];

        return $diaAge;
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

        // Estructura para la gráfica principal 
        foreach ($data['main'] as $key => $value) {
            $serie['main'][] = ['name' => $key, "y" => $value, "drilldown" => $key];
            $categories['main']['categories'][] = $key;
        }

        // Estructura para la gráfica generada por DrillDown 
        foreach ($data['drilldown'] as $key => $value) {
            $dataDrill[$key] = [];

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
            } else {
                $jsObject->$key = $value;
            }
        }
        // Convertir el resultado final a una cadena JSON
        $jsonResult = json_encode($jsObject);
        return $jsonResult;
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
    public function createSerieDataDrilldown_xy(string $title, string $subtitle, array $data): string
    {
        $highcartData = [];
        $serie = ['main' => [], 'drilldown' => []];
        $categories = [];

        $highcartData['title'] = $title;
        $highcartData['subtitle'] = $subtitle;
        $highcartData['nameSerie'] = __('Incidencias', 'infoestadisticas');


        // Estructura para la gráfica principal 
        foreach ($data['main'] as $item) {

            $serie['main'][] = ['name' => $item['name'], "y" => $item['y'],  "drilldown" => $item['name']];
        }

        // Estructura para la gráfica generada por DrillDown 
        foreach ($data['drilldown'] as $item) {

            $dataDrill[$item['name']][] = [$item['name'], $item['y']];
            $serie['drilldown'][] = ['name' => $item['name'], 'id' => $item['name'], "data" => $dataDrill[$item['name']]];
        }

        $highcartData['serie'] = json_encode($serie);
        $highcartData['categories'] = json_encode($categories);

        // Convertir toda la data en un json para ser intrepetado en JS
        $jsonDataObject = $this->graphDataObjectJs($highcartData);
        return $jsonDataObject;
    }

    function calcularHorasYMinutos(int $time_int): string
    {

        $horas = floor($time_int / 60);
        $minutosRestantes = $time_int % 60;
        // Formatea los minutos para que siempre muestre dos dígitos
        $minutosFormateados = ($minutosRestantes < 10) ? "0$minutosRestantes" : $minutosRestantes;
        $timeString = $horas . " horas " . $minutosFormateados . " minutos";

        return $timeString;
    }
}