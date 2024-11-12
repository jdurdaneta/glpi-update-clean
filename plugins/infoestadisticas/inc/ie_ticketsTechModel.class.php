<?php

/**
 * ---------------------------------------------------------------------
 * GLPI - Gestionnaire Libre de Parc Informatique
 * Copyright (C) 2015-2020 Teclib' and contributors.
 *
 * http://glpi-project.org
 *
 * based on GLPI - Gestionnaire Libre de Parc Informatique
 * Copyright (C) 2003-2014 by the INDEPNET Development Team.
 *
 * ---------------------------------------------------------------------
 *
 * LICENSE
 *
 * This file is part of GLPI.
 *
 * GLPI is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * GLPI is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with GLPI. If not, see <http://www.gnu.org/licenses/>.
 * ---------------------------------------------------------------------
 */

if (!defined('GLPI_ROOT')) {
    die("Sorry. You can't access this file directly");
}

final class PluginInfoestadisticasTicketsTechModel
{

    public function __construct()
    {
    }
    /**
     * Óbtener nombre de entidad
     */
    final function getUserName(int $user_id): string
    {
        // Consula a la BBDD
        global $DB;

        // AND `glpi_profiles`.`id` IN (6,18,23,26) // en dado caso que se necesite filtrar por perfiles
        $sql = "SELECT DISTINCT `glpi_users`.`id` AS id, COALESCE(NULLIF(CONCAT(`glpi_users`.`firstname`, ' ', `glpi_users`.`realname`),''), `glpi_users`.`name`) as name
            FROM `glpi_users`
            WHERE id =  $user_id
            AND `glpi_users`.`is_deleted` = 0 ";
        $result_user = $DB->query($sql);
        if($result_user->num_rows > 0){
            $result =  $DB->fetchAssoc($result_user);
            $result_user->free();
            return $result['name'];
        }

        return null;
    }
    /**
     * Obtener listado de usuarios según la entidad activa
     */
    final static public function getTechList(string $activeentities_string)
    {
        global $DB;
        // AND `glpi_profiles`.`id` IN (6,18,23,26) // en dado caso que se necesite filtrar por perfiles
        $sql = "SELECT DISTINCT `glpi_users`.`id` AS id, COALESCE(NULLIF(CONCAT(`glpi_users`.`firstname`, ' ', `glpi_users`.`realname`),''), `glpi_users`.`name`) as name, `glpi_users`.`name` as uname
            FROM `glpi_users`
            LEFT JOIN `glpi_profiles_users` ON (`glpi_users`.`id` = `glpi_profiles_users`.`users_id` )
            LEFT JOIN `glpi_profiles` ON (`glpi_profiles_users`.`profiles_id` = `glpi_profiles`.`id` )
            LEFT JOIN `glpi_entities` ON (`glpi_users`.`entities_id` = `glpi_entities`.`id` )
            WHERE ( `glpi_profiles_users`.`entities_id` IN ($activeentities_string) OR (`glpi_profiles_users`.`is_recursive`='1' AND `glpi_profiles_users`.`entities_id` IN (0)) ) 
            AND `glpi_users`.`is_deleted` = 0 
            GROUP BY `glpi_users`.`id` 
            ORDER BY name ASC";


        $result = $DB->query($sql);

        // Se crea el array con los resultados obtenidos 
        $arr_result = array();
        while ($row_result = $DB->fetchAssoc($result)) {
            $v_row_result = $row_result['id'];
            $arr_result[$v_row_result] = $row_result['name'];
        }
        $result->free();
        return $arr_result;
    }
        /**
     * Obtener listado de usuarios según la entidad activa
     */
    final static public function getUserGroupsList(int | string $user_id): array{

        global $DB;
        // AND `glpi_profiles`.`id` IN (6,18,23,26) // en dado caso que se necesite filtrar por perfiles
        $sql = "SELECT g.id as id, g.name as name
        FROM glpi_users u
        JOIN glpi_groups_users gu ON u.id = gu.users_id
        JOIN glpi_groups g ON gu.groups_id = g.id
        WHERE u.id = $user_id;";


        $result = $DB->query($sql);

        // Se crea el array con los resultados obtenidos 
        $arr_result = array();
        while ($row_result = $DB->fetchAssoc($result)) {
            $v_row_result = $row_result['id'];
            $arr_result[$v_row_result] = $row_result['name'];
        }
        $result->free();
        return $arr_result;
    }

