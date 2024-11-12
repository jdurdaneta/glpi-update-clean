<script type='text/javascript'>
    // Crear Variable del objeto con los datos necesarios para Highcharts
    let garphTechAge = JSON.parse('<?= $jsonDataTechAge ?>');

    const grapBarOpenTickets = (garphTechAge) => {
        let chat1 = Highcharts.chart('graftech_age', {
            chart: {
                type: 'column'
            },
            title: {
                text: garphTechAge.title
            },
            subtitle: {
                text: garphTechAge.subtitle
            },
            accessibility: {
                announceNewData: {
                    enabled: true
                }
            },
            xAxis: {
                type: 'category',
                categories: garphTechAge.categories,
                labels: {
                    align: 'center',
                    rotation: 0,
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
                name: 'Incidencias',
                colorByPoint: true,
                data: garphTechAge.serie.main
            }],
            drilldown: {
                breadcrumbs: {
                    position: {
                        align: 'right'
                    }
                },
                activeAxisLabelStyle: {
                        textDecoration: 'none',
                    },
                    activeDataLabelStyle: {
                        textDecoration: 'none',
                        color: '#333333'
                    },
                    allowPointDrilldown: true,
                series: garphTechAge.serie.drilldown
            }
        });
    }

    // Ejecutar para que muestre la gráfica
    grapBarOpenTickets(garphTechAge);
</script>
