var d = new Date();
var days = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
var months = ["January","February","March","April","May","June","July","August","September","October","November","December"];
document.getElementById("currentDate").innerHTML = days[d.getDay()] + ", " + months[d.getMonth()] + " " + d.getDate();

var timeDisplay = document.getElementById("tt");

function refreshTime() {
  var dateString = new Date().toLocaleTimeString("en-US", {hour: '2-digit', minute: '2-digit', timeZone: "America/Toronto"});
  var formattedString = dateString.replace(", ", " - ");
  timeDisplay.innerHTML = formattedString;
}

setInterval(refreshTime, 1000);

function goBack() {
	window.history.back();
}