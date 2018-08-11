var listItemTemplate = '<li class="list-item" style="overflow: visible; overflow-y: visible; height: auto">\
				<div class="div-block-7">\
					<div class="update-heading">{0}</div>\
					<a class="update-time" style="font-size: 12pt;" href="tel:{1}">{1}</a>\
					<div class="update-time">{2}</div>\
					<p class="update-p">{3}</p>\
				</div>\
			</li>';

function formatAssistance(assistance) {
	$("#updates-listings").append(String.format(listItemTemplate, assistance.assistanceType == "offer" ? "Offer" : "Request", assistance.phoneNumber, assistance.dateCreated, assistance.content));
}

function getAssistances() {
	$.ajax({
		url: "../includes/get_assistances.php"
		, type: "POST"
		, dataType: "json"
		, success: function (data) {
			$("#updates-listings").empty();

			for (var i = 0; i < data.length; i++) {
				formatAssistance(data[i]);
			}
		}
		, error: function (data) {
			console.log(data);
		}
	});
}

function submitAssistance(assistanceType) {
	$.ajax({
		type: "POST"
		, url: "../includes/save_assistance.php"
		, data: {
			content: $("#add-assistance-content").val()
			, assistance_type: assistanceType
			, phone_number: $("#add-assistance-phone-number").val()
		}
		, success: function (data) {
			$("#add-assistance").hide();
			getAssistances();
		}
		, error: function (data) {
			console.log(data);
		}
	});
}


$(document).ready(function () {
	if (!String.format) {
		String.format = function (format) {
			var args = Array.prototype.slice.call(arguments, 1);
			return format.replace(/{(\d+)}/g, function (match, number) {
				return typeof args[number] != 'undefined' ? args[number] : match;
			});
		};
	}

	$("#offerButton").click(function () {
		$("#submit-offer").show();
		$("#submit-request").hide();
		$("#add-assistance-content").val("");
		$("#add-assistance-phone-number").val("");
		$("#add-assistance").show();
	});

	$("#requestButton").click(function () {
		$("#submit-offer").hide();
		$("#submit-request").show();
		$("#add-assistance-content").val("");
		$("#add-assistance-phone-number").val("");
		$("#add-assistance").show();
	});

	$("#cancel-assistance").click(function () {
		$("#add-assistance").hide();
	});

	$("#submit-offer").click(function () {
		submitAssistance("offer");
	});

	$("#submit-request").click(function () {
		submitAssistance("request");
	});

	getAssistances();
});