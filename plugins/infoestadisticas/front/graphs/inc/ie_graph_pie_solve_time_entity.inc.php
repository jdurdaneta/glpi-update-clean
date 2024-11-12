<script>
    // Crear Variable del objeto con los datos necesarios para Highcharts
    let graphSolveTimeData = JSON.parse('<?= $jsonDataSolveTimeData ?>');
 


    const graphSolveTime = (graphSolveTimeData) => {
        let chart5 = Highcharts.chart('grafTimeSolve', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: graphSolveTimeData.title
            },
            subtitle: {
                text: 'No se tiene en cuenta el tiempo en espera <br>' + graphSolveTimeData.subtitle
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
            tooltip: {
                // pointFormat: '<b>{point.percentage:.1f}%</b>'
                pointFormat: '<b>{point.percentage:.1f}%</b></br>{point.x}'
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
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                    },
                    showInLegend: true
                }
            },
            series: [{
                // name: '$name_serie',
                colorByPoint: true,
                data: graphSolveTimeData.serie
            }],
            exporting: {
                // showTable: true
            }
        });
    }


    graphSolveTime(graphSolveTimeData);
</script>

</script>