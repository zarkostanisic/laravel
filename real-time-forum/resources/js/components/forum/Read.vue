<template>
	<div v-if="question">
		<edit-question v-if="editing" :question="question"></edit-question>
		<div v-else>
			<show-question :question="question"></show-question>

			<v-container>
				<replies :replies="question.replies"></replies>

				<create-reply :slug="question.slug"></create-reply>
			</v-container>
		</div>
	</div>
</template>

<script>
	import axios from 'axios'
	import ShowQuestion from './ShowQuestion'
	import EditQuestion from './EditQuestion'
	import Replies from '../reply/Replies'
	import CreateReply from '../reply/CreateReply'
	export default{
		components: {ShowQuestion, EditQuestion, Replies, CreateReply},
		data(){
			return {
				question: null,
				editing: false
			}
		},
		created(){	

			this.listen();

			this.getQuestion();
		},
		methods: {
			listen(){
				EventBus.$on('startEditing', () => {
					this.editing = true;
				});

				EventBus.$on('cancelEditing', () => {
					this.editing = false;
				});
			},
			getQuestion(){
				axios.get('/api/question/' + this.$route.params.slug)
				.then((response) => {
					this.question = response.data.data;
				}).
				catch((error) => {
					console.log(error.respones.data);
				});
			}
		}
	}
</script>
	
<style>
	
</style>