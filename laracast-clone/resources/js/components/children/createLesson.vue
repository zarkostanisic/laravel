<template>
	<div class="modal fade" id="createNewLessonModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="card card-shadowed p-50 w-400 mb-0" style="max-width: 100%;">
          <h5 class="text-uppercase text-center">Create new lesson</h5>
          <br><br>
          <form>
            
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Title" v-model="title">
            </div>

            <div class="form-group">
	          <textarea class="form-control form-control-lg"rows="4" placeholder="Description" v-model="description"></textarea>
	        </div>

            <div class="form-group">
              <button class="btn btn-bold btn-block btn-primary" type="button">CREATE</button>
            </div>
          </form>
        </div>
      </div>
    </div>
</template>

<script>
	export default{
		data(){
			return{
				title: '',
				description: ''
			}
		},
		mounted(){
			this.$parent.$on('create_new_lesson', () => {
				$('#createNewLessonModal').modal();
			});
		}
	}
</script>