<?php
/**
 * UUID plugin for Craft CMS
 *
 * UUID Model
 *
 * @author    madebyjam
 * @copyright Copyright (c) 2016 madebyjam
 * @link      https://madebyjam.com
 * @package   UUID
 * @since     1.0.0
 */

namespace Craft;

class UUIDModel extends BaseModel
{
    /**
     * @return array
     */
    protected function defineAttributes()
    {
        return array_merge(parent::defineAttributes(), array(
            'someField'     => array(AttributeType::String, 'default' => 'some value'),
        ));
    }

}