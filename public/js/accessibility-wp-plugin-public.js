(function( $ ) {
    'use strict';

    /**
     * All of the code for your public-facing JavaScript source
     * should reside in this file.
     *
     * Note: It has been assumed you will write jQuery code here, so the
     * $ function reference has been prepared for usage within the scope
     * of this function.
     *
     * This enables you to define handlers, for when the DOM is ready:
     *
     * $(function() {
     *
     * });
     *
     * When the window is loaded:
     *
     * $( window ).load(function() {
     *
     * });
     *
     * ...and/or other possibilities.
     *
     * Ideally, it is not considered best practise to attach more than a
     * single DOM-ready or window-load handler for a particular page.
     * Although scripts in the WordPress core, Plugins and Themes may be
     * practising this, we should strive to set a better example in our own work.
     */

    $(document).ready(function() {
      var resize = new Array('.resizable', 'p', '#footer', '.site-info', '.entry-title', '.widget-title', '.widget-title li', '.entry-content li', '#site-navigation a', '.searchItens', '.vhl-themes', '.vhl-themes > strong', '.eventos ul a', '.noticias a', '#nav', '.navFooter li a', '.breadcrumb', '.accordion', '.accordion button');

      if ( accessibility_script_vars.font_size ) {
        var res = [];
        $.each(accessibility_script_vars.font_size.split(','), function(){
            res.push($.trim(this));
        });
        resize = resize.concat(res);
      }

      var resetFont = [];
      $.each(resize, function( index, value ){
          var element = {};
          element.selector = value;
          element.fontsize = $(value).css('font-size');
          resetFont.push(element);
      });

      resize = resize.join(', ');

      //resets the font size when "reset" is clicked
      $("#fontReset").click(function() {
        $.each(resetFont, function( index, obj ){
            $(obj.selector).css('font-size', obj.fontsize);
        });
      });

      //increases font size when "+" is clicked
      $("#fontPlus").click(function() {
        var originalFontSize = $(resize).css('font-size');
        var originalFontNumber = parseFloat(originalFontSize, 10);
        var newFontSize = originalFontNumber * 1.2;

        if ( newFontSize < 30 ) {
            $(resize).css('font-size', newFontSize);
        }

        return false;
      });

      //decrease font size when "-" is clicked
      $("#fontMinus").click(function() {
        var originalFontSize = $(resize).css('font-size');
        var originalFontNumber = parseFloat(originalFontSize, 10);
        var newFontSize = originalFontNumber * 0.8;

        if ( newFontSize > 10 ) {
            $(resize).css('font-size', newFontSize);
        }

        return false;
      });

    });

    // Navegação por atalhos
    var pressedALT = false;
    document.onkeyup=function(e){
        if(e.which == 18){
            pressedALT =false;
        }
    }

    var anchor1 = '#primary';
    if ( accessibility_script_vars.main_content )
        anchor1 = accessibility_script_vars.main_content;
    var anchor2 = '#site-navigation';
    if ( accessibility_script_vars.site_menu )
        anchor2 = accessibility_script_vars.site_menu;
    var anchor3 = '#searchForm';
    if ( accessibility_script_vars.search_form )
        anchor3 = accessibility_script_vars.search_form;
    var anchor4 = '#footer';
    if ( accessibility_script_vars.site_footer )
        anchor4 = accessibility_script_vars.site_footer;
    document.onkeydown=function(e){
        if(e.which == 18){
            pressedALT = true;
        }
        //Main Alt + 1
        if((e.which == 49 || e.which == 97 )&& pressedALT == true) {
            window.location.assign(anchor1);
        }
        //Nav ALT + 2
        if((e.which == 50 || e.which == 98) && pressedALT == true) {
            window.location.assign(anchor2);
        }
        //Footer ALT + 3
        if((e.which == 51 || e.which == 99) && pressedALT == true) {
            $(anchor3).focus();
        }
        //Footer ALT + 4
        if((e.which == 52 || e.which == 100) && pressedALT == true) {
            window.location.assign(anchor4);
        }
    }

    // cache contraste
    var _color = Cookies.get('_color');
    var contrast = new Array('.contrast' ,'body', '.entry-title', '.entry-content', '#masthead', '.site-content-contain', '.navigation-top', '.navigation-top .sub-menu');
    if ( accessibility_script_vars.contrast ) {
        var res = [];
        $.each(accessibility_script_vars.contrast.split(','), function(){
            res.push($.trim(this));
        });
        contrast = contrast.concat(res);
    }
    contrast = contrast.join(', ');

    // ao abrir a página
    $( document ).ready(function() {
        if(_color == '' || typeof _color === "undefined"){
            $(contrast).removeClass('bodyBlack');
        }else{
            $(contrast).addClass('bodyBlack');
        }
    });

    // ao clicar Contraste
    $( document ).ready(function() {
        $('#contraste').on( "click", function(){
            if(_color == 'bodyBlack'){
                _color = '';
                Cookies.set('_color', '', { expires: 1 });
            }else{
                _color = 'bodyBlack';
                Cookies.set('_color', 'bodyBlack', { expires: 1 });
            }
            $(contrast).toggleClass('bodyBlack');
        });
    });

})( jQuery );
