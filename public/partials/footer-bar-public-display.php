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

    $bar_color = ( $config['accessibility_bar_color'] ) ? sanitize_text_field($config['accessibility_bar_color']) : '#778899';
    $bar_text_color = ( $config['accessibility_bar_text_color'] ) ? sanitize_text_field($config['accessibility_bar_text_color']) : '#FFFFFF';
    
    $locale = get_bloginfo('language');
    $lang = substr($locale, 0,2);
?>

<?php if ( 'true' == $config['footer_bar'] ) : ?>
<section id="footer-bar" style="background: <?php echo $bar_color; ?>; color: <?php echo $bar_text_color; ?>;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="https://politicas.bireme.org/terminos/<?php echo $lang; ?>" target="_blank" role="button"><?php _e('Terms and Conditions of Use', 'accessibility-wp-plugin'); ?></a> | <a href="https://politicas.bireme.org/privacidad/<?php echo $lang; ?>" target="_blank" role="button"><?php _e('Privacy Policy', 'accessibility-wp-plugin'); ?></a>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>