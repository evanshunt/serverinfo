<?php

class ServerInfo extends LeftAndMain implements PermissionProvider
{
    private static $url_segment = 'serverinfo';
    private static $menu_priority = -3;

    private static $allowed_actions = array(
		'getinfo',
    );

    public function providePermissions() {
        return array(
            "CMS_ACCESS_ServerInfo" => "Access Serverinfo",
        );
    }

    public function canView($member = null) {
        return Permission::check('CMS_ACCESS_ServerInfo', 'any', $member);
    }

    public function getinfo(){
        if ( Permission::check('CMS_ACCESS_ServerInfo', 'any', Member::currentUser()) ) {
            ob_start();
            phpinfo();
            $info = ob_get_contents();
            ob_get_clean();
            return $info;
        }
        return NULL;
    }
}
