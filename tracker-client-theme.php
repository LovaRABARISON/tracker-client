<?php
/*

Plugin Name: Aki'leads - Code de suivi

Description: Code de suivi permettant la remontée des informations de navigation et des événements dans Track'R

Version: 1.0

Author: Aki'leads

License: GPL2

*/

class Tracker_client_theme_Plugin

{

    public function __construct()

    {
        include_once plugin_dir_path( __FILE__ ).'/install.php';
        include_once plugin_dir_path( __FILE__ ).'/uninstall.php';
        
        register_activation_hook(__FILE__, array('Tracker_client_theme_Install', 'install'));
        register_deactivation_hook(__FILE__, array('Tracker_client_theme_Uninstall', 'uninstall'));
        register_uninstall_hook(__FILE__, array('Tracker_client_theme_Uninstall', 'uninstall'));
        
        add_action('admin_menu', array($this, 'add_admin_menu'));
        add_action('admin_init', array($this, 'register_settings'));
        add_action('init', array($this, 'register_script'));
    }
    
    /**
     * Appel aux elements de style
     */
    public function register_script() {
        
        if(isset($_GET['page']) && $_GET['page'] == 'tracker-client-theme'){

            
            wp_register_script( 'jquery-1.12.4', plugins_url('/js/jquery-1.12.4.js' , __FILE__));
            wp_enqueue_script( 'jquery-1.12.4');
            
            wp_register_script( 'add', plugins_url('/js/add.js' , __FILE__));
            wp_enqueue_script( 'add');
        }
       
    }
    
    public function add_admin_menu()
        {

            add_menu_page('Tracker client theme', 'Tracker client theme plugin', 'manage_options', 'tracker-client-theme', array($this, 'menu_html'));

        }
    public function menu_html()
        {

            echo '<h1>Configuration du plugin Tracker client theme</h1>';

            ?>
            <form method="post" action="options.php">
                <?php settings_fields('tracker_client_theme_settings') ?>
                <p>
                    <label>Tracking URL</label>
                    <input type="text" name="url-tracking" value="<?php echo get_option('url-tracking') ;?>" title="Tracking URL"/>
                </p>
                <p>
                    <label>Customer UID</label>
                    <input type="text" name="custmer-uid" value="<?php echo get_option('custmer-uid') ;?>" title="Customer UID"/>
                </p>
                <p>
                    <label>Activé</label>
                    <?php $iStatut = !empty(get_option('active-uid')) ? get_option('active-uid') : 0 ;?>
                    <input id="is_active-check-value" type="hidden" name="active-uid" value="<?php echo $iStatut ;?>" />
                    <input id="is_active-check" type="checkbox" value="<?php echo $iStatut ;?>" <?php echo ($iStatut == 1 ? 'checked="checked"' : '') ;?> title="Statut UID"/>
                </p>
                <div style="clear: both;"></div>
                <?php submit_button(); ?>
            </form>
            
           
        <?php
        }
    public function register_settings()
    {

        register_setting('tracker_client_theme_settings', 'url-tracking');
        register_setting('tracker_client_theme_settings', 'custmer-uid');
        register_setting('tracker_client_theme_settings', 'active-uid');

    }

}

new Tracker_client_theme_Plugin() ;

?>
