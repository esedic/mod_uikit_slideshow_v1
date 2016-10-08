<?php
/**
 * Uikit Slideshow module
 *
 * @package     Joomla.Site
 * @subpackage  mod_uikit_slideshow
 *
 * @author      Elvis Sedić <elvis@spletodrom.com>
 * @copyright   Copyright (C) 2016 Elvis Sedić. All rights reserved.
 * @license     GNU General Public License version 2 or later;
 * @link        https://github.com/esedic/mod_uikit_slideshow
 */

// no direct access
defined( '_JEXEC' ) or die;

// Include the syndicate functions only once
require_once __DIR__ . '/helper.php';

// todo:
// add optional assets loading
// add uikit slideshow params
// other

// load jQuery
JHtml::_('jquery.framework');

// load Uikit assets
$doc = JFactory::getDocument();
$doc->addStyleSheet(JUri::root() . 'media/mod_uikit_slideshow/css/uikit.css');
$doc->addStyleSheet(JUri::root() . 'media/mod_uikit_slideshow/css/slideshow.css');
$doc->addStyleSheet(JUri::root() . 'media/mod_uikit_slideshow/css/slidenav.css');
$doc->addStyleSheet(JUri::root() . 'media/mod_uikit_slideshow/css/dotnav.css');
$doc->addScript(JUri::root() . 'media/mod_uikit_slideshow/js/uikit.min.js');
$doc->addScript(JUri::root() . 'media/mod_uikit_slideshow/js/slideshow.min.js');

// todo: advanced animation
// if($animation == 1) {
// 	$doc->addScript(JUri::root() . 'media/mod_uikit_slideshow/js/slideshow-fx.min.js');
// }

/* Get module id */
$module_id = $module->id;

/* Get module parameters */
$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));

// Set autoplay
$autoplay = (int) $params->get('autoplay', 1);
$autoplay = $params->get('autoplay') !== 1 ? 'autoplay:true' : '';

// Set autoplay interval
$interval = (int) $params->get('interval', 3000);
$interval = $params->get('interval') !== 3000 ? ', autoplayInterval:' . $interval : '';

// Set animation
$animation = $params->get('animation', 'fade');
if($animation == "scroll") {
	$animation =  ", animation:'scroll'";
}
else if($animation == "scale") {
	$animation =  ", animation:'scale'";
}
else if($animation == "swipe") {
	$animation =  ", animation:'swipe'";
}
else {
    $animation = "";
}

// Set pause on hover
$pause = (int) $params->get('pause', 1);
$pause = $params->get('pause') !== 1 ? ', pauseOnHover:true' : '';

// Set dotnav & slidenav
$dotnav = (int) $params->get('dotnav', 1);
$slidenav = (int) $params->get('slidenav', 1);

// Get images
$images     = modUikitSlideshowHelper::groupByKey($params->get('images'));

require JModuleHelper::getLayoutPath('mod_uikit_slideshow', $params->get('layout', 'default'));
