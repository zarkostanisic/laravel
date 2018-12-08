<template>
	<div class="modal fade" id="lessonModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="card card-shadowed p-50 w-600 mb-0" style="max-width: 100%;">
          <h5 class="text-uppercase text-center">{{ editing ? 'Edit lesson ' + lesson.title : 'Create new lesson'}}</h5>
          <br><br>
          <form>
            
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Title" v-model="lesson.title">
            </div>

            <div class="form-group">
              <input type="number" class="form-control" placeholder="Episode number" v-model="lesson.episode_number">
            </div>

            <div class="form-group">
              <input type="text" class="form-control" placeholder="Vumeo video id" v-model="lesson.video_id">
            </div>

            <div class="form-group">
	          <textarea class="form-control form-control-lg"rows="4" placeholder="Description" v-model="lesson.description"></textarea>
	        </div>

	        <div class="form-group">
	          <label>
              	<input type="checkbox" v-model="lesson.premium" :checked="lesson.premium">
              	Premium
              </label>
            </div>

            <div class="form-group">
            	<button class="btn btn-bold btn-block btn-primary" type="button" @click="updateLesson" v-if="editing">UPDATE</button>
              <button class="btn btn-bold btn-block btn-primary" type="button" @click="createLesson" v-else>CREATE</button>
            </div>
          </form>
        </div>
      </div>
    </div>
</template>

<script>
	import axios from 'axios';

	class Lesson{
		constructor(lesson){
			this.title = lesson.title || '';
			this.episode_number = lesson.episode_number || 0;
			this.video_id = lesson.video_id || '';
			this.description = lesson.description || '';
			this.lesson_id = lesson.id || null;
			this.premium = lesson.premium * 1 || false
		}
	}

	export default{
		data(){
			return{
				lesson: {},
				series_id: null,
				editing: false
			}
		},
		mounted(){
			this.$parent.$on('create_new_lesson', (series_id) => {
				this.editing = false;
				this.series_id = series_id;

				this.lesson = new Lesson({})

				$('#lessonModal').modal();
			});

			this.$parent.$on('edit_lesson', ({ lesson, series_id }) => {
				this.editing = true;
				this.series_id = series_id;

				this.lesson = new Lesson(lesson)

				$('#lessonModal').modal();
			});
		},
		methods: {
			createLesson(){
				axios.post('/admin/' + this.series_id + '/lessons', {
					title: this.lesson.title,
					episode_number: this.lesson.episode_number,
					video_id: this.lesson.video_id,
					description: this.lesson.description,
					series_id: this.series_id,
					premium: this.lesson.premium
				}).then(response => {
					this.$parent.$emit('lesson_created', response.data);

					window.noty({
						message: 'Lesson successfully created.',
						type: 'success'
					});

					$('#lessonModal').modal('hide');
				}).catch(error => {
					window.handleError(error);
				});
			},
			updateLesson(){
				axios.put('/admin/' + this.series_id + '/lessons/' + this.lesson.lesson_id, {
					title: this.lesson.title,
					episode_number: this.lesson.episode_number,
					video_id: this.lesson.video_id,
					description: this.lesson.description,
					premium: this.lesson.premium
				}).then(response => {
					this.$parent.$emit('lesson_updated', response.data);

					window.noty({
						message: 'Lesson successfully updated.',
						type: 'success'
					});

					$('#lessonModal').modal('hide');
				}).catch(error => {
					window.handleError(error);
				});
			}
		}
	}
</script>