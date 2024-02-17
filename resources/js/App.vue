<template>
  <div id="app">
    <Header />
    <router-view />
  </div>
</template>

<script>
import { defineComponent } from 'vue';
import Header from './components/header.vue'; // Import correct du composant Header
import router from './router';

export default defineComponent({
  name: 'App',
  components: {
    Header
  },
  router
});
</script>

<style scoped>
/* Styles spécifiques à ce composant */
</style>
