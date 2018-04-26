<template>
	<div class="single-modal-nofi overflow-fix">
		<a v-if="user.role == 2" :href="notifyUrl">
			<p>
				<span>{{ singleNotify.data.freelancer.name | truncate(12) }}</span>Apply to Project
				<span>{{ singleNotify.data.project.title | truncate(20)  }}</span>
			</p>
			<h2><timeago :since="singleNotify.created_at"></timeago></h2>
		</a>
		<a v-else :href="notifyUrlhired">
			<p>
				<span>{{ singleNotify.data.freelancer.name | truncate(12) }}</span> 
				<span v-if="singleNotify.data.status == 0">You Cancel To Project</span>
				<span v-else-if="singleNotify.data.status == 1">You Hired To Project</span> 
				<span v-else>This Project Declined</span>
				<span>{{ singleNotify.data.project.title | truncate(20)  }}</span>
			</p>
			<h2><timeago :since="singleNotify.created_at"></timeago></h2>
		</a>
	</div>
</template>

<script>
export default {
  	name: 'Notification',
  	props: ['singleNotify','user'],
  	computed: {
  		notifyUrl() { 
  			return '/client-project-details/' + this.singleNotify.data.project.project_id;
  		},
  		notifyUrlhired() {
  			return '/project-details/' + this.singleNotify.data.project.project_id;
  		}
  	}
	}
</script>

<style lang="css" scoped>
</style>