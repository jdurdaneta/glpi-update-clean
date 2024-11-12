<script type='text/javascript'>
    // Crear Variable del objeto con los datos necesarios para Highcharts
    // let garphTechHourWork = JSON.parse('');
    let garphTechHourWork = <?= ($jsonDataTechHourWork) ?>;

    // función para obtener el ID de la incidencia desde el nombre de la incidencia 
    let getTicketId = (cadena) => {
        var resultado = cadena.match(/\((.*?)\)/);
        var resultado = cadena.match(/\(([^)]*)\)[^(]*$/);
        if (resultado && resultado[1]) {
            var valorEnParentesis = resultado[1];
            return valorEnParentesis;
        }
        return null;
    }

    // Agregar datatebles formateado a cada elemento del Drilldown
    var drillDownData = garphTechHourWork.serie.drilldown.map(function(obj) {

        return {
            ...obj,
            dataLabels: {
                // color: '#ec0000',
                formatter: function() {
                    let ticketId = getTicketId(this.point.name);
                    let ticketLink = ticketId ? '/front/ticket.form.php?id=' + ticketId : '#';
                    return '<a href="' + ticketLink + '" target="_blank">' + this.point.name + '</a>'
                }
            }
        };
    });

    const graphTechHourWork = (garphTechHourWork) => {
        let chart1 = // Create the chart
            Highcharts.chart('graftech_hour_work', {
                chart: {
                    type: 'pie',
                    /* events: {
                        drilldown: function(e) {
                            // chart.setTitle({ text: drilldownTitle + e.point.name });
                            console.log(this);
                            console.log(e.point.series);


                        },
                        drillup: function(e) {
                            // chart.setTitle({ text: defaultTitle });
                            console.log(e);
                        }
                    }, */
                },
                title: {
                    text: garphTechHourWork.title,
                    align: 'center'
                },
                subtitle: {
                    text: garphTechHourWork.subtitle,
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
                        dataLabels: {
                            // format: '<span style="color:#ff0000;">{point.name}</span>',

                        },
                    }
                },

                // tooltip: {
                //     headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                //     pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b><br/>'
                // },
                tooltip: {
                    formatter: function() {
                        // console.log(this);
                        return calcularHorasYMinutos(this.y)
                    }
                },
                series: [{
                    // type: 'pie',
                    // name: garphTechHourWork.nameSerie,
                    name: 'Categorías',
                    data: garphTechHourWork.serie.main,

                }],
                drilldown: {
                    allowPointDrilldown: false,
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
                    // series: objetoModificado.serie.drilldown,
                    series: drillDownData,
                },
                xAxis: [{
                    labels: {
                        useHTML: true,
                        style: {
                            color: '#ff0000'
                        }
                    }
                }]

            });
    }

    // Ejecutar para que muestre la gráfica
    graphTechHourWork(garphTechHourWork);


    // Transformar el entero de segundo del tiempo de la incidencia a segundos
    function calcularHorasYMinutos(totalMinutos) {
        var horas = Math.floor(totalMinutos / 60);
        var minutosRestantes = totalMinutos % 60;

        // Formatea los minutos para que siempre muestre dos dígitos
        var minutosFormateados = (minutosRestantes < 10) ? "0" + minutosRestantes : minutosRestantes;
        var timeString = horas + " horas " + minutosFormateados + " minutos";

        return timeString;
    }

</script>