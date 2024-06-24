<template>
    <div v-if="weatherData" class="weather-data-show">
        <div>
            <p v-if="weatherData" class="data-label">Давление:</p> <p class="data-value">{{ weatherData.pressure }} hPa</p>
        </div>
        <div>
            <p v-if="weatherData" class="data-label">Влажность:</p> <p class="data-value">{{ weatherData.humidity }}%</p>
        </div>
        <div>
            <p v-if="weatherData" class="data-label">Ветер:</p> <p class="data-value">{{ weatherData.speed }} m/s</p>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        weatherData: Object,
        unit: String
    }
}
</script>
<style>
.weather-data-show {
    display: flex;
    justify-content: space-between;
    color: #ffffff
}
.data-value {
    font-weight: bold
}
.data-label {
    font-size: 10px
}
</style>
