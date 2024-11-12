<?php
?>

<script type='text/javascript'>
    // Crear Variable del objeto con los datos necesarios para Highcharts
    let garphStatusData = JSON.parse('<?= $statSerieDataDrill ?>');

    // agregamos las propiedads Sliced true y selected al estado asignado
    if (garphStatusData.serie.main.length > 0) {
        garphStatusData.serie.main[0].sliced = true;
        garphStatusData.serie.main[0].selected = true;
    }

    const graphStatPie = (garphStatusData) => {
        let chart1 = // Create the chart
            Highcharts.chart('graphstat', {
                chart: {
                    type: 'pie'
                },
                title: {
                    text: garphStatusData.title,
                    align: 'center'
                },
                subtitle: {
                    text: garphStatusData.subtitle,
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
                    name: garphStatusData.nameSerie,
                    data: garphStatusData.serie.main    
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
                    series: garphStatusData.serie.drilldown
                }
                
            });
    }

    // Ejecutar para que muestre la gráfica
    graphStatPie(garphStatusData);
</script>