/**

* Template Name: BizPage - v5.0.2

* Template URL: https://bootstrapmade.com/bizpage-bootstrap-business-template/

* Author: BootstrapMade.com

* License: https://bootstrapmade.com/license/

*/

(function() {

  "use strict";



  /**

   * Easy selector helper function

   */

  const select = (el, all = false) => {

    el = el.trim()

    if (all) {

      return [...document.querySelectorAll(el)]

    } else {

      return document.querySelector(el)

    }

  }



  /**

   * Easy event listener function

   */

  const on = (type, el, listener, all = false) => {

    let selectEl = select(el, all)

    if (selectEl) {

      if (all) {

        selectEl.forEach(e => e.addEventListener(type, listener))

      } else {

        selectEl.addEventListener(type, listener)

      }

    }

  }



  /**

   * Easy on scroll event listener 

   */

  const onscroll = (el, listener) => {

    el.addEventListener('scroll', listener)

  }



  /**

   * Navbar links active state on scroll

   */

  let navbarlinks = select('#navbar .scrollto', true)

  const navbarlinksActive = () => {

    let position = window.scrollY + 200

    navbarlinks.forEach(navbarlink => {

      if (!navbarlink.hash) return

      let section = select(navbarlink.hash)

      if (!section) return

      if (position >= section.offsetTop && position <= (section.offsetTop + section.offsetHeight)) {

        navbarlink.classList.add('active')

      } else {

        navbarlink.classList.remove('active')

      }

    })

  }

  window.addEventListener('load', navbarlinksActive)

  onscroll(document, navbarlinksActive)



  /**

   * Scrolls to an element with header offset

   */

  const scrollto = (el) => {

    let header = select('#header')

    let offset = header.offsetHeight



    if (!header.classList.contains('header-scrolled')) {

      offset -= 20

    }



    let elementPos = select(el).offsetTop

    window.scrollTo({

      top: elementPos - offset,

      behavior: 'smooth'

    })

  }



  /**

   * Toggle .header-scrolled class to #header when page is scrolled

   */

  let selectHeader = select('#header')

  if (selectHeader) {

    const headerScrolled = () => {

      if (window.scrollY > 100) {

        selectHeader.classList.add('header-scrolled')

      } else {

        selectHeader.classList.remove('header-scrolled')

      }

    }

    window.addEventListener('load', headerScrolled)

    onscroll(document, headerScrolled)

  }



  /**

   * Hero carousel indicators

   */

  let heroCarouselIndicators = select("#hero-carousel-indicators")

  let heroCarouselItems = select('#heroCarousel .carousel-item', true)



  heroCarouselItems.forEach((item, index) => {

    (index === 0) ?

    heroCarouselIndicators.innerHTML += "<li data-bs-target='#heroCarousel' data-bs-slide-to='" + index + "' class='active'></li>":

      heroCarouselIndicators.innerHTML += "<li data-bs-target='#heroCarousel' data-bs-slide-to='" + index + "'></li>"

  });



  /**

   * Back to top button

   */

  let backtotop = select('.back-to-top')

  if (backtotop) {

    const toggleBacktotop = () => {

      if (window.scrollY > 100) {

        backtotop.classList.add('active')

      } else {

        backtotop.classList.remove('active')

      }

    }

    window.addEventListener('load', toggleBacktotop)

    onscroll(document, toggleBacktotop)

  }



  /**

   * Mobile nav toggle

   */

  on('click', '.mobile-nav-toggle', function(e) {

    select('#navbar').classList.toggle('navbar-mobile')

    this.classList.toggle('bi-list')

    this.classList.toggle('bi-x')

  })



  /**

   * Mobile nav dropdowns activate

   */

  on('click', '.navbar .dropdown > a', function(e) {

    if (select('#navbar').classList.contains('navbar-mobile')) {

      e.preventDefault()

      this.nextElementSibling.classList.toggle('dropdown-active')

    }

  }, true)



  /**

   * Scrool with ofset on links with a class name .scrollto

   */

  on('click', '.scrollto', function(e) {

    if (select(this.hash)) {

      e.preventDefault()



      let navbar = select('#navbar')

      if (navbar.classList.contains('navbar-mobile')) {

        navbar.classList.remove('navbar-mobile')

        let navbarToggle = select('.mobile-nav-toggle')

        navbarToggle.classList.toggle('bi-list')

        navbarToggle.classList.toggle('bi-x')

      }

      scrollto(this.hash)

    }

  }, true)



  /**

   * Scroll with ofset on page load with hash links in the url

   */

  window.addEventListener('load', () => {

    if (window.location.hash) {

      if (select(window.location.hash)) {

        scrollto(window.location.hash)

      }

    }

  });



  /**

   * Preloader

   */

  let preloader = select('#preloader');

  if (preloader) {

    window.addEventListener('load', () => {

      preloader.remove()

    });

  }




  /**

   * books Slider

   */

  new Swiper('.books-slider', {

    speed: 400,

    loop: true,

    autoplay: {

      delay: 5000,

      disableOnInteraction: false

    },

    slidesPerView: 'auto',

    pagination: {

      el: '.swiper-pagination',

      type: 'bullets',

      clickable: true

    },

    navigation: {

      nextEl: '.swiper-button-next',

      prevEl: '.swiper-button-prev',

    },
      slidesPerView: 1,
      spaceBetween: 10,

    breakpoints: {

      480: {

        slidesPerView: 2,

        spaceBetween: 20

      },

      640: {

        slidesPerView: 3,

        spaceBetween: 20

      },

      992: {

        slidesPerView: 6,

        spaceBetween: 20

      }

    }

  });



  /**

   * Testimonials slider

   */




  /**

   * Animation on scroll

   */

  window.addEventListener('load', () => {

    AOS.init({

      duration: 1000,

      easing: 'ease-in-out',

      once: true,

      mirror: false

    })

  });



})()



