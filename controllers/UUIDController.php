<?php
/**
 * UUID plugin for Craft CMS
 *
 * UUID Controller
 *
 * @author    madebyjam
 * @copyright Copyright (c) 2016 madebyjam
 * @link      https://madebyjam.com
 * @package   UUID
 * @since     1.0.0
 */

namespace Craft;

class UUIDController extends BaseController
{

    /**
     * @var    bool|array Allows anonymous access to this controller's actions.
     * @access protected
     */
    protected $allowAnonymous = false;

    /**
     */
    public function actionGenerateUUID()
    {
	    $uuidFormat = craft()->request->getParam('uuidFormat');
	    $length = craft()->request->getParam('length');
	    $useSpecials = craft()->request->getParam('useSpecials');
	    
	    $UUID = craft()->uUID->generateUUID($uuidFormat, $length, $useSpecials);
	    
	    $this->returnJson(array('uuid'=>$UUID));
    }
}