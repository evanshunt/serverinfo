<?php


class ServerInfo extends LeftAndMain
{

    private static $required_permission_codes = array('ADMIN');
    private static $url_segment = 'serverinfo';
    private static $menu_priority = -3;

    private static $allowed_actions = array(
		'getinfo',
    );

    public function init() {
        //print_r(Permission::check('ServerInfoPermission'));
        parent::init();
        if ( !Permission::check('ServerInfoPermission') ) {
            CMSMenu::remove_menu_item('ServerInfo');
        }else{
            //print_r(Member::currentUserID());
        }
    }

    public function getinfo(){
        if ( Permission::check('ServerInfoPermission') ) {
            ob_start();
            phpinfo();
            $info = ob_get_contents();
            ob_get_clean();
            return $info;
        }
        return NULL;
    }

}

class ServerInfoPermission extends ModelAdmin
{

}
