<template>
	<div>
		<h4
			class="badge badge-primary mr-2"
			v-for="tag in list"
			:key="`post_${tag.id}`">
				{{tag.name}}
		</h4>
	</div>
</template>

<script>
export default {
	name: 'Tags',
	props: {
		list: Array,
	},
}
</script>

<style>

</style>