<template>
	<div>
	  	<h1>Replies</h1>
	  	<reply v-for="reply, key in content" :key="key" :reply="reply"></reply>
	 </div>
</template>

<script>
	import Reply from './Reply'
	export default{
		props: ['replies'],
		components: {Reply},
		data(){
			return {
				content: this.replies
			}
		},
		created(){
			EventBus.$on('replyCreated', (reply) => {
				this.content.unshift(reply);
				window.scrollTo(0, 0);
			});
		}
	}
</script>

<style>
	
</style>