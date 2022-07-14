<?php

namespace Modules\Taxonomy\Interfaces\Portfolio;

use Modules\Taxonomy\Interfaces\RepositoryInterface;

interface ProjectInterface extends RepositoryInterface
{
    public function services();
}
