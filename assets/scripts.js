var xmlHttp = new XMLHttpRequest();

xmlHttp.open('GET', 'https://icanhazdadjoke.com', true);

xmlHttp.setRequestHeader("Accept","application/json");

xmlHttp.onload = function () {
	var data = JSON.parse(this.response)
	
	if (xmlHttp.status >= 200 && xmlHttp.status < 400) {
		
		document.getElementById("icanhazdadjoke").innerHTML = data.joke;
	}
}

xmlHttp.send(null);
