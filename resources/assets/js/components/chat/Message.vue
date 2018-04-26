<template>
	<div :class="classDetermine" class="d-flex overflow-fix">
		<span><timeago :since="timeConvert"></timeago></span>
		<p>{{ sMessage.message }}</p>
    <!-- <img v-if="sMessage.documents" :src="sMessage.documents" alt=""> -->
		<img :src="profileImage"/>
	</div>
</template>

<script>
export default {

  name: 'Message',
  props: ['sMessage','user','receiver'],
  data () {
    return {
    	time: new Date,
    	profilePath: '/app_images/resize_images/',
      	sendClass: 'message-user-one-area justify-content-end',
      	receiverClass: 'message-user-two-area justify-content-start',
    }
  },
  computed: {
    classDetermine() {
      return this.sMessage.user_id == this.user.id? this.sendClass:this.receiverClass;
    },
    profileImage() {
    	return this.sMessage.user_id ==  this.user.id? this.profilePath+this.user.pic:this.profilePath+this.receiver.pic;
    },
  	timeConvert() {
  		return this.sMessage.created_at ? this.sMessage.created_at : this.time;
  	}
  }
}
</script>

<style lang="css" scoped>
</style>