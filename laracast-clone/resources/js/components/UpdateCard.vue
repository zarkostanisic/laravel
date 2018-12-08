<template>
	<div>
		<button class="btn btn-success" @click.stop="update">Update card details</button>
	</div>
</template>

<script>
	import axios from 'axios'
	import swal from 'sweetalert2'

	export default{
		props: ['email'],
		data(){
			return{
				handler: null
			}
		},
		mounted(){
			this.handler = StripeCheckout.configure({
			  key: 'pk_test_PXcDVYstxhkHkYBWjkntsFoD',
			  image: 'https://stripe.com/img/documentation/checkout/marketplace.png',
			  locale: 'auto',
			  allowRememberMe: false,
			  token(token) {
			    // You can access the token ID with `token.id`.
			    // Get the token ID to your server-side code for use.
			    swal({text: 'Please wait to update card!', showConfirmButton: false});

			    axios.post('/card-update', {
			    	token: token.id
			    }).then(response => {
			    	swal('Congrats! Card changed!')
			    	.then(() => {
			    		window.location = '';
			    	});
			    });
			  }
			});
		},
		methods: {
			update(){
				this.handler.open({
				    name: 'Subscription',
				    description: 'Change card',
				    email: this.email,
				    panelLabel: 'Change card'
				  });
			}
		}
	}
</script>