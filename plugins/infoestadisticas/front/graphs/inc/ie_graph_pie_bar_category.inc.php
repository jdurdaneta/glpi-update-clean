<?php

?>

<script type='text/javascript'>
    /* document.addEventListener('DOMContentLoaded', function() {
        graphPie(garphCatData);
    }); */

    // Variables de PHP a javaScript para HighChart


    // Crear Variable del objeto con los datos necesarios para Highcharts
    let garphCatData = JSON.parse('<?= $jsonDataGraphCat ?>');

    // funciones de los botones.
    let btnBar = document.getElementById('show_bar');
    let btnPie = document.getElementById('show_pie');
    btnBar.addEventListener('click', () => {
        graphBar(garphCatData);
    });
    btnPie.addEventListener('click', () => {
        graphPie(garphCatData);
    });


    // Constantes creadas para Highcharts
    const graphPie = (garphCatData) => {

        let chart1 = Highcharts.chart('graphcat', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: garphCatData.title
            },
            subtitle: {
                text: garphCatData.subtitle
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
            /* legend: {
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
            }, */
            series: [{
                name: garphCatData.nameSerie,
                colorByPoint: true,
                data: garphCatData.serie
            }],
            exporting: {
                // showTable: true
            }
        });
    };


    const graphBar = (garphCatData) => {
        let chart2 = Highcharts.chart('graphcat', {
            chart: {
                type: 'bar'
            },
            title: {
                text: garphCatData.title
            },
            subtitle: {
                text: garphCatData.subtitle
            },

            xAxis: {
                categories: garphCatData.categories,
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
                name: garphCatData.nameSerie,
                data: garphCatData.serie,
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
    graphBar(garphCatData);
</script>