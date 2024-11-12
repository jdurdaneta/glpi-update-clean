<?php

?>

<script type='text/javascript'>

    // Crear Variable del objeto con los datos necesarios para Highcharts
    let garphDataEntities = JSON.parse('<?= $jsonDataGraphEntities ?>');

    // funciones de los botones.
    let btnBarEntities = document.getElementById('show_bar_entities');
    let btnPieEntities = document.getElementById('show_pie_entities');
    btnBarEntities.addEventListener('click', () => {
        graphBarEntities(garphDataEntities);
    });
    btnPieEntities.addEventListener('click', () => {
        graphPieEntities(garphDataEntities);
    });


    // Constantes creadas para Highcharts
    const graphPieEntities = (garphDataEntities) => {

        let chart1 = Highcharts.chart('graphEntities', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: garphDataEntities.title
            },
            subtitle: {
                text: garphDataEntities.subtitle
            },
            tooltip: {
                pointFormat: '<b>{point.y}</b> incidencias'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    // size: 500,
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                    },
                    showInLegend: true
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                y: 30,
                navigation: {
                    activeColor: '#3E576F',
                    animation: true,
                    arrowSize: 12,
                    inactiveColor: '#CCC',
                    style: {
                        fontWeight: 'bold',
                        color: '#333'
                    }
                }
            },
            series: [{
                name: garphDataEntities.nameSerie,
                colorByPoint: true,
                data: garphDataEntities.serie
            }],
            exporting: {
                // showTable: true
            }
        });
    };


    const graphBarEntities = (garphDataEntities) => {
        let chart2 = Highcharts.chart('graphEntities', {
            chart: {
                type: 'bar'
            },
            title: {
                text: garphDataEntities.title
            },
            subtitle: {
                text: garphDataEntities.subtitle
            },

            xAxis: {
                categories: garphDataEntities.categories,
                labels: {
                    rotation: 0,
                    align: 'right',
                    style: {
                        //fontSize: '11px',
                        //fontFamily: 'Verdana, sans-serif'
                    }
                }
            },
            yAxis: {
                min: 0,
                title: {
                    // text: 'Número de incidencias',
                }
            },
            tooltip: {
                headerFormat: '<span style=\"font-size:10px\">{point.key}</span><table>',
                pointFormat: '<tr><td style=\"color:{series.color};padding:0\">{series.name}: </td>' +
                    '<td style=\"padding:0\"><b>{point.y} </b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                bar: {
                    pointPadding: 0.2,
                    borderWidth: 0,
                    borderWidth: 2,
                    borderColor: 'white',
                    shadow: true,
                    showInLegend: false,
                }
            },
            series: [{
                colorByPoint: true,
                name: garphDataEntities.nameSerie,
                data: garphDataEntities.serie,
                dataLabels: {
                    enabled: true,
                    // color: '#000099',
                    align: 'center',
                    x: 12,
                    y: 1,
                    style: {
                        //fontSize: '13px',
                        //fontFamily: 'Verdana, sans-serif'
                    }
                }
            }]
        });

    }
    graphPieEntities(garphDataEntities);
</script>