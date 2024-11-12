<script>
    // Crear Variable del objeto con los datos necesarios para Highcharts
    let garphTimeRespData = JSON.parse('<?= $jsonDataTimeRespData ?>');
    const graphRespEntity = () => {
        let chart5 = Highcharts.chart('grafTimeResp', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: garphTimeRespData.title
            },
            subtitle: {
                text: garphTimeRespData.subtitle
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
                pointFormat: '<b>{point.percentage:.1f}%</b></br>{point.x}'
            },
            accessibility: {
                point: {
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: garphTimeRespData.nameSerie,
                colorByPoint: true,
                data: garphTimeRespData.serie
            }],
            exporting: {
                // showTable: true
            }
        });
    }
    graphRespEntity();
</script>