var audioPlayer = function() {

  "use strict";



  // Private variables

  var _currentTrack = null;

  var _elements = {

    audio: document.getElementById("audio"),

    playerButtons: {

      largeToggleBtn: document.querySelector(".large-toggle-btn"),

      nextTrackBtn: document.querySelector(".next-track-btn"),

      previousTrackBtn: document.querySelector(".previous-track-btn"),

      smallToggleBtn: document.getElementsByClassName("small-toggle-btn")

    },

    progressBar: document.querySelector(".progress-box"),

    playListRows: document.getElementsByClassName("play-list-row"),

    trackInfoBox: document.querySelector(".track-info-box")

  };

  var _playAHead = false;

  var _progressCounter = 0;

  var _progressBarIndicator = _elements.progressBar.children[0].children[0].children[1];

  var _trackLoaded = false;



  /**

   * Determines the buffer progress.

   *

   * @param audio The audio element on the page.

   **/

  var _bufferProgress = function(audio) {

    var bufferedTime = (audio.buffered.end(0) * 100) / audio.duration;

    var progressBuffer = _elements.progressBar.children[0].children[0].children[0];



    progressBuffer.style.width = bufferedTime + "%";

  };



  /**

   * A utility function for getting the event cordinates based on browser type.

   *

   * @param e The JavaScript event.

   **/

  var _getXY = function(e) {

    var containerX = _elements.progressBar.offsetLeft;

    var containerY = _elements.progressBar.offsetTop;



    var coords = {

      x: null,

      y: null

    };



    var isTouchSuopported = "ontouchstart" in window;



    if (isTouchSuopported) { //For touch devices

      coords.x = e.clientX - containerX;

      coords.y = e.clientY - containerY;



      return coords;

    } else if (e.offsetX || e.offsetX === 0) { // For webkit browsers

      coords.x = e.offsetX;

      coords.y = e.offsetY;



      return coords;

    } else if (e.layerX || e.layerX === 0) { // For Mozilla firefox

      coords.x = e.layerX;

      coords.y = e.layerY;



      return coords;

    }

  };



  var _handleProgressIndicatorClick = function(e) {

    var progressBar = document.querySelector(".progress-box");

    var xCoords = _getXY(e).x;



    return (xCoords - progressBar.offsetLeft) / progressBar.children[0].offsetWidth;

  };



  /**

   * Initializes the html5 audio player and the playlist.

   *

   **/

  var initPlayer = function() {



    if (_currentTrack === 1 || _currentTrack === null) {

      _elements.playerButtons.previousTrackBtn.disabled = true;

    }



    //Adding event listeners to playlist clickable elements.

    for (var i = 0; i < _elements.playListRows.length; i++) {

      var smallToggleBtn = _elements.playerButtons.smallToggleBtn[i];

      var playListLink = _elements.playListRows[i].children[2].children[0];



      //Playlist link clicked.

      playListLink.addEventListener("click", function(e) {

        e.preventDefault();

        var selectedTrack = parseInt(this.parentNode.parentNode.getAttribute("data-track-row"));



        if (selectedTrack !== _currentTrack) {

          _resetPlayStatus();

          _currentTrack = null;

          _trackLoaded = false;

        }



        if (_trackLoaded === false) {

          _currentTrack = parseInt(selectedTrack);

          _setTrack();

        } else {

          _playBack(this);

        }

      }, false);



      //Small toggle button clicked.

      smallToggleBtn.addEventListener("click", function(e) {

        e.preventDefault();

        var selectedTrack = parseInt(this.parentNode.getAttribute("data-track-row"));



        if (selectedTrack !== _currentTrack) {

          _resetPlayStatus();

          _currentTrack = null;

          _trackLoaded = false;

        }



        if (_trackLoaded === false) {

          _currentTrack = parseInt(selectedTrack);

          _setTrack();

        } else {

          _playBack(this);

        }



      }, false);

    }



    //Audio time has changed so update it.

    _elements.audio.addEventListener("timeupdate", _trackTimeChanged, false);



    //Audio track has ended playing.

    _elements.audio.addEventListener("ended", function(e) {

      _trackHasEnded();

    }, false);



    //Audio error. 

    _elements.audio.addEventListener("error", function(e) {

      switch (e.target.error.code) {

        case e.target.error.MEDIA_ERR_ABORTED:

          alert('You aborted the video playback.');

          break;

        case e.target.error.MEDIA_ERR_NETWORK:

          alert('A network error caused the audio download to fail.');

          break;

        case e.target.error.MEDIA_ERR_DECODE:

          alert('The audio playback was aborted due to a corruption problem or because the video used features your browser did not support.');

          break;

        case e.target.error.MEDIA_ERR_SRC_NOT_SUPPORTED:

          alert('The video audio not be loaded, either because the server or network failed or because the format is not supported.');

          break;

        default:

          alert('An unknown error occurred.');

          break;

      }

      trackLoaded = false;

      _resetPlayStatus();

    }, false);



    //Large toggle button clicked.

    _elements.playerButtons.largeToggleBtn.addEventListener("click", function(e) {

      if (_trackLoaded === false) {

        _currentTrack = parseInt(1);

        _setTrack()

      } else {

        _playBack();

      }

    }, false);



    //Next track button clicked.

    _elements.playerButtons.nextTrackBtn.addEventListener("click", function(e) {

      if (this.disabled !== true) {

        _currentTrack++;

        _trackLoaded = false;

        _resetPlayStatus();

        _setTrack();

      }

    }, false);



    //Previous track button clicked.

    _elements.playerButtons.previousTrackBtn.addEventListener("click", function(e) {

      if (this.disabled !== true) {

        _currentTrack--;

        _trackLoaded = false;

        _resetPlayStatus();

        _setTrack();

      }

    }, false);



    //User is moving progress indicator.

    _progressBarIndicator.addEventListener("mousedown", _mouseDown, false);



    //User stops moving progress indicator.

    window.addEventListener("mouseup", _mouseUp, false);

  };



  /**

   * Handles the mousedown event by a user and determines if the mouse is being moved.

   *

   * @param e The event object.

   **/

  var _mouseDown = function(e) {

    window.addEventListener("mousemove", _moveProgressIndicator, true);

    audio.removeEventListener("timeupdate", _trackTimeChanged, false);



    _playAHead = true;

  };



  /**

   * Handles the mouseup event by a user.

   *

   * @param e The event object.

   **/

  var _mouseUp = function(e) {

    if (_playAHead === true) {

      var duration = parseFloat(audio.duration);

      var progressIndicatorClick = parseFloat(_handleProgressIndicatorClick(e));

      window.removeEventListener("mousemove", _moveProgressIndicator, true);



      audio.currentTime = duration * progressIndicatorClick;

      audio.addEventListener("timeupdate", _trackTimeChanged, false);

      _playAHead = false;

    }

  };



  /**

   * Moves the progress indicator to a new point in the audio.

   *

   * @param e The event object.

   **/

  var _moveProgressIndicator = function(e) {

    var newPosition = 0;

    var progressBarOffsetLeft = _elements.progressBar.offsetLeft;

    var progressBarWidth = 0;

    var progressBarIndicator = _elements.progressBar.children[0].children[0].children[1];

    var progressBarIndicatorWidth = _progressBarIndicator.offsetWidth;

    var xCoords = _getXY(e).x;



    progressBarWidth = _elements.progressBar.children[0].offsetWidth - progressBarIndicatorWidth;

    newPosition = xCoords - progressBarOffsetLeft;



    if ((newPosition >= 1) && (newPosition <= progressBarWidth)) {

      progressBarIndicator.style.left = newPosition + ".px";

    }

    if (newPosition < 0) {

      progressBarIndicator.style.left = "0";

    }

    if (newPosition > progressBarWidth) {

      progressBarIndicator.style.left = progressBarWidth + "px";

    }

  };



  /**

   * Controls playback of the audio element.

   *

   **/

  var _playBack = function() {

    if (_elements.audio.paused) {

      _elements.audio.play();

      _updatePlayStatus(true);

      document.title = "\u25B6 " + document.title;

    } else {

      _elements.audio.pause();

      _updatePlayStatus(false);

      document.title = document.title.substr(2);

    }

  };



  /**

   * Sets the track if it hasn't already been loaded yet.

   *

   **/

  var _setTrack = function() {

    var songURL = _elements.audio.children[_currentTrack - 1].src;



    _elements.audio.setAttribute("src", songURL);

    _elements.audio.load();



    _trackLoaded = true;



    _setTrackTitle(_currentTrack, _elements.playListRows);



    _setActiveItem(_currentTrack, _elements.playListRows);



    _elements.trackInfoBox.style.visibility = "visible";



    _playBack();

  };



  /**

   * Sets the activly playing item within the playlist.

   *

   * @param currentTrack The current track number being played.

   * @param playListRows The playlist object.

   **/

  var _setActiveItem = function(currentTrack, playListRows) {

    for (var i = 0; i < playListRows.length; i++) {

      playListRows[i].children[2].className = "track-title";

    }



    playListRows[currentTrack - 1].children[2].className = "track-title active-track";

  };



  /**

   * Sets the text for the currently playing song.

   *

   * @param currentTrack The current track number being played.

   * @param playListRows The playlist object.

   **/

  var _setTrackTitle = function(currentTrack, playListRows) {

    var trackTitleBox = document.querySelector(".player .info-box .track-info-box .track-title-text");

    var trackTitle = playListRows[currentTrack - 1].children[2].outerText;



    trackTitleBox.innerHTML = null;



    trackTitleBox.innerHTML = trackTitle;



    document.title = trackTitle;

  };



  /**

   * Plays the next track when a track has ended playing.

   *

   **/

  var _trackHasEnded = function() {

    parseInt(_currentTrack);

    _currentTrack = (_currentTrack === _elements.playListRows.length) ? 1 : _currentTrack + 1;

    _trackLoaded = false;



    _resetPlayStatus();



    _setTrack();

  };



  /**

   * Updates the time for the song being played.

   *

   **/

  var _trackTimeChanged = function() {

    var currentTimeBox = document.querySelector(".player .info-box .track-info-box .audio-time .current-time");

    var currentTime = audio.currentTime;

    var duration = audio.duration;

    var durationBox = document.querySelector(".player .info-box .track-info-box .audio-time .duration");

    var trackCurrentTime = _trackTime(currentTime);

    var trackDuration = _trackTime(duration);



    currentTimeBox.innerHTML = null;

    currentTimeBox.innerHTML = trackCurrentTime;



    durationBox.innerHTML = null;

    durationBox.innerHTML = trackDuration;



    _updateProgressIndicator(audio);

    _bufferProgress(audio);

  };



  /**

   * A utility function for converting a time in miliseconds to a readable time of minutes and seconds.

   *

   * @param seconds The time in seconds.

   *

   * @return time The time in minutes and/or seconds.

   **/

  var _trackTime = function(seconds) {

    var min = 0;

    var sec = Math.floor(seconds);

    var time = 0;



    min = Math.floor(sec / 60);



    min = min >= 10 ? min : '0' + min;



    sec = Math.floor(sec % 60);



    sec = sec >= 10 ? sec : '0' + sec;



    time = min + ':' + sec;



    return time;

  };



  /**

   * Updates both the large and small toggle buttons accordingly.

   *

   * @param audioPlaying A booean value indicating if audio is playing or paused.

   **/

  var _updatePlayStatus = function(audioPlaying) {

    if (audioPlaying) {

      _elements.playerButtons.largeToggleBtn.children[0].className = "large-pause-btn";



      _elements.playerButtons.smallToggleBtn[_currentTrack - 1].children[0].className = "small-pause-btn";

    } else {

      _elements.playerButtons.largeToggleBtn.children[0].className = "large-play-btn";



      _elements.playerButtons.smallToggleBtn[_currentTrack - 1].children[0].className = "small-play-btn";

    }



    //Update next and previous buttons accordingly

    if (_currentTrack === 1) {

      _elements.playerButtons.previousTrackBtn.disabled = true;

      _elements.playerButtons.previousTrackBtn.className = "previous-track-btn disabled";

    } else if (_currentTrack > 1 && _currentTrack !== _elements.playListRows.length) {

      _elements.playerButtons.previousTrackBtn.disabled = false;

      _elements.playerButtons.previousTrackBtn.className = "previous-track-btn";

      _elements.playerButtons.nextTrackBtn.disabled = false;

      _elements.playerButtons.nextTrackBtn.className = "next-track-btn";

    } else if (_currentTrack === _elements.playListRows.length) {

      _elements.playerButtons.nextTrackBtn.disabled = true;

      _elements.playerButtons.nextTrackBtn.className = "next-track-btn disabled";

    }

  };



  /**

   * Updates the location of the progress indicator according to how much time left in audio.

   *

   **/

  var _updateProgressIndicator = function() {

    var currentTime = parseFloat(_elements.audio.currentTime);

    var duration = parseFloat(_elements.audio.duration);

    var indicatorLocation = 0;

    var progressBarWidth = parseFloat(_elements.progressBar.offsetWidth);

    var progressIndicatorWidth = parseFloat(_progressBarIndicator.offsetWidth);

    var progressBarIndicatorWidth = progressBarWidth - progressIndicatorWidth;



    indicatorLocation = progressBarIndicatorWidth * (currentTime / duration);



    _progressBarIndicator.style.left = indicatorLocation + "px";

  };



  /**

   * Resets all toggle buttons to be play buttons.

   *

   **/

  var _resetPlayStatus = function() {

    var smallToggleBtn = _elements.playerButtons.smallToggleBtn;



    _elements.playerButtons.largeToggleBtn.children[0].className = "large-play-btn";



    for (var i = 0; i < smallToggleBtn.length; i++) {

      if (smallToggleBtn[i].children[0].className === "small-pause-btn") {

        smallToggleBtn[i].children[0].className = "small-play-btn";

      }

    }

  };



  return {

    initPlayer: initPlayer

  };

};



(function() {

  var player = new audioPlayer();



  player.initPlayer();

})();



/*=====Vedio=====================================================================================*/
