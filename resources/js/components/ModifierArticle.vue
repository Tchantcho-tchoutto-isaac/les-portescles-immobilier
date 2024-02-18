<template>
    <div>
      <h1>Modifier l'article</h1>
      <h1>{{ article.title }}</h1>
      <form @submit.prevent="updateArticle" v-if="article">
        <div>
          <label for="title">title:</label>
          <textarea id="title" v-model="article.title" required></textarea>
        </div>
        <div>
          <label for="content">Contenu:</label>
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
        <p v-if="errors.length > 0" style="color: red;">{{ errors.join(', ') }}</p>
      </form>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    name: 'ModifierArticle',
    data() {
      return {
        article: {},
        errors: [],
      };
    },
    created() {
      this.getArticleById();
    },
    methods: {
      async getArticleById() {
        try {
          const response = await axios.get(`http://127.0.0.1:8000/api/articles/${this.$route.params.id}`);
          this.article = response.data.article;
        } catch (error) {
          console.error('Erreur lors de la récupération de l\'article :', error);
          this.errors.push('Erreur lors de la récupération de l\'article.');
        }
      },
      async updateArticle() {
        try {
          if (!this.validateForm()) return;
          
          const formData = new FormData();
          formData.append('title', this.article.title);
          formData.append('content', this.article.content);
          formData.append('category', this.article.category);
         /* formData.append('image', this.article.image);*/
          
          const response = await axios.put(`http://127.0.0.1:8000/api/articles/${this.article.id}`, formData);
          console.log('Article mis à jour avec succès :', response.data);
          // Rediriger l'utilisateur vers la page d'affichage de l'article mis à jour
        } catch (error) {
          console.error('Erreur lors de la mise à jour de l\'article :', error);
          this.errors.push('Erreur lors de la mise à jour de l\'article.');
        }
      },
      validateForm() {
        this.errors = [];
        
        if (!this.article.title) this.errors.push("Le titre est requis.");
        if (!this.article.content) this.errors.push("Le contenu est requis.");
        if (!this.article.category) this.errors.push("La catégorie est requise.");
       // if (!this.article.image) this.errors.push("L'URL de l'image est requise.");
        
        return this.errors.length === 0;
      },
    },
    mounted() {
      console.log('Composant de modification chargé...');
    },
  };
  </script>
  