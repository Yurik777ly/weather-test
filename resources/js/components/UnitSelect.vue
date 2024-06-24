<template>
    <select v-model="unit" id="units">
        <option value="metric">Celsius</option>
        <option value="imperial">Fahrenheit</option>
    </select>
</template>

<script>
export default {
    data() {
        return {
            unit: 'metric'
        }
    }
}
</script>
