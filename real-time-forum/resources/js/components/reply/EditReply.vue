<template>
	<div class="mt-3">

		<v-divider></v-divider>

		<h1>Edit reply</h1>
		<v-form @submit.prevent="update">

	    <markdown-editor v-model="form.body" ref="markdownEditor"></markdown-editor>

	    <span class="red--text" v-if="errors.body">{{ errors.body[0] }}</span>

        <v-spacer></v-spacer>

        <div>
		  	<v-card-actions>
		  		<v-btn
			    	color="green"
			    	type="submit"
			    	:disabled="disable"

			    >
			    	Update
			    </v-btn>

			  	<v-btn icon small @click="cancel">
			  		<v-icon color="red">cancel</v-icon>
			  	</v-btn>
		  	</v-card-actions>
	  	</div>
	 </v-form>

	 <v-divider></v-divider>

	</div>
</template>

<script>
	import markdownEditor from 'vue-simplemde/src/markdown-editor'

	export default{
		props: ['reply'],
		components: {markdownEditor},
		data(){
			return {
				form: {
					body: this.reply.reply
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
			update(){
				axios.patch('/api/question/' + this.reply.question_slug + '/reply/' + this.reply.id, this.form)
				.then(response => {
					this.reply.reply = this.form.body;
					EventBus.$emit('replyUpdated');
				})
				.catch(error => {
					this.errors = error.response.data.errors;
				});
			},

			cancel(){
				EventBus.$emit('cancelEditing');
			}
		}
	}
</script>

<style>
	
</style>