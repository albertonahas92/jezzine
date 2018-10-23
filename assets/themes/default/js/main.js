


(function() {



// var originalAdsTop=0,originalAdsBottom=0,adsWidth=0;;
// window.onscroll=function(){

//     // if (window.pageYOffset > document.getElementById("adsbar").getBoundingClientRect().top) {
//     //     alert("got it");
//     // }


// console.log("pageYOFFSET "+ window.pageYOffset);
// console.log("top " + originalAdsTop);
// console.log("right " + originalAdsTop);
// console.log("bottom " + originalAdsBottom);
// console.log("footer " + document.getElementsByTagName("footer")[0].getBoundingClientRect().top);


// if (document.getElementById("adsbar").getBoundingClientRect().top<=100
// && document.getElementById("adsbar").style.position!="fixed") {

//     var top = document.getElementById("adsbar").getBoundingClientRect().top;
//     var right =window.innerWidth- document.getElementById("adsbar").getBoundingClientRect().right;
//     adsWidth = document.getElementById("adsbar").offsetWidth;
// originalAdsTop=top;
// originalAdsBottom = document.getElementById("adsbar").getBoundingClientRect().bottom;


// document.getElementById("adsbar").style.position="fixed";
// document.getElementById("adsbar").style.top = top +"px";
// document.getElementById("adsbar").style.right = right +"px";
// document.getElementById("adsbar").style.maxWidth = adsWidth;
// }


//     if (
        
//         (window.pageYOffset <= originalAdsBottom &&
//         document.getElementById("adsbar").style.position == "fixed")
//         && !(originalAdsBottom >= document.getElementsByTagName("footer")[0].getBoundingClientRect().top)
//     //|| (originalAdsBottom>=document.getElementsByTagName("footer")[0].getBoundingClientRect().top)
//     ) {

//         document.getElementById("adsbar").style.position = "static";
//        document.getElementById("adsbar").style.top = "auto";
//        document.getElementById("adsbar").style.right = "auto";
// document.getElementById("adsbar").style.bottom = "auto";
    
// }

// if (

//     originalAdsBottom >= document.getElementsByTagName("footer")[0].getBoundingClientRect().top &&
//         document.getElementById("adsbar").style.position == "fixed"
//     //|| (originalAdsBottom>=document.getElementsByTagName("footer")[0].getBoundingClientRect().top)
// ) {

// document.getElementById("adsbar").style.bottom = document.getElementsByTagName("footer")[0].getBoundingClientRect().top + "px !important";
// document.getElementById("adsbar").style.top="10px";


// }
// }

$('.newsletterModal').iziModal();
$('#newsletterLink').click(function(){
$('.newsletterModal').iziModal("open");

})


$('.contactModal').iziModal();
$('.contact-link').click(function () {
    closeNav();
    $('.contactModal').iziModal("open");

})


$('.termsModal').iziModal();
$('#terms-link').click(function () {
    $('.termsModal').iziModal("open");

});

$('#contact-send').click(function (event) {
  
    event.preventDefault();
       $('.contactModal').iziModal("close");;
    $.ajax({
        url: base_url + 'Welcome/sendMail?email=' + $('#contact-email').val(),
        type: 'GET',
        // data: {
        //     key: value
        // },
        dataType: 'json',
        success: function (data) {
            console.log(data);
        },
        complete:function(data){
          
        }
    });
});
$('#subscribe-send').click(function () {
    event.preventDefault();
         $('.newsletterModal').iziModal("close");;
    $.ajax({
        url: base_url + 'Welcome/sendMail?email=' + $('#subscribe-email').val(),
        type: 'GET',
        // data: {
        //     key: value
        // },
        dataType: 'json',
        success: function (data) {
            console.log(data);
        },
           complete: function (data) {
          
           }
    });
});
    
    //remove no-js class
    removeClass(document.getElementsByTagName("html")[0], "no-js");

    function HeroSlider(element) {
        this.element = element;
        this.navigation = this.element.getElementsByClassName("js-cd-nav")[0];
        this.navigationItems = this.navigation.getElementsByTagName('li');
        this.marker = this.navigation.getElementsByClassName("js-cd-marker")[0];
        this.slides = this.element.getElementsByClassName("js-cd-slide");
        this.slidesNumber = this.slides.length;
        this.newSlideIndex = 0;
        this.oldSlideIndex = 0;
        this.autoplay = hasClass(this.element, "js-cd-autoplay");
        this.autoPlayId;
        this.autoPlayDelay = 5000;
       
        this.init();
    };

    HeroSlider.prototype.init = function() {
        var self = this;
        //upload video (if not on mobile devices)
        this.uploadVideo();
        //autoplay slider
        this.setAutoplay();
        //listen for the click event on the slider navigation
        this.navigation.addEventListener('click', function(event) {
            if (event.target.tagName.toLowerCase() == 'div')
                return;
            event.preventDefault();
            var selectedSlide = event.target;
            if (hasClass(event.target.parentElement, 'cd-selected'))
                return;
            self.oldSlideIndex = self.newSlideIndex;
            self.newSlideIndex = Array.prototype.indexOf.call(self.navigationItems, event.target.parentElement);
            self.newSlide();
            self.updateNavigationMarker();
            self.updateSliderNavigation();
            self.setAutoplay();
        });

        if (this.autoplay) {
            // on hover - pause autoplay
            this.element.addEventListener("mouseenter", function() {
                clearInterval(self.autoPlayId);
            });
            this.element.addEventListener("mouseleave", function() {
                self.setAutoplay();
            });
        }
    };

    HeroSlider.prototype.uploadVideo = function() {
        var videoSlides = this.element.getElementsByClassName("js-cd-bg-video");
        for (var i = 0; i < videoSlides.length; i++) {
            if (videoSlides[i].offsetHeight > 0) {
                // if visible - we are not on a mobile device 
                var videoUrl = videoSlides[i].getAttribute("data-video");
                videoSlides[i].innerHTML = "<video loop><source src='" + videoUrl + ".mp4' type='video/mp4' /><source src='" + videoUrl + ".webm' type='video/webm'/></video>";
                // if the visible slide has a video - play it
                if (hasClass(videoSlides[i].parentElement, "cd-hero__slide--selected")) videoSlides[i].getElementsByTagName("video")[0].play();
            }
        }
    };

    HeroSlider.prototype.setAutoplay = function() {
        var self = this;
        if (this.autoplay) {
            clearInterval(self.autoPlayId);
            self.autoPlayId = window.setInterval(function() { self.autoplaySlider() }, self.autoPlayDelay);
        }
    };

    HeroSlider.prototype.autoplaySlider = function() {
        this.oldSlideIndex = this.newSlideIndex;
        var self = this;
        if (this.newSlideIndex < this.slidesNumber - 1) {
            this.newSlideIndex += 1;
            this.newSlide();

        } else {
            this.newSlideIndex = 0;
            this.newSlide();
        }

        this.updateNavigationMarker();
        this.updateSliderNavigation();
    };

    HeroSlider.prototype.newSlide = function(direction) {
        var self = this;
        removeClass(this.slides[this.oldSlideIndex], "cd-hero__slide--selected cd-hero__slide--from-left cd-hero__slide--from-right");
        addClass(this.slides[this.oldSlideIndex], "cd-hero__slide--is-moving");
        setTimeout(function() { removeClass(self.slides[self.oldSlideIndex], "cd-hero__slide--is-moving"); }, 500);

        for (var i = 0; i < this.slidesNumber; i++) {
            if (i < this.newSlideIndex && this.oldSlideIndex < this.newSlideIndex) {
                addClass(this.slides[i], "cd-hero__slide--move-left");
            } else if (i == this.newSlideIndex && this.oldSlideIndex < this.newSlideIndex) {
                addClass(this.slides[i], "cd-hero__slide--selected cd-hero__slide--from-right");
            } else if (i == this.newSlideIndex && this.oldSlideIndex > this.newSlideIndex) {
                addClass(this.slides[i], "cd-hero__slide--selected cd-hero__slide--from-left");
                removeClass(this.slides[i], "cd-hero__slide--move-left");
            } else if (i > this.newSlideIndex && this.oldSlideIndex > this.newSlideIndex) {
                removeClass(this.slides[i], "cd-hero__slide--move-left");
            }
        }

        this.checkVideo();

    };

    HeroSlider.prototype.updateNavigationMarker = function() {
        removeClassPrefix(this.marker, 'item');
        addClass(this.marker, "cd-hero__marker--item-" + (Number(this.newSlideIndex) + 1));
    };

    HeroSlider.prototype.updateSliderNavigation = function() {
        removeClass(this.navigationItems[this.oldSlideIndex], 'cd-selected');
        addClass(this.navigationItems[this.newSlideIndex], 'cd-selected');
    };

    HeroSlider.prototype.checkVideo = function() {
        //check if a video outside the viewport is playing - if yes, pause it
        var hiddenVideo = this.slides[this.oldSlideIndex].getElementsByTagName('video');
        if (hiddenVideo.length) hiddenVideo[0].pause();

        //check if the select slide contains a video element - if yes, play the video
        var visibleVideo = this.slides[this.newSlideIndex].getElementsByTagName('video');
        if (visibleVideo.length) visibleVideo[0].play();
    };

    var heroSliders = document.getElementsByClassName("js-cd-hero");
    if (heroSliders.length > 0) {
        for (var i = 0; i < heroSliders.length; i++) {
            (function(i) {
                new HeroSlider(heroSliders[i])
            })(i);
        }
    }

    //on mobile - open/close primary navigation clicking/tapping the menu icon 
    // document.getElementsByClassName('js-cd-header__nav')[0].addEventListener('click', function(event) {
    //     if (event.target.tagName.toLowerCase() == 'nav') {
    //         classie.toggleClass(this.getElementsByTagName('ul')[0], 'cd-is-visible');
    //     }
    // });

    function removeClassPrefix(el, prefix) {
        //remove all classes starting with 'prefix'
        var classes = el.className.split(" ").filter(function(c) {
            return c.indexOf(prefix) < 0;
        });
        el.className = classes.join(" ");
    };

    //class manipulations - needed if classList is not supported
    function hasClass(el, className) {
        if (el.classList) return el.classList.contains(className);
        else return !!el.className.match(new RegExp('(\\s|^)' + className + '(\\s|$)'));
    }

    function addClass(el, className) {
        var classList = className.split(' ');
        if (el.classList) el.classList.add(classList[0]);
        else if (!hasClass(el, classList[0])) el.className += " " + classList[0];
        if (classList.length > 1) addClass(el, classList.slice(1).join(' '));
    }

    function removeClass(el, className) {
        var classList = className.split(' ');
        if (el.classList) el.classList.remove(classList[0]);
        else if (hasClass(el, classList[0])) {
            var reg = new RegExp('(\\s|^)' + classList[0] + '(\\s|$)');
            el.className = el.className.replace(reg, ' ');
        }
        if (classList.length > 1) removeClass(el, classList.slice(1).join(' '));
    }
})();


