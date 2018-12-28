<template>
	<div>
		<v-btn icon @click="likeIt">
			<v-icon :color="color">favorite</v-icon> {{ count }}
		</v-btn>
	</div>
</template>

<script>
	export default{
		props: ['reply'],
		data(){
			return {
				liked: this.reply.liked,
				count: this.reply.likes_count
			}
		},
		computed: {
			color(){
				return this.liked ? 'red' : 'red lighten-4';
			}
		},
		created(){
			Echo.channel('likeChannel')
		    .listen('LikeEvent', (e) => {
		        if(this.reply.id == e.id){
		        	e.type == 1 ? this.count ++ : this.count--;
		        }
		    });
		},
		methods: {
			likeIt(){
				if(User.loggedIn()){
					this.liked ? this.decrement() : this.increment();

					this.liked = !this.liked;
				}
			},

			increment(){
				axios.post('/api/like/' + this.reply.id)
				.then(response => {
					this.count++;
				});
			},

			decrement(){
				axios.delete('/api/like/' + this.reply.id)
				.then(response => {
					this.count--;
				});
			}
		}
	}
</script>

<style>
	
</style>