<?php
/**
 * UUID plugin for Craft CMS
 *
 * UUID Service
 *
 * @author    madebyjam
 * @copyright Copyright (c) 2016 madebyjam
 * @link      https://madebyjam.com
 * @package   UUID
 * @since     1.0.0
 */

namespace Craft;

class UUIDService extends BaseApplicationComponent
{
    /**
     */
    public function generateUUID($uuidFormat=false, $length=64, $useSpecials=false)
    {
	    if($uuidFormat) return StringHelper::UUID();
	    
	    return StringHelper::randomString($length, $useSpecials);
    }

}