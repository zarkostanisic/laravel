<template>
	<div class="mt-3">
		<v-card>
		  <v-card-title>
		  	<div class="headline">{{ reply.user }}</div>
		    <div class="ml-2"> said {{ reply.created_at }}</div>
		  </v-card-title>

		  <v-divider></v-divider>

		  <edit-reply v-if="editing" :reply="reply"></edit-reply>
		  <v-card-text v-else v-html="replyMD">
		  </v-card-text>

		  <v-divider></v-divider>

		  <div v-if="!editing">
			  <v-card-actions v-if="own">
			  	<v-btn icon small @click="edit">
			  		<v-icon color="orange">edit</v-icon>
			  	</v-btn>

			  	<v-btn icon small @click="destroy(index)">
			  		<v-icon color="red">delete</v-icon>
			  	</v-btn>
			  </v-card-actions>
		  </div>
		</v-card>
	</div>
</template>

<script>
	import EditReply from './EditReply'
	export default{
		props: ['reply', 'index'],
		components: {EditReply},
		data(){
			return {
				editing: false
			}
		},
		computed: {
			own(){
				return User.own(this.reply.user_id);
			},
			replyMD(){
				return md.parse(this.reply.reply);
			}
		},
		methods: {
			destroy(index, id){
				EventBus.$emit('replyDestroyed', index);
			},

			edit(){
				this.editing = true;
			}
		},
		created(){
			EventBus.$on('replyUpdated', () => {
				this.editing = false;
			});

			EventBus.$on('cancelEditing', () => {
				this.editing = false;
			});
		}
	}
</script>

<style>
	
</style>