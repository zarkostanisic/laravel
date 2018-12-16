<template>
	<v-container fluid grid-list-md>
		<v-layout row wrap>
			<v-flex xs8>
				<question></question>
			</v-flex>
			<v-flex xs4>
				<h1>Sidebar</h1>
			</v-flex>
		</v-layout>
	</v-container>
</template>

<script>
	import Question from './Question'

	export default{
		components: {Question}
		
	}
</script>

<style>
	
</style>