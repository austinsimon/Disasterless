var map;
var center = {
	lat: 28.5383
	, lng: -81.3792
};

function initMap() {
	map = new google.maps.Map(document.getElementById('closedRoadsMap'), {
		zoom: 10
		, center: center
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
					, map: map
					, position: {
						lat: parseFloat(blockedRoad.lat)
						, lng: parseFloat(blockedRoad.lng)
					}
				});
			}
		}
		, error: function (data) {
			console.log(data);
		}
	});
}