var shelters = [{
	name: "Barnett Park Community Center"
	, address: "4801 W. Colonial Dr. Orlando, FL 32808"
	, pets: true
	, location: {
		lat: 28.5587805
		, lng: -81.44161600000001
	}
			}, {
	name: "Odyssey Middle School"
	, address: "9290 Lee Vista Blvd. Orlando, FL 32829"
	, pets: false
	, location: {
		lat: 28.4747803
		, lng: -81.25695969999998
	}
			}, {
	name: "Apopka High School"
	, address: "425 N Park Ave Apopka, FL 32712"
	, pets: false
	, location: {
		lat: 28.6855714
		, lng: -81.5090472
	}
			}, {
	name: "Colonial High School"
	, address: "6100 Oleander Dr. Orlando, FL 32807"
	, pets: false
	, location: {
		lat: 28.5525316
		, lng: -81.30180489999998
	}
			}, {
	name: "Apopka Middle School"
	, address: "555 W. Martin St. Apopka, FL 32712"
	, pets: false
	, location: {
		lat: 28.6912367
		, lng: -81.52141069999999
	}
			}, {
	name: "Conway Middle School"
	, address: "4600 Anderson Rd. Orlando, FL 32812"
	, pets: false
	, location: {
		lat: 28.5006147
		, lng: -81.32790490000002
	}
			}, {
	name: "Union Park Middle School"
	, address: "1844 Westfall Dr. Orlando, FL 32817"
	, pets: false
	, location: {
		lat: 28.5711742
		, lng: -81.24857070000002
	}
			}, {
	name: "East River High School"
	, address: "650 East River Falcons Way Orlando, FL 32833"
	, pets: false
	, location: {
		lat: 28.5572611
		, lng: -81.13101069999999
	}
			}, {
	name: "Edgewater High School"
	, address: "3100 Edgewater Dr. Orlando, FL 32804"
	, pets: false
	, location: {
		lat: 28.5813967
		, lng: -81.39193920000002
	}
			}, {
	name: "Memorial Middle School"
	, address: "2220 29th St. Orlando, FL 32805"
	, pets: false
	, location: {
		lat: 28.5114678
		, lng: -81.40634139999997
	}
			}, {
	name: "West Orange High School"
	, address: "1625 Beulah Rd. Winter Garden, FL 34787"
	, pets: false
	, location: {
		lat: 28.542228
		, lng: -81.56701399999997
	}
			}, {
	name: "Bithlo Community Center"
	, address: "18501 Washington Ave. Orlando, FL 32820"
	, pets: true
	, location: {
		lat: 28.559478
		, lng: -81.102644
	}
			}, {
	name: "Meadow Woods Middle School"
	, address: "1800 Rhode Island Wood Circle Orlando, FL 32824"
	, pets: false
	, location: {
		lat: 28.3704401
		, lng: -81.34564209999996
	}
			}, {
	name: "Ocoee High School"
	, address: "1925 Ocoee Point Parkway Ocoee, FL 34761"
	, pets: false
	, location: {
		lat: 28.5998778
		, lng: -81.5576385
	}
			}, {
	name: "Gotha Middle School"
	, address: "9155 Gotha Road Windermere, FL 34786"
	, pets: false
	, location: {
		lat: 28.5299425
		, lng: -81.5112909
	}
			}, {
	name: "Hunter's Creek Middle School"
	, address: "13400 Town Loop Blvd. Orlando, FL 32837"
	, pets: false
	, location: {
		lat: 28.367851
		, lng: -81.43513999999999
	}
			}, {
	name: "Lakeview Middle School"
	, address: "1200 West Bay Street Winter Garden, FL 34787"
	, pets: false
	, location: {
		lat: 28.564501
		, lng: -81.60241300000001
	}
			}, {
	name: "Oakridge High School"
	, address: "6000 Winegard Road Orlando, FL 32809"
	, pets: true
	, location: {
		lat: 28.469936
		, lng: -81.38451900000001
	}
}];

var selectedShelter = null;

function initMap() {
	var map = new google.maps.Map(document.getElementById('sheltersMap'), {
		zoom: 10
		, center: {
			lat: 28.5383
			, lng: -81.3792
		}
	});

	for (var i = 0; i < shelters.length; i++) {
		var shelter = shelters[i];

		makeMarker(shelter);
	}

	function makeMarker(shelter) {
		var marker;

		if (shelter.pets === true) {
			marker = new google.maps.Marker({
				position: shelter.location
				, map: map
				, title: shelter.name
				, animation: google.maps.Animation.DROP
				, draggable: false
				, icon: "../images/pets_pin.png"
			});
		} else {
			marker = new google.maps.Marker({
				position: shelter.location
				, map: map
				, title: shelter.name
				, animation: google.maps.Animation.DROP
				, draggable: false
			});
		}

		shelter.marker = marker;

		function markerClick() {
			$(".map-information").addClass("show");

			if (selectedShelter != null && selectedShelter.marker.getAnimation() != null) {
				selectedShelter.marker.setAnimation(null);
			}

			marker.setAnimation(google.maps.Animation.BOUNCE);
			selectedShelter = shelter;
			$("#shelter-name").html(shelter.name);
			$("#shelter-address").html(shelter.address);

			if (shelter.pets == true) {
				$("#shelter-pet-friendly").html("Yes").removeClass("red-text").addClass("green-text");
			} else {
				$("#shelter-pet-friendly").html("No").removeClass("green-text").addClass("red-text");
			}
		}

		marker.addListener('click', markerClick);
	}
}

$(document).ready(function () {
	$("#close-information").click(function () {
		if (selectedShelter != null) {
			selectedShelter.marker.setAnimation(null);
		}

		$(".map-information").removeClass("show");
	});
});