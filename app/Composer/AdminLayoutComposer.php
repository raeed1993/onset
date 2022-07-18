<?php

namespace App\Composer;

use Modules\Contact\Repositories\Admin\AdminContactRepository;

class AdminLayoutComposer
{
    public function compose($view)
    {
        $view->with([
            'contactCount' => AdminContactRepository::adminComposerContactUnreadCount(),
            'orderCount' => AdminContactRepository::adminComposerOrderUnreadCount(),
        ]);
    }
}
