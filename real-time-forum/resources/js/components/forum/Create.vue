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

	    <v-textarea
	      v-model="form.body"
          label="Body"
          placeholder="Enter text"
        ></v-textarea>

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
	import axios from 'axios'
	export default{
		data(){
			return {
				form: {
					title: null,
					body: null,
					category_id: null,
					user_id: User.id()
				},
				categories: []
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
				console.log(this.form);
			}
		}
	}
</script>
	
<style>
	
</style>