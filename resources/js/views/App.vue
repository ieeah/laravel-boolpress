<template>
	<div class="container py-5">
		<Header />

		<main>
			<!-- componente che matcha con la rotta -->
			<router-view></router-view>
			<Home />
		</main>
	</div>
</template>

<script>
import Header from '../components/Header.vue';
export default {
	name: 'App',
	components: {
		Header,
	},
}
</script>

<style lang="scss">

</style>