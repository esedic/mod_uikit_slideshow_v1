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
<div id="UikitSlideshow-<?php echo $module_id; ?>" class="uk-slidenav-position" data-uk-slideshow>
<!--<div id="b3Carousel-<?php // echo $module_id; ?>" class="b3Carousel carousel slide<?php // echo $transition; ?>" data-ride="carousel"<?php // echo $interval . $pause . $wrap . $keyboard; ?>>-->
    <?php if ($indicators === 1) : ?>
    <!-- Indicators -->
    <ul class="uk-dotnav uk-dotnav-contrast uk-position-bottom uk-flex-center">
        <?php foreach ($images as $k => $image) : ?>
        <li data-uk-slideshow-item="<?php echo $k; ?>"><a href=""></a></li>
        <?php endforeach; ?>
    </ul>
    <!--
    <ol class="carousel-indicators">
        <?php // foreach ($images as $k => $image) : ?>
        <li data-target="#b3Carousel-<?php // echo $module_id; ?>" data-slide-to="<?php // echo $k; ?>"<?php // echo $k==0 ? ' class="active"': ''; ?>></li>
        <?php // endforeach; ?>
    </ol>
    -->
    <?php endif; ?>

    <!-- Wrapper for slides -->
    <ul class="uk-slideshow">
    <div class="carousel-inner" role="listbox">

        <?php
        $styles = '';
        foreach ($images as $k => $image)
        {
            if ($image['alternative_image'] !== '')
            {
                $styles .= '.item-' . $module_id . '-' . $k . ' {background-image:url(' . JUri::base() . $image['alternative_image'] .');}';
            }
        ?>
        <li>
        <figure class="item-<?php echo $module_id . '-' . $k; ?> item<?php echo $k==0 ? ' active' : ''; ?>">
            <?php if ($image['link'] !== '') : ?>
            <a href="<?php echo $image['link']; ?>"<?php echo $image['target']==1 ? ' target="_blank"' : ''; ?>>
                <img src="<?php echo JUri::base() . $image['main_image']; ?>" alt="<?php echo $image['title']; ?>" />
            </a>
            <?php else : ?>
            <img src="<?php echo JUri::base() . $image['main_image']; ?>" alt="<?php echo $image['title']; ?>" />
            <?php endif; ?>

            <?php if ($image['description']) : ?>
            <figcaption class="carousel-caption">
                <?php echo $image['description']; ?>
            </figcaption>
            <?php endif; ?>
        </figure>
        </li>
        <?php } ?>
    </ul>

    <?php if ($controls === 1) : ?>
    <!-- Controls -->
    <a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slideshow-item="previous"></a>
    <a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slideshow-item="next"></a>
    <!--
    <a class="left carousel-control" href="#b3Carousel-<?php // echo $module_id; ?>" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#b3Carousel-<?php // echo $module_id; ?>" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    -->
    <?php endif; ?>
</div>
<?php if ($styles !== '') $doc->addStyleDeclaration($styles); ?>
<?php else : ?>
<div class="uk-alert uk-alert-danger">
    <h4>Error!</h4>
    <p>There are no images.</p>
</div>
<?php endif; ?>
