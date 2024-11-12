<script type='text/javascript'>
    // Crear Variable del objeto con los datos necesarios para Highcharts
    let garphTicketGroupData = JSON.parse('<?= $jsonDataGroupSerieData ?>');

    const graphGroupEntity = (garphTicketGroupData) => {
        let chat1 = Highcharts.chart('grafGroupEntity', {
            chart: {
                type: 'column',
                events: {
                    drilldown: function(e) {
                        this.xAxis[0].update({
                            labels: {
                                rotation: 0,
                            }
                        });
                    },
                    drillup: function(e) {
                        this.xAxis[0].update({
                            labels: {
                                rotation: -400,
                            }
                        });
                    }
                },
            },
            title: {
                text: garphTicketGroupData.title
            },
            subtitle: {
                text: garphTicketGroupData.subtitle
            },
            accessibility: {
                announceNewData: {
                    enabled: true
                }
            },
            xAxis: {
                type: 'category',
                categories: garphTicketGroupData.categories,
                labels: {
                    align: 'center',
                    rotation: -400,
                    y: 33,
                    style: {
                        //fontSize: '11px',
                        //fontFamily: 'Verdana, sans-serif'
                    }
                }
            },
            yAxis: {
                title: {
                    text: 'Número de incidencias mensuales'
                }

            },
            legend: {
                enabled: false
            },
            plotOptions: {
                /* series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        format: '{point.y}'
                    }
                }, */
                column: {
                    dataLabels: {
                        enabled: true,
                        x: 5,
                        y: 0,
                        format: '{point.y}'
                    },
                    borderWidth: 2,
                    borderColor: 'white',
                    shadow: true,
                    showInLegend: false
                },
                series: {
                    animation: {
                        duration: 2000,
                        easing: 'easeOutBounce'
                    }
                }
            },
            tooltip: {
                headerFormat: '<span style="color:{point.color}">{point.key}</span><br>',
                pointFormat: '<span style="font-size:11px">{series.name}</span>: <b>{point.y}</b><br/>'
            },

            series: [{
                name: 'Incidencias',
                colorByPoint: true,
                data: garphTicketGroupData.serie.main,
                dataLabels: {
                    enabled: true,
                    // color: '#000099',
                    style: {
                        // fontSize: '13px',
                        // fontFamily: 'Verdana, sans-serif'
                    }
                }
            }],
            drilldown: {
                breadcrumbs: {
                    position: {
                        align: 'right'
                    }
                },
                series: garphTicketGroupData.serie.drilldown
            }
        });
    }

    // Ejecutar para que muestre la gráfica
    graphGroupEntity(garphTicketGroupData);
</script>