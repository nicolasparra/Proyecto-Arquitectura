<template>
  <div>
    <div>
      <b-form @submit="onSubmit" @reset="onReset" v-if="show">
        <b-form-group id="grupo-estacion" label="Estacion:" label-for="estacion">
          <b-form-select id="estacion" v-model="form.estacion" :options="form.estaciones" required></b-form-select>
        </b-form-group>

        <b-form-group id="group-fechainicio" label="Fecha inicial:" label-for="fechainicio">
          <b-form-input id="fechainicio" v-model="form.fechainicio" required type="date"></b-form-input>
        </b-form-group>

        <b-form-group id="group-horainicio" label="Hora inicial:" label-for="horainicio">
          <b-form-input id="horainicio" v-model="form.horainicio" required type="time"></b-form-input>
        </b-form-group>

        <b-form-group id="group-fechafin" label="Fecha final:" label-for="fechafin">
          <b-form-input id="fechafin" v-model="form.fechafin" required type="date"></b-form-input>
        </b-form-group>

        <b-form-group id="group-horafin" label="Hora Final:" label-for="horafin">
          <b-form-input id="horafin" v-model="form.horafin" required type="time"></b-form-input>
        </b-form-group>

        <!-- <b-button type="submit" variant="primary" @click="generargrafico">Generar</b-button> -->
        <b-button type="submit" variant="success" >Generar</b-button>
        <b-button type="reset" variant="danger">Resetear</b-button>
      </b-form>
      <!-- <b-card class="mt-3" header="Form Data Result">
        <pre class="m-0">{{ form }}</pre>
      </b-card> -->
    </div>
    <div>
      <grafico-punto 
      :dataVal="form.datostemperatura" 
      :unidad="form.unidad" 
      :titulo="form.titulo"
      :info="form.info"
      ></grafico-punto>
      <grafico-punto 
      :dataVal="form.datoshumedad"
      :unidad="form.unidad" 
      :titulo="form.titulo"
      :info="form.info"
      ></grafico-punto>
    </div>
  </div>
</template>
<script>
import axios from "axios";
// import about from "../views/About.vue";
import GraficoPunto from '../components/GraficoPunto.vue'
export default {
  components: { GraficoPunto },
  data() {
    return {
      form: {
        unidad:"",
        titulo:"",
        info:"",
        
        horainicio: "",
        fechainicio: "",
        horafin: "",
        fechafin: "",
        datostemperatura: [],
        datoshumedad: [],
        estacion: "Padre Las Casas",
        estaciones: [
          "Padre Las Casas",
          "Padre Las Casas II",
          "Las Encinas",
          "Museo Ferroviario",
          "Ñielol"
        ]
      },
      show: true
    };
  },
  methods: {
    onSubmit(evt) {
      evt.preventDefault();
      //-----------------------------------------------------------
      //fechas  y hora temperatura
      const FI = this.form.fechainicio + " " + this.form.horainicio;
      const FT = this.form.fechafin + " " + this.form.horafin;
      console.log("nombre" + this.form.estacion);
      const nombre = this.form.estacion;
      axios
        .get("http://localhost/Temuco-Tiempo/public/temperatura", {
          params: {
            FI: FI,
            FT: FT,
            nombre: nombre
          }
        })
        .then(response => {          
         this.form.datostemperatura=[];
         this.form.unidad="°C";
         this.form.titulo="TIEMPO TEMUCO";
         this.form.info="Temperatura (°C)"; 
          for (let index = 0; index < response.data.Temperatura.length; index++) {           
            this.form.datostemperatura.push({
              label:response.data.Temperatura[index].fecha,
              value:response.data.Temperatura[index].valor
              });
          }
        })
        .catch(e => {
          console.log(e);
        });

      //fechas  y hora humedad
      axios
        .get("http://localhost/Temuco-Tiempo/public/humedad", {
          params: {
            FI: FI,
            FT: FT,
            nombre: nombre
          }
        })
        .then(response => {          
          this.form.datoshumedad=[];
          this.form.unidad="%";
          this.form.titulo="HUMEDAD RELATIVA DEL AIRE TEMUCO";
          this.form.info="Porcentaje de humedad (%)"; 
           for (let index = 0; index < response.data.Humedad.length; index++) {           

            this.form.datoshumedad.push({
              label:response.data.Humedad[index].fecha,
              value:response.data.Humedad[index].valor
              });
          }
        })
        .catch(e => {
          console.log(e);
        });
      //------------------------------------------------------------
      
    },
    onReset(evt) {
      evt.preventDefault();
      // Reset our form values
      this.form.fechafin = "";
      this.form.horafin = "";
      this.form.fechainicio = "";
      this.form.horainicio = "";
      this.form.estacion = "Padre Las Casas";
      // Trick to reset/clear native browser form validation state
      this.show = false;
      this.$nextTick(() => {
        this.show = true;
      });
    }
     //fin getestaciones
  } //fin methods
}; //fin default
</script>