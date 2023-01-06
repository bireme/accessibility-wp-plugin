<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://reddes.bvsalud.org
 * @since      1.0.0
 *
 * @package    Accessibility_WP_Plugin
 * @subpackage Accessibility_WP_Plugin/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<?php

// check user capabilities
if ( !current_user_can('manage_options') ) {
    return;
}

$config = get_option('accessibility_wp_plugin_config');

$bar_color = ( $config['accessibility_bar_color'] ) ? sanitize_text_field($config['accessibility_bar_color']) : '#778899';
$bar_text_color = ( $config['accessibility_bar_text_color'] ) ? sanitize_text_field($config['accessibility_bar_text_color']) : '#FFFFFF';

$locale = get_bloginfo('language');
$lang = substr($locale, 0,2);

?>

<div class="wrap">

    <h1><?php _e('Accessibility WP Plugin Settings', 'accessibility-wp-plugin'); ?></h1>

    <form method="post" action="options.php">

        <?php settings_fields('accessibility-wp-plugin-settings-group'); ?>

        <?php do_settings_sections('accessibility-wp-plugin-settings-group'); ?>

        <table class="form-table" role="presentation">
            <tbody>
                <tr>
                    <th scope="row">
                        <h2><?php _e('Active Bars', 'accessibility-wp-plugin'); ?></h2>
                    </th>
                </tr>
                <tr valign="top">
                    <th scope="row"><?php _e('Accessibility Bar', 'accessibility-wp-plugin'); ?>:</th>
                    <td>
                        <label for="accessibility-bar">
                            <input type="checkbox" name="accessibility_wp_plugin_config[accessibility_bar]" value="true" id="accessibility-bar" <?php echo (isset($config['accessibility_bar']) ?  " checked='true'" : '') ;?> ></input>
                        </label>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><?php _e('Footer Bar', 'accessibility-wp-plugin'); ?>:</th>
                    <td>
                        <label for="footer-bar">
                            <input type="checkbox" name="accessibility_wp_plugin_config[footer_bar]" value="true" id="footer-bar" <?php echo (isset($config['footer_bar']) ?  " checked='true'" : '') ;?> ></input>
                        </label>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><?php _e('Cookie Bar', 'accessibility-wp-plugin'); ?>:</th>
                    <td>
                        <label for="cookie-bar">
                            <input type="checkbox" name="accessibility_wp_plugin_config[cookie_bar]" value="true" id="cookie-bar" <?php echo (isset($config['cookie_bar']) ?  " checked='true'" : '') ;?> ></input>
                        </label>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <h2><?php _e('Custom Section', 'accessibility-wp-plugin'); ?></h2>
                    </th>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="accessibility-main-content"><?php _e('Main Content', 'accessibility-wp-plugin'); ?></label>
                    </th>
                    <td>
                        <input type="text" id="accessibility-main-content" name="accessibility_wp_plugin_config[accessibility_main_content]" value="<?php echo $config['accessibility_main_content']; ?>" class="regular-text">
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="accessibility-menu"><?php _e('Menu', 'accessibility-wp-plugin'); ?></label>
                    </th>
                    <td>
                        <input type="text" id="accessibility-menu" name="accessibility_wp_plugin_config[accessibility_menu]" value="<?php echo $config['accessibility_menu']; ?>" class="regular-text">
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="accessibility-search"><?php _e('Search', 'accessibility-wp-plugin'); ?></label>
                    </th>
                    <td>
                        <input type="text" id="accessibility-search" name="accessibility_wp_plugin_config[accessibility_search]" value="<?php echo $config['accessibility_search']; ?>" class="regular-text">
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="accessibility-footer"><?php _e('Footer', 'accessibility-wp-plugin'); ?></label>
                    </th>
                    <td>
                        <input type="text" id="accessibility-footer" name="accessibility_wp_plugin_config[accessibility_footer]" value="<?php echo $config['accessibility_footer']; ?>" class="regular-text">
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="accessibility-font-size"><?php _e('Font Size', 'accessibility-wp-plugin'); ?></label>
                    </th>
                    <td>
                        <input type="text" id="accessibility-font-size" name="accessibility_wp_plugin_config[accessibility_font_size]" value="<?php echo $config['accessibility_font_size']; ?>" class="regular-text" style="width: 50em;">
                        <p class="description"><?php _e('Enter one or more elements', 'accessibility-wp-plugin'); ?> (<?php _e('comma separated', 'accessibility-wp-plugin'); ?>)</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="accessibility-contrast"><?php _e('Contrast', 'accessibility-wp-plugin'); ?></label>
                    </th>
                    <td>
                        <input type="text" id="accessibility-contrast" name="accessibility_wp_plugin_config[accessibility_contrast]" value="<?php echo $config['accessibility_contrast']; ?>" class="regular-text" style="width: 50em;">
                        <p class="description"><?php _e('Enter one or more elements', 'accessibility-wp-plugin'); ?> (<?php _e('comma separated', 'accessibility-wp-plugin'); ?>)</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="accessibility-bar-color"><?php _e('Bar Color', 'accessibility-wp-plugin'); ?></label>
                    </th>
                    <td>
                        <input type="color" id="accessibility-bar-color" name="accessibility_wp_plugin_config[accessibility_bar_color]" value="<?php echo ( $config['accessibility_bar_color'] ) ? $config['accessibility_bar_color'] : '#778899'; ?>" class="regular-text input-bar-color" data-color="#778899" style="width: 235px;">
                        <p class="description hex-color" style="display: inline; text-transform: uppercase;"><?php echo ( $config['accessibility_bar_color'] ) ? $config['accessibility_bar_color'] : '#778899'; ?></p>
                        <!-- <div class="bar-color" style="height: 30px; width: 30px; float: left; margin-right: 8px; background: <?php echo $bar_color; ?>;"></div> -->
                        <!-- <p class="description"><?php _e('Example', 'accessibility-wp-plugin'); ?>: #778899</p> -->
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="accessibility-bar-text-color"><?php _e('Bar Text Color', 'accessibility-wp-plugin'); ?></label>
                    </th>
                    <td>
                        <input type="color" id="accessibility-bar-text-color" name="accessibility_wp_plugin_config[accessibility_bar_text_color]" value="<?php echo ( $config['accessibility_bar_text_color'] ) ? $config['accessibility_bar_text_color'] : '#FFFFFF'; ?>" class="regular-text input-bar-color" data-color="#FFFFFF" style="width: 235px;">
                        <p class="description hex-color" style="display: inline; text-transform: uppercase;"><?php echo ( $config['accessibility_bar_text_color'] ) ? $config['accessibility_bar_text_color'] : '#FFFFFF'; ?></p>
                        <!-- <div class="bar-text-color" style="height: 30px; width: 30px; float: left; margin-right: 8px; background: <?php echo $bar_text_color; ?>; "></div> -->
                        <!-- <p class="description"><?php _e('Example', 'accessibility-wp-plugin'); ?>: #FFFFFF</p> -->
                    </td>
                </tr>
            </tbody>
        </table>

        <?php submit_button(); ?>
    
    </form>

</div>

<script type="text/javascript">
    var $ = jQuery;
    $( function() {
        $('.input-bar-color').on( "change", function(){
            var bgcolor = $(this).val();
            if ( bgcolor ) {
                $(this).next().text(bgcolor);
            } else {
                bgcolor = $(this).data('color');
                $(this).next().text(bgcolor);
            }
        });
/*
        $('.input-bar-color').on( "blur", function(){
            var bgcolor = $(this).val();
            if ( bgcolor ) {
                $(this).next().css('background-color', bgcolor);
            } else {
                bgcolor = $(this).data('color');
                $(this).next().css('background-color', bgcolor);
            }
        });
*/
    });
</script>