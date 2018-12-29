<template>

	<div class="text-xs-center">
    <v-menu offset-y>
      <v-btn icon
        slot="activator"
      >
        <v-icon :color="color">add_alert</v-icon> {{ unReadCount }}
      </v-btn>
      <v-list v-if="unReadCount > 0">
        <v-list-tile
          v-for="(notification, index) in unRead"
          :key="index"
        >
          <router-link :to="notification.path">
          	<v-list-tile-title @click="readNotification(notification)">{{ notification.question }}</v-list-tile-title>
          </router-link>
        </v-list-tile>
      </v-list>

      <v-list v-if="readCount > 0">

        <v-list-tile
          v-for="(notification, index) in read"
          :key="index"
        >
          	<v-list-tile-title>{{ notification.question }}</v-list-tile-title>
        </v-list-tile>
      </v-list>
    </v-menu>
  </div>
</template>

<script>
	export default{
		data(){
			return {
				read: [],
				unRead: [],
				unReadCount: 0,
				readCount: 0
			}
		},
		computed: {
			color(){
				return this.unReadCount > 0 ? 'red' : 'red lighten-4'; 
			}
		},
		created(){
			if(User.loggedIn()){
				this.getNotifications();

				Echo.private('App.User.' + User.id())
			    .notification((notification) => {
			        this.unRead.push(notification);
			        this.unReadCount++;
			    });
			}
		},
		methods: {
			getNotifications(){
				axios.post('/api/notifications')
				.then(response => {
					this.read = response.data.read;
					this.unRead = response.data.unRead;
					this.unReadCount = this.unRead.length;
					this.readCount = this.read.length;
				})
				.catch(error => {
					Exception.handle(error);
				});
			},
			readNotification(notification){
				axios.post('/api/markAsRead', {id: notification.id})
				.then(response => {
					this.unRead.splice(notification, 1);
					this.read.push(notification);
					this.unReadCount--;
					this.readCount++;
				});
			}
		}
	}
</script>

<style>
	
</style>