<template>
  <div id="app">
     
     <b-navbar toggleable="lg" type="light" variant="info">
       <b-container>
         <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>
         <b-navbar-brand :to="{name: 'home'}" exact v-responsive.lg.xl>Home</b-navbar-brand>
          <b-collapse id="nav-collapse" is-nav>
            <b-navbar-nav>
              <b-nav-item :to="{name: 'graficos'}" v-responsive.lg.xl>Grafricos</b-nav-item>
              <b-nav-item :to="{name: 'foro'}">Foro</b-nav-item>
            </b-navbar-nav>
          </b-collapse>
       </b-container>
     </b-navbar>


    <router-view/>
  </div>
</template>

