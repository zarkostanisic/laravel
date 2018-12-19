<template>
	<v-container fluid grid-list-md>
		<v-layout row wrap>
			<v-flex xs8>
				<question v-for="question in questions" :question="question" :key="question.path"></question>
			</v-flex>
			<v-flex xs4>
				<app-sidebar></app-sidebar>
			</v-flex>
		</v-layout>
	</v-container>
</template>

<script>
	import Question from './Question'
	import AppSidebar from './AppSidebar'
	import axios from 'axios'

	export default{
		components: {Question, AppSidebar},
		data(){
			return {
				questions: {}
			}
		},
		created(){
			axios.get('/api/question')
			.then((response) => {
				this.questions = response.data.data;
			})
			.catch((error) => {
				console.log(error.respones.data);
			});
		}
		
	}
</script>

<style>
	
</style>