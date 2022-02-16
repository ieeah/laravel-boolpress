<template>
	<section class="container">
		<h1 class="mb-5">contact us</h1>
		<div class="row">
			<div class="col-md-6">
				<h4>boolpress</h4>
				<div>lorem ipsum street, 99</div>
				<div>Ipsum, IT</div>
			</div>
			<div class="col-md-6">
				<div class="mb-4">get in touch with the form </div>

				<form @submit.prevent="postForm">
					<div class="mb-3">
						<label class="form-label" for="name">Name</label>
						<input type="text" id="name" class="form-control" v-model="name">ì
						<div v-for="(error, i) in errors.name"
						:key="`err-name-${i}`"
						class="text-danger">
						</div>
					</div>

					<div class="mb-3">
						<label class="form-label" for="mail">Email</label>
						<input type="email" id="mail" class="form-control" v-model="mail">
						<div v-for="(error, i) in errors.mail"
						:key="`err-mail-${i}`"
						class="text-danger">
						</div>
					</div>

					<div class="mb-3">
						<label class="form-label" for="message">Message</label>
						<textarea type="text" id="message" class="form-control" v-model="message" rows="5"></textarea>
						<div v-for="(error, i) in errors.message"
						:key="`err-message-${i}`"
						class="text-danger">
						</div>
					</div>

					<button type="submit" class="btn btn-primary"
					:disabled="sending">
						{{sending ? 'Sending...' : 'Send'}}
					</button>
				</form>
			</div>
		</div>
	</section>
</template>

<script>
import axios from "axios";
export default {
	name: 'ContactForm',
	data() {
		return {
			name: '',
			mail: '',
			message: '',
			errors: {},
			sending: false,
		}
	},
	methods: {
		postForm() {
			this.sending = true,
			axios.post('http://127.0.0.1:8000/api/contacts', {
				name: this.name,
				mail: this.mail,
				message: this.message,
			})
			.then(res => {
				if(res.data.errors) {
					this.errors = res.data.errors;
				} else {
					this.name = '';
					this.mail = '';
					this.message = '';

					this.errors = {};
					this.sending = false;
				}
			})
			.catch(err => console.log(err));
		},
	},
}
</script>

<style lang="scss" scoped>

</style>