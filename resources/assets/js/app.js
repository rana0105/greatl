require('./bootstrap');
window.Vue = require('vue');
import VueTimeago from 'vue-timeago'
import VueChatScroll from 'vue-chat-scroll'
var VueTruncate = require('vue-truncate-filter')
Vue.use(VueTruncate)

Vue.use(VueChatScroll)
Vue.use(VueTimeago, {
  name: 'timeago',
  locale: 'en-US',
  locales: {
    'en-US': require('vue-timeago/locales/en-US.json')
  }
})

Vue.component('InfoNotifications', require('./components/notification/InfoNotifications.vue'));
Vue.component('notification', require('./components/notification/Notification.vue'));

Vue.component('messages', require('./components/chat/Messages.vue'));
Vue.component('message', require('./components/chat/Message.vue'));
Vue.component('PusherMessage', require('./components/chat/PusherMessage.vue'));
Vue.component('freelencer', require('./components/chat/Freelencer.vue'));
Vue.component('onlineStatus', require('./components/OnlineStatus.vue'));

const app = new Vue({
    el: '#app',
    data: {
    },
    methods: {
      fileDownload() {
          var blob = new Blob([data], {type: 'text/csv'});
          if(window.navigator.msSaveOrOpenBlob) {
              window.navigator.msSaveBlob(blob, filename);
          }
          else{
              var elem = window.document.createElement('a');
              elem.href = window.URL.createObjectURL(blob);
              elem.download = filename;        
              document.body.appendChild(elem);
              elem.click();        
              document.body.removeChild(elem);
          }
      }
    },
  mounted() {
    Echo.join('chat')
      .joining((user) => {})
      .leaving((user) => {});
  }
});
