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
            </tbody>
        </table>

        <?php submit_button(); ?>
    
    </form>

</div>