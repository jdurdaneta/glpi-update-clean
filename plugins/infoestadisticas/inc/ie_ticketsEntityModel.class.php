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

final class PluginInfoestadisticasTicketsEntityModel
{

    public function __construct(
        private  int $current_entity,
        private  int|bool $recursive_entity
    ) {
    }

    /**
     * Óbtener nombre de entidad
     */
    final function getEntityName(int $entity_id): string
    {
        // Consula a la BBDD
        global $DB;
        $sql = 'SELECT name FROM glpi_entities WHERE id = ' . $entity_id;
        $result_entity = $DB->query($sql);
        if($result_entity->num_rows > 0){
            $result =  $DB->fetchAssoc($result_entity);
            $result_entity->free();
            return $result['name'];
        }
        
        return null;
    }

    /**
     * Óbtener listado de entidades actual e hijas, según la sesión 
     */
    final public function getEntityList($entity_id = null): array
    {
        // Consula a la BBDD
        global $DB;
        $entity_id = $entity_id ?? $this->current_entity;
        $sql_entity = 'WITH RECURSIVE EntityHierarchy AS 
        (SELECT id, name, entities_id FROM glpi_entities WHERE id = ' . $entity_id . ' 
        UNION ALL SELECT t.id, t.name, t.entities_id FROM glpi_entities t 
        JOIN EntityHierarchy e ON t.entities_id = e.id WHERE t.entities_id IS NOT NULL) 
        SELECT * FROM EntityHierarchy';

        $result_entity = $DB->query($sql_entity);

        // Se crea el array con los resultados obtenidos 
        $arr_entity = array();
        while ($row_result = $DB->fetchAssoc($result_entity)) {
            $v_row_result = $row_result['id'];
            $arr_entity[$v_row_result] = $row_result['name'];
        }
        $result_entity->free();
        return $arr_entity;
    }

    /**
     * Obtner el total de incidencias de una entidad 
     */
    final public function getNumsEntityTickets(string $date_ini, string $date_fin, int $entity_id = null): int
    {
        global $DB;
        $entity_id = $entity_id ?? $this->current_entity;
        $dates = $date_ini == $date_fin ? "LIKE '" . $date_ini . "%'" : "BETWEEN '" . $date_ini . " 00:00:00' AND '" . $date_fin . " 23:59:59'";
        $query = "WITH RECURSIVE EntidadHierarchy AS (
            SELECT id, name, entities_id, level
            FROM glpi_entities
            WHERE id = ' . $entity_id . '
            UNION ALL          
            SELECT e.id, e.name, e.entities_id, e.level
            FROM glpi_entities e
            JOIN EntidadHierarchy eh ON e.entities_id = eh.id
            )
        SELECT glpi_tickets.id
        FROM glpi_tickets
        WHERE glpi_tickets.is_deleted = '0'
        AND glpi_tickets.date " . $dates . "
        AND glpi_tickets.entities_id = " . $entity_id;

        $query_incis = $DB->query($query) or die('erro');
        $contador_incis = $query_incis->num_rows;
        