    /**
     * Comprobar si un usuario tiene incidencias en una fecha determinada
     */
    final public function hasUserTickets(string $date_ini, string $date_fin, int $user_id, int $userTicketType): bool
    {
        global $DB;
        $dates = $date_ini == $date_fin ? "LIKE '" . $date_ini . "%'" : "BETWEEN '" . $date_ini . " 00:00:00' AND '" . $date_fin . " 23:59:59'";
        // $clauseType = ($userTicketType != null) ? "AND glpi_tickets_users.type = ".$userTicketType : "" ;
        $sql = "SELECT COUNT(tick.id) as tick FROM glpi_tickets_users 
            LEFT JOIN glpi_tickets as tick ON glpi_tickets_users.tickets_id = tick.id 
            WHERE glpi_tickets_users.users_id = $user_id 
            AND glpi_tickets_users.type = $userTicketType
            AND tick.date $dates";

        $result = $DB->query($sql) or die('erro');

        while ($row_result = $DB->fetchAssoc($result)) {

            $total_tickets = $row_result['tick'];
        }
        // Liberar el conjunto de resultados
        $result->free();

        return $total_tickets > 0;
    }

    /**
     * Comprobar si un usuario tiene incidencias resueltas
     */
    final public function hasUserTicketsSolve(string $date_ini, string $date_fin, int $user_id, int $userTicketType): bool
    {
        global $DB;
        $dates = $date_ini == $date_fin ? "LIKE '" . $date_ini . "%'" : "BETWEEN '" . $date_ini . " 00:00:00' AND '" . $date_fin . " 23:59:59'";
        // $clauseType = ($userTicketType != null) ? "AND glpi_tickets_users.type = ".$userTicketType : "" ;
        $sql = "SELECT count(glpi_tickets.id) as count
        FROM glpi_tickets, glpi_tickets_users
        WHERE glpi_tickets.is_deleted = 0
        AND glpi_tickets.solvedate IS NOT NULL
        AND glpi_tickets.id = glpi_tickets_users.tickets_id
        AND glpi_tickets_users.type = $userTicketType
        AND glpi_tickets_users.users_id = $user_id 
        AND glpi_tickets.date $dates";

        $result = $DB->query($sql) or die('erro');

        while ($row_result = $DB->fetchAssoc($result)) {

            $total_tickets = $row_result['count'];
        }
        // Liberar el conjunto de resultados
        $result->free();

        return $total_tickets > 0;
    }

    /**
     * Obtener categorías de las incidencias por usuario
     */
    final static public function getTechInciCategory(string $date_ini, string $date_fin, int $user_id = null, int $userTicketType): array
    {

        global $DB;
        $dates = $date_ini == $date_fin ? "LIKE '" . $date_ini . "%'" : "BETWEEN '" . $date_ini . " 00:00:00' AND '" . $date_fin . " 23:59:59'";
        // $clauseType = ($userTicketType != null) ? "AND glpi_tickets_users.type = ".$userTicketType : "" ;
        $sql = "SELECT glpi_itilcategories.completename as cat_name, COUNT(glpi_tickets.id) as cat_tick, glpi_itilcategories.id
        FROM glpi_tickets 
        LEFT JOIN  glpi_itilcategories ON  glpi_itilcategories.id = glpi_tickets.itilcategories_id
        LEFT JOIN  glpi_tickets_users ON  glpi_tickets_users.tickets_id = glpi_tickets.id
        WHERE glpi_tickets.is_deleted = '0'
        AND glpi_tickets.date $dates
        AND glpi_tickets_users.users_id = $user_id
        AND glpi_tickets_users.tickets_id = glpi_tickets.id
        AND glpi_tickets_users.type = $userTicketType
        GROUP BY glpi_itilcategories.id
        ORDER BY `cat_tick` DESC;";

        $result = $DB->query($sql) or die('erro');

        $arr_grf = array();
        while ($row_result = $DB->fetchAssoc($result)) {
            // $v_row_result = $row_result['cat_name']." (".$row_result['id'].")";
            $v_row_result = $row_result['cat_name'];
            $v_row_result = (!empty($row_result['cat_name']) && $row_result['cat_name'] != null) ? $row_result['cat_name'] : 'Sin categorizar' ;
            $arr_grf[$v_row_result] = $row_result['cat_tick'];
        }
        $result->free();
        return $arr_grf;
    }

