<?php

namespace Modules\Taxonomy\Interfaces\Website;

use Modules\Taxonomy\Interfaces\RepositoryInterface;

interface WebsiteInterface extends RepositoryInterface
{
    public function update_pages($data);
}
