<template>
  <v-container>
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
	  </v-form>
  </v-container>
</template>

<script>
  import axios from 'axios'

  export default {
  	data(){
  		return {
  			form: {
  				email: 'zarko.stanisic@live.com',
  				password: 'secret'
  			}
  		}
  	},
  	methods: {
  		login(){
	  		User.login(this.form);
	  	}
  	}
  }
</script>

<style>
	
</style>