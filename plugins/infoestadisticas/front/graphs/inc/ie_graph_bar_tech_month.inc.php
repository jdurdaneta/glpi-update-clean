<script type='text/javascript'>
let garphTechInciMonthOpen = JSON.parse('<?= $jsonDataAbierta ?>');
let garphTechInciMonthClose = JSON.parse('<?= $jsonDataCerrada ?>');
let nameSeriesOpen = "<?= $nameSeriesOpen ?>"; 
let nameSeriesClose = "<?= $nameSeriesClose ?>"; 



const graphTechMonth = () => {
    let chat1 = Highcharts.chart('grafTechInciMonth', {
            chart: {
                type: 'column'
            },
            title: {
                text: garphTechInciMonthOpen.title
            },
            legend: {
                layout: 'horizontal',
                align: 'center',
                verticalAlign: 'bottom',
                x: 0,
                y: 0,
                //floating: true,
                borderWidth: 0,
					 adjustChartSize: true
            },
            xAxis: {
                categories: garphTechInciMonthOpen.categories,
						  labels: {
                    rotation: -45,
                    align: 'right'
                }
            },
            yAxis: {
                title: {
                    text: ''
                }
            },
            tooltip: {
                shared: true
            },
            credits: {
                enabled: false
            },
            plotOptions: {
                column: {
                    fillOpacity: 0.5,
                    borderWidth: 1,
                	  borderColor: 'white',
                	  shadow:true,
                    dataLabels: {
	                 	enabled: true
	                 },
                },
                spline: {
		            lineWidth: 4,
		            states: {
		                hover: {
		                    lineWidth: 5
		                }
		            },
		            marker: {
		                enabled: false
		            },
		        },
            },
          series: [{

                name: nameSeriesOpen,
                data: garphTechInciMonthOpen.serie },

                {
                name: nameSeriesClose,
                data: garphTechInciMonthClose.serie

            }]
        });
    };
    graphTechMonth();

</script>
