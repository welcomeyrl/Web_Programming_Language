

function showNames(){

	var y = document.getElementById("year");
	var str = y.options[y.selectedIndex].value;
	
	if (str=="") {
		document.getElementById('txtHint').innerHTML = "";
		return;
	}
	else{
		if (window.XMLHttpRequest){
			xmlhttp = new XMLHttpRequest();
		}
		else{
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function(){
			if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
				
				var splitResponse= xmlhttp.responseText.split("<br/>");
				document.getElementById("txtHint1").innerHTML = splitResponse[0];
				document.getElementById("txtHint2").innerHTML = splitResponse[1];



			}
		}
		xmlhttp.open("GET","babynames.php?q="+str,true);
		xmlhttp.send();	
	}
}

