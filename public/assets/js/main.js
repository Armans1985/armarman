


// nkari vra pahum es hovera anum verev@ poqr bana bacum


$(document).ready(function(){
    $('[data-toggle="popover"]').popover();
});
// ---- end  ----

//
// function initMap() {
//     var map = new google.maps.Map(document.getElementById('map'), {
//         center: {lat: 40.1883995, lng: 44.5236375},
//         zoom: 10,
//     });
// }


//------ map qartez  funkcia-------

function initMap() {
    var myLatLng ={lat: 40.19018119119121, lng: 44.52347854919765};
    var map = new google.maps.Map(document.getElementById('map'), {
            scrollwheel: true,
            center: myLatLng,
            zoom: 19
        });
    var marker = new google.maps.Marker({
        map: map,
        position: myLatLng,
        title: 'IT TALENTS'
    })
}
// -----end map -----


//--- scrol i funkcia-----


$(document).ready(function(){
    $(window).scroll(function () {
        if ($(this).scrollTop() > 0) {
            $('#verev').fadeIn();
        } else {
            $('#verev').fadeOut();
        }
    });
    $('#verev').click(function () {
        $('body,html').animate({
            scrollTop: 0
        }, 3000);
        return false;
    });
});

$( window ).scroll(function() {





});
//-- end scroll verev--




// scroli jamanak hertov nav bar@ poxum e
$('body').scrollspy({ target: '#bs-example-navbar-collapse-1' });

//end scroll


