if ($('.map-canvas').length) {
	$(function() {
	    initMap(centerLat, centerLong, pinImage, 6);
	});
}

function initMap(centerlat, centerlon, pinImage, setzoom) {
	var center = { lat: centerlat, lng: centerlon };	
    var map = new google.maps.Map($('.map-canvas')[0], {
        zoom: setzoom,
        center: center,
        styles: [
        	{
                "featureType": "landscape.man_made",
                "elementType": "geometry",
                "stylers": [{
                    "color": "#f7f1df"
                }]
            },
            {
                "featureType": "landscape.natural",
                "elementType": "geometry",
                "stylers": [{
                    "color": "#d0e3b4"
                }]
            },
            {
                "featureType": "landscape.natural.terrain",
                "elementType": "geometry",
                "stylers": [{
                    "visibility": "off"
                }]
            },
            {
                "featureType": "poi",
                "elementType": "labels",
                "stylers": [{
                    "visibility": "off"
                }]
            },
            {
                "featureType": "poi.business",
                "elementType": "all",
                "stylers": [{
                    "visibility": "off"
                }]
            },
            {
                "featureType": "poi.medical",
                "elementType": "geometry",
                "stylers": [{
                    "color": "#fbd3da"
                }]
            },
            {
                "featureType": "poi.park",
                "elementType": "geometry",
                "stylers": [{
                    "color": "#bde6ab"
                }]
            },
            {
                "featureType": "road",
                "elementType": "geometry.stroke",
                "stylers": [{
                    "visibility": "off"
                }]
            },
            {
                "featureType": "road",
                "elementType": "labels",
                "stylers": [{
                    "visibility": "off"
                }]
            },
            {
                "featureType": "road.highway",
                "elementType": "geometry.fill",
                "stylers": [{
                    "color": "#ffe15f"
                }]
            },
            {
                "featureType": "road.highway",
                "elementType": "geometry.stroke",
                "stylers": [{
                    "color": "#efd151"
                }]
            },
            {
                "featureType": "road.arterial",
                "elementType": "geometry.fill",
                "stylers": [{
                    "color": "#ffffff"
                }]
            },
            {
                "featureType": "road.local",
                "elementType": "geometry.fill",
                "stylers": [{
                    "color": "black"
                }]
            },
            {
                "featureType": "transit.station.airport",
                "elementType": "geometry.fill",
                "stylers": [{
                    "color": "#cfb2db"
                }]
            },
            {
                "featureType": "water",
                "elementType": "geometry",
                "stylers": [{
                    "color": "#a2daf2"
                }]
            }
        ]

    });

    var offsetCenter = function(dx, dy) {
        return { lat: dx, lng: dy };
    };
    var template = Handlebars.compile($('#marker-content-template').html());
    var info = null;
    var i;
    var placements = [];
    for (i = 0; i < gmapLocation.length; i++) {
        var obj = { type: template({
                title: gmapLocation[i]['title'],
                image: gmapLocation[i]['image'],
                body: '<p>'+gmapLocation[i]['description']+'</p>'
            }), LatLng: offsetCenter(gmapLocation[i]['lattitude'], gmapLocation[i]['longitude']),
            	datauid: gmapLocation[i]['datauid']};

        placements.push(obj);
    }
    $.each(placements, function(i, e) {
        var marker = new google.maps.Marker({
            map: map,
            icon: pinImage,
            draggable: false,
            position: e.LatLng,
            locationuid: e.datauid,
            optimized: false
        });
        var info = new SnazzyInfoWindow($.extend({}, {
            marker: marker,
            placement: e.type,
            content: e.type,
            openOnMarkerClick: false,
  			closeWhenOthersOpen: true,
        }));
        marker.addListener('mouseover', function() {
            info.open(map, this);
        });
        marker.addListener('touchstart', function() {
            info.open(map, this);
        });
        marker.addListener('touchend', function() {
            info.close();
        });
  
    });
}
