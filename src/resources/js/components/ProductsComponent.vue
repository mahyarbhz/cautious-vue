<template>
    <div id="ProductsList" class="pb-8">
        <div class="w-2/3 mx-auto">
            <button @click="update()" class="bg-blue-700 transition duration-250 hover:bg-blue-800 text-white py-2 px-4 rounded-md shadow-md focus:outline-none">Update list</button>
            <div class="bg-white shadow-md rounded my-6">
                <table class="text-left w-full border-collapse">
                    <thead>
                        <tr>
                            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Name</th>
                            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="hover:bg-gray-100" v-for="item in products">
                            <td class="py-4 px-6 border-b border-grey-light">{{ item.name }}</td>
                            <td class="py-4 px-6 border-b border-grey-light">{{ item.description }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<style>

</style>

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

<style scoped>

</style>
