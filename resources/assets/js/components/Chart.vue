<template>
    <div id="chart">
        <apexchart type="bar" height="350" :options="chartOptions" :series="series"></apexchart>
    </div>
</template>

<script>
    import ApexCharts from 'vue-apexcharts'

    export default {
        components: {
          apexchart: ApexCharts,
        },
        props: ['rates'],
        data() {
            return {
                series: [{
                    data: []
                }],
                chartOptions: {
                    chart: {
                    type: 'bar',
                    height: 350
                    },
                    plotOptions: {
                    bar: {
                        horizontal: true,
                    }
                    },
                    dataLabels: {
                    enabled: false
                    },
                    xaxis: {
                    categories: [
                        '1 Star', '2 Star', '3 Star', '4 Star', '5 Star'
                    ],
                    }
                },
            }
        },
        created() {
            this.formatChart();
        },
        methods: {
            formatChart() {
                this.series[0].data = [0, 0, 0, 0, 0];
                for (let index = 0; index < this.rates.length; index++) {
                    const rate = this.rates[index].rating;
                    switch (rate) {
                        case 1:
                            this.series[0].data[0] = this.rates[index].count_user_rate;
                            break;
                        case 2:
                            this.series[0].data[1] = this.rates[index].count_user_rate;
                            break;
                        case 3:
                            this.series[0].data[2] = this.rates[index].count_user_rate;
                            break;
                        case 4:
                            this.series[0].data[3] = this.rates[index].count_user_rate;
                            break;
                        case 5:
                            this.series[0].data[4] = this.rates[index].count_user_rate;
                            break;
                        default:
                            break;
                    }
                }
            }
        }
    }
</script>
