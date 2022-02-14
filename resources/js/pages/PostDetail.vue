<template>
	<section class="container">
		<h1>PostDetail Page</h1>
		<div v-if="post">
			<h2>{{post.title}}</h2>
			<h3 v-if="post.category">category: {{post.category.name}}</h3>
			<h3 v-else >Uncategorized</h3>

			<!-- <h4 v-for="tag in post.tags"
			class="badge badge-primary mr-2"
			:key="`post_${tag.id}`">
				{{tag.name}}
			</h4> -->

			<Tags class="mb-5" :list="post.tags"/>

			<figure v-if="post.cover">
				<img :src="post.cover" :alt="post.title">
			</figure>

			<p>
				{{post.content}}
			</p>
		</div>
		<Loader v-else text="Loading post"/>
	</section>
</template>

<script>
import axios from 'axios';
import Loader from '../components/Loader';
import Tags from '../components/Tags.vue';
export default {
	name: 'PostDetail',
	data() {
		return {
			post: null,
		}
	},
	components: {
		Loader,
		Tags,
	},
	created() {
		this.getPostDetails();
	},
	methods: {
		getPostDetails() {
			axios.get(`http://127.0.0.1:8000/api/posts/${this.$route.params.slug}`)
			.then(res => {
				console.log(res);
				if(res.data.not_found) {
					this.$router.push({name: '404'});
				} else this.post = res.data;
				
				})
			.catch(err => console.log(err));
		},
	},
}
</script>

<style>

</style>