<template>
	<div>
		<div v-if="lesson" :data-vimeo-id="lesson.video_id" data-vimeo-width="640" id="player"></div>
	</div>
</template>

<script>
	import Player from '@vimeo/player'

	import swal from 'sweetalert2'

	import axios from 'axios'

	export default{
		props: ['default_lesson', 'next_lesson'],
		data(){
			return {
				lesson: JSON.parse(this.default_lesson)
			}
		},
		mounted(){
			const player  = new Player('player');
			player.on('ended', () => {
		        this.displayVideoEndedAlert();
		    });
		},
		methods: {
			displayVideoEndedAlert(){
				this.completeLesson(this.lesson);

				if(this.next_lesson == ''){
					swal('Congrats! You finished series!');
				}else{
					swal('Congrats! You finished lesson!')
					.then(() => {
						window.location = this.next_lesson;
					});
				}
			},
			completeLesson(){
				axios.post('/series/complete-lesson/' + this.lesson.id);
			}
		}
	}
</script>