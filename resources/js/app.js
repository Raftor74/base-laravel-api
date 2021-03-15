require('./bootstrap');

window.Vue = require('vue').default;

Vue.component('home-component', require('./components/HomeComponent.vue').default);

const app = new Vue({
    el: '#app',
});
