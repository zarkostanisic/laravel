<template>
  <v-card>

    <v-card-title primary-title>
      <div>
      	<router-link :to="to">
        	<h3 class="headline mb-0">{{ question.title }}</h3>
    	</router-link>
        <div class="grey--text">
        	{{ question.user }} said {{ question.created_at }}
        </div>
      </div>
    </v-card-title>

    <v-card-text>
      {{ question.body }}
    </v-card-text>
  </v-card>
</template>

<script>
	export default{
		props: ['question'],
		data(){
			return{
				to: '/question/' + this.question.slug
			}
		}
	}
</script>

<style>
	
</style>