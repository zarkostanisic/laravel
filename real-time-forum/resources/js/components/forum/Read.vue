<template>
	<show-question :question="question"></show-question>
</template>

<script>
	import axios from 'axios'
	import ShowQuestion from './ShowQuestion'
	export default{
		components: {ShowQuestion},
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