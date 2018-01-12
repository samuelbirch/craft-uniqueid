<?php
/**
 * UniqueID plugin for Craft CMS
 *
 * UniqueID Service
 *
 * @author    madebyjam
 * @copyright Copyright (c) 2016 madebyjam
 * @link      https://madebyjam.com
 * @package   UniqueID
 * @since     1.0.0
 */

namespace Craft;

class UniqueIDService extends BaseApplicationComponent
{
    public function uuid($field)
    {
        $id = StringHelper::UUID();

        if($this->_exists($field, $id)){
            return $this->uuid($field);
        }

        return $id;
    }

    public function uid($field, $length=64, $useSpecials=false)
    {
        $id = StringHelper::randomString($length, $useSpecials);

        if($this->_exists($field, $id)){
            return $this->uid($field, $length, $useSpecials);
        }

        return $id;
    }

    private function _exists($field, $id)
    {
        $query = craft()->db->createCommand()
            ->select('id')
            ->from('content')
            ->where([
                'field_'.$field => $id,
            ])
            ->queryRow();

        return $query ? true : false;
    }
}