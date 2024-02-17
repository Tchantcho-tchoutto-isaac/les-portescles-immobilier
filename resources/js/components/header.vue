<template>
header test 
</template>

<script>


export default {
  name: 'Header',
  components: {
    
  },
  data() {
    return {
      isVisible: false,
      showWhiteBackground: true
    };
  },
  methods: {
    toggle() {
      this.isVisible = !this.isVisible;
    }
  }
};
</script>

<style>
@import 'tailwindcss/base';
@import 'tailwindcss/components';
@import 'tailwindcss/utilities';
</style>
