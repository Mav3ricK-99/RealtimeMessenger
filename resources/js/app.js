require('./bootstrap');

window.Vue = require('vue');

import BootstrapVue from 'bootstrap-vue'

import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

Vue.use(BootstrapVue)

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

const app = new Vue({
    el: '#app',
    methods: {

        logout()
        {
            document.getElementById('logout-form').submit();
        }

    },
});
