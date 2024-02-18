<template>
  <section class="bg-white dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
      <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Ajouter d'un article</h2>
      <form @submit.prevent="submitForm">
        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
          <div class="sm:col-span-2">
            <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Titre</label>
            <input type="text" v-model="title" name="title" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Saisir le nom du produit" required>
          </div>
          <div class="sm:col-span-2">
            <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Catégorie</label>
            <input type="text" v-model="category" name="category" id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Saisir la catégorie du produit" required>
          </div>
          <div class="sm:col-span-2">
            <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image d'illustration</label>
            <input type="file" @change="handleFileUpload" name="image" id="image" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
          </div>
          <div class="sm:col-span-2">
            <label for="content" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contenu</label>
            <textarea v-model="content" id="content" name="content" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Votre description ici"></textarea>
          </div>
        </div>
        <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4">
          Ajouter l'article
        </button>
      </form>
    </div>
  </section>
</template>

<script>
import { ref } from 'vue';

export default {
  setup() {
    const title = ref('');
    const content = ref('');
    const category = ref('');
    const image = ref(null);

    const handleFileUpload = (event) => {
      const file = event.target.files[0];
      // Logique pour gérer le chargement de l'image
      if (file) {
        const reader = new FileReader();
        reader.onload = () => {
          // Stocker l'image chargée dans la référence image
          image.value = reader.result;
        };
        reader.readAsDataURL(file);
      }
    }

    const submitForm = () => {
      const formData = new FormData();
      formData.append('title', title.value);
      formData.append('content', content.value);
      formData.append('category', category.value);
      formData.append('image', image.value);

      // Remplace cette URL par celle de ton API
      const apiUrl = 'api/articles';

      fetch(apiUrl, {
        method: 'POST',
        body: formData
      })
      .then(response => {
        if (response.ok) {
          console.log('Article ajouté avec succès !');
          // Réinitialiser les champs du formulaire après la soumission réussie si nécessaire
          title.value = '';
          content.value = '';
          category.value = '';
          image.value = null;
        } else {
          console.error('Erreur lors de l\'ajout de l\'article');
        }
      })
      .catch(error => {
        console.error('Erreur lors de la requête :', error);
      });
    }

    return { title, content, category, image, handleFileUpload, submitForm };
  }
}
</script>
