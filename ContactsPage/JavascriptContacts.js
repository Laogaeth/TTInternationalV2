//mais prático se tivesse usado 
//const usernameEl = document.querySelector('#username');
//const emailEl = document.querySelector('#email');
//const passwordEl = document.querySelector('#password');
//const confirmPasswordEl = document.querySelector('#confirm-password');
//
//const form = document.querySelector('#signup');


//validate  Form
function validateForm() {
  let x = document.forms["formulario"]["name"].value;
  if (x == "") {
    alert("All fields required to be filled.");
    return false;
  }
  let n = document.forms["formulario"]["last"].value;
  if (n == "") {
    alert("All fields required to be filled.");
    return false;
  }
  let y = document.forms["formulario"]["email"].value;
  if (y == "") {
    alert("All fields required to be filled.");
    return false;
  }
  let z = document.forms["formulario"]["phone"].value;
  if (z == "") {
    alert("All fields required to be filled.");
    return false;
  }
}
//To get user coordinates

var myLocation = document.getElementById("XYZ");

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition, errorHandler);
  } else {
    myLocation.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function errorHandler(err) {
  console.warn('ERROR(' + err.code + '): ' + err.message);
  var defaultPosition = new google.maps.LatLng(41.1579416, -8.327744);
  calcRoute(map, defaultPosition);
};

function showPosition(position) {
  var currentPosition = {
    lat: position.coords.latitude,
    lng: position.coords.longitude
  };
  calcRoute(map, currentPosition);
}

// Google Maps 
var directionsDisplay;
var directionsService = new google.maps.DirectionsService();
var map;
function initMap() {
  directionsDisplay = new google.maps.DirectionsRenderer();
  var porto = new google.maps.LatLng(41.1579416, -8.6257744);
  var mapOptions = {
    zoom: 17,
    center: porto
  }
  map = new google.maps.Map(document.getElementById('map'), mapOptions);
  directionsDisplay.setMap(map);
}

function calcRoute(map, currentPosition) {
  var end = new google.maps.LatLng(41.1579416, -8.6257744); //linha = localização no porto
  var startMark = new google.maps.Marker({
    position: currentPosition,
    map: map,
    title: "start"
  });
  var endMark = new google.maps.Marker({
    position: end,
    map: map,
    title: "end"
  });
  var request = {
    origin: currentPosition,
    destination: end,
    travelMode: 'DRIVING'
  };

  directionsService.route(request, function(response, status) {
    if (status == 'OK') {
      directionsDisplay.setDirections(response);
    } else {
      alert("directions request failed, status=" + status)
    }
  });
}
google.maps.event.addDomListener(window, "load", initMap);