<?php

namespace Modules\Contact\Repositories\Admin;

use Carbon\Carbon;
use Modules\Contact\Entities\Contact;
use Modules\Contact\Interfaces\Admin\AdminContactInterface;
use Modules\Order\Entities\Order;
use Modules\Taxonomy\Repositories\RepositoriesAbstract;

class AdminContactRepository extends RepositoriesAbstract implements AdminContactInterface
{
    public static function adminComposerContactUnreadCount()
    {
        return Contact::where('read_at', null)->paginate(20);
    }

    public static function adminComposerOrderUnreadCount()
    {
        return Order::where('read_at', null)->get();
    }

    public function store($data)
    {
        return null;
    }

    public function updateModel(array $data)
    {
        return null;
    }

    public function toggleStatus($data)
    {
        $model = Contact::find($data['taxonomy_id']);
        $model->read_at = Carbon::now();
        $model->save();

        return $model;
    }
}
