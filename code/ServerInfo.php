<?php


class ServerInfo extends LeftAndMain
{

    private static $url_segment = 'serverinfo';
    private static $menu_priority = -3;

    private static $allowed_actions = array(
		'getinfo',
    );

    public function init() {
        parent::init();
        if ( !Permission::check('ServerInfoAccess') ) {
            CMSMenu::remove_menu_item('ServerInfo');
        }
    }

    public function getinfo(){
        if ( Permission::check('ServerInfoAccess') ) {
            ob_start();
            phpinfo();
            $info = ob_get_contents();
            ob_get_clean();
            return $info;
        }
        return NULL;
    }

}

class ServerInfoAccess extends ModelAdmin
{

}
