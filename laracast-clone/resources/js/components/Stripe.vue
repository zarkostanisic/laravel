<template>
	<div>
		<button class="btn btn-success" @click.stop="subscribe('monthly')">Subscribe to $9.99 Monthly</button>
		<button class="btn btn-info" @click.stop="subscribe('yearly')">Subscribe to $99.Yearly</button>
	</div>
</template>

<script>
	import axios from 'axios'
	import swal from 'sweetalert2'

	export default{
		props: ['email'],
		data(){
			return{
				plan: '',
				amount: 0,
				handler: null,
			}
		},
		mounted(){
			this.handler = StripeCheckout.configure({
			  key: 'pk_test_PXcDVYstxhkHkYBWjkntsFoD',
			  image: 'https://stripe.com/img/documentation/checkout/marketplace.png',
			  locale: 'auto',
			  token(token) {
			    // You can access the token ID with `token.id`.
			    // Get the token ID to your server-side code for use.
			    swal({text: 'Please wait to subscribec!', showConfirmButton: false});

			    axios.post('/subscribe', {
			    	token: token.id,
			    	plan: window.plan
			    }).then(response => {
			    	swal('Congrats! You are subscribed!')
			    	.then(() => {
			    		window.location = '';
			    	});
			    });
			  }
			});
		},
		methods: {
			subscribe(plan){
				if(plan =='monthly'){
					this.plan = 'monthly';
					window.plan = 'monthly';
					this.amount = 999;
				}else if(plan == 'yearly'){
					this.plan = 'yearly';
					window.plan = 'yearly';
					this.amount = 9999;
				}

				this.handler.open({
				    name: 'Subscription',
				    description: this.plan,
				    amount: this.amount,
				    email: this.email
				  });
			}
		}
	}
</script>