    /**
     * Obtener estados de las incidencias y sus categorías por usuario
     */
    final static public function getTechInciStateCat(string $date_ini, string $date_fin, int $user_id, int $userTicketType): array
    {
        global $DB;
        $dates = $date_ini == $date_fin ? "LIKE '" . $date_ini . "%'" : "BETWEEN '" . $date_ini . " 00:00:00' AND '" . $date_fin . " 23:59:59'";
        // $clauseType = ($userTicketType != null) ? "AND glpi_tickets_users.type = ".$userTicketType : "" ;

        $sql = "SELECT glpi_tickets.id as tick, glpi_tickets.status as status, glpi_tickets.itilcategories_id, C.completename AS nombre_categoria
        FROM glpi_tickets_users, glpi_tickets
        LEFT JOIN glpi_itilcategories C ON glpi_tickets.itilcategories_id = C.id
        WHERE glpi_tickets.is_deleted = '0'
        AND glpi_tickets.date $dates
        AND glpi_tickets_users.users_id = $user_id 
        AND glpi_tickets_users.tickets_id = glpi_tickets.id
        AND glpi_tickets_users.type = $userTicketType
        ORDER BY status ASC";

        $result = $DB->query($sql) or die('erro');

        $arr_result = [];
        $contadorStatus = ['main' => [], 'drilldown' => []];

        while ($row_result = $DB->fetchAssoc($result)) {
            $status = Ticket::getStatus($row_result['status']);
            // $contadorStatus['main'] = [$status];

            if (!isset($contadorStatus['main'][$status])) {
                // $contadorStatus[$status] = 1;
                $contadorStatus['main'][$status] = 1;
            } else {
                $contadorStatus['main'][$status]++;
            }

            // Contar por nombre de categoría
            $categoria = (!empty($row_result['nombre_categoria']) && $row_result['nombre_categoria'] != null) ? $row_result['nombre_categoria'] : 'Sin categorizar' ;
            
            $contCategoria = 0;
            if (!isset($contadorStatus['drilldown'][$status][$categoria])) {
                // $contadorCategoria[$categoria] = 1;
                $contadorStatus['drilldown'][$status][$categoria] = 1;
            } else {
                $contadorStatus['drilldown'][$status][$categoria]++;
            }
        }
        // Liberar el conjunto de resultados
        $result->free();

        return $contadorStatus;
    }

    /**
     * Obtner incidencias creadas por mes y sus categorías de un usuario
     */
    final function getUserTicketsOpenCloseMonthly(string $date_ini, string $date_fin, int $user_id, int $userTicketType): array
    {
        global $DB;
        $dates = $date_ini == $date_fin ? "LIKE '" . $date_ini . "%'" : "BETWEEN '" . $date_ini . " 00:00:00' AND '" . $date_fin . " 23:59:59'";

        $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

        $sql = "SELECT DATE_FORMAT( glpi_tickets.closedate, '%Y-%m' ) AS day_2, DATE_FORMAT( glpi_tickets.date, '%Y-%m' ) AS day_l 
		FROM glpi_tickets  
        LEFT JOIN glpi_tickets_users U ON U.tickets_id = glpi_tickets.id 
        WHERE is_deleted = 0
        AND U.users_id = $user_id
        AND U.type = $userTicketType
        AND date $dates
        ORDER BY day_l, day_2";

        $result = $DB->query($sql) or die('erro');


        $arr_result = ['main' => [], 'drilldown' => []];

        while ($row_result = $DB->fetchAssoc($result)) {
            if ($row_result['day_l'] != null) {

                $date = date_create($row_result['day_l']);

                $data_number = $date->format('n');
                $data_year = $date->format('Y');
                $key_name = $meses[$data_number - 1] . "-" . $data_year;
            } else {
                $key_name = 0;
            }

            if (!isset($arr_result['main'][$key_name])) {
                $arr_result['main'][$key_name] = 1;
            } else {
                $arr_result['main'][$key_name]++;
            }

            // fecha de apertura
            if ($row_result['day_2'] != null) {
                $date2 = date_create($row_result['day_2']);
                $data_number2 = $date2->format('n');
                $data_year2 = $date2->format('Y');
                $key_name2 = $meses[$data_number2 - 1] . "-" . $data_year2;

                if (!isset($arr_result['drilldown'][$key_name][$key_name2])) {
                    $arr_result['drilldown'][$key_name][$key_name2] = 1;
                } else {
                    $arr_result['drilldown'][$key_name][$key_name2]++;
                }
            } else {
                // $key_name2 = 'No cerrada';
                // $arr_result['drilldown'][$key_name][$key_name2] = 0;
            }
        }
        $result->free();
        return $arr_result;
        
    }
    /**
     * Obtner incidencias creadas por mes y sus categorías de un usuario
     */
    final function getUserTicketsCatMonthly(string $date_ini, string $date_fin, int $user_id, int $userTicketType): array
    {
        global $DB;
        $dates = $date_ini == $date_fin ? "LIKE '" . $date_ini . "%'" : "BETWEEN '" . $date_ini . " 00:00:00' AND '" . $date_fin . " 23:59:59'";

        $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

        $sql = "SELECT DATE_FORMAT( glpi_tickets.date, '%Y-%m' ) AS day_l, C.completename AS nombre_categoria 
		FROM glpi_tickets  
        LEFT JOIN glpi_itilcategories C ON glpi_tickets.itilcategories_id = C.id 
        LEFT JOIN glpi_tickets_users U ON U.tickets_id = glpi_tickets.id 
        WHERE is_deleted = 0
        AND U.users_id = $user_id
        AND U.type = $userTicketType
        AND date $dates
        ORDER BY day_l";

        $result = $DB->query($sql) or die('erro');


        $arr_result = ['main' => [], 'drilldown' => []];

        while ($row_result = $DB->fetchAssoc($result)) {

            $date = date_create($row_result['day_l']);

            $dataf = $date->format('F-Y');

            $data_number = $date->format('n');
            $data_year = $date->format('Y');
            $key_name = $meses[$data_number - 1] . "-" . $data_year;

            if (!isset($arr_result['main'][$key_name])) {
                $arr_result['main'][$key_name] = 1;
            } else {
                $arr_result['main'][$key_name]++;
            }

            // Contar por nombre de categoría
            $categoria = $row_result['nombre_categoria'];
            $contCategoria = 0;
            if (!isset($arr_result['drilldown'][$key_name][$categoria])) {
                // $contadorCategoria[$categoria] = 1;
                $arr_result['drilldown'][$key_name][$categoria] = 1;
            } else {
                $arr_result['drilldown'][$key_name][$categoria]++;
            }
        }
        $result->free();
        return $arr_result;
    }

