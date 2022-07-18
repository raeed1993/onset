<?php

namespace Modules\Order\Repositories\Admin;

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
}
