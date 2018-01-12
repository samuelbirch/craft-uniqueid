<?php
/**
 * UniqueID plugin for Craft CMS
 *
 * Generate a UniqueID
 *
 * @author    madebyjam
 * @copyright Copyright (c) 2016 madebyjam
 * @link      https://madebyjam.com
 * @package   UniqueID
 * @since     1.0.0
 */

namespace Craft;

class UniqueIDVariable
{
    /**
     */
    public function uuid($field)
    {
        return craft()->uniqueID->uud($field);
    }

    public function uid($field, $length=64, $specials=false)
    {
        return craft()->uniqueID->uid($field, $length, $specials);
    }
}