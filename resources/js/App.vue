<template>
    <div class="weather-informer">
        <div class="block-select">
            <CitySelect v-model="selectedCity" :cities="cities" @change="getWeather" />

            <UnitSelect v-model="unit" @change="getWeather"/>
        </div>
        <div class="block-image">
            <div style="display: flex; flex-direction: row;">
                <div class="image-show"><img v-if="weatherData && weatherData.image" :src=weatherData.image /></div>
                <div class="temp-show">{{ weatherData.temp }}°</div>
            </div>
            <p class="description-show">{{weatherData.description}}</p>
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
            selectedCity: 'Лондон',
            unit: 'metric',
            weatherData: null,
            image: '',
            description: ''
        }
    },
    mounted() {
        axios.get('http://localhost:8000/api/cities')
            .then(response => {
                this.cities = response.data;
            })
            .catch(error => {
                console.error(error);
            });
    },
    created() {
        this.getWeather();
    },
    methods: {
        getWeather() {
            axios.get(`http://localhost:8000/api/weather?city=${this.selectedCity}&unit=${this.unit}`)
                .then(response => {
                    this.weatherData = response.data;
                    this.selectedCity = this.weatherData.city;
                })
                .catch(error => {
                    console.error(error);
                });
        },
        upperCaseFirst(string) {
            this.text = string.charAt(0).toUpperCase() + string.slice(1);
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
