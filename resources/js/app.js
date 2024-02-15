import './bootstrap';
require('./bootstrap');

// 1. On importe createApp
import { createApp } from "vue"

// 2. On importe AppComponent.vue
import AppComponent from "./components/ArticleDetail.vue"

// 3. On monte l'application Vue sur l'élément #app
createApp(AppComponent).mount("#app")