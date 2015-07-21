
$(document).ready(function(){
	loadData();
});


function loadData() {

	$.ajax({

		 url: "books.xml",
		 dataType: "xml",
		 success: function(data) {
		        alert("file is loaded");
		        $(data).find('book').each(function(){
			var title = $(this).find('title').text();
			var author = $(this).find('author').each(function(){
				$(this).text() + '<br>';
			});
			var year = $(this).find('year').text();
			var price = $(this).find('price').text();
			var category = $(this).find('category').attr();
			var info = '<td>' + title + '</td><td>' + author + '</td> <td>' + year + '</td><td>' + price + '</td><td>' + category + '</td>';
			$("tr").append(info);
		        });

		 },
		 error: function() { alert("error loading file");  }
     });
}
