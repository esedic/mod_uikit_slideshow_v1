<?php
/**
 * B3 Carousel Module
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
// add uikit params
// other

$doc = JFactory::getDocument();
$doc->addStyleSheet(JUri::root() . 'media/mod_uikit_slideshow/css/uikit.css');
$doc->addStyleSheet(JUri::root() . 'media/mod_uikit_slideshow/css/slideshow.css');
$doc->addStyleSheet(JUri::root() . 'media/mod_uikit_slideshow/css/slidenav.css');
$doc->addStyleSheet(JUri::root() . 'media/mod_uikit_slideshow/css/dotnav.css');
$doc->addScript(JUri::root() . 'media/mod_uikit_slideshow/js/uikit.min.js');
$doc->addScript(JUri::root() . 'media/mod_uikit_slideshow/js/slideshow.min.js');
$doc->addScript(JUri::root() . 'media/mod_uikit_slideshow/js/slideshow-fx.min.js');

/* Module id */
$module_id = $module->id;

/* Params */
$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));
$autoslide       = (int) $params->get('autoslide', 1);
$interval        = (int) $params->get('interval', 5000);
$transition      = (int) $params->get('transition', 0);

$transition = $transition !== 0 ? ' carousel-fade' : '';

$interval   = $interval !== 5000 ? ' data-interval="' . $interval . '"' : '';
$interval   = $autoslide !== 0 ? $interval : ' data-interval="false"';

$indicators = (int) $params->get('indicators', 1);
$controls   = (int) $params->get('controls', 1);

$pause      = (int) $params->get('pause') !== 1 ? ' data-pause="false"' : '';
$wrap       = (int) $params->get('wrap') !== 1 ? ' data-wrap="false"' : '';
$keyboard   = (int) $params->get('keyboard') !== 1 ? ' data-keyboard="false"' : '';

$images     = modUikitSlideshowHelper::groupByKey($params->get('images'));

require JModuleHelper::getLayoutPath('mod_uikit_slideshow', $params->get('layout', 'default'));
