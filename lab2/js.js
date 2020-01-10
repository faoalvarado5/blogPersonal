function iniciar() {

	var map,
		dir;

	map = L.map('map', {
		layers: MQ.mapLayer(),
		center: [ 10.0556, -84.2715 ],
		zoom: 15
	});

	dir = MQ.routing.directions();

	var OpenStreetMap_HOT = L.tileLayer('https://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png', {
		attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Tiles style by <a href="https://www.hotosm.org/" target="_blank">Humanitarian OpenStreetMap Team</a> hosted by <a href="https://openstreetmap.fr/" target="_blank">OpenStreetMap France</a>'
	}).addTo(map);

	dir.route({
		locations: [
			{ latLng: { lat: 10.07192, lng: -84.31205 } },
			{ latLng: { lat: 10.07457, lng: -84.31195 } },
			{ latLng: { lat: 10.01692, lng: -84.21885 } },
			{ latLng: { lat: 10.01971, lng: -84.19709 } }
		]
	});

	map.addLayer(MQ.routing.routeLayer({
		directions: dir,
		fitBounds: true
	}));
}