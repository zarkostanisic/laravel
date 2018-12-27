<template>
	<v-container>
	  	<h1>Replies</h1>
	  	<reply v-for="reply, key in replies" :key="key" :reply="reply"></reply>
	</v-container>
</template>

<script>
	import Reply from './Reply'
	export default{
		props: ['replies'],
		components: {Reply}
	}
</script>

<style>
	
</style>