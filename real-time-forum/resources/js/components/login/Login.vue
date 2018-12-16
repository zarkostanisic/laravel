<template>
  <v-container>
  	  <h1>Login</h1>
	  <v-form @submit.prevent="login">
	    <v-text-field
	      v-model="form.email"
	      label="E-mail"
	      type="email"
	      required
	    ></v-text-field>
	    <v-text-field
	      v-model="form.password"
	      label="Password"
	      type="password"
	      required
	    ></v-text-field>

	    <v-btn
	    	color="green"
	    	type="submit"
	    >
	    	Login
	    </v-btn>

	    <router-link to="/signup">
		    <v-btn
		    	color="primary"
		    >
		    	Signup
		    </v-btn>
		</router-link>
	  </v-form>
  </v-container>
</template>

<script>
  import axios from 'axios'

  export default {
  	data(){
  		return {
  			form: {
  				email: null,
  				password: null
  			}
  		}
  	},
  	created(){
  		if(User.loggedIn()){
  			this.$router.push('forum');
  		}
  	},
  	methods: {
  		login(){
	  		axios.post('/api/auth/login', this.form)
	  		.then((response) => {
	  			User.responseAfterLogin(response);
	  		})
	  		.catch((error) => {
	  			console.log(error.response.data);
	  		});
	  	}
  	}
  }
</script>

<style>
	
</style>