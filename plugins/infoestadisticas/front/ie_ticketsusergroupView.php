<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<table class="tab_cadre_fixe">
    <tbody>
        <tr>
            <th colspan="2" class=""><?= $titlepage ?></th>
        </tr>
        <tr class="tab_bg_1">
            <td class="center">
                <form method='GET' name='form' action='<?= $target ?>'>
                    <div class='center'>
                        <table class='tab_cadre'>
                            <tr class='tab_bg_2'>
                                <td class='right'><?php echo  __('Start date') ?></td>
                                <td>
                                    <?php Html::showDateField("date1", ['value' => $date_ini]); ?>
                                </td>
                                <td rowspan='2' class='center'>
                                    <!-- <input type='hidden' name='itemtype' value=\"".$_GET['itemtype']."\"> -->
                                    <input type='submit' class='submit' value="<?php echo  __s('Display report') ?>">
                                </td>
                            </tr>
                            <tr class='tab_bg_2'>
                                <td class='right'><?php echo  __('End date') ?></td>
                                <td>
                                    <?php Html::showDateField("date2", ['value' => $date_fin]); ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan='3' class='center'>
                                    <label><?= __('Grupo de usuario: ') ?></label>
                                    <?php echo dropdown($optionName, $options, selected: $select_value); ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <!-- // form using GET method : CRSF not needed -->
                    <?php Html::closeForm(); ?>
                </form>
            </td>
        </tr>
    </tbody>
</table>

<?php
if (isset($msg_err)) :
?>
    <div class="center">
        <h3><?= $msg_err ?></h3>
    </div>

