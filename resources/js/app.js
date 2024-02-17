import { createApp } from 'vue';
import App from './App.vue'; 
import  routes from './router.js'
import "../css/app.css"
/*import ArticlesList from './components/ArticlesList.vue';*/

createApp(App).use(routes).mount('#app');




