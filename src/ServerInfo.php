<?php

namespace evanshunt\serverinfo;

use SilverStripe\Admin\LeftAndMain;
use SilverStripe\Security\Permission;
use SilverStripe\Security\PermissionProvider;
use SilverStripe\Security\Member;

class ServerInfo extends LeftAndMain implements PermissionProvider
{
    private static $url_segment = 'serverinfo';
    private static $menu_title = 'Serverinfo';
    private static $menu_priority = -3;

    private static $allowed_actions = array(
		'getinfo',
    );

    public function providePermissions() {
        return array(
            "evanshunt\ServerInfo" => "Access Serverinfo",
        );
    }

    public function canView($member = null) {
        return Permission::check('evanshunt\ServerInfo', 'any', $member);
    }

    public function getinfo(){
        if ( Permission::check('evanshunt\ServerInfo', 'any', Member::currentUser()) ) {
            ob_start();
            phpinfo();
            $info = ob_get_contents();
            ob_get_clean();
            return $info;
        }
        return NULL;
    }
}
