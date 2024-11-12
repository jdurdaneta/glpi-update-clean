<?php
?>
<script type='text/javascript'>
    // Crear Variable del objeto con los datos necesarios para Highcharts
    let garphTicketMonthData = JSON.parse('<?= $jsonDataTicketMonth ?>');

    const graphMonthBarra = (garphTicketMonthData) => {
        let chat1 = Highcharts.chart('grafmonthEntity', {
            chart: {
                type: 'column',
                events: {
                    drilldown: function(e) {
                        this.xAxis[0].update({
                            title: {
                                text: '<strong>Mes en que fueron cerradas</strong>'
                            },
                        });
                    },
                    drillup: function(e) {
                        this.xAxis[0].update({
                            title: {
                                text: '<strong>Mes en que fueron abiertas</strong>',

                            },
                        });
                    }
                },
            },
            title: {
                text: garphTicketMonthData.title
            },
            subtitle: {
                text: garphTicketMonthData.subtitle
            },
            accessibility: {
                announceNewData: {
                    enabled: true
                }
            },
            xAxis: {
                title: {
                    text: '<strong>Mes en que fueron abiertas</strong>',
                    margin: 30,
                    style: {
                        fontSize: '14px',
                    }
                },
                type: 'category',
                categories: garphTicketMonthData.categories,
                labels: {
                    align: 'center',
                    rotation: 0,
                    y: 33,
                    style: {
                        //fontSize: '11px',
                        //fontFamily: 'Verdana, sans-serif'
                    }
                }, 
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
                        format: '{point.y}'
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
                name: 'Incidencias abiertas',
                colorByPoint: true,
                data: garphTicketMonthData.serie.main
            }],
            drilldown: {
                breadcrumbs: {
                    position: {
                        align: 'right'
                    }
                },
                series: garphTicketMonthData.serie.drilldown
            }
        });
    }

    // Ejecutar para que muestre la gráfica
    graphMonthBarra(garphTicketMonthData);
</script>