function openNav() {

    // document.getElementById("mySidenav").style.width = "calc(100%/3)";
    document.getElementById("mySidenav").classList.add("open");
    // document.getElementById("mySidenav").style.width = "calc(100%/3)";
}

/* Set the width of the side navigation to 0 */
function closeNav() {
    //  document.getElementById("mySidenav").style.width = "0";
    document.getElementById("mySidenav").classList.remove("open");
}



$(function(){

if (window.location.href.indexOf("maps") > -1) {

var url_string = window.location.href;
var url = new URL(url_string);
var type = url.searchParams.get("type");
if (type == "hikingTrails") {

    // loadPoints('HikingTrails/loadHikingTrails');
   $('.sections-list .title-item').html("<h2>Hiking Trails</h2>");
} else {
   $('.sections-list .title-item').html("<h2>POIs</h2>");
}

    setTimeout(() => {


 $('html, body').animate({
     scrollTop: $('.title-item').offset().top
 }, 500);


        loadMaps(type);
    }, 1500);
}

});

var markers = [];

function loadMaps(type){

//  var src = 'http://jezzinetourism.com/map.kml';
// var src = 'http://localhost/backend/Uploads/maps/22089.kml';
//  var kmlLayer = new google.maps.KmlLayer(src, {
//      suppressInfoWindows: true,
//      preserveViewport: false,
//      map: map
//  });
//  kmlLayer.addListener('click', function (event) {
//      var content = event.featureData.infoWindowHtml;
//      var testimonial = document.getElementById('capture');
//      testimonial.innerHTML = content;
//  });
   $('.sections-list li:first-child').click(function () {
if ($('.map-wrapper').hasClass("col-md-8")){
       $('.map-wrapper').removeClass("col-md-8");
       $('.map-wrapper').addClass("col-md-6");

             $('.sections-wrapper').removeClass("col-md-4");
             $('.sections-wrapper').addClass("col-md-6");
}
else {
        $('.map-wrapper').addClass("col-md-8");
        $('.map-wrapper').removeClass("col-md-6");

              $('.sections-wrapper').removeClass("col-md-6");
              $('.sections-wrapper').addClass("col-md-4");
}
   });

var sectionsUrl ;
var markersUrl;

if(type=="hikingTrails"){

    // loadPoints('HikingTrails/loadHikingTrails');
sectionsUrl = "HikingTrails/loadHikingTrails";
markersUrl = "loadTrails";
}
else{
sectionsUrl = 'Maps/loadSections';
markersUrl = "loadPOIs";
}

$.ajax({
    url: base_url + sectionsUrl,
    type: 'POST',
    data: {

    },
    dataType: 'json',
    success: function (data) {
        $sectionsList = $('.sections-list');
        data.results.forEach(element => {


            $section = $('<li>', {
                id: "item-" + element.id,
                "data-section": element.id,
                "class": "wow fadeInLeft"
            }).appendTo($sectionsList);


                var $sectionTitle = $('<h3>', {
                    text: (type == "hikingTrails") ? element.name : element.title

                }).appendTo($section);
    var $sectionDiv = $('<div>', {
      
    }).appendTo($section);

        



            var $sectionLegend = $('<small>', {
                text: element.description

            }).appendTo($sectionDiv);

            if(type=="hikingTrails"){

//                  if (element.image!=null) {
//   var $sectionPdf = $('<img>', {
    
//       src: 'http://localhost/backend/' + element.image,

//   }).appendTo($sectionDiv);
//                  }
    var $sectionPdf = $('<hr>', {
        style:"opacity:0.1"
    }).appendTo($sectionDiv);

               var $sectionPdf = $('<a>', {
                   text: "more details here",
                   href: 'http://jezzinetourism.com/backend/'+element.pdf_link,

               }).appendTo($sectionDiv);
            }
        });
        

        $('.sections-list li:not(.title-item)').click(function () {

            if ($(this).hasClass("active")) return;
            $('.sections-list li').removeClass('active');
            $(this).addClass("active");
            loadPoints('Maps/' + markersUrl, {
                "id": $(this).data("section")
            });
        });

    },
    error: function (data) {
        console.log(data);
    }
});



//  map.addListener('center_changed', function () {
//      // 3 seconds after the center of the map has changed, pan back to the
//      // marker.
//      window.setTimeout(function () {
//          map.panTo($(this).getPosition());
//      }, 3000);
//  });


 

}

  // Sets the map on all markers in the array.
  function setMapOnAll(map) {
      for (var i = 0; i < markers.length; i++) {
          markers[i].setMap(map);
      }
  }


