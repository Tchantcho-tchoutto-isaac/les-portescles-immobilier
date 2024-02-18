<template>
    <div class="max-w-4xl mx-auto px-4">
      <h1 class="text-3xl font-bold mb-4">Liste des articles</h1>

      <router-link to="/ajouter-article">Ajouter un nouvel article</router-link>

    </div>

    <!-- component -->
<div class="container my-12 mx-auto px-4 md:px-12 justify-center">
    <div class="flex flex-wrap -mx-1 lg:-mx-4 flex " >

        
        <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3" v-for="article in articles" :key="article.id">

            
            <article class="overflow-hidden rounded-lg shadow-lg" >

                <a href="#">
                    <img alt="Placeholder" class="block h-auto w-full" :src="article.image">
                </a>

                <header class="flex items-center justify-between leading-tight p-2 md:p-4">

                    <h1 class="text-lg">
                        <a class="no-underline hover:underline text-black" href="#">
                            {{ article.title }}
                        </a>
                    </h1>
                    <p class="text-grey-darker text-sm">
                        14/4/19
                    </p>
                </header>
   
               
                <footer class="flex items-center justify-between leading-none p-2 md:p-4">
                   
                    <router-link :to="{ name: 'ArticleDetail', params: { id: article.id }}" class="text-blue-600 hover:underline"><button type="button" class="focus:outline-none text-blue bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Detail sur l'article</button></router-link>
                    <button @click="deleteArticle(article.id)"  class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-md" >
	<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
	  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
	</svg>

	Delete
  </button>
                    <router-link :to="{ name: 'ModifierArticle', params: { id: article.id }}" class="text-blue-600 hover:underline"><button type="button" class="focus:outline-none text-violet bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-darck-700 dark:focus:ring-green-800">ModifierArticle</button></router-link>    
                </footer>
            </article>
            <!-- END Article -->

        </div>

        
       
      

        

    </div>
</div>
  </template>
  <script>
  import { ref, onMounted } from 'vue';
  import axios from 'axios';

  export default {
    setup() {
      const articles = ref([]);
  
      const fetchArticles = async () => {
        try {
          const response = await axios.get('http://127.0.0.1:8000/api/articles');
          articles.value = response.data.articles;
        } catch (error) {
          console.error('Erreur lors de la récupération des articles', error);
        }
      };
  
      const deleteArticle = async (articleId) => {
        try {
          await axios.delete(`http://127.0.0.1:8000/api/articles/${articleId}`);
          articles.value = articles.value.filter(article => article.id !== articleId);
        } catch (error) {
          console.error('Erreur lors de la suppression de l\'article', error);
        }
      };
      
      const editArticle = (id) => {
      router.push({ name: 'ModifierArticle', params: { id } }); // Redirection vers la page de modification d'article
    };
  
      onMounted(fetchArticles);
  
      return {
        articles,
        deleteArticle,
        editArticle
      };
    }
  };
  </script>
  
<style>
 body {
  align-items: center;
 }
</style>
  