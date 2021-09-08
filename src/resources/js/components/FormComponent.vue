<template>
    <div id="ProductsForm">
        <div class="form-handler flex justify-center">
            <div class="py-6 px-8 mt-8 bg-white rounded shadow-xl">
                <form @submit.prevent="submit">
                    <div class="mb-6">
                        <label for="name" class="block text-gray-800 font-bold">Name:</label>
                        <input type="text" name="name" id="name" placeholder="username" v-model="fields.name" class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600" />
                    </div>

                    <div>
                        <label for="email" class="block text-gray-800 font-bold">Description:</label>
                        <textarea name="description" id="email" cols="26" placeholder="Description" v-model="fields.description" class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600"></textarea>
                    </div>
                    <button class="cursor-pointer py-2 px-4 block mt-6 bg-blue-700 transition duration-250 hover:bg-blue-800 text-white font-bold w-full text-center rounded">Submit</button>
                </form>
            </div>
        </div>
        <div class="flex justify-center mt-4">
            <ul>
                <li v-for="error in errors">{{ error }}</li>
            </ul>
        </div>
    </div>
</template>

<script>
export default {
    name: "ProductsForm",
    data() {
        return {
            fields: {},
            errors: {},
        }
    },
    methods: {
        submit() {
            this.errors = {};
            axios.post('/', this.fields).then(response => {
                alert(response.data.message);
                this.fields = {};
            }).catch(error => {
                if (error.response.status) {
                    this.errors = error.response.data.errors || {};
                }
            });
        },
    },
}
</script>

<style scoped>

</style>
