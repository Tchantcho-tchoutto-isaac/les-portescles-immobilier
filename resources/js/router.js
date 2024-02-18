import { createRouter, createWebHistory } from 'vue-router';
import ArticleList from './components/ArticleList.vue';
import ArticleDetail from './components/ArticleDetail.vue';
/*import ArticleForm from './components/ArticleForm.vue';*/
import AjouterArticle from './components/AjouterArticle.vue';
import ModifierArticle from './components/ModifierArticle.vue';
import EditArticle from './components/EditArticle.vue';

const routes = [
  { path: '/', name: 'ArticleList', component: ArticleList },
  { path: '/article/Edit_article', name: 'EditArticle', component:EditArticle  },
  {path: '/article/modifier-article/:id?',name: 'ModifierArticle',component: ModifierArticle},
  { path: '/ajouter-article', name: 'AjouterArticle', component: AjouterArticle },
 /* { path: '/ajouter-article', name: 'ArticleForm', component: ArticleForm },*/
  { path: '/article/:id', name: 'ArticleDetail', component: ArticleDetail, props: true },
 // { path: '/modifier-article/:id', name: 'ArticleForm', component: ArticleForm, props: true }
];

const router = createRouter({
  history: createWebHistory(),
  routes
});

export default router;
