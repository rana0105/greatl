<template>
	<span v-if="onlineStatus">Online</span>
  <span v-else>offline</span>
</template>

<script>
export default {

  name: 'OnlineStatus',
  props: ['user'],
  data () {
    return {
    	onlineStatus: false,
    }
  },
  mounted() {
	Echo.join('chat')
	  	.here((users) => {
	      console.log(users);
           for(var i = 0; i < users.length; i++) {
            if(users[i].id === this.user) {
              this.onlineStatus = true;
            }
          }
	  	})
     .joining((user) => {
           if(user.id === this.user) {
              this.onlineStatus = true;
            } else {
              this.onlineStatus = false;
            }
      })
      .leaving((user) => {
           if(user.id === this.user) {
              this.onlineStatus = false;
            } else {
              this.onlineStatus = true;
            }
      });
  }
}
</script>

<style lang="css" scoped>
</style>