/**
 * UniqueID plugin for Craft CMS
 *
 * UniqueIDFieldType JS
 *
 * @author    madebyjam
 * @copyright Copyright (c) 2016 madebyjam
 * @link      http://madebyjam.com
 * @package   UniqueID
 * @since     1.0.0
 */

;
(function($, window, document, undefined) {

    $(function() {

        var $disabledFields = $('#UniqueID').find('#types-UniqueID-size-field, #types-UniqueID-useSpecials-field');

        $('#types-UniqueID-uuidFormat').on('click', function() {
            if ($(this).hasClass('on')) {
                /*$disabledFields.each(function(){
                	var $this = $(this);
                		$this.find('select').prop('disabled', true);
                		$this.addClass('disabled');
                })*/
                setState(true);
            } else {
                /*$disabledFields.each(function(){
                	var $this = $(this);
                		$this.find('select').prop('disabled', false);
                		$this.removeClass('disabled');
                })*/
                setState(false);
            }
        })

        if ($('#types-UniqueID-uuidFormat').hasClass('on')) {
            setState(true);
        }

        function setState(disabled) {
            $disabledFields.each(function() {
                var $this = $(this);
                $this.find('select').prop('disabled', disabled);
                disabled ? $this.addClass('disabled') : $this.removeClass('disabled');
            })
        }

    });

})(jQuery, window, document);