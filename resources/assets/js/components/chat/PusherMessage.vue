<template>		
	<div class="d-flex overflow-fix">
		<img src="/images/user2.png"/>
		<p>{{message}}</p>
		<span><timeago :since="time"></timeago></span>
	</div>
</template>

<script>
export default {

  name: 'PusherMessage',
  props: ['message'],
  data () {
    return {
      time: new Date,
    }
  }
}
</script>

<style lang="css" scoped>
</style>