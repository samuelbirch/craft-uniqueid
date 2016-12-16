/**
 * UUID plugin for Craft CMS
 *
 * UUIDFieldType JS
 *
 * @author    madebyjam
 * @copyright Copyright (c) 2016 madebyjam
 * @link      https://madebyjam.com
 * @package   UUID
 * @since     1.0.0
 */

 ;(function ( $, window, document, undefined ) {

    var pluginName = "UUIDFieldType",
        defaults = {
        };

    // Plugin constructor
    function Plugin( element, options ) {
        this.element = element;

        this.options = $.extend( {}, defaults, options) ;

        this._defaults = defaults;
        this._name = pluginName;

        this.init();
    }

    Plugin.prototype = {

        init: function(id) {
            var _this = this;

            $(function () {

/* -- _this.options gives us access to the $jsonVars that our FieldType passed down to us */
//console.log(_this.options)
				if(_this.options.settings.regenerate){
					$('#'+_this.options.namespace+'-regenerate').on('click', function(e){
						e.preventDefault();
						Craft.postActionRequest('/UUID/generateUUID', {
						    uuidFormat: _this.options.settings.uuidFormat,
						    length: _this.options.settings.length,
						    useSpecials: _this.options.settings.useSpecials
					    }, function(response) {
							$('#'+_this.options.namespace).val(response.uuid);
							$('#'+_this.options.namespace).prev().text(response.uuid);
						});
					})
				}

            });
        }
    };

    // A really lightweight plugin wrapper around the constructor,
    // preventing against multiple instantiations
    $.fn[pluginName] = function ( options ) {
        return this.each(function () {
            if (!$.data(this, "plugin_" + pluginName)) {
                $.data(this, "plugin_" + pluginName,
                new Plugin( this, options ));
            }
        });
    };

})( jQuery, window, document );
