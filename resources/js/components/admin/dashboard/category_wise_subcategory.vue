<template>
  <div class="chart">
     <GChart type="PieChart" :data="chartData" :options="chartOptions"/>
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
        ['SubCategory', 'Content'],
        
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
    axios.get('/categoryWiseSubCategory').then((response)=>{
      for(let i=0;i<response.data.categoryWiseSubCategory.length;i++){
        this.result[0] = response.data.categoryWiseSubCategory[i].sub_cat_name;
        this.result[1] = response.data.categoryWiseSubCategory[i].total;
        this.chartData.push(this.result);
        this.result = [];
      }

    })
  }
  }
</script>

<style>

</style>