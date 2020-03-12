require('./bootstrap');

window.Vue = require('vue');
window.Moment = require('moment');

import BootstrapVue from 'bootstrap-vue'

import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

Vue.use(BootstrapVue)

Vue.component('MessengerComponent', require('./components/MessengerComponent.vue').default);
Vue.component('MessageConversationComponent', require('./components/MessageConversationComponent.vue').default);
Vue.component('ContactComponent', require('./components/ContactComponent.vue').default);
Vue.component('ContactGroupComponent', require('./components/ContactGroupComponent.vue').default);
Vue.component('ActiveConversationComponent', require('./components/ActiveConversationComponent.vue').default);

const app = new Vue({
    el: '#app',
    methods: {

        logout()
        {
            document.getElementById('logout-form').submit();
        }

    },
});
