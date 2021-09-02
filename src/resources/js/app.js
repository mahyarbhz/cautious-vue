require('./bootstrap');
import Vue from 'vue'
import ProductsList from './components/ProductsComponent.vue'
import ProductsForm from './components/FormComponent.vue'

const app = new Vue({
    el: '#app',
    components: {
        "products-list": ProductsList,
        "products-form": ProductsForm
    }
})
