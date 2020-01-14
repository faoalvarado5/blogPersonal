window.onload = function() {

	var waypoints = new Array();
 	const xhttp = new XMLHttpRequest();
	xhttp.open('GET', 'direcciones.json', true);
	xhttp.send();
	xhttp.onreadystatechange = function(){

		if(this.readyState == 4 && this.status == 200){
			
			let datos = JSON.parse(this.responseText);

			for(let item of datos){
				var tmp = L.latLng(item.latitud, item.longitud);
				waypoints = waypoints.concat(tmp);
			}

			var map = L.map('map').
			setView([10.07192, -84.31205], 
			14);
			 
			L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
				maxZoom: 20,
				attribution: '&copy; Openstreetmap France | &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
			}).addTo(map);

			L.Routing.control({waypoints}).addTo(map);
			
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
	}
}