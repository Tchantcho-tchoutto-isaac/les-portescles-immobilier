<template>
  <form @submit.prevent="submitForm">
    <input type="text" v-model="title" placeholder="Titre">
    <textarea v-model="content" placeholder="Contenu"></textarea>
    <input type="text" v-model="category" placeholder="Catégorie">
    <input type="file" @change="handleFileUpload">
    <button type="submit">Enregistrer</button>
  </form>
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
    }

    const submitForm = () => {
      // Logique pour soumettre le formulaire et enregistrer/modifier l'article
    }

    return { title, content, category, image, handleFileUpload, submitForm };
  }
}
</script>
