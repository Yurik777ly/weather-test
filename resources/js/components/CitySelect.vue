<template>
    <select v-model="selectedCity" id="cities">
        <option v-for="city in cities" :value="city">{{ city }}</option>
    </select>
</template>

<script>
export default {
    props: {
        cities: Array
    },
    data() {
        return {
            selectedCity: 'Лондон'
        }
    }
}
</script>
