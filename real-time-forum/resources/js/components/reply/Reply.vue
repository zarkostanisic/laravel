<template>
	<div class="mt-3">
		<v-card>
		  <v-card-title>
		  	<div class="headline">{{ reply.user }}</div>
		    <div class="ml-2"> said {{ reply.created_at }}</div>
		  </v-card-title>

		  <v-card-text v-html="reply.reply">
		  </v-card-text>
		</v-card>
	</div>
</template>

<script>
	export default{
		props: ['reply'],
		created(){
			console.log(this.reply);
		}
	}
</script>

<style>
	
</style>