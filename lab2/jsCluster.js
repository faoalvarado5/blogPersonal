window.onload = function() {

	var map = L.map('map').
	setView([10.07192, -84.31205], 
	14);
	 
	L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
		maxZoom: 20,
		attribution: '&copy; Openstreetmap France | &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
	}).addTo(map);

	var markerClusters = L.markerClusterGroup();
 
	var addressPoints = [
	  [8.68591,-83.70669],
	  [8.68583,-83.70673],
	  [8.68530,-83.70740],
	  [8.68496,-83.70786],
	  [8.68499,-83.70799],
	  [8.68539,-83.70842],
	  [8.68552,-83.70864],
	  [8.68492,-83.70996],
	  [8.68484,-83.71016],
	  [8.68441,-83.71029],
	  [8.68381,-83.71053],
	  [8.68328,-83.71076],
	  [8.68247,-83.71131],
	  [8.68206,-83.71135],
	  [8.68172,-83.71150]
	]


	for (var i = 0; i < addressPoints.length; i++) {
		var a = addressPoints[i];
		var marker = L.marker(new L.LatLng(a[0], a[1]));
		markerClusters.addLayer( marker );
	}
	map.addLayer( markerClusters );

	map.locate({setView: true, watch: true}).on('locationfound', function(e){
	
		var marker = L.marker([e.latitude, e.longitude]).bindPopup('Usted esta aqui');
		var circle = L.circle([e.latitude, e.longitude], e.accuracy/2, {
			weight: 1,
			color: 'blue',
			fillColor: '#cacaca',
			fillOpacity: 0.2
		});
		map.addLayer(marker);
		map.addLayer(circle);
	}).on('locationerror', function(e){
		console.log(e);
		alert("Location access denied.");
	});	
}