<template>
	<v-container>
  	  <h1>Ask Question</h1>
	  <v-form @submit.prevent="create">
	    <v-text-field
	      v-model="form.title"
	      label="Title"
	      type="text"
	      required
	    ></v-text-field>

	    <markdown-editor v-model="form.body" ref="markdownEditor"></markdown-editor>

	    <v-select
	      v-model="form.category_id"
          :items="categories"
          label="Category"
          item-text="name"
          item-value="id"
        ></v-select>

	    <v-btn
	    	color="green"
	    	type="submit"
	    >
	    	Create
	    </v-btn>
	 </v-form>
	</v-container>
</template>

<script>
	// import AppStorage from '../../helpers/AppStorage'

	import axios from 'axios'
	import markdownEditor from 'vue-simplemde/src/markdown-editor'

	export default{
		components: {markdownEditor},
		data(){
			return {
				form: {
					title: null,
					body: null,
					category_id: null,
					user_id: User.id(),
					// token: AppStorage.getToken()
				},
				categories: [],
				errors: {}
			}
		},
		created(){
			axios.get('/api/category')
			.then((response) => {
				this.categories = response.data.data;
			}).
			catch((error) => {
				console.log(error.respones.data);
			});
		},
		methods: {
			create(){
				axios.post('/api/question', this.form)
				.then((response) => {
					alert('success')
				}).
				catch((error) => {
					this.errors = error.respones.data;
				});
			}
		}
	}
</script>
	
<style>
	@import '~simplemde/dist/simplemde.min.css';
</style>