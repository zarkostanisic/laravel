<template>
	<div v-if="notification" class="alert alert-noty" :class="type">
		{{ notification.message }}
	</div>
</template>

<script>
	export default{
		created(){
			window.events.$on('notification', (notification) => {
				this.notification = notification

				setTimeout(() => {
					this.notification = null
				}, 2500);
			});
		},
		data(){
			return {
				notification: null
			}
		},
		computed: {
			type(){
				return 'alert-' + this.notification.type;
			}
		}
	}
</script>

<style>
	.alert-noty{
		position: fixed;
		top:20px;
		right: 20px;
		z-index: 1000;
		border-radius: 5px;
	}
</style>