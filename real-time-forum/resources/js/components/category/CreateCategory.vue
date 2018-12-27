<template>
	<v-container>
		<v-form @submit.prevent="submit">
		    <v-text-field
		      v-model="form.name"
		      label="Name"
		      required
		    ></v-text-field>

		    <span class="red--text" v-if="errors.name">{{ errors.name[0] }}</span>
		   	<v-spacer></v-spacer>

			<v-btn v-if="editSlug"
		    	color="green"
		    	type="submit"
		    >
		    	Update
		    </v-btn>

		    <v-btn v-else
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
							<v-btn icon small @click="edit(key)">
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
				categories: [],
				editSlug: null
			}
		},
		methods: {
			submit(){
				this.editSlug ? this.update() : this.create();
			},
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
			update(){
				axios.patch('/api/category/' + this.editSlug, this.form)
				.then(response => {
					this.form.name = null;
					this.categories.unshift(response.data);
				})
				.catch(error => {
					this.errors = error.response.data.errors;
				});
			},
			edit(key){
				this.form.name = this.categories[key].name;
				this.editSlug = this.categories[key].slug;
				this.categories.splice(key, 1);
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
			if(!User.admin()){
				this.$router.push('/forum');
			}
			
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