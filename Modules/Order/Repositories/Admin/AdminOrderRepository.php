<?php

namespace Modules\Order\Repositories\Admin;

use Carbon\Carbon;
use Modules\Order\Entities\Order;
use Modules\Order\Interfaces\Admin\AdminOrderInterface;
use Modules\Taxonomy\Repositories\RepositoriesAbstract;

class AdminOrderRepository extends RepositoriesAbstract implements AdminOrderInterface
{

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
        $model = Order::find($data['taxonomy_id']);
        $model->read_at = Carbon::now();
        $model->save();

        return $model;
    }
}
