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
      var resizable_elements = new Array('.resizable', 'a', 'p', 'span', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', '.site-info', '.entry-title', '.widget-title', 'ul li', 'ol li');

      if ( accessibility_script_vars.font_size ) {
        var res = [];
        $.each(accessibility_script_vars.font_size.split(','), function(){
            res.push($.trim(this));
        });
        resizable_elements = resizable_elements.concat(res);
      }

      resizable_elements = resizable_elements.join(', ');

      jQuery(resizable_elements).each(function(){
        jQuery(this).attr('data-fontsize',parseInt(jQuery(this).css('font-size')));
      });

      font_resizer();
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
    var contrast = new Array('.contrast' ,'body');

    if ( accessibility_script_vars.contrast ) {
        var res = [];
        $.each(accessibility_script_vars.contrast.split(','), function(){
            res.push($.trim(this));
        });
        contrast = contrast.concat(res);
    }
    contrast = contrast.join(', ');

    // ao abrir a página
    // var contrast_class = 'bodyBlack';
    // var contrast_class = 'bodyNegativeContrast';
    var contrast_class = 'bodyHighContrast';
    $( document ).ready(function() {
        if(_color == '' || typeof _color === "undefined"){
            $(contrast).removeClass(contrast_class);
        }else{
            $(contrast).addClass(contrast_class);
        }
    });

    // ao clicar Contraste
    $( document ).ready(function() {
        $('#contraste').on( "click", function(){
            if(_color == contrast_class){
                _color = '';
                Cookies.set('_color', '', { expires: 1 });
            }else{
                _color = contrast_class;
                Cookies.set('_color', contrast_class, { expires: 1 });
            }
            $(contrast).toggleClass(contrast_class);
        });
    });

})( jQuery );

function font_resizer(){

    var resizable_elements = new Array('.resizable', 'a', 'p', 'span', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6');

    if ( accessibility_script_vars.font_size ) {
        var res = [];
        jQuery.each(accessibility_script_vars.font_size.split(','), function(){
            res.push(jQuery.trim(this));
        });
        resizable_elements = resizable_elements.concat(res);
    }

    resizable_elements = resizable_elements.join(', ');

    //Font++
    jQuery("#fontPlus").click(function(e){

        e.preventDefault();

        jQuery(resizable_elements).each(function(){

            var el_font_size = parseInt(jQuery(this).css('font-size'));

            jQuery(this).css('font-size',parseInt(el_font_size+1)+'px');

        });

    });

    //Font--
    jQuery("#fontMinus").click(function(e){

        e.preventDefault();

        jQuery(resizable_elements).each(function(){

            var el_font_size = parseInt(jQuery(this).css('font-size'));

            if(el_font_size > 12){

                jQuery(this).css('font-size',parseInt(el_font_size-1)+'px');

            }

        });

    });

    //Font Reset
    jQuery("#fontReset").click(function(e){

        e.preventDefault();

        jQuery(resizable_elements).each(function(){

            var el_font_size = parseInt(jQuery(this).css('font-size'));

            jQuery(this).css('font-size',parseInt(jQuery(this).data("fontsize"))+'px');

        });

    });

}