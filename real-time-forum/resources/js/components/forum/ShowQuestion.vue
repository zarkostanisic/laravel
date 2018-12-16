<template>
	<v-card>
		<v-container fluid>
			<v-card-title>
				<div>
					<div class="headline">
						{{ question.title }} 
					</div>
					<span class="grey--text">{{ question.user}} said {{ question.created_at }}</span>
				</div>
				<v-spacer></v-spacer>
				<v-btn color="teal">5 replies</v-btn>
			</v-card-title>
			<v-card-text v-html="question.body"></v-card-text>
		</v-container>
	</v-card>
</template>

<script>
	export default{
		props: ['question']
	}
</script>

<style>
	
</style>