import Vue from 'vue';
import App from './views/App.vue';

// importazione router
import router from './routes.js';

const app = new Vue({
	el: '#root',
	router,
	render: h => h(App),
});