// $(function () {
// alert("maps");
//     $.ajax({
//         url: base_url + 'HikingTrails/loadHikingTrails',
//         type: 'POST',
//         data: {

//         },
//         dataType: 'json',
//         success: function (data) {

//             alert(data.results);

//             data.results.forEach(element => {
// var myLatlng= new google.maps.LatLng(element.latitude, element.longitude);
//                 var marker = new google.maps.Marker({
                    
//                     position: myLatlng,
//                     title: element.title
//                 });

//                 // To add the marker to the map, call setMap();
//                 marker.setMap(map);

//             });

//         }

//     })
// });