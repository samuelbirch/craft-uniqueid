<?php
/**
 * UniqueID plugin for Craft CMS
 *
 * UniqueID FieldType
 *
 * @author    madebyjam
 * @copyright Copyright (c) 2016 madebyjam
 * @link      https://madebyjam.com
 * @package   UniqueID
 * @since     1.0.0
 */

namespace Craft;

class UniqueIDFieldType extends BaseFieldType implements IPreviewableFieldType
{
    /**
     * @return mixed
     */
    public function getName()
    {
        return Craft::t('UniqueID');
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
	    craft()->templates->includeJsResource('unquieid/js/fields/UniqueIDFieldTypeSettings.js');
	    
	    return craft()->templates->render('uniqueid/fields/UniqueIDFieldTypeSettings.twig', array(
		    'settings' => $this->getSettings(),
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

        craft()->templates->includeCssResource('uniqueid/css/fields/UniqueIDFieldType.css');
        craft()->templates->includeJsResource('uniqueid/js/fields/UniqueIDFieldType.js');

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
        craft()->templates->includeJs("$('#{$namespacedId}-field').UniqueIDFieldType(" . $jsonVars . ");");

/* -- Variables to pass down to our rendered template */

        $variables = array(
            'id' => $id,
            'name' => $name,
            'namespaceId' => $namespacedId,
            'values' => $value,
            'settings' => $this->getSettings(),
        );

        return craft()->templates->render('uniqueid/fields/UniqueIDFieldType.twig', $variables);
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
	    
	    return $value;
    }
}