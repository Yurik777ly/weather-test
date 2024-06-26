<template>
    <select v-model="unit" id="units">
        <option value="metric">C</option>
        <option value="imperial">F</option>
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
<style>
#units {
    background: cornflowerblue;
    color: #ffffff;
}
</style>
