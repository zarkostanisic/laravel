<template>
	<div>
		<div v-if="lesson" :data-vimeo-id="lesson.video_id" data-vimeo-width="640" id="player"></div>
	</div>
</template>

<script>
	import Player from '@vimeo/player'
	export default{
		props: ['default_lesson'],
		data(){
			return {
				lesson: JSON.parse(this.default_lesson)
			}
		},
		mounted(){
			const player  = new Player('player');
			player.on('play', function() {
		        console.log('played the handstick video!');
		    });
		}
	}
</script>