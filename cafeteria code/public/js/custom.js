// to get current year
function getYear() {
    var currentDate = new Date();
    var currentYear = currentDate.getFullYear();
    document.querySelector("#displayYear").innerHTML = currentYear;
}

getYear();



// dish owl carousel slider js
var owl = $('.dish_carousel').owlCarousel({
    loop: true,
    margin: 15,
    dots: false,
    autoplay: true,
    navText: [
        '<i class="fa fa-arrow-left" aria-hidden="true"></i>',
        '<i class="fa fa-arrow-right" aria-hidden="true"></i>'
    ],
    autoplayHoverPause: true,
    responsive: {
        0: {
            items: 1,
            margin: 0
        },
        800: {
            items: 3
        },
        576: {
            items: 2
        },
        991: {
            items: 4
        }
    }
})



// client owl carousel slider js
var owl = $('.client_carousel').owlCarousel({
    loop: true,
    margin: 15,
    dots: true,
    autoplay: true,
    autoplayHoverPause: true,
    responsive: {
        0: {
            items: 1,
            margin: 0
        },
        768: {
            items: 2
        }
    }
})

/** google_map js **/
function myMap() {
    var mapProp = {
        center: new google.maps.LatLng(40.712775, -74.005973),
        zoom: 18,
    };
    var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
}