<template>
	<v-container>
		<h1>Question</h1>
		<p>{{ question.title }}</p>
	</v-container>
</template>

<script>
	import axios from 'axios'
	export default{
		props: ['slug'],
		data(){
			return {
				question: {}
			}
		},
		created(){	
			axios.get('/api/question/' + this.$route.params.slug)
			.then((response) => {
				this.question = response.data.data;
			}).
			catch((error) => {
				console.log(error.respones.data);
			});
		}
	}
</script>
	
<style>
	
</style>