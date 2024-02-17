<template>
    <div>
      <h1>Modifier l'article</h1>
  
      <form @submit.prevent="submitForm" v-if="article">
        
        <div>
          <label for="content">Contenut:</label>
          <textarea id="content" v-model="article.content" required></textarea>
        </div>
        <div>
          <label for="category">Catégorie:</label>
          <input type="text" id="category" v-model="article.category" required>
        </div>
        <div>
          <label for="image">Image URL:</label>
          <input type="text" id="image" v-model="article.image" required>
        </div>
  
        <button type="submit">Modifier</button>
      </form>
    </div>
  </template>
  
  <script>
  import { ref } from 'vue';
  import axios from 'axios';
 
  export default {
    props: ['id'],
    setup(props) {
      const article = ref(null);
  
      const fetchArticle = async () => {
        try {
          const response = await axios.get(`/api/articles/${article.id}`);
          article.value = response.data.article;
        } catch (error) {
          console.error('Erreur lors de la récupération de l\'article', error);
        }
      };
  
      const submitForm = async () => {
        try {
          await axios.put(`api/articles/${props.id}`, article.value);
          alert('Article modifié avec succès!');
        } catch (error) {
          console.error('Erreur lors de la modification de l\'article', error);
        }
      };
     ;
  
      // Appeler la fonction pour récupérer l'article au chargement du composant
      fetchArticle();
  
      return {
        article,
        submitForm
      };
    }
  };
  </script>
  