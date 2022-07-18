<?php

namespace Modules\Order\Repositories;

use Modules\Order\Entities\Order;
use Modules\Order\Interfaces\OrderInterface;
use Modules\Taxonomy\Repositories\RepositoriesAbstract;

class OrderRepository extends RepositoriesAbstract  implements OrderInterface
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
