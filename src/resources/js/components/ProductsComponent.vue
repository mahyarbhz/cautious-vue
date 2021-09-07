<template>
    <div id="ProductsList">
        <button @click="update()">Update list</button>
        <ul>
            <li v-for="item in products">{{ item.name }} || {{ item.description }}</li>
        </ul>
    </div>
</template>

<script>
    export default {
        name: "ProductsList",
        data() {
            return {
                products: {}
            }
        },
        created() {
            axios.get('/products').then(response => {
                this.products = response.data;
            });
        },
        methods: {
            update() {
                axios.get('/products').then(response => {
                    this.products = response.data;
                });
            }
        },
    };
</script>