    /**
     * Obtner incidencias cerradas por mes y sus categorías de un usuario
     */
    final function getTechTicketsCloseOpenMonthly(string $date_ini, string $date_fin, int $user_id, int $userTicketType): array
    {
        global $DB;
        $dates = $date_ini == $date_fin ? "LIKE '" . $date_ini . "%'" : "BETWEEN '" . $date_ini . " 00:00:00' AND '" . $date_fin . " 23:59:59'";

        $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

        $sql = "SELECT DATE_FORMAT( glpi_tickets.closedate, '%Y-%m' ) AS day_l, DATE_FORMAT( glpi_tickets.date, '%Y-%m' ) AS day_2 
		FROM glpi_tickets   
        LEFT JOIN glpi_tickets_users U ON U.tickets_id = glpi_tickets.id 
        WHERE is_deleted = 0
        AND U.users_id = $user_id
        AND U.type = $userTicketType
        AND closedate $dates
        AND glpi_tickets.status = 6
        ORDER BY day_l, day_2";

        $result = $DB->query($sql) or die('erro');


        $arr_result = ['main' => [], 'drilldown' => []];

        while ($row_result = $DB->fetchAssoc($result)) {

            $date = date_create($row_result['day_l']);
            $date2 = date_create($row_result['day_2']); // fecha de apertura

            $dataf = $date->format('F-Y');

            $data_number = $date->format('n');
            $data_year = $date->format('Y');
            $key_name = $meses[$data_number - 1] . "-" . $data_year;

            if (!isset($arr_result['main'][$key_name])) {
                $arr_result['main'][$key_name] = 1;
            } else {
                $arr_result['main'][$key_name]++;
            }

            // fecha de apertura
            $data_number2 = $date2->format('n');
            $data_year2 = $date2->format('Y');
            $key_name2 = $meses[$data_number2 - 1] . "-" . $data_year2;

            if (!isset($arr_result['drilldown'][$key_name][$key_name2])) {
                $arr_result['drilldown'][$key_name][$key_name2] = 1;
            } else {
                $arr_result['drilldown'][$key_name][$key_name2]++;
            }
        }
        $result->free();
        return $arr_result;
    }

