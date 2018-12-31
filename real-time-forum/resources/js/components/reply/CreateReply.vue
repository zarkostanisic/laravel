<template>
	<div class="mt-3">

		<v-divider></v-divider>

		<h1>Create reply</h1>
		<v-form @submit.prevent="create">

	    <markdown-editor v-model="form.body" ref="markdownEditor"></markdown-editor>

	    <span class="red--text" v-if="errors.body">{{ errors.body[0] }}</span>

        <v-spacer></v-spacer>
	    <v-btn
	    	color="green"
	    	type="submit"
	    	:disabled="disable"
	    >
	    	Create
	    </v-btn>
	 </v-form>

	 <v-divider></v-divider>

	</div>
</template>

<script>
	import markdownEditor from 'vue-simplemde/src/markdown-editor'

	export default{
		props: ['slug'],
		components: {markdownEditor},
		data(){
			return {
				form: {
					body: null
				},
				errors: {}
			}
		},
		computed: {
			disable(){
				return !this.form.body;
			}
		},
		methods: {
			create(){
				axios.post('/api/question/' + this.slug + '/reply', this.form)
				.then(response => {
					this.form.body = '';
					EventBus.$emit('replyCreated', response.data.reply);
				})
				.catch(error => {
					this.errors = error.response.data.errors;
				});
			}
		}
	}
</script>

<style>
	@import '~simplemde/dist/simplemde.min.css';
</style>