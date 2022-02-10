<template>
	<header class="mb-5">
		<ul class="d-flex">
			<li>
				<router-link :to="{name: 'home'}">Home Page</router-link>
			</li>
			<li>
				<router-link :to="{name: 'about'}">About Us</router-link>
			</li>
			<li>
				<router-link :to="{name: 'blog'}">Blog</router-link>
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
	
</style>