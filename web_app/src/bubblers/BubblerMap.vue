<template>
<div>
    <div id="map" class="map"></div>
</div>
</template>

<style>
    .map {
        height: 500px;
    }
</style>

<script type="text/babel">
    import 'leaflet/dist/leaflet.css';
    import 'leaflet-markercluster/dist/MarkerCluster.css';
    import 'leaflet-markercluster/dist/MarkerCluster.Default.css';

    import L from 'leaflet';
    import 'leaflet-markercluster';
    import bubblers from './bubblers';

    export default {
        ready() {
            var map = initialiseMap();
            populateBubblers(map);
        }
    };

    function initialiseMap() {
        var map = L.map('map', {
            center: [-27.470, 153.021],
            zoom: 13,
            attributionControl: false
        });

        L.tileLayer('https://api.mapbox.com/styles/v1/{username}/{style_id}/tiles/{z}/{x}/{y}?access_token={accessToken}',
            {
                username: 'oohgloworm',
                style_id: 'cim6ae2pw00lfa0m4qzgysfh6',
                accessToken: 'pk.eyJ1Ijoib29oZ2xvd29ybSIsImEiOiJlYWMwZjkyOTRhYjdkYjlkMmU0ZjBiNThjYjliMDkzNCJ9.wGc2Qn2Zo-_MqIP_5eykXw'
            }).addTo(map);

        L.Icon.Default.imagePath = '/static/images';

        return map;
    }

    function populateBubblers(map) {
        bubblers.fetchAll().then(res => {
            var markers = L.markerClusterGroup();
            res.data.data.forEach(bubbler => {
                markers.addLayer(
                    L.marker([bubbler.latitude, bubbler.longitude])
                    .bindPopup(bubbler.description || '(no description)')
                );                    
            });
            map.addLayer(markers);
        });
    }

</script>