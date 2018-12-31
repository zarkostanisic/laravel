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

	    <span class="red--text" v-if="errors.title">{{ errors.title[0] }}</span>

	    <markdown-editor v-model="form.body" ref="markdownEditor"></markdown-editor>

	    <span class="red--text" v-if="errors.body">{{ errors.body[0] }}</span>

	    <v-select
	      v-model="form.category_id"
          :items="categories"
          label="Category"
          item-text="name"
          item-value="id"
        ></v-select>

        <span class="red--text" v-if="errors.category_id">{{ errors.category_id[0] }}</span>

        <v-spacer></v-spacer>
	    <v-btn
	    	color="green"
	    	type="submit"
	    	:disabled="disable"
	    >
	    	Create
	    </v-btn>
	 </v-form>
	</v-container>
</template>

<script>

	import axios from 'axios'
	import markdownEditor from 'vue-simplemde/src/markdown-editor'

	export default{
		components: {markdownEditor},
		data(){
			return {
				form: {
					title: null,
					body: null,
					category_id: null
				},
				categories: [],
				errors: {}
			}
		},
		computed: {
			disable(){
				return !this.form.title||!this.form.body||!this.form.category_id;
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
					this.$router.push('/question/' + response.data.slug);
				}).
				catch((error) => {
					this.errors = error.response.data.errors;
				});
			}
		}
	}
</script>
	
<style>
	@import '~simplemde/dist/simplemde.min.css';
</style>