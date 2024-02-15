<template>
    <div>
      <h1 class="text-2xl font-bold mb-4">Liste des articles</h1>
      <ul>
        <li v-for="article in articles" :key="article.id">
          <router-link :to="{ name: 'article-detail', params: { id: article.id }}">{{ article.title }}</router-link>
        </li>
      </ul>
    </div>
  </template>
  
  <script>
  import { ref, onMounted } from 'vue';
  
  export default {
    name: 'ArticlesList',
    setup() {
      const articles = ref([]);
  
      // Fetch articles from backend or Vuex store
      onMounted(async () => {
        // Example: Fetch articles from backend API
        const response = await fetch('/api/articles');
        const data = await response.json();
        articles.value = data.articles;
      });
  
      return { articles };
    }
  }
  </script>
  
  <style>
  /* Ajoutez ici les styles Tailwind CSS nécessaires */
  </style>
  