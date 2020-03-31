<?php 

namespace Kompo\Library\Account;

use Kompo\Link;

class AccountSettingsSidebar extends \VlMenu
{
    public $fixed = true;

    public function components()
    {
        return [
            Link::form('Change email')->href('account.change-email'),
            Link::form('Change password')->href('account.change-password'),
            Link::form('Change username')->href('account.change-username')
        ];
    }

}