jQuery(document).ready(function($) {

  var scrollPageTop = function() {
    var scrollBtn = $('#scroll-top');

    $(window).scroll(function() {
      var scrollPosition = $(this).scrollTop();

      if(scrollPosition > 500) {
        scrollBtn.addClass('js-is-visible');
      } else if(scrollPosition < 500) {
        scrollBtn.removeClass('js-is-visible');
      }
    });

    scrollBtn.bind('click', function(e) {
      e.preventDefault();
      $("html, body").animate({ scrollTop: 0 }, "slow");
      return false;
    });
  }

  var mobileNav = function() {
    var body = $('body');
    var mobileNavTrigger = $('.nav-toggle');
    var mobileNavContainer = $('.main-nav .menu');

    mobileNavTrigger.bind('click', function(e){
      e.preventDefault();
      $(this).toggleClass('js-is-active');
      mobileNavContainer.toggleClass('js-is-active');
      body.toggleClass('js-no-scroll');
    });
  }

  var popupModal = function() {
    var modal = $('#modal');
    var closeModal = $('.modal__close');
    var modalOverlay = $('.modal__overlay');
    var modalContentLink = $('.modal__content a');
    var firstSess = sessionStorage.getItem('modal');

    closeModal.on('click', function(e) {
      e.preventDefault();
      modal.hide();
      sessionStorage.setItem('modal', 'close');
      $('body').removeClass('js-no-scroll');
    });

    modalContentLink.on('click', function(e) {
      sessionStorage.setItem('modal', 'close');
      $('body').removeClass('js-no-scroll');
    });

    modalOverlay.on('click', function(e) {
      e.preventDefault();
      modal.hide();
      sessionStorage.setItem('modal', 'close');
      $('body').removeClass('js-no-scroll');
    });

    if(firstSess == 'close') {
      modal.hide();
    } else {
      modal.delay('600').fadeIn('swing');
      $('body').addClass('js-no-scroll');
    }
  }

  $('#hero-slider').slick({
    dots: true,
    infinite: true,
    speed: 500,
    fade: true,
    autoplay: true,
    autoplaySpeed: 3000,
    cssEase: 'linear',
    arrows: false,
    pauseOnHover: false
  });

  $(".body-content, .video-embed").fitVids();

  scrollPageTop();
  mobileNav();
  //popupModal();

});
