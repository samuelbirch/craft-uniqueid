/**
 * UUID plugin for Craft CMS
 *
 * UUIDFieldType JS
 *
 * @author    madebyjam
 * @copyright Copyright (c) 2016 madebyjam
 * @link      http://madebyjam.com
 * @package   UUID
 * @since     1.0.0
 */

 ;(function ( $, window, document, undefined ) {

    $(function () {
        
        	var $disabledFields = $('#UUID').find('#types-UUID-size-field, #types-UUID-useSpecials-field');

			$('#types-UUID-uuidFormat').on('click', function(){
				if($(this).hasClass('on')){
					/*$disabledFields.each(function(){
						var $this = $(this);
							$this.find('select').prop('disabled', true);
							$this.addClass('disabled');
					})*/
					setState(true);
				}else{
					/*$disabledFields.each(function(){
						var $this = $(this);
							$this.find('select').prop('disabled', false);
							$this.removeClass('disabled');
					})*/
					setState(false);
				}
			})
			
			if($('#types-UUID-uuidFormat').hasClass('on')){
				setState(true);
			}
			
			function setState(disabled){
				$disabledFields.each(function(){
					var $this = $(this);
						$this.find('select').prop('disabled', disabled);
						disabled ? $this.addClass('disabled') : $this.removeClass('disabled');
				})
			}

    });

})( jQuery, window, document );
