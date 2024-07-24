<template>
    <div class="weather-informer">
        <div class="block-select">
            <div class="block-name-city" v-show="showNode1">
                <div class="name-city">{{defaultCity}}</div>
                <button class="button-select-city" @click="toggleNodes">Сменить город</button>
            </div>
            <div class="select-city" v-show="showNode2">
                <CitySelect v-model="selectedCity" :defaultCity="defaultCity" :cities="cities" @change="getWeather" />
            </div>
            <div class="select-unit">
                <UnitSelect v-model="unit" @change="getWeather"/>
            </div>
        </div>
        <div class="block-image">
            <div>
                <div class="image-show"><img v-if="weatherData && weatherData.image" :src=weatherData.image /></div>
                <div class="temp-show" v-if="weatherData">{{ temp }}°</div>
            </div>
            <p class="description-show">{{description}}</p>
        </div>
        <div v-if="errorStr" class="message-error">{{errorStr}}</div>
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
            defaultCity: '',
            showNode1: true,
            showNode2: false,
            errorStr: ''
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
            axios.get('http://localhost:8080/api/cities')
                .then(response => {
                    this.cities = response.data;
                })
                .catch(error => {
                    console.error(error);
                });
        },
        getWeather() {
            axios.get(`http://localhost:8080/api/weather?city=${this.selectedCity}&unit=${this.unit}`)
                .then(response => {
                    this.weatherData = response.data;
                    if ("error" in this.weatherData) {
                        this.errorStr = this.weatherData.error;
                    }
                    this.defaultCity = this.weatherData.city;
                    this.temp = this.weatherData.temp;
                    this.description = this.weatherData.description;
                })
                .catch(error => {
                    console.error(error);
                });
            this.showNode1 = true;
            this.showNode2 = false;
        },
        toggleNodes() {
            this.showNode1 = !this.showNode1
            this.showNode2 = !this.showNode2
        }
    }
}
</script>
<style>
.weather-informer {
    width: 600px;
    height: 500px;
    background-color: cornflowerblue;
    margin: 50px 50px;
    display: flex;
    flex-direction: column
}
.block-select {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    padding: 10px 10px;
    height: 33%;
}
.block-image {
    text-align: center;
    height: 33%;
}
.block-image div {
    display: flex;
    flex-direction: row;
}
.image-show {
    padding-left: 30%
}
.temp-show {
    font-size: 88px;
    font-weight: bold;
    color: #ffffff;
    margin-top: -20px;
}
.description-show {
    color: #ffffff;
    font-weight: bold
}
.block-data {
    padding: 10% 30px 0 30px
}
.block-name-city, .select-city, .select-unit {
    padding: 20px 30px
}
.name-city {
    font-size: 24px;
    font-weight: normal;
    color: #ffffff;
    height: 30px;
}
.button-select-city {
    font-size: 10px;
    font-weight: normal;
    color: #ffffff;
    position: relative;
}
.message-error {
    text-align: center;
    color: #ffffff;
    font-size: 14px;
}
</style>
