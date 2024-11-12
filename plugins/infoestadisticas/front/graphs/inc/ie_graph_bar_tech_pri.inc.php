<script type='text/javascript'>
    // Crear Variable del objeto con los datos necesarios para Highcharts
    let garphPriorityData = JSON.parse('<?= $jsonDataTicketPriority ?>');

    // agregamos las propiedads Sliced true y selected al estado asignado
    if (garphPriorityData.serie.main.length > 0) {
        garphPriorityData.serie.main[0].sliced = true;
        garphPriorityData.serie.main[0].selected = true;
    }

    const garphPriority = (garphPriorityData) => {
        let chart1 = // Create the chart
            Highcharts.chart('graftech_pri', {
                chart: {
                    type: 'pie'
                },
                title: {
                    text: garphPriorityData.title,
                    align: 'center'
                },
                subtitle: {
                    text: garphPriorityData.subtitle,
                    align: 'center'
                },

                accessibility: {
                    announceNewData: {
                        enabled: true
                    },
                    point: {
                        valueSuffix: '%'
                    }
                },

                plotOptions: {
                    series: {
                        borderRadius: 5,
                        dataLabels: [{
                            enabled: true,
                            distance: 15,
                            format: '{point.name}: {point.percentage:.1f}%'
                        }, {
                            enabled: true,
                            distance: '-30%',
                            filter: {
                                property: 'percentage',
                                operator: '>',
                                value: 5
                            },
                            format: '{point.percentage:.1f}%',
                            style: {
                                fontSize: '0.9em',
                                textOutline: 'none'
                            }
                        }]
                    }
                },

                tooltip: {
                    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b><br/>'
                },

                series: [{
                    // type: 'pie',
                    name: garphPriorityData.nameSerie,
                    data: garphPriorityData.serie.main
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
                    series: garphPriorityData.serie.drilldown
                }

            });
    }

    // Ejecutar para que muestre la gráfica
    garphPriority(garphPriorityData);
</script>