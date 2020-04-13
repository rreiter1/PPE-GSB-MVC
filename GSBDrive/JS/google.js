mapboxgl.accessToken = 'pk.eyJ1IjoiY2hpeXVraXNhbWEiLCJhIjoiY2szcTFyYTFvMDhpZjNubmpjODFrODE3eiJ9.GCPYgHiUrYZnvBjrpni3yg';
var map = new mapboxgl.Map({
container: 'imap', // container id
style: 'mapbox://styles/mapbox/streets-v11', // stylesheet location
center: [-74.50, 40], // starting position [lng, lat]
zoom: 9 // starting zoom
});