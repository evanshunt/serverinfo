## Description

A small SilverStripe module that provides logged in users -that have permission to view this module- access to phpinfo() print out. This helps in quickly finding server info.

This is SilverStripe 4 supported release

## Setup

From where you have the `composer.json` file run `composer require evanshunt/serverinfo:^2`

Run `dev/build`

Then you can assign user groups the permission for `Access Serverinfo` under `Other` category
## Changelog:

- 2021-01-09: SilverStrip 4 support
- 2021-01-09: code cleanup
- 2021-01-07: initial commit
