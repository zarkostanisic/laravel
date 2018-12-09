<script>
	import swal from 'sweetalert2'

	export default{
		created(){
			window.events.$on('notification', (notification) => {
				swal(notification.message);
			});
		}
	}
</script>