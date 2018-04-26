<template>
	<div class="dropdown">
	  	<a class="dropdown-toggle"
	  		id="dropdownMenuButton"
	  		data-toggle="dropdown"
	  		aria-haspopup="true"
	  		aria-expanded="false">
			<i class="fa fa-bell" aria-hidden="true"></i>
			<span class="counter noti"> {{unreadNotifications.length}} </span>
	  	</a>
	   <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
			<notification 
				v-for="notification in unreadNotifications"
				:key="notification.id"
        :user="user"
				:single-notify="notification">
			</notification>
		</div>
	</div>
</template>

<script>
export default {

  name: 'InfoNotifications',
  props: ['user'],
  	data () {
    	return {
    		unreadNotifications: []
    	}
  	},
	created() {
        axios.get('/notification/unread')
          .then( (response) => {
            this.unreadNotifications = response.data;
            console.log(this.unreadNotifications);
          });
    },
    mounted() {
    	Echo.private('App.User.' + this.user.id)
          .notification((notification) => {
              console.log(notification);
              this.unreadNotifications.push(notification);
          });
    }
}
</script>

<style lang="css" scoped>
</style>