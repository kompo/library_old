<?php 

namespace Kompo\Library\Account;

use Kompo\{Menu, Link};

class AccountSettingsSidebar extends Menu
{
    public $fixed = true;

    public function komponents()
    {
        return [
            Link::form('Change email')->href('account.change-email'),
            Link::form('Change password')->href('account.change-password'),
            Link::form('Change username')->href('account.change-username')
        ];
    }

}