<template>
    <div class="weather-informer">
        <div class="block-select">
            <CitySelect v-model="selectedCity" :defaultCity="defaultCity" :cities="cities" @change="getWeather" />

            <UnitSelect v-model="unit" @change="getWeather"/>
        </div>
        <div class="block-image">
            <div style="display: flex; flex-direction: row;">
                <div class="image-show"><img v-if="weatherData && weatherData.image" :src=weatherData.image /></div>
                <div class="temp-show" v-if="weatherData">{{ temp }}°</div>
            </div>
            <p class="description-show">{{description}}</p>
        </div>
        <div class="block-data">
            <WeatherDataShow v-if="weatherData" :weather-data="weatherData" :unit="unit" />
        </div>
    </div>
</template>

<script>
import CitySelect from './components/CitySelect.vue';
import UnitSelect from './components/UnitSelect.vue';
import WeatherDataShow from './components/WeatherDataShow.vue';

export default {
    components: { CitySelect, UnitSelect, WeatherDataShow },
    data() {
        return {
            cities: [],
            selectedCity: '',
            unit: 'metric',
            weatherData: null,
            image: '',
            description: '',
            temp: '',
            defaultCity: ''
        }
    },
    beforeMount() {
        this.getCities();
    },
    mounted() {
        this.getWeather();
    },
    methods: {
        getCities() {
            axios.get('http://localhost:8000/api/cities')
                .then(response => {
                    this.cities = response.data;
                })
                .catch(error => {
                    console.error(error);
                });
        },
        getWeather() {
            axios.get(`http://localhost:8000/api/weather?city=${this.selectedCity}&unit=${this.unit}`)
                .then(response => {
                    this.weatherData = response.data;
                    this.defaultCity = this.weatherData.city;
                    this.temp = this.weatherData.temp;
                    this.description = this.weatherData.description;
                })
                .catch(error => {
                    console.error(error);
                });
        },
    }
}
</script>
<style>
.weather-informer {
    width: 600px;
    height: 500px;
    background-color: #4a5bff;
    margin: 50px 50px;
    display: flex;
    flex-direction: column
}
.block-select {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    padding: 10px 10px
}
.block-image {
    padding-top: 20%;
    text-align: center
}
.image-show {
    padding-left: 30%
}
.temp-show {
    font-size: 60px;
    font-weight: bold;
    color: #ffffff
}
.description-show {
    color: #ffffff;
    font-weight: bold
}
.block-data {
    padding: 20% 10px 0 10px
}
</style>
