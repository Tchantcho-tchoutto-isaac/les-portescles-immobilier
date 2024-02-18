<template>
  <div id="app">
    <Header />
    <router-view />
    <Footer/>
  </div>
</template>

<script>
import { defineComponent } from 'vue';
import Header from './components/header.vue'; // Import correct du composant Header
import router from './router';
import Footer from './components/Footer.vue';

export default defineComponent({
  name: 'App',
  components: {
    Header,
    Footer
  },
  router
});
</script>

<style scoped>
  #app{
 align-items: center;
  }


</style>