<?php
else :
?>
    <div class="stats_contianer">
        <!-- Gráfica por Categoría -->
        <div class="container-stats">
            <div class="container_buttons">
                <button id="show_bar" class="btn btn-secondary"><i class="fa fa-bar-chart" aria-hidden="true"></i></button>
                <button id="show_pie" class="btn btn-secondary"><i class="fa fa-pie-chart" aria-hidden="true"></i></button>
            </div>
            <figure class="highcharts-figure">
                <div id="graphcat" class="col-md-12 col-sm-12" style="height: 500px">
                    <!--ie_grafcat_entidad.inc  -->
                </div>
            </figure>
        </div>
        <!-- Gráfica por Estado -->
        <div class="container-stats">
            <div class="container_buttons">
                <button class="verContenido btn btn-secondary" data-mostrar="graph_status" data-ocultar="datatable_status" title="Ver Gráfica">
                    <i class="fa fa-pie-chart" aria-hidden="true"></i>
                </button>
                <button class="verContenido btn btn-secondary" data-mostrar="datatable_status" data-ocultar="graph_status" title="Ver Tabla">
                    <i class="fa fa-table" aria-hidden="true"></i>
                </button>
            </div>
            <div id="graph_status" class="contenedor mostrar">
                <figure class="highcharts-figure">
                    <div id="graphstat" class="col-md-12 col-sm-12">
                        <!-- ie_graph_status_entidad.inc -->
                    </div>
                </figure>
            </div>
            <div id="datatable_status" class="datatable-container contenedor ocultar">
                <h4 class="title"><?= $titulo_status ?></h4>
                <h6 class="subtitle"><?= $subtitulo_status ?></h6>
                <table class="datatable">
                    <tr>
                        <th>Estado de la incidencia</th>
                        <th>Cantidad</th>
                    </tr>
                    <?php
                    foreach ($dataTable_status as $key => $value) :
                    ?>
                        <tr>
                            <td><?= $key ?></td>
                            <td><?= $value ?></td>
                        </tr>
                    <?php
                    endforeach;
                    ?>
                </table>
            </div>
        </div>
        <!-- Gráfica Asignada Abierta por Mes-->
        <div class="container-stats">
            <div class="container_buttons">
                <button class="verContenido btn btn-secondary" data-mostrar="graph_ticketsMonths" data-ocultar="datatable_ticketsMonths" title="Ver Gráfica">
                    <i class="fa fa-chart-column" aria-hidden="true"></i>
                </button>
                <button class="verContenido btn btn-secondary" data-mostrar="datatable_ticketsMonths" data-ocultar="graph_ticketsMonths" title="Ver Tabla">
                    <i class="fa fa-table" aria-hidden="true"></i>
                </button>
            </div>
            <div id="graph_ticketsMonths" class="contenedor mostrar">
                <figure class="highcharts-figure">
                    <div id="grafmonthEntity" class="col-md-12 col-sm-12">
                        <!-- ie_graph_status_entidad.inc -->
                    </div>
                </figure>
            </div>
            <div id="datatable_ticketsMonths" class="datatable-container contenedor ocultar">
                <h4 class="title"><?= $titulo_month ?></h4>
                <h6 class="subtitle"><?= $subtitle_mainEntityMonth ?></h6>
                <table class="datatable">
                    <tr>
                        <th>Mes</th>
                        <th>Cantidad</th>
                    </tr>
                    <?php
                    foreach ($dataTable_tiketsMonth as $key => $value) :
                    ?>
                        <tr>
                            <td><?= $key ?></td>
                            <td><?= $value ?></td>
                        </tr>
                    <?php
                    endforeach;
                    ?>
                </table>
            </div>
        </div>
        <!-- Gráfica Asignada Cerrada por mes -->
        <div class="container-stats">
            <?php
            if (!$hasTicketClose) :
            ?>
                <div class="tarjeta">
                    <div class="center">
                        <h4 class="titulo"><?= $titulo_close ?></h4>
                        <h6 class="mensaje"><?= $msg_inciCerrada ?></h6>
                    </div>
                </div>
            <?php
            else :
            ?>
                <div class="container_buttons">
                    <button class="verContenido btn btn-secondary" data-mostrar="graph_ticketsClose" data-ocultar="datatable_ticketsClose" title="Ver Gráfica">
                        <i class="fa fa-chart-column" aria-hidden="true"></i>
                    </button>
                    <button class="verContenido btn btn-secondary" data-mostrar="datatable_ticketsClose" data-ocultar="graph_ticketsClose" title="Ver Tabla">
                        <i class="fa fa-table" aria-hidden="true"></i>
                    </button>
                </div>
                <div id="graph_ticketsClose" class="contenedor mostrar">
                    <figure class="highcharts-figure">
                        <div id="grafCloseEntity" class="col-md-12 col-sm-12">
                            <!-- ie_graph_status_entidad.inc -->
                        </div>
                    </figure>
                </div>
                <div id="datatable_ticketsClose" class="datatable-container contenedor ocultar">
                    <h4 class="title"><?= $titulo_close ?></h4>
                    <h6 class="subtitle"><?= $subtitle_tiketsClose ?></h6>
                    <table class="datatable">
                        <tr>
                            <th>Mes</th>
                            <th>Cantidad</th>
                        </tr>
                        <?php
                        foreach ($dataTable_ticketClose as $key => $value) :
                        ?>
                            <tr>
                                <td><?= $key ?></td>
                                <td><?= $value ?></td>
                            </tr>
                        <?php
                        endforeach;
                        ?>
                    </table>
                </div>
            <?php
            endif;
            ?>
        </div>
        <!-- Gráfica Antiguedad de incidecnica abierta -->
        <div class="container-stats">
            <?php
            if (isset($msg_inciAntiguedad)) :
            ?>

                <div class="tarjeta">
                    <div class="center">
                        <h4 class="titulo"><?= $titulo_ticketAge ?></h4>
                        <h6 class="mensaje"><?= $msg_inciAntiguedad ?></h6>
                    </div>
                </div>
            <?php
            else :
            ?>
                <div class="container_buttons">
                    <button class="verContenido btn btn-secondary" data-mostrar="graph_ticketAge" data-ocultar="datatable_ticketAge" title="Ver Gráfica">
                        <i class="fa-solid fa-chart-column" aria-hidden="true"></i>
                    </button>
                    <button class="verContenido btn btn-secondary" data-mostrar="datatable_ticketAge" data-ocultar="graph_ticketAge" title="Ver Tabla">
                        <i class="fa fa-table" aria-hidden="true"></i>
                    </button>
                </div>
                <div id="graph_ticketAge" class="contenedor mostrar">
                    <figure class="highcharts-figure">
                        <div id="graftech_age" class="col-md-12 col-sm-12">
                            <!-- ie_graph_status_entidad.inc -->
                        </div>
                    </figure>
                </div>
                <div id="datatable_ticketAge" class="datatable-container contenedor ocultar">
                    <h4 class="title"><?= $titulo_ticketAge ?></h4>
                    <h6 class="subtitle"><?= $subtitulo_ticketAge ?></h6>
                    <table class="datatable">
                        <tr>
                            <th>Tiempo de la incidencia</th>
                            <th>Cantidad</th>
                        </tr>
                        <?php
                        foreach ($dataTable_ticketAge as $key => $value) :
                        ?>
                            <tr>
                                <td><?= $key ?> días</td>
                                <td><?= $value ?></td>
                            </tr>
                        <?php
                        endforeach;
                        ?>
                    </table>
                </div>
            <?php
            endif
            ?>
        </div>
        <!-- Gráfica indicienica por prioridad -->
        <div class="container-stats">
            <div class="container_buttons">
                <button class="verContenido btn btn-secondary" data-mostrar="graph_ticketPriority" data-ocultar="datatable_ticketPriority" title="Ver Gráfica">
                    <i class="fa fa-pie-chart" aria-hidden="true"></i>
                </button>
                <button class="verContenido btn btn-secondary" data-mostrar="datatable_ticketPriority" data-ocultar="graph_ticketPriority" title="Ver Tabla">
                    <i class="fa fa-table" aria-hidden="true"></i>
                </button>
            </div>
            <div id="graph_ticketPriority" class="contenedor mostrar">
                <figure class="highcharts-figure">
                    <div id="graftech_pri" class="col-md-12 col-sm-12">

                    </div>
                </figure>
            </div>
            <div id="datatable_ticketPriority" class="datatable-container contenedor ocultar">
                <h4 class="title"><?= $titulo_ticketPriority ?></h4>
                <h6 class="subtitle"><?= $subtitulo_ticketPriority ?></h6>
                <table class="datatable">
                    <tr>
                        <th>Prioridad</th>
                        <th>Cantidad</th>
                    </tr>
                    <?php
                    foreach ($dataTable_ticketPriority as $key => $value) :
                    ?>
                        <tr>
                            <td><?= $key ?></td>
                            <td><?= $value ?></td>
                        </tr>
                    <?php
                    endforeach;
                    ?>
                </table>
            </div>
        </div>
        <!-- Gráfica Horas trabajada  -->
        <?php
        if (!$has_TicketSolve) :
        ?>
            <div class="container-stats">
                <div class="tarjeta">
                    <div class="center">
                        <h4 class="titulo"><?= $titulo_hourWork ?></h4>
                        <h6 class="mensaje"><?= $msg_inciNotSolve ?></h6>
                    </div>
                </div>
            </div>
        <?php
        else :
        ?>
            <div class="container-stats">
                <div class="container_buttons">
                    <button class="verContenido btn btn-secondary" data-mostrar="graph_hourWork" data-ocultar="datatable_hourWork" title="Ver Gráfica">
                        <i class="fa fa-pie-chart" aria-hidden="true"></i>
                    </button>
                    <button class="verContenido btn btn-secondary" data-mostrar="datatable_hourWork" data-ocultar="graph_hourWork" title="Ver Tabla">
                        <i class="fa fa-table" aria-hidden="true"></i>
                    </button>
                </div>
                <div id="graph_hourWork" class="contenedor mostrar">
                    <figure class="highcharts-figure">
                        <div id="graftech_hour_work" class="col-md-12 col-sm-12">

                        </div>
                    </figure>
                </div>
                <div id="datatable_hourWork" class="datatable-container contenedor ocultar">
                    <h4 class="title"><?= $titulo_hourWork ?></h4>
                    <h6 class="subtitle"><?= $subtitulo_hourWork ?></h6>
                    <table class="datatable">
                        <tr>
                            <th>Prioridad</th>
                            <th>Cantidad</th>
                        </tr>
                        <?php
                        foreach ($datatable_hourWork as $key => $value) :
                        ?>
                            <tr>
                                <td><?= $key ?></td>
                                <td><?= $value ?></td>
                            </tr>
                        <?php
                        endforeach;
                        ?>
                    </table>
                </div>
            </div>
        <?php
        endif;
        if (!$has_TicketSolve) :
        ?>
            <!-- Gráfica Periodo de resolución  -->
            <div class="container-stats">
                <div class="tarjeta">
                    <div class="center">
                        <h4 class="titulo"><?= $titulo_resolTime ?></h4>
                        <h6 class="mensaje"><?= $msg_inciNotSolve ?></h6>
                    </div>
                </div>
            </div>
        <?php
        else :
        ?>
            <div class="container-stats">
                <div class="container_buttons">
                    <button class="verContenido btn btn-secondary" data-mostrar="graph_resolTime" data-ocultar="datatable_resolTime" title="Ver Gráfica">
                        <i class="fa fa-pie-chart" aria-hidden="true"></i>
                    </button>
                    <button class="verContenido btn btn-secondary" data-mostrar="datatable_resolTime" data-ocultar="graph_resolTime" title="Ver Tabla">
                        <i class="fa fa-table" aria-hidden="true"></i>
                    </button>
                </div>
                <div id="graph_resolTime" class="contenedor mostrar">
                    <div>
                        <figure class="highcharts-figure">
                            <div id="graftech_ResolTime" class="col-md-12 col-sm-12">

                            </div>
                        </figure>
                    </div>
                </div>
                <div id="datatable_resolTime" class="datatable-container contenedor ocultar">
                    <h4 class="title"><?= $titulo_resolTime ?></h4>
                    <h6 class="subtitle"><?= $subtitulo_resolTime ?></h6>
                    <table class="datatable">
                        <tr>
                            <th>Periodo</th>
                            <th>Cantidad</th>
                        </tr>
                        <?php
                        foreach ($resolTime as $key => $value) :
                        ?>
                            <tr>
                                <td><?= $key ?></td>
                                <td><?= $value ?></td>
                            </tr>
                        <?php
                        endforeach;
                        ?>
                    </table>
                </div>
            </div>

        <?php
        endif;
        ?>
    </div>
<?php
endif;