    /**
     * Obtener antiguedad de las incidencias abiertas y sus categorías por usuario
     */
    final static public function getAgeOfOpenTickets(string $date_ini, string $date_fin, int $user_id = null, int $userTicketType)
    {
        global $DB;
        $dates = "BETWEEN '" . $date_ini . " 00:00:00' AND '" . $date_fin . " 23:59:59'";
        // $clauseType = ($userTicketType != null) ? "AND glpi_tickets_users.type = ".$userTicketType : "" ;

        $sql = "SELECT DATE_FORMAT(date, '%b-%d') as data, glpi_tickets.id, glpi_tickets.itilcategories_id, C.completename AS nombre_categoria
        FROM glpi_tickets_users, glpi_tickets
        LEFT JOIN glpi_itilcategories C ON glpi_tickets.itilcategories_id = C.id
        WHERE glpi_tickets.is_deleted = 0
        AND glpi_tickets_users.tickets_id = glpi_tickets.id
        AND glpi_tickets_users.users_id = $user_id
        AND glpi_tickets.date $dates
        AND glpi_tickets_users.type = $userTicketType
        AND status NOT IN ('5','6')";

        $result = $DB->query($sql) or die('erro');
        $contaArray = [];
        $contadorStatus = [];
        $contadorStatus['drilldown'] = [];

        if ($DB->numRows($result) > 0) {

            while ($row_result = $DB->fetchAssoc($result)) {
                $contaArray[] = $row_result;

                // Contar por nombre de categoría
                $categoria = (!empty($row_result['nombre_categoria']) && $row_result['nombre_categoria'] != null) ? $row_result['nombre_categoria'] : 'Sin categorizar' ;
                $contCategoria = 0;
                if (!isset($contadorStatus['drilldown'][$categoria])) {
                    // $contadorCategoria[$categoria] = 1;
                    $contadorStatus['drilldown'][$categoria] = 1;
                } else {
                    $contadorStatus['drilldown'][$categoria]++;
                }
            }
        }
        // $contadorStatus['conta'] = count($contaArray);
        $contadorStatus['conta'] = $DB->numRows($result);
        $result->free();

        return $contadorStatus;
    }

    /**
     * Obtener incidencias por prioridad por usuario
     */
    final static public function getTechPriority(string $date_ini, string $date_fin, int $user_id = null, int $userTicketType): array
    {
        global $DB;
        $dates = $date_ini == $date_fin ? "LIKE '" . $date_ini . "%'" : "BETWEEN '" . $date_ini . " 00:00:00' AND '" . $date_fin . " 23:59:59'";
        // $clauseType = ($userTicketType != null) ? "AND glpi_tickets_users.type = ".$userTicketType : "" ;

        $sql = "SELECT glpi_tickets.id as tick, glpi_tickets.priority AS prio, glpi_tickets_users.users_id AS uid, glpi_tickets.itilcategories_id, C.completename as nombre_categoria
            FROM  glpi_tickets_users, glpi_tickets
            LEFT JOIN glpi_itilcategories C ON glpi_tickets.itilcategories_id = C.id
            WHERE glpi_tickets.is_deleted = '0'
            AND glpi_tickets.date $dates
            AND glpi_tickets_users.users_id = $user_id
            AND glpi_tickets_users.tickets_id = glpi_tickets.id
            AND glpi_tickets_users.type = $userTicketType
            ORDER BY tick DESC;";


        $result = $DB->query($sql) or die('erro');

        $contadorStatus = ['main' => [], 'drilldown' => []];

        while ($row_result = $DB->fetchAssoc($result)) {

            $prio_name = CommonITILObject::getPriorityName($row_result['prio']);

            if (!isset($contadorStatus['main'][$prio_name])) {
                $contadorStatus['main'][$prio_name] = 1;
            } else {
                $contadorStatus['main'][$prio_name]++;
            }

            // Contar por nombre de categoría
            $categoria = (!empty($row_result['nombre_categoria']) && $row_result['nombre_categoria'] != null) ? $row_result['nombre_categoria'] : 'Sin categorizar' ;
            $contCategoria = 0;
            if (!isset($contadorStatus['drilldown'][$prio_name][$categoria])) {
                $contadorStatus['drilldown'][$prio_name][$categoria] = 1;
            } else {
                $contadorStatus['drilldown'][$prio_name][$categoria]++;
            }
        }
        // Liberar el conjunto de resultados
        $result->free();
        return $contadorStatus;
    }

