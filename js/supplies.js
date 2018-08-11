var map;
var newMarker;
var center = {
	lat: 28.5383
	, lng: -81.3792
};

var supplies = [];
var selectedSupply = null;

function getMarkerIcon(supplyAmount) {
	switch (supplyAmount) {
	case "high":
		return "../images/green_pin.png";
	case "low":
		return "../images/yellow_pin.png";
	case "none":
		return "../images/red_pin.png";
	}
}

function createSupply(supply) {
	if (typeof supply.marker == 'undefined') {
		var marker = new google.maps.Marker({
			position: {
				lat: supply.position.lat
				, lng: supply.position.lng
			}
			, map: map
			, title: supply.name
			, animation: google.maps.Animation.DROP
			, draggable: false
			, icon: getMarkerIcon(supply.amount)
		});

		supply.marker = marker;
	}

	supplies.push(supply);

	function markerClick() {
		if (newMarker != null) {
			return;
		}

		var supplyAmount;
		var $supplyAmount = $("#supply-amount");
		switch (supply.amount) {
		case "high":
			supplyAmount = "Good";
			$supplyAmount.removeClass("red-text").removeClass("yellow-text").addClass("green-text");
			break;
		case "low":
			supplyAmount = "Low";
			$supplyAmount.removeClass("red-text").removeClass("green-text").addClass("yellow-text");
			break;
		case "none":
			supplyAmount = "Out of Stock";
			$supplyAmount.removeClass("green-text").removeClass("yellow-text").addClass("red-text");
			break;
		}

		if (selectedSupply != null) {
			selectedSupply.marker.setAnimation(null);
		}

		marker.setAnimation(google.maps.Animation.BOUNCE);
		selectedSupply = supply;

		$("#supply-name").html(supply.name);
		$supplyAmount.html(supplyAmount);
		$("#supply-address").html(supply.address);
		$("#supply-information").addClass("show");
	}

	supply.marker.addListener("click", markerClick);
}

function initMap() {
	map = new google.maps.Map(document.getElementById('suppliesMap'), {
		zoom: 10
		, center: center
	});

	$.ajax({
		url: "../includes/get_supplies.php"
		, type: "POST"
		, dataType: "json"
		, success: function (data) {
			for (var i = 0; i < data.length; i++) {
				var supply = data[i];
				supply.position.lat = parseFloat(supply.position.lat);
				supply.position.lng = parseFloat(supply.position.lng);
				createSupply(data[i]);
			}
		}
		, error: function (data) {
			console.log(data);
		}
	});
}

$(document).ready(function () {
	$("#add-marker").click(function () {
		if (newMarker != null) {
			newMarker.setMap(null);
		}

		newMarker = new google.maps.Marker({
			position: center
			, map: map
			, title: "New Marker"
			, animation: google.maps.Animation.DROP
			, draggable: true
		});

		newMarker.setAnimation(google.maps.Animation.BOUNCE);

		if (selectedSupply != null) {
			selectedSupply.marker.setAnimation(null);
			selectedSupply = null;
		}

		$("#marker-buttons").show();
		$("#supply-information").removeClass("show");
	});

	$("#submit-marker").click(function () {
		newMarker.setAnimation(null);

		var geocoder = new google.maps.Geocoder;
		var location = {
			lat: newMarker.position.lat()
			, lng: newMarker.position.lng()
		};

		geocoder.geocode({
			'location': location
		}, function (results, status) {
			if (status === 'OK') {
				newMarker.address = results[0].formatted_address;
				$("#add-supplies").show();
				$("#marker-buttons").hide();
			}
		});
	});

	$("#cancel-marker").click(function () {
		$("#marker-buttons").hide();
		newMarker.setMap(null);
		newMarker = null;
	});

	$("#close-information").click(function () {
		if (selectedSupply != null) {
			selectedSupply.marker.setAnimation(null);
		}

		$("#supply-information").removeClass("show");
	});

	$("#submit-supplies").click(function () {
		var name = $("#add-supply-name").val();
		var amount = $("#add-supply-amount").val();
		var lat = newMarker.position.lat();
		var lng = newMarker.position.lng();
		$.ajax({
			url: "../includes/save_supplies.php"
			, type: "POST"
			, data: {
				name: name
				, amount: amount
				, lat: lat
				, lng: lng
				, address: newMarker.address
				, disasterId: 1
			}
			, success: function (result) {
				$("#add-supplies").hide();

				var supply = {
					name: name
					, amount: amount
					, position: {
						lat: lat
						, lng: lng
					}
					, address: newMarker.address
					, icon: getMarkerIcon(amount)
				}

				newMarker.setMap(null);
				newMarker = null;

				createSupply(supply);
			}
			, error: function (result) {
				$("#add-supplies").hide();
				newMarker.setMap(null);
				newMarker = null;
			}
		});
	});
});