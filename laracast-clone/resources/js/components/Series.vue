<template>
	<div>
		<h4>
			Series
			<button class="btn btn-primary" @click="createSeries">Create new series</button>
		</h4>

		<ul class="list-group">
			<li class="list-group-item d-flex justify-content-between" v-for="s, key in series">
				<p>{{ s.title }}</p>
				<p>
					<button class="btn btn-primary" @click="editSeries(s)">EDIT</button>
					<button class="btn btn-danger" @click="deleteSeries(s.id, key)">DELETE</button>
				</p>
			</li>
		</ul>
	</div>
</template>

<script>
	export default{
		props: ['default_series'],
		data(){
			return {
				series: JSON.parse(this.default_series)
			}
		},
		methods: {
			createSeries(){
				alert('create');
			},
			editSeries(series){
				alert('edit');
			},
			deleteSeries(id, key){
				alert('delete');
			}
		}
	}
</script>