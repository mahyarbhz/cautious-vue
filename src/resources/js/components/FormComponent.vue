<template>
    <div id="ProductsForm">
        <form @submit.prevent="submit">
            <input type="text" name="name" placeholder="Name" v-model="fields.name">
            <textarea name="description" id="" cols="30" rows="10" placeholder="Description" v-model="fields.description"></textarea>
            <input type="submit" value="Submit">
        </form>
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
                alert("Submitted successfully, update the list with that button. :)");
                console.log(response);
            }).catch(error => {
                if (error.response.status === 422) {
                    this.errors = error.response.data.errors || {};
                }
            });
        },
    },
}
</script>

<style scoped>

</style>
