<template>
	<div>
		<v-btn icon @click="likeIt">
			<v-icon color="red">favorite</v-icon> {{ count }}
		</v-btn>
	</div>
</template>

<script>
	export default{
		props: ['like_count'],
		data(){
			return {
				liked: false,
				count: this.like_count
			}
		},
		methods: {
			likeIt(){
				if(User.loggedIn()){
					this.liked ? this.decrement() : this.increment();

					this.liked = !this.liked;
				}
			},

			increment(){
				this.count++;
			},

			decrement(){
				this.count--;
			}
		}
	}
</script>

<style>
	
</style>