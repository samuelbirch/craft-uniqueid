<?php
/**
 * UUID plugin for Craft CMS
 *
 * UUID FieldType
 *
 * @author    madebyjam
 * @copyright Copyright (c) 2016 madebyjam
 * @link      https://madebyjam.com
 * @package   UUID
 * @since     1.0.0
 */

namespace Craft;

class UUIDFieldType extends BaseFieldType
{
    /**
     * @return mixed
     */
    public function getName()
    {
        return Craft::t('UUID');
    }
    
    protected function defineSettings()
    {
	    return array(
		    'uuidFormat' => array(AttributeType::Bool, 'default' => 0),
		    'size' => array(AttributeType::Number, 'default' => 64),
		    'useSpecials' => array(AttributeType::Bool, 'default' => 0),
		    'regenerate' => array(AttributeType::Bool, 'default' => 1),
	    );
    }
    
    public function getSettingsHtml()
    {
	    craft()->templates->includeJsResource('uuid/js/fields/UUIDFieldTypeSettings.js');
	    
	    return craft()->templates->render('uuid/fields/UUIDFieldTypeSettings.twig', array(
		    'settings' => $this->getSettings(),
		    'sizeOptions' => array(8=>8, 16=>16, 32=>32, 64=>64, 128=>128),
	    ));
    }

    /**
     * @return mixed
     */
    public function defineContentAttribute()
    {
        return AttributeType::String;
    }

    /**
     * @param string $name
     * @param mixed  $value
     * @return string
     */
    public function getInputHtml($name, $value)
    {
        $settings = $this->getSettings();
        $id = craft()->templates->formatInputId($name);
        $namespacedId = craft()->templates->namespaceInputId($id);

/* -- Include our Javascript & CSS */

        craft()->templates->includeCssResource('uuid/css/fields/UUIDFieldType.css');
        craft()->templates->includeJsResource('uuid/js/fields/UUIDFieldType.js');

/* -- Variables to pass down to our field.js */

        $jsonVars = array(
            'id' => $id,
            'name' => $name,
            'namespace' => $namespacedId,
            'prefix' => craft()->templates->namespaceInputId(""),
            'settings' => [
	            'uuidFormat' => $settings['uuidFormat'],
	            'length' => $settings['size'],
	            'useSpecials' => $settings['useSpecials'],
	            'regenerate' => $settings['regenerate'],
            ],
        );

        $jsonVars = json_encode($jsonVars);
        craft()->templates->includeJs("$('#{$namespacedId}-field').UUIDFieldType(" . $jsonVars . ");");

/* -- Variables to pass down to our rendered template */

        $variables = array(
            'id' => $id,
            'name' => $name,
            'namespaceId' => $namespacedId,
            'values' => $value,
            'settings' => $this->getSettings(),
        );

        return craft()->templates->render('uuid/fields/UUIDFieldType.twig', $variables);
    }

    /**
     * @param mixed $value
     * @return mixed
     */
    public function prepValueFromPost($value)
    {
        return $value;
    }

    /**
     * @param mixed $value
     * @return mixed
     */
    public function prepValue($value)
    {
        $settings = $this->getSettings();
	    
	    if(!$value){
		    
		    if($settings['uuidFormat']){
			     $value = StringHelper::UUID();
		    }else{
			     //$value = StringHelper::randomString($settings['size'], $settings['useSpecials']);
			     $value = craft()->uUID->generateUUID($settings['uuidFormat'], $settings['size'], $settings['useSpecials']);
		    }
        }
        return $value;
    }
}