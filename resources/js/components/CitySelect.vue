<template>
    <select v-model="selectedCity" id="cities">
        <option v-for="city in cities" :value="city">{{ city }}</option>
    </select>
</template>

<script>
export default {
    props: {
        cities: Array,
        defaultCity: String
    },
    data() {
        return {
            selectedCity: 'Омск'
        }
    },
}
</script>
<style>
#cities {
    width: 200px;
    height: 50px;
    font-size: 24px;
}
</style>
