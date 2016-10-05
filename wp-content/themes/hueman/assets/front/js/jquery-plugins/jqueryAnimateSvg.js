/* ===================================================
 * jqueryAnimateSvg.js v1.0.0
 * @dependency : Vivus.js (MIT licensed)
 * @dependency : HUParams
 * ===================================================
 * (c) 2016 Nicolas Guillaume, Nice, France
 * Animates an svg icon with Vivus given its #id
 * =================================================== */
;(function ( $, window, document, _ ) {
  var pluginName = 'animateSvg',
      defaults = {},
      _drawSvgIcon = function(options) {
          var id = $(this).attr('id');
          if ( _.isUndefined(id) || _.isEmpty(id) || 'function' != typeof( Vivus ) ) {
            if ( window.czrapp )
              czrapp.consoleLog( 'An svg icon could not be animated with Vivus.');
            return;
          }
          if ( $('[id=' + id + ']').length > 1 ) {
            if ( window.czrapp )
              czrapp.consoleLog( 'Svg icons must have a unique css #id to be animated. Multiple id found for : ' + id );
          }
          $.when( $('#' + id ).css('opacity', 1 ) ).done( function() {
              new Vivus( id, {type: 'delayed', duration: HUParams.vivusSvgSpeed || 400 } );
          });
      };

  // prevents against multiple instantiations
  $.fn[pluginName] = function ( options ) {
      options  = $.extend( {}, defaults, options) ;
      return this.each(function () {
          if ( ! $.data(this, 'plugin_' + pluginName) ) {
              $.data(
                this,
                'plugin_' + pluginName,
                _drawSvgIcon.call( this, options )
              );
          }
      });
  };
})( jQuery, window, document, _ );