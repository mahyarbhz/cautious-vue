<template>
    <div id="ProductsList" class="pb-8">
        <div class="w-2/3 mx-auto">
            <div class="flex">
                <button @click="update(selected)" class="bg-blue-700 transition duration-250 hover:bg-blue-800 text-white py-2 px-4 rounded-md shadow-md focus:outline-none">Update list</button>
                <div class="spinner" v-if="loading">
                    <div class="rect1"></div>
                    <div class="rect2"></div>
                    <div class="rect3"></div>
                    <div class="rect4"></div>
                    <div class="rect5"></div>
                </div>
            </div>
            <div class="bg-white shadow-md rounded my-6"  style="display: grid;">
                <select name="order" id="order" v-model="selected" @change="update(selected)" class="" style="justify-self: end">
                    <option value="" disabled selected>Please select one</option>
                    <option value="0">The newest first</option>
                    <option value="1">The oldest first</option>
                </select>
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
                products: {},
                selected: 0,
                loading: false,
            }
        },
        created() {
            this.loading = true;
            axios.get('/products').then(response => {
                this.products = response.data;
            }).finally(() => {
                this.loading = false;
            });
        },
        methods: {
            update(selected) {
                this.loading = true;
                if (selected == 1) {
                    axios.get('/productsRev').then(response => {
                        this.products = response.data;
                    }).finally(() => {
                        this.loading = false;
                    });;
                } else {
                    axios.get('/products').then(response => {
                        this.products = response.data;
                    }).finally(() => {
                        this.loading = false;
                    });;
                }
            }
        },
    };
</script>

<style scoped>
    .spinner {
        width: 40px;
        height: 35px;
        margin-left: 5px;
        text-align: center;
        font-size: 10px;
    }

    .spinner > div {
        background-color: #1D4ED8;
        height: 100%;
        width: 5px;
        display: inline-block;

        -webkit-animation: rectsAnimation 1.2s infinite ease-in-out;
        animation: rectsAnimation 1.2s infinite ease-in-out;
    }

    .spinner .rect2 {
        -webkit-animation-delay: -1.1s;
        animation-delay: -1.1s;
    }

    .spinner .rect3 {
        -webkit-animation-delay: -1.0s;
        animation-delay: -1.0s;
    }

    .spinner .rect4 {
        -webkit-animation-delay: -0.9s;
        animation-delay: -0.9s;
    }

    .spinner .rect5 {
        -webkit-animation-delay: -0.8s;
        animation-delay: -0.8s;
    }

    @-webkit-keyframes rectsAnimation {
        0%, 40%, 100% { -webkit-transform: scaleY(0.4) }
        20% { -webkit-transform: scaleY(1.0) }
    }

    @keyframes rectsAnimation {
        0%, 40%, 100% {
            transform: scaleY(0.4);
            -webkit-transform: scaleY(0.4);
        }  20% {
               transform: scaleY(1.0);
               -webkit-transform: scaleY(1.0);
           }
    }
</style>
