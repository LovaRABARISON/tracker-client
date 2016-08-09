<?php

class Tracker_client_theme_Install
{
    
    public static function install()
    {
        
        add_option( 'url-tracking', '' ) ;
        add_option( 'custmer-uid', '' ) ;
        add_option( 'active-uid', 0 ) ;
        
    }

}

?>
