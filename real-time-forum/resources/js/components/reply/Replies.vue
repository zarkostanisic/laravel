<template>
	<div>
	  	<h1>Replies</h1>
	  	<reply v-for="reply, key in content" :key="key" :reply="reply" :index="key"></reply>
	 </div>
</template>

<script>
	import Reply from './Reply'
	export default{
		props: ['question'],
		components: {Reply},
		data(){
			return {
				content: this.question.replies,
				editing: false
			}
		},
		created(){
			this.listen();
		},
		methods: {
			listen(){
				EventBus.$on('replyCreated', (reply) => {
					this.content.unshift(reply);
					window.scrollTo(0, 0);
				});

				EventBus.$on('replyDestroyed', (index) => {
					axios.delete('/api/question/' + this.question.slug + '/reply/' + this.content[index].id)
					.then(() => {
						this.content.splice(index, 1);
					})
					.catch((error) => {
						console.log(error.respones.data);
					});
				});

				Echo.private('App.User.' + User.id())
			    .notification((notification) => {
			        this.content.unshift(notification.reply);
			    });

			    Echo.channel('deleteReplyChannel')
			    .listen('DeleteReplyEvent', (e) => {
			        for(let i = 0; i < this.content.length; i++){
			        	if(e.id === this.content[i].id){
			        		this.content.splice(i, 1);
			        	}
			        }
			    });

			}
		}
	}
</script>

<style>
	
</style>