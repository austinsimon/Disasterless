var articleFormat = '<div class="tip-block">\
						<a href="../prevent/tip.php?id={0}" class="link-block w-inline-block">\
						  <div class="div-block-3">\
							<div class="tag">{2}</div>\
							<div class="title">{1}</div>\
						  </div>\
						</a>\
					  </div>'

function GetArticles() {
	$.ajax({
		url: "../includes/get_articles.php"
		, type: "POST"
		, dataType: "json"
		, success: function (data) {
			console.log(data);
			for (var i = 0; i < data.length; i++) {
				FormatArticle(data[i]);
			}
		}
		, error: function (data) {
			console.log(data);
		}
	});
}

function FormatArticle(article) {
	console.log(article);
	var $article = $(String.format(articleFormat, article.id, article.title, article.tags)).appendTo($("#articles"));
	//$article[0].style.backgroundImage = "images/" + article.fileName;
	$article.css("background-image", "url(../images/" + article.fileName + ")");
	console.log($article.css("background-image"));
	console.log(window.location);
	//console.log($article.css("background-image"));
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

	GetArticles();
});