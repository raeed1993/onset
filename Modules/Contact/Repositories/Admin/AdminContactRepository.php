<?php

namespace Modules\Contact\Repositories\Admin;

use Modules\Contact\Entities\Contact;
use Modules\Contact\Interfaces\Admin\AdminContactInterface;
use Modules\Taxonomy\Repositories\RepositoriesAbstract;

class AdminContactRepository extends RepositoriesAbstract implements AdminContactInterface
{
    public static function adminComposerContactUnreadCount()
    {
        return Contact::where('read_at', null)->get();
    }

    public function store($data)
    {
        return null;
    }

    public function updateModel(array $data)
    {
        return null;
    }
}
