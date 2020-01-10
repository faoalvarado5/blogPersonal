window.onload = function() {

	var locations = new Array();
	const xhttp = new XMLHttpRequest();
	xhttp.open('GET', 'direcciones.json', true);
	xhttp.send();
	xhttp.onreadystatechange = function(){

		if(this.readyState == 4 && this.status == 200){

			let datos = JSON.parse(this.responseText);

			for(let item of datos){
				var temp = [{ latLng: { lat:   item.latitud  , lng:   item.longitud  } }];
				locations = locations.concat(temp);
			}

			var map, dir;

			map = L.map('map', {
				layers: MQ.mapLayer(),
				center: [ 10.02929,-84.29120 ],
				zoom: 15
			});

			dir = MQ.routing.directions();
			
			dir.route({locations}); 
			
			map.addLayer(MQ.routing.routeLayer({
				directions: dir,
				fitBounds: true
			}));
			
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