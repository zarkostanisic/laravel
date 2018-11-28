<template>
	<div class="container">
		<h4>
			Lessons 
			<button class="btn btn-primary" @click="createNewLesson">CREATE NEW LESSON</button>
		</h4>
		<ul class="list-group">
			<li v-for="lesson in formattedLessons" class="list-group-item">{{ lesson.title }}</li>
		</ul>
		<create-lesson></create-lesson>
	</div>
</template>

<script>
	import CreateLesson from './children/CreateLesson.vue';

	export default{
		props: ['default_lessons'],
		components: {
			'create-lesson': CreateLesson
		},
		data(){
			return {
				lessons: this.default_lessons
			};
		},
		computed: {
			formattedLessons(){
				return JSON.parse(this.lessons);
			}
		},
		methods: {
			createNewLesson(){
				this.$emit('create_new_lesson');
			}
		}
	}
</script>