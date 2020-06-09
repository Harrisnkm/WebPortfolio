<template>
  <div>

    <GmapMap
        :center="center"
        :zoom="16"
    >
        <GmapMarker
            :key="index"
            v-for="(m, index) in markers"
            :position="m.position"
            :clickable="true"
            :draggable="true"
        />
    </GmapMap>
  </div>
</template>

<script>

    export default {
        name: "ProviderSearchGMapsAPI",
        props: {
          providerAddress: String
        },
        data() {
            return {
                center: {lat: 40.8481556, lng: -73.99763899999999},
                markers: [],
                places: [],
                currentPlace: null
            }
        },
        methods: {
            getGeocode() {
                axios({
                    method: 'GET',
                    url: 'https://cors-anywhere.herokuapp.com/https://maps.googleapis.com/maps/api/geocode/json',
                    params: {
                        address: this.providerAddress,
                        key: 'AIzaSyBiOUDytpHIVz4bBbW9-fO_3Vh8ZgTCEEk'
                    },
                    responseType: 'json'
                }).then(response => {
                    let locationData = response.data.results[0].geometry.location
                    this.setLocation(locationData)
                    this.setMarker(locationData)
                })
            },
            setLocation(locationData){
                this.center.lat = locationData.lat;
                this.center.lng = locationData.lng;
            },
            setMarker(locationData){
                this.markers.push({position: {lat: locationData.lat,lng: locationData.lng}});


            }
        },
        mounted(){
            this.getGeocode();
        }
    }
</script>

<style lang="sass" scoped>

    .vue-map-container
        height: 50vh
        width: 100%

</style>
