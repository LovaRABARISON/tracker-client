<?php

class Tracker_client_theme_Uninstall
{
    
    public static function uninstall()
    {
        //Parametre par defaut
        update_option("url-tracking", '');
        delete_option("url-tracking");
        
        update_option("custmer-uid", '');
        delete_option("custmer-uid");
        
        update_option("active-uid", '');
        delete_option("active-uid");
        
    }

}

?>
