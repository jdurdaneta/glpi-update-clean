<?php
?>
<script type='text/javascript'>
    // Crear Variable del objeto con los datos necesarios para Highcharts
    let garphTicketCloseData = JSON.parse('<?= $jsonDataticketClose ?>');
    var defaultTitle = "Basic drilldown";
    var drilldownTitle = "More about ";
    const graphCloseBarra = (garphTicketCloseData) => {
        let chat1 = Highcharts.chart('grafCloseEntity', {
            renderTo: 'container',
            chart: {
                type: 'column',
                events: {
                    drilldown: function(e) {
                        this.xAxis[0].update({
                            title: {
                                text: '<strong>Mes en que fueron abiertas</strong>'
                            },
                        });
                    },
                    drillup: function(e) {
                        this.xAxis[0].update({
                            title: {
                                text: '<strong>Mes en que fueron cerradas</strong>',

                            },
                        });
                    }
                },
            },
            title: {
                text: garphTicketCloseData.title
            },
            subtitle: {
                text: garphTicketCloseData.subtitle
            },
            accessibility: {
                announceNewData: {
                    enabled: true
                }
            },
            xAxis: {
                title: {
                    text: '<strong>Mes en que fueron cerradas</strong>',
                    margin: 30,
                    style: {
                        fontSize: '14px',
                    }
                },
                type: 'category',
                categories: garphTicketCloseData.categories,
                labels: {
                    align: 'center',
                    rotation: 0,
                    y: 33,
                    style: {
                        //fontSize: '11px',
                        //fontFamily: 'Verdana, sans-serif'
                    },
                }
            },
            yAxis: {
                title: {
                    text: 'Número de incidencias'
                }

            },
            legend: {
                enabled: false
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        x: 5,
                        y: 0,
                        format: '{point.y}',
                        textDecoration: 'none',
                    },
                    shadow: true,
                    showInLegend: false

                }
            },
            tooltip: {
                headerFormat: '<span style="color:{point.color}">{point.key}</span><br>',
                pointFormat: '<span style="font-size:11px">{series.name}</span>: <b>{point.y}</b><br/>'
            },

            series: [{
                name: 'Incidencias cerradas',
                colorByPoint: true,
                data: garphTicketCloseData.serie.main
            }],
            drilldown: {
                breadcrumbs: {
                    position: {
                        align: 'right'
                    }
                },
                series: garphTicketCloseData.serie.drilldown
            }
        });
    }

    // Ejecutar para que muestre la gráfica
    graphCloseBarra(garphTicketCloseData);
</script>