    final static public function getTechHourWork(string $date_ini, string $date_fin, int $user_id = null, int $userTicketType): array
    {

        global $DB;
        $dates = $date_ini == $date_fin ? "LIKE '" . $date_ini . "%'" : "BETWEEN '" . $date_ini . " 00:00:00' AND '" . $date_fin . " 23:59:59'";
        // $dates = "BETWEEN '2023-01-08 00:00:00' AND '2024-01-08 23:59:59'";
        // $clauseType = ($userTicketType != null) ? "AND glpi_tickets_users.type = ".$userTicketType : "" ;

        $query = "SELECT CONCAT(glpi_tickets.name, ' (', glpi_tickets.id, ')' ) as tname, glpi_itilcategories.name AS nameCategory, 
		-- TIMESTAMPDIFF(MINUTE, glpi_tickets.date, glpi_tickets.solvedate) as time_solve
        solve_delay_stat DIV 60 as time_solve
        FROM glpi_tickets
        LEFT JOIN glpi_tickets_users ON glpi_tickets.id = glpi_tickets_users.tickets_id
        LEFT JOIN glpi_itilcategories ON glpi_tickets.itilcategories_id = glpi_itilcategories.id
        WHERE glpi_tickets.solvedate IS NOT NULL 
        AND glpi_tickets.is_deleted = 0
        AND glpi_tickets_users.type = $userTicketType
        AND glpi_tickets_users.users_id = $user_id
        AND glpi_tickets.date $dates;";

        $result = $DB->query($query) or die('erro');

        $contadorStatus = ['main' => [], 'drilldown' => []];

        while ($row_result = $DB->fetchAssoc($result)) {

            $nameCategory = (!empty($row_result['nameCategory']) && $row_result['nameCategory'] != null) ? $row_result['nameCategory'] : 'Sin categorizar' ;

            if (!isset($contadorStatus['main'][$nameCategory])) {
                $contadorStatus['main'][$nameCategory] = $row_result['time_solve'];
            } else {
                $contadorStatus['main'][$nameCategory] = $contadorStatus['main'][$nameCategory] + $row_result['time_solve'];
            }

            // Contar por nombre de categoría
            $name_ticket = $row_result['tname'] ;
            $contCategoria = 0;
            if (!isset($contadorStatus['drilldown'][$nameCategory][$name_ticket])) {
                $contadorStatus['drilldown'][$nameCategory][$name_ticket] = $row_result['time_solve'];
            } else {
                $contadorStatus['drilldown'][$nameCategory][$name_ticket] = $contadorStatus['drilldown'][$nameCategory][$name_ticket] + $row_result['time_solve'];
            };
        }
        // Liberar el conjunto de resultados
        $result->free();

        return $contadorStatus;
    }

    final static public function getTechResolTime(string $date_ini, string $date_fin, int $user_id = null, int $userTicketType)
    {
        global $DB;
        $dates = $date_ini == $date_fin ? "LIKE '" . $date_ini . "%'" : "BETWEEN '" . $date_ini . " 00:00:00' AND '" . $date_fin . " 23:59:59'";

        $query2 = "SELECT count(glpi_tickets.id) AS chamados , DATEDIFF( glpi_tickets.solvedate, glpi_tickets.date ) AS days
            FROM glpi_tickets, glpi_tickets_users
            WHERE glpi_tickets.solvedate IS NOT NULL
            AND glpi_tickets.is_deleted = 0
            AND glpi_tickets.id = glpi_tickets_users.tickets_id
            AND glpi_tickets_users.type = $userTicketType
            AND glpi_tickets_users.users_id = $user_id
            AND glpi_tickets.date $dates
            GROUP BY days ";

        $result2 = $DB->query($query2) or die('erro');
        $arr_keys = ['8+ días' => 0];
        while ($row_result = $DB->fetchAssoc($result2)) {

            if ($row_result['days'] < 1) {
                $arr_keys['<1 día'] = $row_result['chamados'];
            } elseif ($row_result['days'] == 1) {
                $arr_keys['1 día'] = $row_result['chamados'];
            } elseif ($row_result['days'] >= 8) {
                $arr_keys['8+ días'] = $arr_keys['8+ días'] + $row_result['chamados'];
            } else {
                $arr_keys[$row_result['days'] . " días"] = $row_result['chamados'];
            }
        }

        $orden = array(
            "<1 día" => 1,
            "1 día"  => 2,
            "2 días" => 3,
            "3 días" => 4,
            "4 días" => 5,
            "5 días" => 6,
            "6 días" => 7,
            "7 días" => 8,
            "8+ días" => 9
        );

        uksort($arr_keys, function ($a, $b) use ($orden) {
            return $orden[$a] <=> $orden[$b];
        });
        $arrayFiltrado = array_filter($arr_keys, function ($valor) {
            return $valor !== 0;
        });
        $result2->free();
        return $arrayFiltrado;
    }
}