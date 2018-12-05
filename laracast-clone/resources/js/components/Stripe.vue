<template>
	<div>
		<button class="btn btn-success" @click.stop="subscribe('monthly')">Subscribe to $9.99 Monthly</button>
		<button class="btn btn-info" @click.stop="subscribe('yearly')">Subscribe to $99.Yearly</button>
	</div>
</template>

<script>
	export default{
		data(){
			return{
				plan: '',
				amount: 0,
				handler: null
			}
		},
		mounted(){
			this.handler = StripeCheckout.configure({
			  key: 'pk_test_r7CgJflkLnwBOcq3LznerLXo',
			  image: 'https://stripe.com/img/documentation/checkout/marketplace.png',
			  locale: 'auto',
			  token(token) {
			    // You can access the token ID with `token.id`.
			    // Get the token ID to your server-side code for use.
			  }
			});
		},
		methods: {
			subscribe(plan){
				if(plan =='monthly'){
					this.plan = 'monthly';
					this.amount = 999;
				}else if(plan == 'yearly'){
					this.plan = 'yearly';
					this.amount = 9999;
				}

				this.handler.open({
				    name: 'Subscription',
				    description: this.plan,
				    amount: this.amount
				  });
			}
		}
	}
</script>