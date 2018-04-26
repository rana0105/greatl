<template>
	<div class="">
		<div class="message-box-start overflow-fix"  v-chat-scroll>
			<message
        v-for="message,index in chat.messages"
        :key="message.index"
        :user="user"
        :receiver="receiver"
        :sMessage="message">
      </message>
		</div>
		<div class="message-chat-textarea overflow-fix">
			<div class="message-chat-box-input-filed  overflow-fix">
				<input v-model="userMessage.message"  @keyup.enter="sendMessage" placeholder="Type a message"/>
        <p v-if="userMessage.documents">{{this.uploadFileName}}</p>
			</div>
			<div class="message-chat-box-upload-filed overflow-fix">
				<ul>
					<li>
						<input @change="onFileChange" type="file" name="Drag or Upload Files" accept="media_type/*">
						<i class="fa fa-paperclip" aria-hidden="true"></i>
					</li>
					<li class="sendBtn">
						<button type="submit" @click="sendMessage" class="btn btn-sm">
							<i class="fa fa-paper-plane-o"></i> send 
						</button>
					</li>
				</ul>
			</div>
		</div>
	</div>
</template>

<script>
export default {

  name: 'Messages',
  props: ['project','user','receiver'],
  data () {
    return {
      chat: {
        messages: [],
      },
    	userMessage: {
        message:'',
        fileName: '',
        documents: '',
        user_id: this.user.id
      },
      uploadFileName: '',
    }
  },
  created() {
    axios.get('/project/'+this.project+'/with/'+this.receiver.id+'/db_message')
        .then((response) => {
          console.log(response.data);
          this.chat.messages = response.data;
        });
  },
  methods: {
  	sendMessage() { 
  		if(this.userMessage.length != 0) {
            axios.post('/project/'+this.project+'/with/'+this.receiver.id+'/message',
              this.userMessage)
                .then((response) => {
                    // this.message.user_id = this.user.id;
                    this.chat.messages.push(this.userMessage);
                    // this.chat.user.push('Me');
                    // this.chat.color.push('success');
                    console.log(response);
                    this.userMessage = {};
                    this.userMessage.user_id = this.user.id;
                });
        }
  	},
    onFileChange (e) {
      var files = e.target.files || e.dataTransfer.files
      if (!files.length) {
        return
      }
      // if (!files[0]['type'].match(/.(jpg|jpeg|png|gif)$/i)) {
      //   alert('this is not a image')
      //   return
      // }
      this.uploadFileName = files[0].name;
      this.userMessage.fileName = files[0].name;
      this.createImage(files[0])
    },
    createImage (file) {
      var reader = new FileReader()
      var vm = this
      reader.onload = (e) => {
        vm.userMessage.documents = e.target.result
      }
      reader.readAsDataURL(file)
    },
  },
  mounted() {
  	Echo.private('client-chat.' + this.user.id +'.project.'+ this.project)
            .listen('ClientChatEvent', (e) => {
                console.log(e);
                this.chat.messages.push(e);
            })
            .listenForWhisper('typing', (e) => {
                console.log('typing');
            });
  }
}
</script>

<style lang="css" scoped>
.message-box-start{
	height: 400px;
	overflow-y: auto;
}
</style>