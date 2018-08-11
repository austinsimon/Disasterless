var articleTemplate = `<tr class="article" data-toggle="modal" data-target="#articleModal" data-id="{0}" data-title="{1}" data-file="{2}" data-tags="{3}" data-content="{4}">
	<td>{0}</td>
	<td>{1}</td>
	<td>{2}</td>
	<td>{3}</td>
	<td>{4}</td>
</tr>`;

var selectedArticleId = 0;

function SaveArticle() {
	var id = $("#inputArticleId").val();
	var title = $("#inputArticleTitle").val();
	var content = $("#inputArticleContent").val();
	//$("#inputArticlePhoto").
	var tags = $("#inputArticleTags").val();
	var fileName = "_none";

	var formData = new FormData();
	formData.append("id", id);
	formData.append("title", title);
	formData.append("content", content);
	formData.append("tags", tags);
	formData.append("file", $("#inputArticleImage")[0].files[0]);

	$("#articleModal").modal("hide");

	$.ajax({
		url: "../includes/save_article.php"
		, type: "POST"
		, data: formData
		, processData: false
		, contentType: false
		, success: function (result) {
			console.log(result);
			$("#articles").empty();
			GetArticles();
		}
		, error: function (result) {
			console.log(result);
		}
	});
}

function FormatArticle(article) {
	$article = $(String.format(articleTemplate, article.id, article.title, article.fileName, article.tags, article.content));
	$("#articles").append($article);
	$article.click(ArticleClick);
}

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
	})
}

function ArticleClick() {
	var self = $(this);
	var id = self.data("id");
	var title = self.data("title");
	var content = self.data("content");
	var fileName = self.data("file");
	var tags = self.data("tags");

	$("#inputArticleId").val(id);
	$("#inputArticleTitle").val(title);
	$("#inputArticleContent").val(content);
	//$("#inputArticlePhoto").
	$("#inputArticleTags").val(tags);
}

$(document).ready(function () {
	GetArticles();

	$("#btnSaveArticle").click(function () {
		SaveArticle();
	});

	$("#btnCreateArticle").click(function () {
		$("#inputArticleId").val("0");
		$("#inputArticleTitle").val("");
		$("#inputArticleContent").val("");
		//$("#inputArticlePhoto").
		$("#inputArticleTags").val("");
		$("#inputArticleImage").val("");
	});
});

if (!String.format) {
	String.format = function (format) {
		var args = Array.prototype.slice.call(arguments, 1);
		return format.replace(/{(\d+)}/g, function (match, number) {
			return typeof args[number] != 'undefined' ? args[number] : match;
		});
	};
}