var center = {
	lat: 28.5383
	, lng: -81.3792
};

var circles = [];
var markers = [];
var map;
var closedRoadsMap;

function initMap() {
	map = new google.maps.Map(document.getElementById('outagesMap'), {
		zoom: 10
		, center: center
	});

	var drawingManager = new google.maps.drawing.DrawingManager({
		drawingMode: google.maps.drawing.OverlayType.MARKER
		, drawingControl: true
		, drawingControlOptions: {
			position: google.maps.ControlPosition.TOP_CENTER
			, drawingModes: ['circle']
		}
		, circleOptions: {
			fillColor: '#ff7a59'
			, fillOpacity: .25
			, strokeWeight: 1
			, strokeColor: '#515151'
			, clickable: false
			, editable: false
			, zIndex: 1
		}
	});

	drawingManager.setMap(map);

	google.maps.event.addListener(drawingManager, 'circlecomplete', function (circle) {
		circles.push(circle);

		$.ajax({
			type: "POST"
			, url: "../includes/save_outage.php"
			, data: {
				lat: circle.center.lat()
				, lng: circle.center.lng()
				, radius: circle.getRadius()
			}
		})
	});

	$.ajax({
		url: "../includes/get_outages.php"
		, type: "POST"
		, dataType: "json"
		, success: function (data) {
			for (var i = 0; i < data.length; i++) {
				var outage = data[i];
				console.log(outage);

				var circle = new google.maps.Circle({
					strokeColor: '#515151'
					, strokeWeight: 1
					, fillColor: '#ff7a59'
					, fillOpacity: 0.25
					, map: map
					, center: {
						lat: parseFloat(outage.lat)
						, lng: parseFloat(outage.lng)
					}
					, radius: parseInt(outage.radius)
				});

				circles.push(circle);
			}
		}
		, error: function (data) {
			console.log(data);
		}
	});

	initClosedRoadsMap();
}

function initClosedRoadsMap() {
	closedRoadsMap = new google.maps.Map(document.getElementById('closedRoadsMap'), {
		zoom: 10
		, center: center
	});

	var drawingManager = new google.maps.drawing.DrawingManager({
		drawingMode: google.maps.drawing.OverlayType.MARKER
		, drawingControl: true
		, drawingControlOptions: {
			position: google.maps.ControlPosition.TOP_CENTER
			, drawingModes: ['marker']
		}
		, markerOptions: {
			icon: "../images/blocked_road.png"
		}
	});

	drawingManager.setMap(closedRoadsMap);

	google.maps.event.addListener(drawingManager, 'markercomplete', function (marker) {
		markers.push(marker);

		$.ajax({
			type: "POST"
			, url: "../includes/save_blocked_road.php"
			, data: {
				lat: marker.position.lat()
				, lng: marker.position.lng()
			}
		});
	});

	$.ajax({
		url: "../includes/get_blocked_roads.php"
		, type: "POST"
		, dataType: "json"
		, success: function (data) {
			for (var i = 0; i < data.length; i++) {
				var blockedRoad = data[i];
				console.log(blockedRoad);

				var marker = new google.maps.Marker({
					icon: "../images/blocked_road.png"
					, map: closedRoadsMap
					, position: {
						lat: parseFloat(blockedRoad.lat)
						, lng: parseFloat(blockedRoad.lng)
					}
				});

				markers.push(marker);
			}
		}
		, error: function (data) {
			console.log(data);
		}
	});
}

$(document).ready(function () {
	$("#resetOutages").click(function () {
		$.ajax({
			url: "../includes/reset_outages.php"
			, type: "POST"
			, success: function (data) {
				console.log(data);

				for (var i = 0; i < circles.length; i++) {
					circles[i].setMap(null);
				}

				circles = [];
			}
			, error: function (data) {
				console.log(data);
			}
		});
	});

	$("#resetClosedRoads").click(function () {
		$.ajax({
			url: "../includes/reset_blocked_roads.php"
			, type: "POST"
			, success: function (data) {
				console.log(data);

				for (var i = 0; i < markers.length; i++) {
					markers[i].setMap(null);
				}

				markers = [];
			}
			, error: function (data) {
				console.log(data);
			}
		});
	});

	$("#submitDonationLink").click(function () {
		$.ajax({
			type: "POST"
			, url: "../includes/save_donation_link.php"
			, data: {
				link: $("#donationLink").val()
			}
		});
	});
});