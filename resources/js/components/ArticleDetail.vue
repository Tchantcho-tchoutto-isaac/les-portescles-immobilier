<template>
  <div v-if="article">
    <h1>article d'id :{{ article.id}}</h1>
    <h1>{{ article.title }}</h1>
    <p>{{ article.content }}</p>
    <p>Catégorie: {{ article.category }}</p>
    <img :src="article.image" alt="Illustration">
  </div>
  <div v-else>
    <p>Chargement en cours...</p>
  </div>
</template>

<script>
import { ref, onMounted } from 'vue';
import axios from 'axios';

export default {
  props: ['id'],
  setup(props) {
    const article = ref(null);

    onMounted(async () => {
      try {
        const response = await axios.get(`/api/articles/${props.id}`);
        article.value = response.data.article;
      } catch (error) {
        console.error('Erreur lors de la récupération de l\'article', error);
      }
    });

    return { article };
  }
}
</script>
