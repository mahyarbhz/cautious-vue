<template>
    <div id="ProductsList">
        <ul>
            <li v-for="item in products">{{ item.name }} || {{ item.description }}</li>
        </ul>
    </div>
</template>

<script>
    export default {
        name: "ProductsList",
        props: ['products'],
    };
</script>
