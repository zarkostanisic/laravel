<template>
	<div class="mt-3">
		<v-card>
		  <v-card-title>
		  	<div class="headline">{{ reply.user }}</div>
		    <div class="ml-2"> said {{ reply.created_at }}</div>
		  </v-card-title>

		  <v-divider></v-divider>

		  <v-card-text v-html="reply.reply">
		  </v-card-text>

		  <v-divider></v-divider>

		  <v-card-actions v-if="own">
		  	<v-btn icon small>
		  		<v-icon color="orange">edit</v-icon>
		  	</v-btn>

		  	<v-btn icon small>
		  		<v-icon color="red">delete</v-icon>
		  	</v-btn>
		  </v-card-actions>
		</v-card>
	</div>
</template>

<script>
	export default{
		props: ['reply'],
		computed: {
			own(){
				return User.own(this.reply.user_id);
			}
		}
	}
</script>

<style>
	
</style>