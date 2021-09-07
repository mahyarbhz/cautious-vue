<template>
    <div id="ProductsForm">
        <form @submit.prevent="submit">
            <input type="text" name="name" placeholder="Name" v-model="fields.name">
            <textarea name="description" id="" cols="30" rows="10" placeholder="Description" v-model="fields.description"></textarea>
            <input type="submit" value="Submit">
        </form>
        <ul>
            <li v-for="error in errors">{{ error }}</li>
        </ul>
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
