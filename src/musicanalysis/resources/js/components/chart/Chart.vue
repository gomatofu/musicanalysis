<template>
  <canvas id="chart"></canvas>
</template>

<script>
import Chart from 'chart.js/auto';

export default {
props:['chartdata', 'options'],
methods: {
  renderChart(chartdata,options) {
    let ctx = document.getElementById("chart");
    
    new Chart(ctx, {
      type: 'pie',
      data : chartdata

      
    });
  }
},
mounted() {
  this.renderChart(this.chartdata, this.options);
}
};
</script>
