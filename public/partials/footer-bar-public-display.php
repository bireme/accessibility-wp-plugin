<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       http://reddes.bvsalud.org
 * @since      1.0.0
 *
 * @package    Accessibility_WP_Plugin
 * @subpackage Accessibility_WP_Plugin/public/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<?php
    $config = get_option('accessibility_wp_plugin_config');
    
    $locale = get_bloginfo('language');
    $lang = substr($locale, 0,2);
?>

<?php if ( 'true' == $config['footer_bar'] ) : ?>
<section id="footer-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="https://politicas.bireme.org/terminos/<?php echo $lang; ?>" target="_blank" role="button"><?php _e('Terms and Conditions of Use', 'accessibility-wp-plugin'); ?></a> | <a href="https://politicas.bireme.org/privacidad/<?php echo $lang; ?>" target="_blank" role="button"><?php _e('Privacy Policy', 'accessibility-wp-plugin'); ?></a>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>