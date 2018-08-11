var center = {
	lat: 28.5383
	, lng: -81.3792
};
var map;
var apiKey = 'AIzaSyBvk_axFbqqgSxvDlBlL-tnjITbvllJ4QM';
var polylines = [];
var marker1;
var marker2;
var marker3;
var marker4;
var marker5;
var directionsService;
var directionsDisplay;
var polyline;

var routes = [
	{
		name: "I4"
		, "point1": {
			"lat": 28.9593273565521
			, "lng": -81.25646211547848
		}
		, "point2": {
			"lat": 28.21327083622516
			, "lng": -81.67600252075192
		}
	}, {
		name: "SR-408"
		, "point1": {
			"lat": 28.54621692135344
			, "lng": -81.55060388488766
		}
		, "point2": {
			"lat": 28.54697088283036
			, "lng": -81.26766302032468
		}
	}, {
		name: "SR-528"
		, "point1": {
			"lat": 28.56853189609642
			, "lng": -81.26015283508298
		}
		, "point2": {
			"lat": 28.457890735892175
			, "lng": -80.98545171661374
		}
	}, {
		name: "SR-91"
		, "point1": {
			"lat": 28.54900655185778
			, "lng": -81.63883783264157
		}
		, "point2": {
			"lat": 28.26786424606056
			, "lng": -81.33358098907468
		}
	}, {
		name: "SR-436"
		, "point1": {
			"lat": 28.678793288574536
			, "lng": -81.52004815979001
		}
		, "point2": {
			"lat": 28.66203740731304
			, "lng": -81.39005758209225
		}
	}, {
		"point1": {
			"lat": 28.673258496084756
			, "lng": -81.49893381042477
		}
		, "point2": {
			"lat": 28.673258496084756
			, "lng": -81.49893381042477
		}
		, "waypoints": [
			{
				"location": {
					"lat": 28.550966788546155
					, "lng": -81.39662362976071
				}
    }



			
			, {
				"location": {
					"lat": 28.477055725541536
					, "lng": -81.39670946044919
				}
    }



			
			, {
				"location": {
					"lat": 28.381649125202962
					, "lng": -81.40460588378903
				}
    }
  ]
}, {
		"point1": {
			"lat": 28.399468911204767
			, "lng": -80.94592668457028
		}
		, "point2": {
			"lat": 28.399468911204767
			, "lng": -80.94592668457028
		}
		, "waypoints": [
			{
				"location": {
					"lat": 28.455023233834964
					, "lng": -80.98437883300778
				}
    }

			
			, {
				"location": {
					"lat": 28.542522432099936
					, "lng": -81.08737565917966
				}
    }

			
			, {
				"location": {
					"lat": 28.565441252773887
					, "lng": -81.16839982910153
				}
    }
  ]
}, {
		"point1": {
			"lat": 28.796159795398758
			, "lng": -81.34383775634763
		}
		, "point2": {
			"lat": 28.796159795398758
			, "lng": -81.34383775634763
		}
		, "waypoints": [
			{
				"location": {
					"lat": 28.729948026399665
					, "lng": -81.24667741699216
				}
    }
			
			, {
				"location": {
					"lat": 28.63650307201217
					, "lng": -81.24315835876462
				}
    }
			
			, {
				"location": {
					"lat": 28.460758160168005
					, "lng": -81.232601184082
				}
    }
  ]
}, {
		"point1": {
			"lat": 28.45140101480317
			, "lng": -81.21200181884763
		}
		, "point2": {
			"lat": 28.45140101480317
			, "lng": -81.21200181884763
		}
		, "waypoints": [
			{
				"location": {
					"lat": 28.450646370219257
					, "lng": -81.29439927978513
				}
    }
			, {
				"location": {
					"lat": 28.450872764159968
					, "lng": -81.34049035949704
				}
    }
			, {
				"location": {
					"lat": 28.421248774418487
					, "lng": -81.43228628082272
				}
    }
  ]
}
];

function initMap() {
	map = new google.maps.Map(document.getElementById('routesMap'), {
		zoom: 10
		, center: center
	});

	directionsService = new google.maps.DirectionsService();
	//directionsDisplay = new google.maps.DirectionsRenderer();

	//directionsDisplay.setMap(map);

	marker1 = new google.maps.Marker({
		position: center
		, map: map
		, animation: google.maps.Animation.DROP
		, draggable: true
	});

	marker2 = new google.maps.Marker({
		position: center
		, map: map
		, animation: google.maps.Animation.DROP
		, draggable: true
	});

	marker3 = new google.maps.Marker({
		position: center
		, map: map
		, animation: google.maps.Animation.DROP
		, draggable: true
	});

	marker4 = new google.maps.Marker({
		position: center
		, map: map
		, animation: google.maps.Animation.DROP
		, draggable: true
	});

	marker5 = new google.maps.Marker({
		position: center
		, map: map
		, animation: google.maps.Animation.DROP
		, draggable: true
	});

	google.maps.event.addListener(marker5, "dragend", directionsRequest);
	google.maps.event.addListener(marker4, "dragend", directionsRequest);
	google.maps.event.addListener(marker3, "dragend", directionsRequest);
	google.maps.event.addListener(marker2, "dragend", directionsRequest);
	google.maps.event.addListener(marker1, "dragend", directionsRequest);

	for (var i = 0; i < routes.length; i++) {
		var request;
		if (typeof routes[i].waypoints != "undefined") {
			request = {
				origin: routes[i].point1
				, destination: routes[i].point2
				, travelMode: 'DRIVING'
				, waypoints: routes[i].waypoints
			};
		} else {
			request = {
				origin: routes[i].point1
				, destination: routes[i].point2
				, travelMode: 'DRIVING'
			};
		}
		makeRequest(request);
	}
}

function directionsRequest(event) {
	console.log({
		point1: {
			lat: marker1.position.lat()
			, lng: marker1.position.lng()
		}
		, point2: {
			lat: marker1.position.lat()
			, lng: marker1.position.lng()
		}
		, waypoints: [{
			location: {
				lat: marker2.position.lat()
				, lng: marker2.position.lng()
			}
		}, {
			location: {
				lat: marker3.position.lat()
				, lng: marker3.position.lng()
			}
		}, {
			location: {
				lat: marker4.position.lat()
				, lng: marker4.position.lng()
			}
		}]
	, })
	var request = {
		origin: marker1.position
		, destination: marker5.position
		, travelMode: 'DRIVING'
		, waypoints: [{
			location: marker2.position
		}, {
			location: marker3.position
		}, {
			location: marker4.position
		}]
	};

	makeRequest(request, true);
}

function makeRequest(request, store) {
	directionsService.route(request, function (result, status) {
		if (status == 'OK') {
			if (store && polyline != null) {
				polyline.setMap(null);
			}

			var snappedPolyline = new google.maps.Polyline({
				path: result.routes[0].overview_path
				, strokeColor: 'black'
				, strokeWeight: 3
			});

			snappedPolyline.setMap(map);

			if (store) {
				polyline = snappedPolyline;
			}
		}
	});
}