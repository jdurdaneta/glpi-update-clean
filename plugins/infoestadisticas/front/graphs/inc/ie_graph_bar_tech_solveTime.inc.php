<script type='text/javascript'>
let garphTechResolTime = JSON.parse('<?= $jsonDataTechResolTime ?>');

const graphTechResolTime = (garphTechResolTime) => {

let chat1 = Highcharts.chart('graftech_ResolTime', {
    chart: {
    type: 'pie',
    options3d: {
        enabled: false,
        alpha: 45,
        beta: 0
    },
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false
    },
    title: {
        text: garphTechResolTime.title
    },

    tooltip: {
        pointFormat: '{series.name}: <b>{point.y} - ({point.percentage:.1f}%)</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            size: '85%',
            innerSize: 90,
            depth: 40,
            dataLabels: {
                    format: '{point.y} - ({point.percentage:.1f}%)',
                      style: {
                        color:   (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
            },
            showInLegend: true
    }
    },
    series: [{
        type: 'pie',
        // name: '".__('Incidencias','infoestadisticas')."',
        data: garphTechResolTime.serie 
        }]
        
    });
}
graphTechResolTime(garphTechResolTime);
</script>