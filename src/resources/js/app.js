require('./bootstrap');
import Vue from 'vue'

import Products from './components/ProductsComponent.vue'

const app = new Vue({
    el: '#app',
    components: {
        "products": Products
    }
})
