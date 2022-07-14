<?php

namespace Modules\Taxonomy\Interfaces\Service;

use Modules\Taxonomy\Interfaces\RepositoryInterface;

interface ServiceInterface extends RepositoryInterface
{



    public function deleteModel($data);
}
