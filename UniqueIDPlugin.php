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

class UniqueIDPlugin extends BasePlugin
{
    /**
     * @return mixed
     */
    public function init()
    {
    }

    /**
     * @return mixed
     */
    public function getName()
    {
         return Craft::t('UniqueID');
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return Craft::t('Generate a UniqueID');
    }

    /**
     * @return string
     */
    public function getDocumentationUrl()
    {
        return 'https://github.com/https://github.com/samuelbirch/craft-uuid/uuid/blob/master/README.md';
    }

    /**
     * @return string
     */
    public function getReleaseFeedUrl()
    {
        return 'https://raw.githubusercontent.com/https://github.com/samuelbirch/craft-uuid/uuid/master/releases.json';
    }

    /**
     * @return string
     */
    public function getVersion()
    {
        return '1.0.0';
    }

    /**
     * @return string
     */
    public function getSchemaVersion()
    {
        return '1.0.0';
    }

    /**
     * @return string
     */
    public function getDeveloper()
    {
        return 'madebyjam';
    }

    /**
     * @return string
     */
    public function getDeveloperUrl()
    {
        return 'https://madebyjam.com';
    }

    /**
     * @return bool
     */
    public function hasCpSection()
    {
        return false;
    }

    /**
     */
    public function onBeforeInstall()
    {
    }

    /**
     */
    public function onAfterInstall()
    {
    }

    /**
     */
    public function onBeforeUninstall()
    {
    }

    /**
     */
    public function onAfterUninstall()
    {
    }
}