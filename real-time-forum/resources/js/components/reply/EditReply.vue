<template>
	<div class="mt-3">

		<v-divider></v-divider>

		<h1>Edit reply</h1>
		<v-form @submit.prevent="update">

	    <markdown-editor v-model="reply.reply" ref="markdownEditor"></markdown-editor>

	    <span class="red--text" v-if="errors.body">{{ errors.body[0] }}</span>

        <v-spacer></v-spacer>

        <div>
		  	<v-card-actions>
		  		<v-btn
			    	color="green"
			    	type="submit"
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
				errors: {}
			}
		},
		methods: {
			update(){
				EventBus.$emit('replyUpdated');
			},

			cancel(){
				EventBus.$emit('cancelEditing');
			}
		}
	}
</script>

<style>
	
</style>