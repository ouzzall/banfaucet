(function ($) {
  "use strict";
  jQuery(document).ready(function($){
    $('#menu').slicknav({
      prependTo:'.mainmenu'
    }
    );
    scroller.init({
      config: {
        // hover color
        hoverColor: "#DB7661",
          // bg color
          bgColor: "#1f2b31",
          // opacity
          // 0 - 1
          opacity: 1
      }
    }
    );
    $('.video-play-btn').magnificPopup({
      type:'video',
    }
    );
    $('.single-section').masonry();
    $('.review-slider').owlCarousel({
      items:1,
        autoplay:false,
        loop:true,
        margin:30,
        dots:true
        //nav:true,
        //navText:["<i class='fas fa-long-arrow-alt-left'></i>", "<i class='fas fa-long-arrow-alt-right'></i>"]
    }
    );
    $('#ebook-count-bar1').circleProgress({
      value:0.1500,
        fill:'#464646',
        size:230,
        thickness:3
    }
    ).on('circle-animation-progress', function(event, progress) {
      $(this).find('.skill-count-number').html(Math.round(1900 * progress) + '<i> </i>');
    }
    );
    $('#ebook-count-bar2').circleProgress({
      value:0.90,
        fill:'#464646',
        size:230,
        thickness:3
    }
    ).on('circle-animation-progress', function(event, progress) {
      $(this).find('.skill-count-number').html(Math.round(1200 * progress) + '<i> </i>');
    }
    );
    $('#ebook-count-bar3').circleProgress({
      value:0.90,
        fill:'#464646',
        size:230,
        thickness:3
    }
    ).on('circle-animation-progress', function(event, progress) {
      $(this).find('.skill-count-number').html(Math.round(1400 * progress) + '<i> </i>');
    }
    );
    $('#ebook-count-bar4').circleProgress({
      value:0.90,
        fill:'#464646',
        size:230,
        thickness:3
    }
    ).on('circle-animation-progress', function(event, progress) {
      $(this).find('.skill-count-number').html(Math.round(1700 * progress) + '<i> </i>');
    }
    );
  }
  );
  jQuery(window).load(function(){
  }
  );
}
(jQuery));
