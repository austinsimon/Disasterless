$(document).ready(function () {
	$("#btnLogin").click(function () {
		//TODO: Field validation

		var email = $("#inputEmail").val();
		var pass = $("#inputPass").val();

		console.log("test");
		$.ajax({
			type: "POST"
			, url: "../includes/login.php"
			, data: {
				email: email
				, password: hex_sha512(pass)
			}
			, success: function (result) {
				if (result == "success") {
					window.location.href = "index.php";
				} else {
					alert(result);
					console.log(result);
				}
			}
			, error: function (result) {
				alert(result);
				console.log(result);
			}
		});
	});
});