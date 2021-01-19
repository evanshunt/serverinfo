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

            // If phpinfo() is disabled, get the data by other means
            if (in_array('phpinfo', explode(',', ini_get('disable_functions')))) {
                $info = '<style>#phpinitable{max-width: 700px;}
                    #phpinitable tr td {padding: 0.5em;}
                    #phpinitable tr:nth-child(even) {background-color:lightgrey;}
                    #phpinitable tr td:nth-child(2){word-break: break-all;}</style>';
                $info .= '<div id="phpinitable"><table width="100%"><thead><tr><th width>Option</th><th>Value</th></tr></thead><tbody>';
                foreach (ini_get_all(null, false) as $option => $value) {
                    $info .= "<tr><td>$option</td><td align='right'>$value</td>";
                }
                $info .= '</tbody></table></div>';
            } else {
                ob_start();
                phpinfo();
                $info = ob_get_contents();
                ob_get_clean();
            }

            return $info;
        }
        return NULL;
    }
}
