$(document).ready(function () {
	$("#btnRegister").click(function () {
		//TODO: Field validation

		var first = $("#inputFirstName").val();
		var last = $("#inputLastName").val();
		var email = $("#inputEmail").val();
		var pass = $("#inputPass").val();
		var conf = $("#inputConfirmPass").val();

		if (pass == conf) {
			$.ajax({
				type: "POST"
				, url: "../includes/create_user.php"
				, data: {
					email: email
					, password: hex_sha512(pass)
					, first_name: first
					, last_name: last
				}
				, success: function (result) {
					alert("Success");
				}
				, error: function (result) {
					alert(result);
				}
			})
		}
	});
});