        $query_incis->free();
        return $contador_incis;
    }

    /**
     * Óbtener los Tickest de un entidad y sus subentidades
     */
    final public function getEntityAndEntitiesChildTickets(string $date_ini, string $date_fin, int $entity_id = null)
    {
        global $DB;
        $entity_id = $entity_id ?? $this->current_entity;
        $dates = $date_ini == $date_fin ? "LIKE '" . $date_ini . "%'" : "BETWEEN '" . $date_ini . " 00:00:00' AND '" . $date_fin . " 23:59:59'";

        $sql = 'WITH RECURSIVE EntidadHierarchy AS (
            SELECT id, name, entities_id, level
            FROM glpi_entities
            WHERE id = ' . $entity_id . '
            UNION ALL          
            SELECT e.id, e.name, e.entities_id, e.level
            FROM glpi_entities e
            JOIN EntidadHierarchy eh ON e.entities_id = eh.id
          )          
          SELECT eh.name, eh.level, COUNT(c.id) as numero_casos
          FROM EntidadHierarchy eh
          LEFT JOIN glpi_tickets c ON eh.id = c.entities_id
          WHERE c.is_deleted = 0
          AND date ' . $dates . '
          GROUP BY eh.name 
          ORDER BY eh.level, eh.id
        ';
        $result = $DB->query($sql) or die('erro');
        $arr_result = [];
        while ($row_result = $DB->fetchAssoc($result)) {

            $v_row_result = $row_result['name'];
            $arr_result[$v_row_result] = $row_result['numero_casos'];
            // $arr_result[] = $row_result;
        }
        $result->free();
        return $arr_result;
    }

    /**
     * Obtner las incidencias por categorías de una entidad según la sesión
     */
    // POR ENTIDAD
    final function getEntityTicketsByCat(string $date_ini, string $date_fin, string $entity_id = null): array
    {
        global $DB;
        $entity_id = $entity_id ?? $this->current_entity;
        $dates = $date_ini == $date_fin ? "LIKE '" . $date_ini . "%'" : "BETWEEN '" . $date_ini . " 00:00:00' AND '" . $date_fin . " 23:59:59'";

        $sql = "SELECT glpi_itilcategories.completename as cat_name, COUNT(glpi_tickets.id) as cat_tick, glpi_itilcategories.id
        FROM glpi_tickets
        LEFT JOIN glpi_itilcategories ON  glpi_tickets.itilcategories_id =glpi_itilcategories.id
        WHERE glpi_tickets.is_deleted = '0'
        AND glpi_tickets.date " . $dates . " AND glpi_tickets.entities_id = " . $entity_id . " GROUP BY glpi_itilcategories.id
        ORDER BY `cat_tick` DESC";

        $result = $DB->query($sql) or die('erro');

        $arr_result = [];
        while ($row_result = $DB->fetchAssoc($result)) {
            // $v_row_result = $row_result['cat_name']." (".$row_result['id'].")";
            $v_row_result = (!empty($row_result['cat_name']) && $row_result['cat_name'] != null) ? $row_result['cat_name'] : 'Sin categorizar' ;
            $arr_result[$v_row_result] = $row_result['cat_tick'];
            // $arr_result[] = $row_result;
        }
        $result->free();
        return $arr_result;
    }
    // POR ENTIDAD Y SUBENTIDADES
    final function getEntitiesTicketsByCat(string $date_ini, string $date_fin, string $entity_id = null): array
    {

        global $DB;
        $entity_id = $entity_id ?? $this->current_entity;
        $dates = $date_ini == $date_fin ? "LIKE '" . $date_ini . "%'" : "BETWEEN '" . $date_ini . " 00:00:00' AND '" . $date_fin . " 23:59:59'";

        $sql = "WITH RECURSIVE EntidadHierarchy AS (
            SELECT id, name, entities_id
            FROM glpi_entities
            WHERE id = $entity_id
            UNION ALL
            SELECT e.id, e.name, e.entities_id
            FROM glpi_entities e
            JOIN EntidadHierarchy eh ON e.entities_id = eh.id
          )
          SELECT eh.name, cat.completename as cat_name, COUNT(t.id) as cat_tick
          FROM EntidadHierarchy eh
          LEFT JOIN glpi_tickets t ON eh.id = t.entities_id
          LEFT JOIN glpi_itilcategories cat ON t.itilcategories_id = cat.id
          WHERE t.is_deleted =0
          AND date " . $dates . "
          GROUP BY cat.completename;";

        $result = $DB->query($sql) or die('erro');

        $arr_result = [];
        while ($row_result = $DB->fetchAssoc($result)) {
            // $v_row_result = $row_result['cat_name']." (".$row_result['id'].")";
            $v_row_result = (!empty($row_result['cat_name']) && $row_result['cat_name'] != null) ? $row_result['cat_name'] : 'Sin categorizar' ;
            $arr_result[$v_row_result] = $row_result['cat_tick'];
            // $arr_result[] = $row_result;
        }
        $result->free();
        return $arr_result;
    }

    /**
     * Obtner estado de las incidencias y sus categorías
     */
    // POR ENTIDAD
    final function getEntityTicketsStatusCat(string $date_ini, string $date_fin, string $entity_id = null): array
    {
        global $DB;
        $entity_id = $entity_id ?? $this->current_entity;
        $dates = $date_ini == $date_fin ? "LIKE '" . $date_ini . "%'" : "BETWEEN '" . $date_ini . " 00:00:00' AND '" . $date_fin . " 23:59:59'";

        $sql = "SELECT glpi_tickets.id, glpi_tickets.entities_id, glpi_tickets.status, glpi_tickets.itilcategories_id, C.completename AS nombre_categoria FROM glpi_tickets 
        LEFT JOIN glpi_itilcategories C ON glpi_tickets.itilcategories_id = C.id 
        WHERE glpi_tickets.date " . $dates . " AND glpi_tickets.entities_id = " . $entity_id . " AND glpi_tickets.is_deleted =  '0'";

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
        $result->free();
        return $contadorStatus;
    }
    // POR ENTIDAD Y SUBENTIDADES
    final function getEntitiesTicketsStatusCat(string $date_ini, string $date_fin, string $entity_id = null): array
    {
        global $DB;
        $entity_id = $entity_id ?? $this->current_entity;
        $dates = $date_ini == $date_fin ? "LIKE '" . $date_ini . "%'" : "BETWEEN '" . $date_ini . " 00:00:00' AND '" . $date_fin . " 23:59:59'";

        $sql = "WITH RECURSIVE EntidadHierarchy AS (
            SELECT id, name, entities_id
            FROM glpi_entities
            WHERE id = $entity_id
            UNION ALL
            SELECT e.id, e.name, e.entities_id
            FROM glpi_entities e
            JOIN EntidadHierarchy eh ON e.entities_id = eh.id
          )
          SELECT t.id, t.entities_id, t.status, t.itilcategories_id, cat.completename AS nombre_categoria
          FROM EntidadHierarchy eh
          LEFT JOIN glpi_tickets t ON eh.id = t.entities_id
          LEFT JOIN glpi_itilcategories cat ON t.itilcategories_id = cat.id
          WHERE t.is_deleted =0
          AND date $dates";


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
        $result->free();
        return $contadorStatus;
    }

    /**
     * Obtner incidencias creadas por mes y sus categorías
     */
    // POR ENTIDAD
    final function getEntityTicketsOpenCloseMonthly(string $date_ini, string $date_fin, string $entity_id = null): array
    {
        global $DB;
        $entity_id = $entity_id ?? $this->current_entity;
        $dates = $date_ini == $date_fin ? "LIKE '" . $date_ini . "%'" : "BETWEEN '" . $date_ini . " 00:00:00' AND '" . $date_fin . " 23:59:59'";

        $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

        $sql = "SELECT DATE_FORMAT( glpi_tickets.date, '%Y-%m' ) AS day_l, DATE_FORMAT( glpi_tickets.closedate, '%Y-%m' ) AS day_2 FROM glpi_tickets  
            WHERE is_deleted = 0
            AND glpi_tickets.entities_id = $entity_id
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
    // POR ENTIDAD Y SUBENTIDADES
    final function getEntitiesTicketsOpenCloseMonthly(string $date_ini, string $date_fin, string $entity_id = null): array
    {

        global $DB;
        $entity_id = $entity_id ?? $this->current_entity;
        $dates = $date_ini == $date_fin ? "LIKE '" . $date_ini . "%'" : "BETWEEN '" . $date_ini . " 00:00:00' AND '" . $date_fin . " 23:59:59'";

        $meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];

        $sql = "WITH RECURSIVE EntidadHierarchy AS (
            SELECT id, name, entities_id
            FROM glpi_entities
            WHERE id = $entity_id
            UNION ALL
            SELECT e.id, e.name, e.entities_id
            FROM glpi_entities e
            JOIN EntidadHierarchy eh ON e.entities_id = eh.id
        )
        SELECT DATE_FORMAT( t.date, '%Y-%m' ) AS day_l, DATE_FORMAT( t.closedate, '%Y-%m' ) AS day_2
        FROM EntidadHierarchy eh
        LEFT JOIN glpi_tickets t ON eh.id = t.entities_id
        WHERE t.is_deleted = '0' AND t.date $dates
        ORDER BY day_l, day_2;";

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
     * Obtner incidencias cerradas por mes y sus categorías
     */
    // POR ENTIDAD
    final function getEntityTicketsCloseOpenByMonthy(string $date_ini, string $date_fin, string $entity_id = null): array
    {

        global $DB;
        $entity_id = $entity_id ?? $this->current_entity;
        $dates = $date_ini == $date_fin ? "LIKE '" . $date_ini . "%'" : "BETWEEN '" . $date_ini . " 00:00:00' AND '" . $date_fin . " 23:59:59'";

        $meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];

        $sql = "SELECT DATE_FORMAT( glpi_tickets.closedate, '%Y-%m' ) AS day_l, DATE_FORMAT( glpi_tickets.date, '%Y-%m' ) AS day_2 FROM glpi_tickets 
        WHERE is_deleted = 0
        AND glpi_tickets.entities_id = $entity_id
        AND glpi_tickets.status = 6
        AND date $dates
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
    // POR ENTIDAD Y SUBENTIDADES
    final function getEntitiesTicketsCloseOpenByMonthy(string $date_ini, string $date_fin, string $entity_id = null): array
    {

        global $DB;
        $entity_id = $entity_id ?? $this->current_entity;
        $dates = $date_ini == $date_fin ? "LIKE '" . $date_ini . "%'" : "BETWEEN '" . $date_ini . " 00:00:00' AND '" . $date_fin . " 23:59:59'";

        $meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];

        $sql = "WITH RECURSIVE EntidadHierarchy AS (
            SELECT id, name, entities_id
            FROM glpi_entities
            WHERE id = $entity_id
            UNION ALL
            SELECT e.id, e.name, e.entities_id
            FROM glpi_entities e
            JOIN EntidadHierarchy eh ON e.entities_id = eh.id
        )
        SELECT DATE_FORMAT( t.closedate, '%Y-%m' ) AS day_l,  DATE_FORMAT( t.date, '%Y-%m' ) AS day_2
        FROM EntidadHierarchy eh
        LEFT JOIN glpi_tickets t ON eh.id = t.entities_id
        WHERE t.is_deleted = '0'
        AND t.status = 6
        AND t.date $dates
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
     * Obtner incidencias asignadas a un grupo de usuario y sus categorías
     */
    // POR ENTIDAD
    final function getEntityTicketsCatGroup(string $date_ini, string $date_fin, string $entity_id = null): array
    {

        global $DB;
        $entity_id = $entity_id ?? $this->current_entity;
        $dates = $date_ini == $date_fin ? "LIKE '" . $date_ini . "%'" : "BETWEEN '" . $date_ini . " 00:00:00' AND '" . $date_fin . " 23:59:59'";

        $sql = "SELECT glpi_groups.name AS GrupoName, C.completename AS nombre_categoria
        FROM glpi_tickets
        INNER JOIN glpi_groups_tickets ON glpi_tickets.id = glpi_groups_tickets.tickets_id
        INNER JOIN glpi_groups ON glpi_groups_tickets.groups_id = glpi_groups.id
        LEFT JOIN glpi_itilcategories C ON glpi_tickets.itilcategories_id = C.id 
        WHERE glpi_tickets.is_deleted = 0
        AND glpi_tickets.entities_id = $entity_id
        AND glpi_tickets.date $dates";

        $result = $DB->query($sql) or die('erro');
        $arr_result = ['main' => [], 'drilldown' => []];

        while ($row_result = $DB->fetchAssoc($result)) {


            $key_name = $row_result['GrupoName'];


            if (!isset($arr_result['main'][$key_name])) {
                $arr_result['main'][$key_name] = 1;
            } else {
                $arr_result['main'][$key_name]++;
            }

            // Contar por nombre de categoría
            $categoria = !empty($row_result['nombre_categoria']) ? $row_result['nombre_categoria'] : 'Sin categorizar' ;
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
    // POR ENTIDAD Y SUBENTIDADES
    final function getEntitiesTicketsCatByGroup(string $date_ini, string $date_fin, string $entity_id = null): array
    {

        global $DB;
        $entity_id = $entity_id ?? $this->current_entity;
        $dates = $date_ini == $date_fin ? "LIKE '" . $date_ini . "%'" : "BETWEEN '" . $date_ini . " 00:00:00' AND '" . $date_fin . " 23:59:59'";


        $sql = "WITH RECURSIVE EntidadHierarchy AS (
            SELECT id, name, entities_id
            FROM glpi_entities
            WHERE id = $entity_id
            UNION ALL
            SELECT e.id, e.name, e.entities_id
            FROM glpi_entities e
            JOIN EntidadHierarchy eh ON e.entities_id = eh.id
            )
            SELECT 
            g.name AS GrupoName, C.completename AS nombre_categoria
            FROM EntidadHierarchy eh
            JOIN glpi_tickets t ON eh.id = t.entities_id
            LEFT JOIN glpi_groups_tickets gt ON t.id = gt.tickets_id
            LEFT JOIN glpi_groups g ON gt.groups_id = g.id
            LEFT JOIN glpi_itilcategories C ON t.itilcategories_id = C.id
            WHERE t.is_deleted = '0'
            AND t.date $dates
            AND gt.groups_id IS NOT NULL";


        $result = $DB->query($sql) or die('erro');
        $arr_result = ['main' => [], 'drilldown' => []];

        while ($row_result = $DB->fetchAssoc($result)) {


            $key_name = $row_result['GrupoName'];


            if (!isset($arr_result['main'][$key_name])) {
                $arr_result['main'][$key_name] = 1;
            } else {
                $arr_result['main'][$key_name]++;
            }


            // Contar por nombre de categoría
            $categoria = !empty($row_result['nombre_categoria']) ? $row_result['nombre_categoria'] : 'Sin categorizar' ;
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
     * Obtner tiempo medio de respuesta de las incidencias
     */
    // POR ENTIDAD
    final function getEntityTicketsTimeResp(string $date_ini, string $date_fin, string $entity_id = null): array
    {

        global $DB;
        $entity_id = $entity_id ?? $this->current_entity;
        $dates = $date_ini == $date_fin ? "LIKE '" . $date_ini . "%'" : "BETWEEN '" . $date_ini . " 00:00:00' AND '" . $date_fin . " 23:59:59'";

        $sql = "SELECT glpi_itilcategories.id, glpi_itilcategories.completename AS nameCategory,
        ROUND(AVG(glpi_tickets.takeintoaccount_delay_stat),0) AS timeavg,
        SEC_TO_TIME(ROUND(AVG(glpi_tickets.takeintoaccount_delay_stat),0)) AS tiempo, glpi_entities.name AS nameEntity
        FROM glpi_tickets 
        INNER JOIN glpi_itilcategories ON glpi_tickets.itilcategories_id = glpi_itilcategories.id
        LEFT JOIN glpi_entities ON glpi_tickets.entities_id = glpi_entities.id
        WHERE glpi_tickets.is_deleted = 0
        AND glpi_tickets.`itilcategories_id` = glpi_itilcategories.id
        AND glpi_tickets.takeintoaccount_delay_stat != 0
        AND glpi_tickets.date $dates
        AND glpi_entities.id = $entity_id
        GROUP BY id
        ORDER BY timeavg DESC;";


        $result = $DB->query($sql) or die('erro');
        $arr_result = [];

        $resp_datos = [];
        while ($row_result = $DB->fetchAssoc($result)) {

            $resp_datos['nameCategory'] = !empty($row_result['nameCategory']) ? $row_result['nameCategory'] : 'Sin categorizar';
            $resp_datos['timeavg'] = $row_result['timeavg'];

            $arr_result[] = $resp_datos;
        }
        $result->free();
        return $arr_result;
    }
    // POR ENTIDAD Y SUBENTIDADES
    final function getEntitiesTicketsTimeResp(string $date_ini, string $date_fin, string $entity_id = null): array
    {
        global $DB;
        $entity_id = $entity_id ?? $this->current_entity;
        $dates = $date_ini == $date_fin ? "LIKE '" . $date_ini . "%'" : "BETWEEN '" . $date_ini . " 00:00:00' AND '" . $date_fin . " 23:59:59'";


        $sql = "WITH RECURSIVE EntidadHierarchy AS (
            SELECT id, name, entities_id
            FROM glpi_entities
            WHERE id = $entity_id
            UNION ALL
            SELECT e.id, e.name, e.entities_id
            FROM glpi_entities e
            JOIN EntidadHierarchy eh ON e.entities_id = eh.id
            )
            SELECT glpi_itilcategories.id, glpi_itilcategories.completename AS nameCategory,
            ROUND(AVG(t.takeintoaccount_delay_stat),0) AS timeavg
        	-- SEC_TO_TIME(ROUND(AVG(t.takeintoaccount_delay_stat),0)) AS tiempo
            FROM EntidadHierarchy eh
            JOIN glpi_tickets t ON eh.id = t.entities_id
            LEFT JOIN glpi_itilcategories ON t.itilcategories_id = glpi_itilcategories.id
            WHERE t.is_deleted = '0'
            AND t.takeintoaccount_delay_stat != 0
            AND t.date $dates
            GROUP BY id
            ORDER BY timeavg DESC;";

        $result = $DB->query($sql) or die('erro');
        $arr_result = [];

        $resp_datos = [];
        while ($row_result = $DB->fetchAssoc($result)) {

            $resp_datos['nameCategory'] = (!empty($row_result['nameCategory']) && $row_result['nameCategory'] != null) ? $row_result['nameCategory'] : 'Sin categorizar' ;
            $resp_datos['timeavg'] = $row_result['timeavg'];

            $arr_result[] = $resp_datos;
        }
        $result->free();
        return $arr_result;
    }

    /**
     * Obtner tiempo medio de solución de las incidencias
     */
    // POR ENTIDAD
    final function getEntityTicketsSolveTime(string $date_ini, string $date_fin, string $entity_id = null): array
    {
        global $DB;
        $entity_id = $entity_id ?? $this->current_entity;
        $dates = $date_ini == $date_fin ? "LIKE '" . $date_ini . "%'" : "BETWEEN '" . $date_ini . " 00:00:00' AND '" . $date_fin . " 23:59:59'";

        $sql = "SELECT glpi_itilcategories.id, glpi_itilcategories.completename AS nameCategory,
        ROUND(AVG(glpi_tickets.solve_delay_stat), 0) AS timeavg
        FROM glpi_itilcategories
        INNER JOIN glpi_tickets ON glpi_itilcategories.id = glpi_tickets.itilcategories_id
        LEFT JOIN glpi_entities ON glpi_tickets.entities_id = glpi_entities.id
        WHERE glpi_tickets.is_deleted = 0
        AND glpi_tickets.`itilcategories_id` = glpi_itilcategories.id
        AND glpi_tickets.date $dates
        AND glpi_entities.id = $entity_id
        AND glpi_tickets.solve_delay_stat != 0
        GROUP BY id
        ORDER BY timeavg DESC";

        $result = $DB->query($sql) or die('erro');
        $arr_result = [];

        $resp_datos = [];
        while ($row_result = $DB->fetchAssoc($result)) {

            $resp_datos['nameCategory'] = !empty($row_result['nameCategory']) ? $row_result['nameCategory'] : 'Sin categorizar';
            $resp_datos['timeavg'] = $row_result['timeavg'];
            // $resp_datos['y'] = sectotime(round($row_result['tclose']));

            $arr_result[] = $resp_datos;
        }
        $result->free();
        return $arr_result;
    }
    // POR ENTIDAD Y SUBENTIDADES
    final function getEntitiesTicketsSolveTime(string $date_ini, string $date_fin, string $entity_id = null): array
    {
        global $DB;
        $entity_id = $entity_id ?? $this->current_entity;
        $dates = $date_ini == $date_fin ? "LIKE '" . $date_ini . "%'" : "BETWEEN '" . $date_ini . " 00:00:00' AND '" . $date_fin . " 23:59:59'";

        $sql = "WITH RECURSIVE EntidadHierarchy AS (
            SELECT id, name, entities_id
            FROM glpi_entities
            WHERE id = $entity_id
            UNION ALL
            SELECT e.id, e.name, e.entities_id
            FROM glpi_entities e
            JOIN EntidadHierarchy eh ON e.entities_id = eh.id
            )
            SELECT glpi_itilcategories.id, glpi_itilcategories.completename AS nameCategory,
            ROUND(AVG(t.solve_delay_stat), 0) AS timeavg
            FROM EntidadHierarchy eh
            JOIN glpi_tickets t ON eh.id = t.entities_id
            LEFT JOIN glpi_itilcategories ON t.itilcategories_id = glpi_itilcategories.id
            WHERE t.is_deleted = 0
            AND t.solve_delay_stat != 0
            AND t.date $dates
            GROUP BY id
            ORDER BY timeavg DESC";


        $result = $DB->query($sql) or die('erro');
        $arr_result = [];

        $resp_datos = [];
        while ($row_result = $DB->fetchAssoc($result)) {

            $resp_datos['nameCategory'] = !empty($row_result['nameCategory']) ? $row_result['nameCategory'] : 'Sin categorizar';
            $resp_datos['timeavg'] = $row_result['timeavg'];
            // $resp_datos['y'] = sectotime(round($row_result['tclose']));

            $arr_result[] = $resp_datos;
        }
        $result->free();
        return $arr_result;
    }
}