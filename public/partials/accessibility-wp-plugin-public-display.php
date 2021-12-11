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

    $main_content = ( $config['accessibility_main_content'] ) ? sanitize_text_field($config['accessibility_main_content']) : '#primary';
    $site_menu    = ( $config['accessibility_menu'] ) ? sanitize_text_field($config['accessibility_menu']) : '#site-navigation';
    $search_form  = ( $config['accessibility_search'] ) ? sanitize_text_field($config['accessibility_search']) : '#searchForm';
    $site_footer  = ( $config['accessibility_footer'] ) ? sanitize_text_field($config['accessibility_footer']) : '#footer';

    $bar_color = ( $config['accessibility_bar_color'] ) ? sanitize_text_field($config['accessibility_bar_color']) : '#778899';
    $bar_text_color = ( $config['accessibility_bar_text_color'] ) ? sanitize_text_field($config['accessibility_bar_text_color']) : '#FFFFFF';

    $locale = get_bloginfo('language');
    $lang = substr($locale, 0,2);
?>

<?php if ( 'true' == $config['accessibility_bar'] ) : ?>
<section id="barAccessibility" style="background: <?php echo $bar_color; ?>; color: <?php echo $bar_text_color; ?>;">
    <div class="container">
        <div class="row">
            <div class="col-md-6" id="accessibilityTutorial">
                <a href="<?php echo $main_content; ?>" tabindex="1" role="button"><?php _e('Main Content', 'accessibility-wp-plugin'); ?> <span class="hiddenMobile">1</span></a>
                <a href="<?php echo $site_menu; ?>" tabindex="2" role="button"><?php _e('Menu', 'accessibility-wp-plugin'); ?> <span class="hiddenMobile">2</span></a>
                <a href="<?php echo $search_form; ?>" tabindex="3" id="accessibilitySearch" role="button"><?php _e('Search', 'accessibility-wp-plugin'); ?> <span class="hiddenMobile">3</span></a>
                <a href="<?php echo $site_footer; ?>" tabindex="4" role="button"><?php _e('Footer', 'accessibility-wp-plugin'); ?> <span class="hiddenMobile">4</span></a>
            </div>
            <div class="col-md-6" id="accessibilityFontes">
                <a href="#!" id="fontPlus" tabindex="5" aria-hidden="true">+A</a> |
                <a href="#!" id="fontReset" tabindex="6" aria-hidden="true">A</a> |
                <a href="#!" id="fontMinus" tabindex="7" aria-hidden="true">-A</a> |
                <a href="#!" id="contraste" tabindex="8" aria-hidden="true"><i class="fas fa-adjust"></i> <?php _e('High contrast', 'accessibility-wp-plugin'); ?></a> |
                <a href="https://politicas.bireme.org/accesibilidad/<?php echo $lang; ?>" role="button" id="acessibility" tabindex="9" target="_blank" title="Acessibilidade"><i class="fas fa-wheelchair"></i></a>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>