function loadPoints(url,data={})
{

      setMapOnAll(null);
      markers=[];

    $.ajax({
        url: base_url + url,
        type: 'POST',
        data: data,
        dataType: 'json',
        success: function (data) {


if(data.results==null){return;}
            data.results.forEach(element => {
                addMarker(element);
            });

            var bounds = new google.maps.LatLngBounds();
            for (var i = 0; i < markers.length; i++) {
                bounds.extend(markers[i].getPosition());
            }
            map.fitBounds(bounds);
if(markers.length==1){
    map.setZoom(13);
}
        }

    });
}

function addMarker(element){

          var myLatlng = new google.maps.LatLng(element.latitude, element.longitude);

          var marker = new google.maps.Marker({

              position: myLatlng,
              title: element.title
          });
          markers.push(marker);
          marker.file = element.kml_file || null;

          var infowindow = new google.maps.InfoWindow({
              content: "<h2>" + (element.title || element.name) + "</h2>"+element.description,
              maxWidth: 200
          });
          marker.addListener('mouseover', function () {

              infowindow.open(map, marker);
          });

          // assuming you also want to hide the infowindow when user mouses-out
          marker.addListener('mouseout', function () {
              infowindow.close();
          });

          // To add the marker to the map, call setMap();
          marker.setMap(map);

          marker.addListener('click', function () {

            if(marker.file!=null){
              var src = "http://jezzinetourism.com/backend/" + marker.file;

              var kmlLayer = new google.maps.KmlLayer(src, {
                  suppressInfoWindows: true,
                  preserveViewport: false,
                  map: map
              });


              kmlLayer.addListener('click', function (event) {
                  var content = event.featureData.infoWindowHtml;
                  var testimonial = document.getElementById('capture');
                  testimonial.innerHTML = content;
              });
            }
            else{
                    map.setZoom(15);
                    map.setCenter(marker.getPosition());
            }
         
          });

}