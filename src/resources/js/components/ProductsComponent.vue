<template>
    <div>
        <ul>
            <li v-for="item in products">{{ item.name }} | {{ item.description }}</li>
        </ul>
    </div>
</template>

<script>
    export default {
        props: ['products'],
        mounted() {
            console.log("This is about component");
        },
    };
</script>
