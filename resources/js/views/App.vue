<template>
	<div class="container py-5">
		<div class="title">
			<h1>Work in Progress</h1>
			<h2>Site under construction</h2>
		</div>
		<div class="icon">
			<i class="d-block fas fa-tools text-danger"></i>
		</div>

		<div class="d-flex justify-content-center mt-5">
			<a href="/" class="btn btn-primary">Back to Administration Panel</a>
		</div>
	</div>
</template>

<script>
export default {
	name: 'App',
	components: {},
}
</script>

<style lang="scss">
	.title {
		display: flex;
		justify-content: center;
		align-items: center;
		transform: translateX(-100px);
		h1, h2 {
			width: min-content;
		}
		h1 {
			text-align: right;
			padding-right: 2rem;
			border-right: 3px solid black;
			font-size: 90px;
		}
		h2 {
			padding-left: 2rem;
		}
		
	}
	
	i {
		font-size: 100px;
		margin-inline: auto;
		width: 10%;
		margin-top: 10rem;
	}


	
</style>