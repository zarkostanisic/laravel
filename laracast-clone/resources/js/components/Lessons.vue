<template>
	<div class="container">
		<h4>
			Lessons 
			<button class="btn btn-primary" @click="createNewLesson">CREATE NEW LESSON</button>
		</h4>
		<ul class="list-group">
			<li v-for="lesson, key in lessons" class="list-group-item d-flex justify-content-between">
				<p>{{ lesson.title }}</p>
				<p>
					<button class="btn btn-primary" @click="editLesson(lesson)">EDIT</button>
					<button class="btn btn-danger" @click="deleteLesson(lesson.id, key)">DELETE</button>
				</p>
				</li>
		</ul>
		<create-lesson></create-lesson>
	</div>
</template>

<script>
	import CreateLesson from './children/CreateLesson.vue';
	import axios from 'axios'

	export default{
		props: ['default_lessons', 'series_id'],
		components: {
			'create-lesson': CreateLesson
		},
		data(){
			return {
				lessons: JSON.parse(this.default_lessons)
			};
		},
		mounted(){
			this.$on('lesson_created', (lesson) => {
				this.lessons.push(lesson);
			});

			this.$on('lesson_updated', (lesson) => {
				let lessonIndex = this.lessons.findIndex(l => {
					return lesson.id == l.id;
				});

				this.lessons.splice(lessonIndex, 1, lesson);
			});
		},
		methods: {
			createNewLesson(){
				this.$emit('create_new_lesson', this.series_id);
			},
			deleteLesson(id, key){
				if(confirm('Are you sure?')){
					axios.delete('/admin/' + this.series_id +'/lessons/' + id + '')
						.then(response => {
							this.lessons.splice(key, 1);
						}).catch(error => {
							console.log(error);
						});
				}
			},
			editLesson(lesson){
				let series_id = this.series_id;

				this.$emit('edit_lesson', { lesson, series_id });
			}
		}
	}
</script>