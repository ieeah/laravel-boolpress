// dichiarazione dipendenze
import Vue from 'vue';
import VueRouter from 'vue-router';

// componenti per rotta
import Home from './pages/home';
import About from './pages/About';
import Blog from './pages/Blog';
import PostDetail from './pages/PostDetail.vue';
import NotFound from './pages/NotFound';

// attivazione del router
Vue.use(VueRouter);

// definizione delle rotte
const router = new VueRouter({
	mode: 'history',
	linkExactActiveClass: 'active',
	routes: [
		{
			path: '/',
			name: 'home',
			component: Home,
		},
		{
			path: '/about',
			name: 'about',
			component: About,
		},
		{
			path: '/blog',
			name: 'blog',
			component: Blog,
		},
		{
			path: '/blog/:slug',
			name: 'post-detail',
			component: PostDetail,
		},
		{
			path: '*',
			name: '404',
			component: NotFound,
		},
	],
});

// esportazione delle rotte per il loro utilizzo in altri file
export default router;