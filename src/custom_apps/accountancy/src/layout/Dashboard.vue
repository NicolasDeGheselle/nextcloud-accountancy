<template>
    <div>
        <div class="row">
            <div class="col-6 col-md-12 content-container">
                <canvas id="moneyChart"></canvas>
            </div>
            <div class="col-6 col-md-12 content-container">
                <h4 class="content-title">Accounts</h4>
                <Accounts :accountsList="accountsList" />
            </div>
        </div>
        <div class="content-container">
            <h4 class="content-title">Transactions</h4>
            <Transactions :transactionsList="transactionsList" />
        </div>
    </div>
</template>

<script>
import AccountService from "../services/AccountService";
import TransactionService from "../services/TransactionService";

import Accounts from "../components/Accounts.vue";
import Transactions from "../components/Transactions.vue";

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
	name: 'Dashboard',
    components: {
        Accounts,
        Transactions
    },
	data() {
		return {
			accountsList: [],
            transactionsList: [],
		}
	},
    methods: {
        createChart()
        {
            const data = {
                labels: this.accountsList.map(x => x.name),
                datasets: [{
                  data: this.accountsList.map(x => x.balance),
                  backgroundColor: this.accountsList.map((x, i) => {
                    if (x.balance < 0) return "rgba(0,0,0,0)";
                    return colors[i % colors.length];
                  }),
                  borderColor: this.accountsList.map((x, i) => {
                    return colors[i % colors.length];
                  }),
                  hoverOffset: 4,
                  offset: this.accountsList.map(x => x.balance < 0 ? -10 : 10)
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
    created() {
        this.accountsList = AccountService.All();
        this.transactionsList = TransactionService.All();

    },
    mounted() {
        this.createChart();
    }
};
</script>
<style>
#moneyChart {
    max-height: 20rem;
}
.content-container {
	border: 1px solid var(--color-background-dark);
    border-radius: 0.4rem;
    margin: 0.1rem;
    padding: 0.4rem 0.6rem;
}

.content-title {
    color: var(--color-text-lighter);
    font-size: 32px;
    margin: 0.6rem 0;
    font-weight: lighter;
}

</style>