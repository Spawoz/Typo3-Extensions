(function ($) {
  'use strict';

  // Main function
  $.contactButtons = function( options ){
    
    // Define the defaults
    var defaults = { 
      effect  : '', // slide-on-scroll
      buttons : {
        'facebook':   { class: 'facebook',  use: false, icon: 'facebook',    link: '', title: 'Follow on Facebook' },
        'google-plus':     { class: 'google-plus',     use: false, icon: 'google-plus', link: '', title: 'Visit on Google Plus' },
        'linkedin':   { class: 'linkedin',  use: false, icon: 'linkedin',    link: '', title: 'Visit on LinkedIn' },
        'twitter':    { class: 'twitter',   use: false, icon: 'twitter',     link: '', title: 'Follow on Twitter' },
        'pinterest-p':  { class: 'pinterest-p', use: false, icon: 'pinterest-p',   link: '', title: 'Follow on Pinterest' },
        'phone':      { class: 'phone',     use: false, icon: 'phone',       link: '', title: 'Call us', type: 'phone' },
        'envelope-o':      { class: 'envelope-o',     use: false, icon: 'envelope-o',    link: '', title: 'Send us an email', type: 'email' },
        'xing':    { class: 'xing',   use: false, icon: 'xing',     link: '', title: 'Follow on Xing' },
        'youtube':    { class: 'youtube',   use: false, icon: 'youtube',     link: '', title: 'Follow on Youtube' },
        'instagram':    { class: 'instagram',   use: false, icon: 'instagram',     link: '', title: 'Follow on Instagram' },
        'file-o':    { class: 'file-o',   use: false, icon: 'file-o',     link: '', title: 'Follow on file-o' },
        'link':    { class: 'link',   use: false, icon: 'link',     link: '', title: 'Follow on link' },
        'external-link':    { class: 'external-link',   use: false, icon: 'external-link',     link: '', title: 'Follow on external-link' },
      }
    };

    // Merge defaults and options
    var s,
        settings = options;
    for (s in defaults.buttons) {
      if (options.buttons[s]) {
        settings.buttons[s] = $.extend( defaults.buttons[s], options.buttons[s] );
      }
    }
    
    // Define the container for the buttons
    var oContainer = $("#contact-buttons-bar");

    // Check if the container is already on the page
    if ( oContainer.length === 0 ) {
      
      // Insert the container element
      $('body').append('<div id="contact-buttons-bar">');
      
      // Get the just inserted element
      oContainer = $("#contact-buttons-bar");
      
      // Add class for effect
      oContainer.addClass(settings.effect);
      
      // Add show/hide button
      var sShowHideBtn = '<button class="contact-button-link show-hide-contact-bar"><i class="fa fa-angle-left"></i></button>';
      oContainer.append(sShowHideBtn);
      
      var i;
      for ( i in settings.buttons ) {
        var bs = settings.buttons[i],
            sLink = bs.link,
            active = bs.use;
        
        // Check if element is active
        if (active) {
          
          // Change the link for phone and email when needed
          if (bs.type === 'phone') {
            sLink = 'tel:' + bs.link;
          } else if (bs.type === 'email') {
            sLink = 'mailto:' + bs.link;
          }
          
          // Insert the links
          var sIcon = '<i class="fa fa-' + bs.icon + '"></i>',
              sButton = '<a href="' + sLink + 
                          '" class="contact-button-link cb-ancor ' + bs.class + '" ' + 
                          (bs.title ? 'title="' + bs.title + '"' : '') + 
                          (bs.extras ? bs.extras : '') + 
                          '>' + sIcon + '</a>';
          oContainer.append(sButton);
        }
      }
      
      // Make the buttons visible
      setTimeout(function(){
        oContainer.animate({ left : 0 });
      }, 200);
      
      // Show/hide buttons
      $('body').on('click', '.show-hide-contact-bar', function(e){
        e.preventDefault();
        e.stopImmediatePropagation();
        $('.show-hide-contact-bar').find('.fa').toggleClass('fa-angle-right fa-angle-left');
        oContainer.find('.cb-ancor').toggleClass('cb-hidden');
      });
    }
  };
}( jQuery ));

// Slide on scroll effect
$(window).on('load', function(){ 
// $(window).load(function(){
    var el = $("#contact-buttons-bar.slide-on-scroll");
    el.attr('data-top', el.css('top'));

    $(window).scroll(function() {
        clearTimeout( $.data( this, "scrollCheck" ) );
        $.data( this, "scrollCheck", setTimeout(function() {
            var nTop = $(window).scrollTop() + parseInt(el.attr('data-top'));
            el.animate({
                top : nTop
            }, 500);
        }, 250) );
    });
});