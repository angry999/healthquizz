
require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router'
import BootstrapVue from 'bootstrap-vue'
import { library } from '@fortawesome/fontawesome-svg-core'
import { faCheckCircle } from '@fortawesome/free-solid-svg-icons'
import { faCheck } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

import Question from './components/Question.vue'
import Summary from './components/Summary.vue'
import Plan from './components/Plan.vue'

Vue.use(VueRouter)
Vue.use(BootstrapVue)

library.add(faCheckCircle)
library.add(faCheck) 

Vue.component('grafica-component', require('./components/graficos.vue'));
Vue.component('font-awesome-icon', FontAwesomeIcon)

Vue.config.productionTip = false

const routes = [
    {
        path: '/', 
        name: 'Home', 
        component: Question.default
    },
    {
        path: '/question', 
        name: 'Question', 
        component: Question.default
    },
    {
        path: '/question/get_plan', 
        name: 'GetPlan', 
        component: Question.default, 
        props: {planBox: true}
    },
    {
        path: '/summary', 
        name: 'Summary', 
        component: Summary.default
    },
    {
        path: '/plan', 
        name: 'Plan', 
        component: Plan.default
    }
] 

const router = new VueRouter({
    routes : routes
})
// const router = new VueRouter({
//     mode: 'history',
//     routes: routes
// });

// const app = new Vue({
//     el: '#app'
// });

// const app = new Vue({
//     el: '#app',
//     router: router,
//     render: h => h(Question),
// });

// const app = new Vue({
//     router,
//     components: { Question, Summary, Plan },
//     render: h => h(Question)
//   }).$mount('#app')

const app = new Vue({
    el: "#app",
    render: h => h(Question),
    router
});


// const app = new Vue({
//     router
// }).$mount('#app')