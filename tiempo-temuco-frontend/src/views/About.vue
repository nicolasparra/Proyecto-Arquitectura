<template>
  <div>
    <b-carousel
      id="carousel-1"
      v-model="slide"
      :interval="3000"
      controls
      indicators
      background="#ababab"
      img-width="1024"
      img-height="300"
      style="text-shadow: 1px 1px 2px #333;"
      @sliding-start="onSlideStart"
      @sliding-end="onSlideEnd"
    >
      <b-carousel-slide
        caption="Plaza Anibal Pinto"
        text=""
        img-src="http://cdn.plataformaurbana.cl/wp-content/uploads/2013/11/1383691873_plaza_pinto_1.jpg"
      ></b-carousel-slide>
      <b-carousel-slide 
      caption="Estadio Germán Becker"
      img-src="http://www.estadioseguro.gob.cl/media/2017/04/German-Becker.-Carabineros.jpg">       
      </b-carousel-slide>
      <b-carousel-slide
      caption="Vista panoramica Temuco" 
      img-src="http://arquitectojmz.cl/wp-content/uploads/2014/12/temuco.jpg"></b-carousel-slide>
      <b-carousel-slide
      caption="Univesidad de la Frontera" 
      img-src="https://araucaniadiario.cl/download/multimedia.normal.bca72e2814872eb5.556e6976657273696461645f6e6f726d616c2e6a7067.jpg"
      >
      </b-carousel-slide>

      <b-carousel-slide 
      caption="Vista nocturna Temuco" 
      img-src="https://www.temuco.cl/wp-content/uploads/2018/12/Carpeta-33-A-1er-lugar.jpg"
      >
      </b-carousel-slide>

      <b-carousel-slide 
      caption="Museo ferroviario Temuco" 
      img-src="https://img.soy-chile.cl/Fotos/2015/05/14/file_20150514173845.jpg"
      >
      </b-carousel-slide>

    </b-carousel>

  
  </div>
</template>

<script>
  export default {
    data() {
      return {
        slide: 0,
        sliding: null
      }
    },
    methods: {
      onSlideStart(slide) {
        this.sliding = true
      },
      onSlideEnd(slide) {
        this.sliding = false
      }
    }
  }
</script>


