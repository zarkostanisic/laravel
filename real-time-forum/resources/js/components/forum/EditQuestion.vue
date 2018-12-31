<template>
	<v-container fluid>
	  <v-card>
	  	  <h1>Edit Question</h1>
		  <v-form @submit.prevent="update">
		    <v-text-field
		      v-model="form.title"
		      label="Title"
		      type="text"
		      required
		    ></v-text-field>

		    <span class="red--text" v-if="errors.title">{{ errors.title[0] }}</span>

		    <markdown-editor v-model="form.body" ref="markdownEditor"></markdown-editor>

		    <span class="red--text" v-if="errors.body">{{ errors.body[0] }}</span>

	        <span class="red--text" v-if="errors.category_id">{{ errors.category_id[0] }}</span>

	        <v-spacer></v-spacer>
	        <v-card-actions>
			    <v-btn icon small
			    	type="submit"
			    	:disabled="disable"
			    >
			    	<v-icon color="teal">save</v-icon>
			    </v-btn>

			    <v-btn icon small @click="cancelEditing"
			    	
			    >
			    	<v-icon color="black">cancel</v-icon>
			    </v-btn>
		    </v-card-actions>
		 </v-form>
	 </v-card>
	</v-container>
</template>

<script>
	import markdownEditor from 'vue-simplemde/src/markdown-editor'
	import axios from 'axios'

	export default{
		props: ['question'],
		components: {markdownEditor},
		data(){
			return {
				errors: {},
				categories: [],
				form: {
					title: null,
					body: null,
				}
			}
		},
		computed: {
			disable(){
				return !this.form.title||!this.form.body;
			}
		},
		mounted(){
			this.form.title = this.question.title;
			this.form.body = this.question.body;
		},
		methods: {
			update(){
				console.log(this.form);
				axios.put('/api/question/' + this.question.slug, this.form)
				.then((response) => {
					window.location  = '/question/' + response.data.slug;
				}).
				catch((error) => {
					this.errors = error.response.data.errors;
				});
			},
			cancelEditing(){
				EventBus.$emit('cancelEditing');
			}
		}
	}
</script>

<style>
	@import '~simplemde/dist/simplemde.min.css';
</style>