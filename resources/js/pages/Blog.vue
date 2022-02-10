<template>
	<div class="container py-5">
		<h1>Our Blog</h1>
		<div v-if="posts">
			<article v-for="post in posts" :key="`post_${post.id}`">
				<h2>{{post.title}}</h2>
				<p class="created_at">{{formatDate(post.created_at)}}</p>
				<p class="content">
					{{getExcerpt(post.content, 20)}}
				</p>
				<!-- router-link con parametri -->
				<router-link :to="{
					name: 'post-detail',
					params: {
						slug: post.slug
						},
					}">
					Read More
				</router-link>
			</article>

			<button @click="getPosts(pagination.current - 1 )" 
			:disabled="pagination.current === 1" class="btn btn-primary mr-3">
				prev
			</button>

			<button
			v-for="i in pagination.last"
			:key="`page_${i}`"
			@click="getPosts(i)"
			class="btn mr-3"
			:class="pagination.current === i ? 'btn-outline-primary' : 'btn-outline-secondary'">
				{{ i }}
			</button>

			<button @click="getPosts(pagination.current + 1)"
			:disabled="pagination.current === pagination.last" class="btn btn-primary mr-3">
				next
			</button>
		</div>
		<Loader v-else text="Loading Blog Archive"/>
	</div>
</template>

<script>
import axios from 'axios';
import Loader from '../components/Loader.vue';
export default {
	name: 'Blog',
	components: {
		Loader,
	},
	data() {
		return {
			posts: null,
			pagination: null,
		}
	},
	created() {
		this.getPosts();
	},
	methods: {
		getPosts(page = 1) {
			// console.log('get posts from API');
			axios.get(`http://127.0.0.1:8000/api/posts?page=${page}`)
			.then(response => {

				// senza paginazione
				// this.posts = response.data;

				// con paginazione
				this.posts = response.data.data;
				console.log(this.posts);
				console.log(response);
				this.pagination = {
					current: response.data.current_page,
					last: response.data.last_page,
				};
				console.log(this.pagination);
			});
		},
		getExcerpt(text, maxLength) {
			if (text.length > maxLength) {
				return text.substr(0, maxLength) + '...';
			}

			return text;

		},
		formatDate(postDate) {
			// conversione della data da stringa a formato data di Js
			const date = new Date(postDate);

			const formatted = new Intl.DateTimeFormat('it-IT').format(date);

			return formatted;
		},
	},
}
</script>

<style lang="scss">

</style>