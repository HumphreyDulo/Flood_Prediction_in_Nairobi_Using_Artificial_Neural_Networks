<!DOCTYPE html>
@extends('layouts.app')

@section('content')
<div class="container" style="display: block; width:1200px">
    <div class="row justify-content-center" style="display: block;">
        <div class="col-md-8" style="width:1200px; display:block;">
            <div class="card" style="background-color: #2b2b2b">
                <div class="card-header" style="width:1200px; display: block; color: #f8d57e;">{{ __('Dashboard') }}
                </div>

                <div class="card-body" style="display: block; width:1200px">
                    @if (session('status'))
                        <div class="alert alert-success" style="color: #f8d57e;" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <span style="color: #f8d57e;">{{ __('You are logged in!') }}</span>

                    <!-- Search Bar and Map Container -->
                    <div style="display: flex; align-items: flex-start;">
                        <!-- Map Container -->
                        <div id="map" style="height: 500px; width:800px;"></div>

                        <!-- Search Bar Container -->
                        <div style="margin-left: 20px;">
                            <input type="text" id="locationSearch" placeholder="Search for a location"
                                class="search-bar">
                            <button id="searchButton" class="styled-button">Search</button>
                            <button id="currentLocationButton" class="styled-button" style="display: block;">My
                                Location</button>
                        </div>
                    </div>

                    <!-- Calculate Button -->
                    <button id="calculateButton" class="styled-button">Calculate</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include Leaflet CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" crossorigin="" />

<!-- Include Leaflet JS -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" crossorigin=""></script>

<style>
    /* Style for the search bar */
    .search-bar {
        width: 300px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
        background-color: #2b2b2b;
        color: white;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        transition: border-color 0.3s;
    }

    .search-bar:focus {
        border-color: #bfaff2;
        outline: none;
    }

    /* Style for buttons */
    .styled-button {
        padding: 10px 15px;
        margin-top: 5px;
        border: none;
        border-radius: 5px;
        background-color: #bfaff2;
        color: #2b2b2b;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .styled-button:hover {
        background-color: #a69fd8;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Initialize the map and set its view
        var map = L.map('map').setView([-1.267702, 36.810486], 13);

        // Add a tile layer to the map
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        // Variable to store the selected coordinates
        let selectedCoordinates = null;

        // Event listener for map click to get coordinates and location name
        map.on('click', function (e) {
            const lat = e.latlng.lat;
            const lng = e.latlng.lng;

            selectedCoordinates = { lat: lat, lon: lng }; // Store the selected coordinates

            // Fetch the location name from Nominatim
            fetch(`https://nominatim.openstreetmap.org/reverse?lat=${lat}&lon=${lng}&format=json`)
                .then(response => response.json())
                .then(data => {
                    const locationName = data.display_name || "Unknown location";
                    const popupContent = `<b>${locationName}</b><br>Coordinates: ${lat.toFixed(5)}, ${lng.toFixed(5)}`;

                    L.popup()
                        .setLatLng(e.latlng)
                        .setContent(popupContent)
                        .openOn(map);
                })
                .catch(error => {
                    console.error("Error fetching location name:", error);
                });
        });

        // Event listener for the "Search" button with Nairobi radius constraint
        document.getElementById('searchButton').addEventListener('click', function () {
            var query = document.getElementById('locationSearch').value;

            // Define the bounding box for Nairobi (latitude and longitude boundaries)
            var northEast = [1.3100, 37.0000];  // Northeastern point of Nairobi
            var southWest = [-1.4000, 35.5000];  // Southwestern point of Nairobi

            fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${query}&bounded=1&viewbox=${southWest[1]},${northEast[0]},${northEast[1]},${southWest[0]}`)
                .then(response => response.json())
                .then(data => {
                    if (data.length > 0) {
                        var lat = data[0].lat;
                        var lon = data[0].lon;
                        map.setView([lat, lon], 13);
                        L.marker([lat, lon]).addTo(map)
                            .bindPopup(`Search Result: ${data[0].display_name}`).openPopup();

                        // Set the selected coordinates from the search result
                        selectedCoordinates = { lat: lat, lon: lon };
                    } else {
                        alert('Location not found in Nairobi.');
                    }
                })
                .catch(error => {
                    console.error("Error during search:", error);
                });
        });

        // Event listener for "Calculate" button to trigger flood prediction
        document.getElementById('calculateButton').addEventListener('click', function () {
            console.log('Calculate button clicked');  // Check if button click is firing

            if (selectedCoordinates) {
                console.log('Sending coordinates:', selectedCoordinates);  // Log the coordinates

                // Send the coordinates to the backend for flood prediction
                fetch(`/flood-prediction?lat=${selectedCoordinates.lat}&lng=${selectedCoordinates.lon}`)
                    .then(response => response.json())
                    .then(data => {
                        const prediction = data.prediction;
                        alert(`Flood Risk at this location: ${prediction}`); // Display prediction in an alert
                    })
                    .catch(error => {
                        console.error("Error fetching data from API:", error);
                    });
            } else {
                alert('Please select a location on the map or search for a place first.');
            }
        });


        // Event listener for "My Location" button to show current location
        document.getElementById('currentLocationButton').addEventListener('click', function () {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function (position) {
                    var lat = position.coords.latitude;
                    var lon = position.coords.longitude;
                    map.setView([lat, lon], 13);
                    L.marker([lat, lon]).addTo(map)
                        .bindPopup("You are here!").openPopup();
                    selectedCoordinates = { lat: lat, lon: lon }; // Set coordinates from current location
                }, function () {
                    alert("Geolocation service failed. Please allow location access.");
                });
            } else {
                alert("Geolocation is not supported by this browser.");
            }
        });
    });
</script>
@endsection