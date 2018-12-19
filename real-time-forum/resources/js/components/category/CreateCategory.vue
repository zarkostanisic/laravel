<template>
	<v-container>
		<v-form @submit.prevent="create">
		    <v-text-field
		      v-model="form.name"
		      label="Name"
		      required
		    ></v-text-field>

		    <span class="red--text" v-if="errors.name">{{ errors.name[0] }}</span>
		   	<v-spacer></v-spacer>

			<v-btn
		    	color="green"
		    	type="submit"
		    >
		    	Create
		    </v-btn>
		</v-form>

		<v-spacer></v-spacer>

		<v-card>
			<v-toolbar color="cyan" dark dense>
				<v-toolbar-title>Categories</v-toolbar-title>
			</v-toolbar>

			<v-list>
				<div  v-for="category, key in categories" :key="key">
					<v-list-tile>
						<v-list-tile-action>
							<v-btn icon small @click="edit">
								<v-icon color="orange">edit</v-icon>
							</v-btn>
						</v-list-tile-action>
						<v-list-tile-action>
							<v-btn icon small @click="destroy(category.slug, key)">
								<v-icon color="red">delete</v-icon>
							</v-btn>
						</v-list-tile-action>
						<v-list-tile-content>
							<v-list-tile-title>{{ category.name }}</v-list-tile-title>
						</v-list-tile-content>
					</v-list-tile>
					<v-divider></v-divider>
				</div>
			</v-list>
		</v-card>
	</v-container>
</template>

<script>
	export default{
		data(){
			return {
				form: {
					name: null
				},
				errors: {},
				categories: []
			}
		},
		methods: {
			create(){
				axios.post('/api/category', this.form)
				.then(response => {
					this.form.name = null;
					this.categories.unshift(response.data);
				})
				.catch(error => {
					this.errors = error.response.data.errors;
				});
			},
			edit(){

			},
			destroy(slug, key){
				axios.delete('/api/category/' + slug)
				.then(() => {
					this.categories.splice(key, 1);
				})
				.catch((error) => {
					console.log(error.respones.data);
				});
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
		}
	}
</script>

<style>
	
</style>