function loadData() {
	$.ajax({
     
		 url: "books.xml",
		 dataType: "xml",
		 success: function(data) {
		        alert("file is loaded");
		        $(data).find('book').each(function(){
			var title = $(this).find('title').text();
			var author = '';
			$(this).find('author').each(function(){
				author = author + $(this).text() + '<br>';
			});
			
			var year = $(this).find('year').text();
			var price = $(this).find('price').text();
			var category = $(this).attr('category');
			var info = '<tr>' + '<td>'+title+'</td>' + '<td>'+author+'</td>' +'<td>'+ year+'</td>'+ '<td>'+price+'</td>'+'<td>'+category+'</td>' +'</tr>';
			document.getElementById("bookinfo").innerHTML =  document.getElementById("bookinfo").innerHTML + info;
			//$("table").append(info);
		        });
             
		 },
		 error: function() { alert("error loading file");  }
     });
}
$(document).ready(function(){
	loadData();
});