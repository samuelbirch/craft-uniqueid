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

    /**
     * @return mixed
     */
    public function defineContentAttribute()
    {
        return AttributeType::Mixed;
    }

    /**
     * @param string $name
     * @param mixed  $value
     * @return string
     */
    public function getInputHtml($name, $value)
    {
        if (!$value)
            $value = new UUIDModel();

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
            );

        $jsonVars = json_encode($jsonVars);
        craft()->templates->includeJs("$('#{$namespacedId}-field').UUIDFieldType(" . $jsonVars . ");");

/* -- Variables to pass down to our rendered template */

        $variables = array(
            'id' => $id,
            'name' => $name,
            'namespaceId' => $namespacedId,
            'values' => $value
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
        return $value;
    }
}