<template>
	<header class="mb-5">
		<ul class="d-flex">
			<li>
				<router-link class="mr-4" :to="{name: 'home'}">Home Page</router-link>
			</li>
			<li>
				<router-link class="mr-4" :to="{name: 'about'}">About Us</router-link>
			</li>
			<li>
				<router-link class="mr-4" :to="{name: 'blog'}">Blog</router-link>
			</li>
			<li>
				<router-link class="mr-4" :to="{name: 'contacts'}">Contact Us</router-link>
			</li>
		</ul>
	</header>
</template>

<script>
export default {
	name: 'Header',
}
</script>

<style lang="scss" scoped>
	li {
		list-style-type: none;
	}
</style>