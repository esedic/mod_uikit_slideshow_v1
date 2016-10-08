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

// todo:
// autoplay
// Slidenav and Dotnav
// Transitions
// Ken Burns effect
// Fullscreen slideshow
// Overlays
// Video
// XML / JavaScript Options
// Add alert field
// Multilingual
// jQuery check
// replace all BS code with Uikit

if ($images !== null) :
?>
<div id="UikitSlideshow-<?php echo $module_id; ?>" class="uk-slidenav-position" data-uk-slideshow="{<?php echo $autoplay.$interval.$animation.$pause;?>}">

    <!-- Dotnav -->
    <?php if ($dotnav === 1) : ?>
    <ul class="uk-dotnav uk-dotnav-contrast uk-position-bottom uk-flex-center">
        <?php foreach ($images as $k => $image) : ?>
        <li data-uk-slideshow-item="<?php echo $k; ?>"><a href=""></a></li>
        <?php endforeach; ?>
    </ul>
    <?php endif; ?>

    <!-- Container -->
    <ul class="uk-slideshow">
    <?php foreach ($images as $k => $image) : ?>
        <li>
            <img src="<?php echo JUri::root() . $image['main_image']; ?>" alt="<?php echo $image['title']; ?>">
            <?php if ($image['description'] || ($image['link']) !== '') : ?>
                <div class="uk-overlay-panel uk-overlay-background uk-overlay-fade"><?php echo $image['description']; ?></div>
            <?php if ($image['link'] !== '') : ?>
                <a class="uk-position-cover" href="<?php echo $image['link']; ?>"<?php echo $image['target']==1 ? ' target="_blank"' : ''; ?>></a>
            <?php endif; ?>
            <?php endif; ?>
        </li>
    <?php endforeach; ?>
    </ul>

    <!-- Slidenav -->
    <?php if ($slidenav === 1) : ?>
    <a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slideshow-item="previous"></a>
    <a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slideshow-item="next"></a>
    <?php endif; ?>
</div>


    <!-- Alert if there are no images -->
<?php else : ?>
<div class="uk-alert uk-alert-danger">
    <h4>Error!</h4>
    <p>There are no images.</p>
</div>
<?php endif; ?>
