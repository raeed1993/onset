<?php

namespace App\Composer;

use Modules\Guest\Repositories\GuestRepository;

class LayoutComposer
{
    public function compose($view)
    {
        $view->with([
            'links' => GuestRepository::layout()
        ]);
    }
}
