//P5 JS Script
// 1.0 Carousel Feature
// 1.1 Carousel Object
var Diapo = {
    //1.2 Object properties
    slide: $(".slide"),
    indexLastSlide: $(".slide").length - 1,
    i: 0,
    currentSlide: $(".slide").eq(this.i),
    play: $('#play'),
    pause: $('#pause'),
    prev: $('#prev'),
    next: $('#next'),
    //1.3 Object methods
    //1.3.1 initialize method
    initialize: function() {
        $(self.play).hide();
        this.showActiveSlide();
        this.slideIndexPlus();
        this.slideIndexMinus();
        this.autoPlayAndPause();
        this.playAutoClick();
        this.nextSlideOnClick();
        this.prevSlideOnClick();
        this.changeSlideOnKeypress();
    },
    //1.3.2 Display active slide method
    showActiveSlide: function() {
        this.slide.hide();
        this.currentSlide = $(".slide").eq(this.i)
        this.currentSlide.css('display', 'block');
    },
    //1.3.3 Slide index plus method
    slideIndexPlus: function() {
        this.i++;
        if (this.i <= this.indexLastSlide) {
            this.currentSlide = $(".slide").eq(this.i);
        } else {
            this.i = 0;
        }
    },
    //1.3.4 Slide index minus method
    slideIndexMinus: function() {
        this.i--;
        if (this.i >= 0) {
            this.currentSlide = $(".slide").eq(this.i);
        } else {
            this.i = this.indexLastSlide;
        }
    },
    //1.3.5 Auto play/ pause slide method
    autoPlayAndPause: function() {
        var self = this;
        $(this.play).click(function() {
            var playingAuto = setInterval(function() {
                self.slideIndexPlus();
                self.showActiveSlide();
            }, 5000);
            $(self.pause).show();
            $(self.pause).click(function() {
                clearInterval(playingAuto);
                $(self.pause).hide();
                $(self.play).show();
            });
        });
    },
    //1.3.6 Start autoplay method : emulate click on "play button"
    playAutoClick: function() {
        $(this.play).trigger('click');
    },
    //1.3.7 Display next slide method
    nextSlideOnClick: function() {
        var self = this;
        $(this.next).click(function() {
            self.slideIndexPlus();
            self.showActiveSlide();
        });
    },
    // 1.3.8 Display previous slide method
    prevSlideOnClick: function() {
        var self = this;
        $(this.prev).click(function() {
            self.slideIndexMinus();
            self.showActiveSlide();
        });
    },
    // 1.3.9 Display previous / next slide method using keypress on left and right arrow keys
    changeSlideOnKeypress: function() {
        var self = this;
        $('body').keydown(function(e) {
            if (e.which === 39) {
                self.slideIndexPlus();
                self.showActiveSlide();
            } else if (e.which === 37) {
                self.slideIndexMinus();
                self.showActiveSlide();
            }
        });
    },
}

//2.0 Calling "homemade" Rest API
//2.1 Get API object
var GetDataApi = {
    //2.2 Object attributes
    storesApi: "http://www.bearcreation.net/p5/index.php?action=StoresController-jsonStores",
    marker: null,
    //2.3 Object methods
    //2.3.1 Initialize method
    initialize: function(callback) {
        this.callApi(callback);
    },
    //2.3.2 Call API method
    callApi: function(callback) {
        ajaxGet(this.storesApi, function(response) {
            var stores = JSON.parse(response);
            callback(stores)
        });
    }
}

//3.0 Stores map powered by googleMap API
//3.1 Map object
var MyMap = {
    //3.2 Object properties
    mapCont: $('#map'),
    lat: 46.7410416,
    lng: 1.4448819,
    marker: null,
    //3.3 Object Methods
    //3.3.1 Initialize google map per se method
    initialize: function() {
        this.initMap();
    },
    //3.3.2 Google map method
    initMap: function() {
      
        var self = this;
        var france = {
            lat: self.lat,
            lng: self.lng
        };
        myMap = new google.maps.Map(document.getElementById('map'), {
            zoom: 6.5,
            center: france,
            mapTypeControl: false,
            streetViewControl: false,
            fullscreenControl: false
        });
    },
    //3.3.3 Setup stores markers and markers' clicks events manager methods
    createStoresMarker: function(stores) {
        var markers = [];
        var self = this;
      
        //3.3.4 Create stores markers on map
        stores.forEach(function(stores) {
            var iconStore = {
                url: 'public/img/icons/store.png',
                scaledSize: new google.maps.Size(35, 35),
                origin: new google.maps.Point(0, 0), // origin
                anchor: new google.maps.Point(0, 35), // anchor
            };
            var myPosition = {
                lat: Number(stores.position.lat),
                lng: Number(stores.position.lng)
            }
            var marker = new google.maps.Marker({
                position: myPosition,
                map: myMap,
                icon: iconStore
            });
            //3.3.5 Push markers for markers clustering see below section "Set up markers clustering for a better user experience"
            markers.push(marker);
            //3.3.6 Set stores details which be displayed on markers' click
            var contentString = stores.storename;
                var infowindow = new google.maps.InfoWindow({
                    content: contentString
            });
            //3.3.7 Click on marker events
            marker.addListener('click', function() {
                $(".modal-title").text(stores.storename);
                $(".address").text(stores.address);
                $(".zipcode").text(stores.zipcode);
                $(".city").text(stores.city);
                $(".phone").text(stores.phone);
                $(".email").text(stores.email);
                $(".website").text(stores.website);
                $(".genre").text(stores.genre);
                $("#pano").css({"height": "300", "width":"100%", "background-image":"url('./public/img/stores/store-8.jpg')" });
                $("#myModal").modal('show');
            });
        });
        //3.4 Setup markers clustering for a better user experience
        var markerCluster = new MarkerClusterer(myMap, markers, {
            imagePath: 'public/img/markerclusterer/m',
        });
    }
}

//4.0 Instance App's Objects
//4.1 Instance Carousel Object
var diaporama = Object.create(Diapo);
diaporama.initialize();
//4.2 Instance Map Object
var mapFrance = Object.create(MyMap);
mapFrance.initialize();
//4.3 Instance map's marker object
var getDataApiStores = Object.create(GetDataApi);
getDataApiStores.initialize(
    function(stores) {
        mapFrance.createStoresMarker(stores);
    }
);
