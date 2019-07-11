<template>
  <div>
    <fusioncharts
      :type="type"
      :width="width"
      :height="height"
      :dataFormat="dataFormat"
      :dataSource="dataSource"
    ></fusioncharts>
  </div>
</template>

<script>
export default {
  name: "grafico-punto",
  props: ["dataVal","unidad","titulo","info"],
  data: () => ({
    prueba: [],
    type: "line",
    width: "100%",
    height: "500px%",
    dataFormat: "json",
    dataSource: {
      chart: {
        caption: "Temuco",
        yaxisname: "Gradiso celcius",
        subcaption: "",
        numbersuffix: " mph",
        rotatelabels: "1",
        setadaptiveymin: "1",
        theme: "fusion"
      },
      data: [
        {
          label: "2015",
          value: "91.66"
        }
      ]
    }
  }),
  methods: {
    llenargrafico() {

      console.log("llenargrafico");
      this.dataSource.data = this.dataVal;
      this.dataSource.chart.caption=this.titulo;
      this.dataSource.chart.yaxisname=this.info;
      this.dataSource.chart.numbersuffix=this.unidad;
    }
  },
  mounted() {
    this.llenargrafico();
  },
  watch: {
    dataVal: {
      handler: function() {
        this.llenargrafico();
      },
      deep: true
    }
  }
};
</script>
  



