var center = {
	lat: 28.5383
	, lng: -81.3792
};

var selectedCircle;
var map;

var circleColor = '#ff7a59';
var selectedColor = '#ffd016';

function initMap() {
	map = new google.maps.Map(document.getElementById('outagesMap'), {
		zoom: 10
		, center: center
	});

	$.ajax({
		url: "../includes/get_outages.php"
		, type: "POST"
		, dataType: "json"
		, success: function (data) {
			for (var i = 0; i < data.length; i++) {
				createCircle(data[i]);
			}
		}
		, error: function (data) {
			console.log(data);
		}
	});
}

function createCircle(outage) {
	var circle = new google.maps.Circle({
		strokeColor: '#515151'
		, strokeWeight: 1
		, fillColor: circleColor
		, fillOpacity: 0.25
		, map: map
		, center: {
			lat: parseFloat(outage.lat)
			, lng: parseFloat(outage.lng)
		}
		, radius: parseInt(outage.radius)
	});

	circle.addListener("click", function () {
		if (selectedCircle != null) {
			selectedCircle.setOptions({
				fillColor: circleColor
			});
		}

		circle.setOptions({
			fillColor: selectedColor
		});

		selectedCircle = circle;

		$("#outage-affected").html(Math.round(circle.getRadius() * 1.5));
		$("#outage-information").addClass("show");
	});

	$("#close-information").click(function () {
		$("#outage-information").removeClass("show");
	});
}