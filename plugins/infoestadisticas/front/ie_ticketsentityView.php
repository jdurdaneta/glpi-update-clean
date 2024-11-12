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
                                <td colspan='2' class='center'>
                                    <?php echo dropdown($optionName, $options, selected: $entity_id); ?>
                                </td>
                                <td>

                                    <input type="checkbox" id="check_recursive" name="check_recursive" <?= $checkDisabled ?> />
                                    <label for="check_recursive">Mostrar Subentidades</label>

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
        <?php
        if ($show_SubEntities) :
        ?>
            <div class="container-stats">
                <div class="container_buttons">
                    <div class="container_buttons">
                        <button id="show_pie_entities" class="btn btn-secondary"><i class="fa fa-pie-chart" aria-hidden="true"></i></button>
                        <button id="show_bar_entities" class="btn btn-secondary"><i class="fa fa-bar-chart" aria-hidden="true"></i></button>
                    </div>
                </div>
                <figure class="highcharts-figure">
                    <div id="graphEntities" class="col-md-12 col-sm-12">

                    </div>
                </figure>
            </div>
        <?php
        endif;
        ?>
        <div class="container-stats">
            <div class="container_buttons">
            </div>
            <figure class="highcharts-figure">
                <div id="graphMain" class="col-md-12 col-sm-12">
                    <!--ie_grafcat_entidad.inc  -->
                </div>
            </figure>
        </div>
        <div class="container-stats">
            <div class="container_buttons">
                <button id="show_pie" class="btn btn-secondary"><i class="fa fa-pie-chart" aria-hidden="true"></i></button>
                <button id="show_bar" class="btn btn-secondary"><i class="fa fa-bar-chart" aria-hidden="true"></i></button>
            </div>
            <figure class="highcharts-figure">
                <div id="graphcat" class="col-md-12 col-sm-12" style="height: 500px">
                    <!--ie_grafcat_entidad.inc  -->
                </div>
            </figure>
        </div>
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
        <div class="container-stats">
            <?php
            if (isset($msg_EntidadCerrada)) :
            ?>
                <div class="tarjeta">
                    <div class="center">
                        <h4 class="titulo"><?= $titulo_close ?></h4>
                        <h6 class="mensaje"><?= $msg_EntidadCerrada ?></h6>
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
        <div class="container-stats">
        <?php
            if (isset($msg_EntidadGroup)) :
            ?>
                <div class="tarjeta">
                    <div class="center">
                        <h4 class="titulo"><?= $titulo_group ?></h4>
                        <h6 class="mensaje"><?= $msg_EntidadGroup ?></h6>
                    </div>
                </div>
            <?php
            else :
            ?>
                <div class="container_buttons">
                    <button class="verContenido btn btn-secondary" data-mostrar="graph_ticketsGroup" data-ocultar="datatable_ticketsGroup" title="Ver Gráfica">
                        <i class="fa fa-chart-column" aria-hidden="true"></i>
                    </button>
                    <button class="verContenido btn btn-secondary" data-mostrar="datatable_ticketsGroup" data-ocultar="graph_ticketsGroup" title="Ver Tabla">
                        <i class="fa fa-table" aria-hidden="true"></i>
                    </button>
                </div>
                <div id="graph_ticketsGroup" class="contenedor mostrar">
                    <figure class="highcharts-figure">
                        <div id="grafGroupEntity" class="col-md-12 col-sm-12">
                            <!-- ie_graph_status_entidad.inc -->
                        </div>
                    </figure>
                </div>
                <div id="datatable_ticketsGroup" class="datatable-container contenedor ocultar">
                    <h4 class="title"><?= $titulo_group ?></h4>
                    <h6 class="subtitle"><?= $subtitle_group ?></h6>
                    <table class="datatable">
                        <tr>
                            <th>Grupo</th>
                            <th>Cantidad</th>
                        </tr>
                        <?php
                        foreach ($dataTable_ticketGroup as $key => $value) :
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
        <div class="container-stats">
            <?php
            if (isset($msg_ticketNotResp)) :
            ?>
                <div class="tarjeta">
                    <div class="center">
                        <h4 class="titulo"><?= $titulo_respTime ?></h4>
                        <h6 class="mensaje"><?= $msg_ticketNotResp ?></h6>
                    </div>
                </div>
            <?php
            else :
            ?>
                <div class="container_buttons">
                    <button class="verContenido btn btn-secondary" data-mostrar="graph_timeResp" data-ocultar="datatable_timeResp" title="Ver Gráfica">
                        <i class="fa fa-pie-chart" aria-hidden="true"></i>
                    </button>
                    <button class="verContenido btn btn-secondary" data-mostrar="datatable_timeResp" data-ocultar="graph_timeResp" title="Ver Tabla">
                        <i class="fa fa-table" aria-hidden="true"></i>
                    </button>
                </div>
                <div id="graph_timeResp" class="contenedor mostrar">
                    <figure class="highcharts-figure">
                        <div id="grafTimeResp" class="col-md-12 col-sm-12">
                            <!-- ie_graph_status_entidad.inc -->
                        </div>
                    </figure>
                </div>
                <div id="datatable_timeResp" class="datatable-container contenedor ocultar">
                    <h4 class="title"><?= $titulo_respTime ?></h4>
                    <h6 class="subtitle"><?= $subtitle_respTime ?></h6>
                    <table class="datatable">
                        <tr>
                            <th>Mes</th>
                            <th>Cantidad</th>
                        </tr>
                        <?php
                        foreach ($datatable_timeResp as $key => $value) :
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
        <div class="container-stats">
        <?php
            if (isset($msg_ticketNotSolve)) :
            ?>
                <div class="tarjeta">
                    <div class="center">
                        <h4 class="titulo"><?= $titulo_solveTime ?></h4>
                        <h6 class="mensaje"><?= $msg_ticketNotSolve ?></h6>
                    </div>
                </div>
            <?php
            else :
            ?>
            <div class="container_buttons">
                <button class="verContenido btn btn-secondary" data-mostrar="graph_timeSolve" data-ocultar="datatable_timeSolve" title="Ver Gráfica">
                    <i class="fa fa-pie-chart" aria-hidden="true"></i>
                </button>
                <button class="verContenido btn btn-secondary" data-mostrar="datatable_timeSolve" data-ocultar="graph_timeSolve" title="Ver Tabla">
                    <i class="fa fa-table" aria-hidden="true"></i>
                </button>
            </div>
            <div id="graph_timeSolve" class="contenedor mostrar">
                <figure class="highcharts-figure">
                    <div id="grafTimeSolve" class="col-md-12 col-sm-12">
                        <!-- ie_graph_status_entidad.inc -->
                    </div>
                </figure>
            </div>
            <div id="datatable_timeSolve" class="datatable-container contenedor ocultar">
                <h4 class="title"><?= $titulo_solveTime ?></h4>
                <h6 class="subtitle"><?= $subtitle_solvetime ?></h6>
                <table class="datatable">
                    <tr>
                        <th>Mes</th>
                        <th>Cantidad</th>
                    </tr>
                    <?php
                    foreach ($datatable_timeSolve as $key => $value) :
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
            <?php endif;?>
        </div>
    </div>
<?php
endif;