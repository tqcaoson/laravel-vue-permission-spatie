<template>
  <div class="chart">
     <GChart type="ColumnChart" :data="chartData" :options="chartOptions"/>
  </div>
</template>

<script>
import { GChart } from 'vue-google-charts'
  export default {
     data () {
    return {
      result:[],
      // Array will be automatically processed with visualization.arrayToDataTable function
      chartData: [
        ['Category', 'Content'],
        
      ],
      chartOptions: {
        chart: {
          title: 'Company Performance',
          subtitle: 'Sales, Expenses, and Profit: 2014-2017',
        }
      }
    }
  },

  mounted(){
    axios.get('/categoryWiseContent').then((response)=>{
      for(let i=0;i<response.data.categoryWiseContent.length;i++){
        this.result[0] = response.data.categoryWiseContent[i].cat_name;
        this.result[1] = response.data.categoryWiseContent[i].total;
        this.chartData.push(this.result);
        this.result = [];
      }

    })
  }
  }
</script>

<style>

</style>