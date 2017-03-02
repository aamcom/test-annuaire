// ------------------- INIT MAP
map = new OpenLayers.Map("map");
map.addLayer(new OpenLayers.Layer.OSM());
epsg4326 =  new OpenLayers.Projection("EPSG:4326"); //WGS 1984 projection
projectTo = map.getProjectionObject(); //The map projection
// ------------------- SET CENTER
var lonLat = new OpenLayers.LonLat( 2.343779 , 48.860193 ).transform(epsg4326, projectTo);
var zoom=12;
map.setCenter (lonLat, zoom);
// ------------------- MARKERS
var markers = new OpenLayers.Layer.Markers( "Markers" );
map.addLayer(markers);

//------------------- AJAX CALL
$(document).ready(function() {
    $('.age_range').on('change', function() {
        var range = $('.age_range').val();
        $.ajax({
            url: '/list-personnes/',
            type: 'GET',
            success: function(answer){
                var data = $.parseJSON(answer);
                var data_filter;

                for (var i=0; i<data.length; i++) {
                    if(range == 0) {
                        removeMarker();
                        data_filter = data.filter(function (el) {
                            return data;
                        });
                    } else if(range == 20) {
                        removeMarker();
                        data_filter = data.filter(function (el) {
                            return calculateAge(el.date_naissance) < 20;
                        });
                    } else if (range == 30) {
                        removeMarker();
                        data_filter = data.filter(function (el) {
                            return ((calculateAge(el.date_naissance) < 30) && (calculateAge(el.date_naissance) > 20));
                        });
                    } else if (range == 40) {
                        removeMarker();
                        data_filter = data.filter(function (el) {
                            return ((calculateAge(el.date_naissance) < 40) && (calculateAge(el.date_naissance) > 30));
                        });
                    } else if (range == 50) {
                        removeMarker();
                        data_filter = data.filter(function (el) {
                            return ((calculateAge(el.date_naissance) < 50) && (calculateAge(el.date_naissance) > 40));
                        });
                    } else if (range == 60) {
                        removeMarker();
                        data_filter = data.filter(function (el) {
                            return calculateAge(el.date_naissance) > 50;
                        });
                    }
                }
                setMarker(data_filter);
            },
            error: function(){
                alert("Erreur d'importation des contacts");
            }
        });

        function removeMarker() {
            markers.clearMarkers();
        }

        function setMarker(personne) {
            for (var i=0; i<personne.length; i++) {
                var lat = personne[i].latitude;
                var long = personne[i].longitude;
                var coordinates = new OpenLayers.LonLat( long , lat ).transform(epsg4326, projectTo);
                markers.addMarker(new OpenLayers.Marker(coordinates));
            }
        }
    }); /*DOCUMENT READY*/

    // CALCULATE AGE FROM BIRTH DATE
    function calculateAge(personnes) {
        var birth = new Date(personnes).getTime();
        var today = Date.now();
        var age = new Date(today - birth);
        var realAge = Math.abs(age.getUTCFullYear() - 1970 );
        return(realAge);
    }
});