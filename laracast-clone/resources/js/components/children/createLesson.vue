<template>
	<div class="modal fade" id="lessonModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="card card-shadowed p-50 w-600 mb-0" style="max-width: 100%;">
          <h5 class="text-uppercase text-center">{{ editing ? 'Edit lesson ' + title : 'Create new lesson'}}</h5>
          <br><br>
          <form>
            
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Title" v-model="title">
            </div>

            <div class="form-group">
              <input type="number" class="form-control" placeholder="Episode number" v-model="episode_number">
            </div>

            <div class="form-group">
              <input type="text" class="form-control" placeholder="Vumeo video id" v-model="video_id">
            </div>

            <div class="form-group">
	          <textarea class="form-control form-control-lg"rows="4" placeholder="Description" v-model="description"></textarea>
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

	export default{
		data(){
			return{
				title: '',
				episode_number: '',
				video_id: '',
				description: '',
				series_id: '',
				editing: false
			}
		},
		mounted(){
			this.$parent.$on('create_new_lesson', (series_id) => {
				this.editing = false;

				this.title = '';
				this.episode_number = '';
				this.video_id = '';
				this.description = '';
				this.series_id = series_id;

				$('#lessonModal').modal();
			});

			this.$parent.$on('edit_lesson', (lesson) => {
				this.editing = true;

				this.title = lesson.title;
				this.episode_number = lesson.episode_number;
				this.video_id = lesson.video_id;
				this.description = lesson.description;
				this.series_id = lesson.series_id;

				$('#lessonModal').modal();
			});
		},
		methods: {
			createLesson(){
				axios.post('/admin/' + this.series_id + '/lessons', {
					title: this.title,
					episode_number: this.episode_number,
					video_id: this.video_id,
					description: this.description,
					series_id: this.series_id
				}).then(response => {
					this.$parent.$emit('create_lesson', response.data);

					$('#lessonModal').modal('hide');
				}).catch(error => {
					console.log(error);
				});
			},
			updateLesson(){
				axios.patch('/admin/' + this.series_id + '/lessons/' + , {
					title: this.title,
					episode_number: this.episode_number,
					video_id: this.video_id,
					description: this.description,
				});
			}
		}
	}
</script>