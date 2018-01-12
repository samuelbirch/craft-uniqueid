<?php
/**
 * UniqueID plugin for Craft CMS
 *
 * UniqueID Controller
 *
 * @author    madebyjam
 * @copyright Copyright (c) 2016 madebyjam
 * @link      https://madebyjam.com
 * @package   UniqueID
 * @since     1.0.0
 */

namespace Craft;

class UniqueIDController extends BaseController
{

    /**
     * @var    bool|array Allows anonymous access to this controller's actions.
     * @access protected
     */
    protected $allowAnonymous = false;

    /**
     */
    public function actionGenerateUniqueID()
    {
        $field = craft()->request->getParam('field');
        $uuidFormat = craft()->request->getParam('uuidFormat');
	    $length = craft()->request->getParam('length', 64);
	    $useSpecials = craft()->request->getParam('useSpecials', false);
        
        if($uuidFormat){
            $uid = craft()->uniqueID->uuid($field);
        }else{
            $uid = craft()->uniqueID->uid($field, $length, $useSpecials);
        }
	    
	    $this->returnJson(array('uid'=>$uid));
    }
}