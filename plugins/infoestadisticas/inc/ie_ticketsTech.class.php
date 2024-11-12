<?php

/**
 * -------------------------------------------------------------------------
 * Infoestadisticas plugin for GLPI
 * -------------------------------------------------------------------------
 * Clase que tiene como función operar como un controlador de las incdencias por técnico
 * 
 */
include("../inc/ie_ticketsUserGroupModel.class.php");
include("../inc/ie_ticketsTechModel.class.php");

final class PluginInfoestadisticasTicketsTech
{
    public $ticketsTechModel;
    public $ticketsUserGroupModel;

    final public function __construct()
    {
        $this->ticketsTechModel = new PluginInfoestadisticasTicketsTechModel();
        $this->ticketsUserGroupModel = new PluginInfoestadisticasTicketsUserGroupModel();
    }

    final public function index(): void
    {
        // Obtener el ID de la entidad activa donde se encuentra el usuario
        $activeentities_string = isset($_SESSION['glpiactiveentities_string']) ? $_SESSION['glpiactiveentities_string'] : null;
        $current_entity_recursive = $_SESSION['glpiactive_entity_recursive'];
        $current_id_user = $_SESSION['glpiID'];
        $current_userName = $_SESSION['glpifriendlyname'];

        // llamar a las clases a utilizar
        $ticketsTechModel = $this->ticketsTechModel;
        $ticketsUserGroupModel = $this->ticketsUserGroupModel;

        // Obtención de fecha para los campos del filtro de busqueda

        if (!empty($_GET)) {
            $date_ini =  $_GET["date1"];
            $date_fin = $_GET["date2"];
            $user_id = $_GET["sel_user"] ? $_GET["sel_user"] : 0;
            $userGroup_id = $_GET["sel_userGroup"];
        } else {
            $date_ini = date('Y-m-d', strtotime('-1 year'));
            $date_fin = date("Y-m-d");
            $user_id = $current_id_user;
            $userGroup_id = '';
        }
        $userTicketType = 2; // Tipo de ticket asignada al usuario

        // Nombre de el usuario a consultar
        $userName =  $ticketsTechModel->getUserName($user_id);
        // Construir Cebecera de página y formulario
        $titlepage = __('Incidencias por usuario', 'infoestadisticas');

        // Action del formulario
        $target = preg_replace("/&/", "&amp;", $_SERVER["REQUEST_URI"]);

        // Listados de los usuarios para el Select según la entidad activa
        $options = $ticketsTechModel::getTechList($activeentities_string);
        $select_value = $user_id; // Para el Select

        // Name del campo select
        $optionName = 'sel_user';


        $optionsUserGroup =  $ticketsTechModel::getUserGroupsList($user_id);
        // Name del campo select
        $optionGroupName = 'sel_userGroup';

        // comprobar que se haya seleccionado las fechas de manera correcta
        $check_dates = checkDateFields($date_ini, $date_fin);
        if ($check_dates->success == false) {
            $msg_err = __($check_dates->msg);
            // LLAMAR LA VISTA, EL ARCHIVO QUE CONTIENE EL HTML 
            require_once('../front/ie_ticketstechsView.php');
            return;
        }


        if (!empty($userGroup_id) && $userGroup_id != null) {
            // Verificar si un grupo tiene tickets
            $has_Ticket = $ticketsUserGroupModel->hasUserGroupTickets($date_ini, $date_fin, $userGroup_id, $userTicketType);

            // $userGruoupName =  $ticketsUserGroupModel->getUserGroupName($userGroup_id);
            $assignedTicket =  $ticketsUserGroupModel->getUserGroupName($userGroup_id);

            if (!$has_Ticket) {
                // Mensaje si el grupo no tiene incidencias
                $msg_err = __('No existe incidencias asignadas a '.$assignedTicket);
                // LLAMAR LA VISTA, EL ARCHIVO QUE CONTIENE EL HTML 
                require_once('../front/ie_ticketstechsView.php');
                return;
            }

            // Verificar si el Grupo tiene tickets resuertos
            $has_TicketSolve = $ticketsUserGroupModel->hasUserGroupTicketsSolve($date_ini, $date_fin, $userGroup_id, $userTicketType);

            // DATOS DE INCIDENCIAS POR CATEGORÍA DE UN GRUPO DE USUARIO
            $ticker_incis_category = $ticketsUserGroupModel::getUserGroupInciCategory($date_ini, $date_fin, $userGroup_id, $userTicketType);

            // DATOS DE INCIDENCIA POR ESTADO Y CATEGORÍA DE UN GRUPO DE USUARIO
            $tickets_status_cat = $ticketsUserGroupModel->getUserGroupInciStateCat($date_ini, $date_fin, $userGroup_id, $userTicketType);
            $dataTable_status = $tickets_status_cat['main'];

            // INCIDENCIAS POR MES DE UN Grupo - CREAR DATOS PARA LA GRÁFICA DE UN GRUPO DE USUARIO
            $ticketMoth = $ticketsUserGroupModel->getUserGroupTicketsOpenCloseMonthly($date_ini, $date_fin, $userGroup_id, $userTicketType);


            // INCIDENCIAS CERRADAS POR MES CREAR DATOS PARA LA GRÁFICA DE UN GRUPO DE USUARIO
            $titulo_close = __('Incidencias mensuales cerradas de: ' . $assignedTicket, 'infoestadisticas');
            $ticketCloseMonths = $ticketsUserGroupModel->getUserGroupTicketsCloseOpenMonthly($date_ini, $date_fin, $userGroup_id, $userTicketType);
            $hasTicketClose =(isset($ticketCloseMonths['main']) && !empty($ticketCloseMonths['main'])) ? TRUE : FALSE;
            if ($hasTicketClose) {
                $dataTable_ticketClose = $ticketCloseMonths['main'];
                $nums_ticketClose = array_values($dataTable_ticketClose);
                $total_tiketsClose = array_sum($nums_ticketClose);
                $subtitle_tiketsClose = __('Total: ' . $total_tiketsClose, 'infoestadisticas');
                $jsonDataticketClose = $this->createSerieDataDrilldown($titulo_close, $subtitle_tiketsClose, $ticketCloseMonths);
            } else {
                // Mensaje si el usuario no tiene incidencias Cerradas
                $msg_inciCerrada = __('Actualmente el usuario no tiene incidencias cerradas en la fecha seleccionada');
            }


            // DATOS DE ANTIGUEDAD DE INCIDENCIAS ABIERTAS DE UN GRUPO DE USUARIO
            $titulo_ticketAge = __('Antigüedad de incidencias abiertas asignadas a el grupo ' . $assignedTicket, 'infoestadisticas');
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

            // DATOS DE INCIDENCIAS POR PRIORIDAD DE UN GRUPO DE USUARIO
            $dataTicketpriority = $ticketsUserGroupModel::getUserGroupPriority($date_ini, $date_fin, $userGroup_id, $userTicketType);


            $titulo_resolTime = __('Periodo de resolución de incidencias asignadas a ' . $assignedTicket, 'infoestadisticas');
            $titulo_hourWork = __('Horas trabajadas en incidencias resueltas asignadas a ' . $assignedTicket, 'infoestadisticas');
            if (!$has_TicketSolve) {
                $msg_inciNotSolve = __('Actualmente el grupo ' . $assignedTicket . ' no tiene incidencias resueltas');
            } else {

                // DATOS PERIODO DE RESOLUCION DE INCIDENCIAS DE UN GRUPO DE USUARIO
                $resolTime = $ticketsUserGroupModel::getUserGroupResolTime($date_ini, $date_fin, $userGroup_id, $userTicketType);
                $total_resolTime = array_sum($resolTime);
                $subtitulo_resolTime = __('Total: ' . $total_resolTime, 'infoestadisticas');
                $jsonDataTechResolTime = $this->createSerieData($titulo_resolTime, $subtitulo_resolTime, $resolTime);

                // DATOS HORAS TRABAJADAS EN LAS INCIDENCIAS DE UN GRUPO DE USUARIO
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
        } else {
            // Verificar si el usuario tiene tickets
            $has_Ticket = $ticketsTechModel->hasUserTickets($date_ini, $date_fin, $user_id, $userTicketType);
            $assignedTicket = $userName;

            if (!$has_Ticket) {
                // Mensaje si el usurio no tiene incidencias
                $msg_err = __('No existe incidencias asignadas a '.$assignedTicket);
                // LLAMAR LA VISTA, EL ARCHIVO QUE CONTIENE EL HTML 
                require_once('../front/ie_ticketstechsView.php');
                return;
            }
            // Verificar si el usuario tiene tickets resuertos
            $has_TicketSolve = $ticketsTechModel->hasUserTicketsSolve($date_ini, $date_fin, $user_id, $userTicketType);

            // DATOS DE INCIDENCIAS POR CATEGORÍA DE UN USUARIO
            $ticker_incis_category = $ticketsTechModel::getTechInciCategory($date_ini, $date_fin, $user_id, $userTicketType);


            // DATOS DE INCIDENCIA POR ESTADO Y CATEGORÍA DE UN USUARIO
            $tickets_status_cat = $ticketsTechModel->getTechInciStateCat($date_ini, $date_fin, $user_id, $userTicketType);
            $dataTable_status = $tickets_status_cat['main'];


            // INCIDENCIAS POR MES DE UN USUARIO - CREAR DATOS PARA LA GRÁFICA
            $ticketMoth = $ticketsTechModel->getUserTicketsOpenCloseMonthly($date_ini, $date_fin, $user_id, $userTicketType);


            // INCIDENCIAS CERRADAS POR MES CREAR DATOS PARA LA GRÁFICA DE UN USUARIO
            $titulo_close = __('Incidencias cerradas asignadas a ' . $assignedTicket . ' por mes', 'infoestadisticas');
            $ticketCloseMonths = $ticketsTechModel->getTechTicketsCloseOpenMonthly($date_ini, $date_fin, $user_id, $userTicketType);
            $hasTicketClose =(isset($ticketCloseMonths['main']) && !empty($ticketCloseMonths['main'])) ? TRUE : FALSE;
            if ($hasTicketClose) {
                $dataTable_ticketClose = $ticketCloseMonths['main'];
                $nums_ticketClose = array_values($dataTable_ticketClose);
                $total_tiketsClose = array_sum($nums_ticketClose);
                $subtitle_tiketsClose = __('Total: ' . $total_tiketsClose, 'infoestadisticas');
                $jsonDataticketClose = $this->createSerieDataDrilldown($titulo_close, $subtitle_tiketsClose, $ticketCloseMonths);
            } else {
                $msg_inciCerrada = __('Actualmente el usuario ' . $assignedTicket . ' no tiene incidencias cerradas en la fecha seleccionada');
            }

            // DATOS DE ANTIGUEDAD DE INCIDENCIAS ABIERTAS DE UN USUARIO
            $titulo_ticketAge = __('Antigüedad de incidencias abiertas asignadas a ' . $assignedTicket, 'infoestadisticas');
            $ticktesStatusOpen = ['Nuevo', 'En curso (asignada)', 'En curso (planificada)', 'En espera'];
            $hasTicketOpenStatus = !empty(array_intersect($ticktesStatusOpen, array_keys($dataTable_status)));
            if ($hasTicketOpenStatus) {
                $dataTicketAge = $this->dataAgeOfOpenTickets($ticketsTechModel, $user_id, $userTicketType);
                $dataTable_ticketAge = $dataTicketAge['main'];
                $total_ticketAge = array_sum($dataTable_ticketAge);
                $subtitulo_ticketAge = __('Total: ' . $total_ticketAge, 'infoestadisticas');
                $jsonDataTechAge = $this->createSerieDataDrilldown($titulo_ticketAge, $subtitulo_ticketAge, $dataTicketAge);
            } else {
                // Mensaje si el usuario no tiene  ANTIGUEDAD DE INCIDENCIAS ABIERTAS DE UN USUARIO
                $msg_inciAntiguedad = __('Actualmente el usuario ' . $assignedTicket . ' no tiene incidencias abiertas');
            }

            // DATOS DE INCIDENCIAS POR PRIORIDAD DE UN USUARIO
            $dataTicketpriority = $ticketsTechModel::getTechPriority($date_ini, $date_fin, $user_id, $userTicketType);

            $titulo_resolTime = __('Periodo de resolución de incidencias asignadas a ' . $assignedTicket, 'infoestadisticas');
            $titulo_hourWork = __('Horas trabajadas en incidencias resueltas asignadas a ' . $assignedTicket, 'infoestadisticas');
            if (!$has_TicketSolve) {
                $msg_inciNotSolve = __('Actualmente el usuario ' . $assignedTicket . ' no tiene incidencias resueltas');
            } else {

                // DATOS PERIODO DE RESOLUCION DE INCIDENCIAS DE UN USUARIO
                $resolTime = $ticketsTechModel::getTechResolTime($date_ini, $date_fin, $user_id, $userTicketType);
                $total_resolTime = array_sum($resolTime);
                $subtitulo_resolTime = __('Total: ' . $total_resolTime, 'infoestadisticas');
                $jsonDataTechResolTime = $this->createSerieData($titulo_resolTime, $subtitulo_resolTime, $resolTime);

                // DATOS HORAS TRABAJADAS EN LAS INCIDENCIAS DE UN USUARIO
                $dataHourWork  = $ticketsTechModel::getTechHourWork($date_ini, $date_fin, $user_id, $userTicketType);
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
        }

        // DATOS DE INCIDENCIAS POR CATEGORÍA
        $titulo_cat = __('Incidencias por categoría asignadas a ' . $assignedTicket, 'infoestadisticas');
        $subtitulo_cat = __('Total: ' . array_sum($ticker_incis_category), 'infoestadisticas');
        $jsonDataGraphCat = $this->createSerieData($titulo_cat, $subtitulo_cat, $ticker_incis_category);

        // DATOS DE INCIDENCIA POR ESTADO Y CATEGORÍA
        $nums_status = array_values($dataTable_status);
        $total_status = array_sum($nums_status);
        $titulo_status = __('Estado de incidencias asignadas a ' . $assignedTicket, 'infoestadisticas');
        $subtitulo_status = __('Total: ' . $total_status, 'infoestadisticas');
        $statSerieDataDrill = $this->createSerieDataDrilldown($titulo_status, $subtitulo_status, $tickets_status_cat);

        // INCIDENCIAS POR MES DE UN USUARIO - CREAR DATOS PARA LA GRÁFICA
        $dataTable_tiketsMonth = $ticketMoth['main'];
        $nums_ticketsMonth = array_values($dataTable_tiketsMonth);
        $total_tiketsMonth = array_sum($nums_ticketsMonth);
        $titulo_month = __('Incidencias abiertas asignadas a ' . $assignedTicket . ' por mes', 'infoestadisticas');
        $subtitle_mainEntityMonth = __('Total: ' . $total_tiketsMonth, 'infoestadisticas');
        $jsonDataTicketMonth = $this->createSerieDataDrilldown($titulo_month, $subtitle_mainEntityMonth, $ticketMoth);

        // DATOS DE INCIDENCIAS POR PRIORIDAD DE UN USUARIO
        $dataTable_ticketPriority = $dataTicketpriority['main'];
        $total_ticketPriority = array_sum($dataTable_ticketPriority);
        $titulo_ticketPriority = __('Incidencias por prioridad asignadas a ' . $assignedTicket, 'infoestadisticas');
        $subtitulo_ticketPriority = __('Total: ' . $total_ticketPriority, 'infoestadisticas');
        $jsonDataTicketPriority = $this->createSerieDataDrilldown($titulo_ticketPriority, $subtitulo_ticketPriority, $dataTicketpriority);


        // LLAMAR LA VISTA, EL ARCHIVO QUE CONTIENE EL HTML 
        include('../front/ie_ticketstechsView.php');


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


    private function dataAgeOfOpenTickets(object $ticketsTechModel, int $user_id, $userTicketType): array
    {

        $dataFinal_sem = date("Y-m-d");  //hoje
        $dataIni_sem = date('Y-m-d', strtotime('-6 days'));
        $semanal = $ticketsTechModel::getAgeOfOpenTickets($dataIni_sem, $dataFinal_sem, $user_id, $userTicketType);
        $diaAge['main']['1-7 días'] = $semanal['conta'];
        $diaAge['drilldown']['1-7 días'] = $semanal['drilldown'];

        $dataFinal_quinze = date('Y-m-d', strtotime('-6 days'));
        $dataIni_quinze = date('Y-m-d', strtotime('-14 days'));
        $quinzenal = $ticketsTechModel::getAgeOfOpenTickets($dataIni_quinze, $dataFinal_quinze, $user_id, $userTicketType);
        $diaAge['main']['7-15 días'] = $quinzenal['conta'];
        $diaAge['drilldown']['7-15 días'] = $quinzenal['drilldown'];

        $dataFinal_month = date('Y-m-d', strtotime('-15 days'));
        $dataIni_month = date('Y-m-d', strtotime('-29 days'));
        $month = $ticketsTechModel::getAgeOfOpenTickets($dataIni_month, $dataFinal_month, $user_id, $userTicketType);
        $diaAge['main']['15-30 días'] = $month['conta'];
        $diaAge['drilldown']['15-30 días'] = $month['drilldown'];

        $dataFinal_m1 = date('Y-m-d', strtotime('-30 days'));
        $dataIni_m1 = date('Y-m-d', strtotime('-59 days'));
        $month1 = $ticketsTechModel::getAgeOfOpenTickets($dataIni_m1, $dataFinal_m1, $user_id, $userTicketType);
        $diaAge['main']['>30 días'] = $month1['conta'];
        $diaAge['drilldown']['>30 días'] = $month1['drilldown'];

        $dataFinal_m2 = date('Y-m-d', strtotime('-60 days'));
        $dataIni_m2 = date('Y-m-d', strtotime('-365 days'));
        $month2 = $ticketsTechModel::getAgeOfOpenTickets($dataIni_m2, $dataFinal_m2, $user_id, $userTicketType);
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

    public function calcularHorasYMinutos(int $time_int): string
    {

        $horas = floor($time_int / 60);
        $minutosRestantes = $time_int % 60;
        // Formatea los minutos para que siempre muestre dos dígitos
        $minutosFormateados = ($minutosRestantes < 10) ? "0$minutosRestantes" : $minutosRestantes;
        $timeString = $horas . " horas " . $minutosFormateados . " minutos";

        return $timeString;
    }

    public function getUserGroupListJSON(int $user_id): string
    {

        $ticketsTechModel = new PluginInfoestadisticasTicketsTechModel();
        $grouoList = $ticketsTechModel::getUserGroupsList($user_id);

        return json_encode($grouoList);
    }

    private function getTicketsUserStats($dataUserForm)
    {

        $ticketsTechModel = $this->ticketsTechModel;
        // Destructuring Array
        ['date_ini' => $date_ini, 'date_fin' => $date_fin, 'user_id' => $user_id, 'userTicketType' => $userTicketType, 'userName' => $userName, 'has_Ticket' => $has_Ticket] = $dataUserForm;
    }
}