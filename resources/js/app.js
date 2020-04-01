require('./bootstrap');

import Vue from 'vue';
import Vuex from 'vuex';
import BootstrapVue from 'bootstrap-vue';

Vue.use(BootstrapVue);
Vue.use(Vuex);

//window.eventBus = new Vue(); Se puede usar

window.Moment = require('moment');

import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import moment from 'moment';

Vue.component('MessengerComponent', require('./components/MessengerComponent.vue').default);
Vue.component('MessageConversationComponent', require('./components/MessageConversationComponent.vue').default);
Vue.component('ContactComponent', require('./components/ContactComponent.vue').default);
Vue.component('ContactGroupComponent', require('./components/ContactGroupComponent.vue').default);
Vue.component('ActiveConversationComponent', require('./components/ActiveConversationComponent.vue').default);

const store = new Vuex.Store({
        state:{
            messages: [],
            selectedConversation: null,
        },
        mutations:{
            newMessagesList(state, messages){
                state.messages = messages;
            },
            addNewMessage(state,message){
                state.messages.push(message);
            },
            selectConversation(state,conversation){
                state.selectedConversation = conversation;
            },  
        },
        actions:{
            getMessages(context, conversation){
                axios.get(`/api/messages?contact=${conversation.contact_id}`)
                .then(response => {
                    context.commit('selectConversation',conversation);
                    context.commit('newMessagesList',response.data);
                    });
            },
        }
})

const app = new Vue({
    el: '#app',
    store,
    methods: {
        logout(){
            document.getElementById('logout-form').submit();
        }

    },
});
