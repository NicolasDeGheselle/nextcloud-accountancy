<template>
    <canvas id="moneyChart"></canvas>
</template>

<script>
import { Chart, registerables  } from 'chart.js';

Chart.register(...registerables)

const colors = [
"#003f5c",
"#2f4b7c",
"#665191",
"#a05195",
"#d45087",
"#f95d6a",
"#ff7c43",
"#ffa600",
]

export default {
	name: 'Graphs',
    props: ["account"],
    methods: {
        createChart()
        {
            const data = {
                labels: this.account.subAccounts.map(x => x.name),
                datasets: [{
                  data: this.account.subAccounts.map(x => x.balance),
                  backgroundColor: this.account.subAccounts.map((x, i) => {
                    if (x.balance < 0) return "rgba(0,0,0,0)";
                    return colors[i % colors.length];
                  }),
                  borderColor: this.account.subAccounts.map((x, i) => {
                    return colors[i % colors.length];
                  }),
                  hoverOffset: 4,
                  offset: this.account.subAccounts.map(x => x.balance < 0 ? -10 : 10)
                }]
            };

            const config = {
              type: 'doughnut',
              data: data
            };

            const myChart = new Chart(
                document.getElementById('moneyChart'),
                config
            );
        }
    },
    mounted() {
        if (this.account && this.account.hasSubs())
            this.createChart();
    }
};
</script>
<style>
</style>