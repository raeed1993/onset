<?php

namespace Modules\Taxonomy\Repositories\Meta;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Modules\Taxonomy\Entities\Taxonomy;
use Modules\Taxonomy\Interfaces\Blog\BlogInterface;
use Modules\Taxonomy\Repositories\RepositoriesAbstract;

class MetaRepository extends RepositoriesAbstract
{
    public function findOrFail($id, array $with = [])
    {
        $data = $this->make($with)
            ->where('type', Taxonomy::TYPE_META['no'])
            ->where('id', $id);

        $result = $this->applyBeforeExecuteQuery($data, true)->first();

        if (!empty($result)) {
            return $result;
        }

        throw (new ModelNotFoundException)->setModel(
            get_class($this->originalModel), $id
        );
    }

    /**
     * {@inheritDoc}
     */
    public function all(array $with = [])
    {
        $data = $this->make($with)
            ->where('type', Taxonomy::TYPE_META['no']);

        return $this->applyBeforeExecuteQuery($data)->orderBy('id','desc')->get();
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
