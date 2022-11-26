<?php

namespace Modules\Taxonomy\Repositories\Service;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Mcamara\LaravelLocalization\LaravelLocalization;
use Modules\Taxonomy\Entities\Taxonomy;
use Modules\Taxonomy\Interfaces\Service\ServiceInterface;
use Modules\Taxonomy\Repositories\RepositoriesAbstract;

class ServiceRepository extends RepositoriesAbstract implements ServiceInterface
{
    public function findOrFail($id, array $with = [])
    {
        $data = $this->make($with)
            ->where('id', $id)
            ->services();

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
            ->orderBy('id', 'desc')
            ->services();


        return $this->applyBeforeExecuteQuery($data)->paginate(20);
    }

    public function updateModel(array $data)
    {
        $service = $this->findOrFail($data['taxonomy_id']);
        if (isset($data['primary-image']))
            $service->primary_image = $data['primary-image'];
        if (isset($data['background-image']))
            $service->images = $data['background-image'];

        $service->status = $data['status'];


        foreach ((new LaravelLocalization())->getSupportedLanguagesKeys() as $key)
            $service->translateOrNew($key)->title = $data['title-' . $key];

        $service->save();

        foreach ($service->childs as $child)
            $child->delete();

        if (isset($data['services'])) {
            foreach ($data['services'] as $item) {
                $sub_service = new Taxonomy();
                $sub_service->primary_image = $item['primary-image'];
                $sub_service->status = 1;
                $sub_service->parent_id = $service->id;
                $sub_service->type = Taxonomy::TYPE_SERVICE['no'];
                foreach ((new LaravelLocalization())->getSupportedLanguagesKeys() as $key)
                    $sub_service->translateOrNew($key)->title = 'sub service';
                foreach ((new LaravelLocalization())->getSupportedLanguagesKeys() as $key)
                    $sub_service->translateOrNew($key)->content = $item['content-' . $key];
                $sub_service->save();
            }
        }

        return $service;
    }

    public function store($data)
    {
        $service = new Taxonomy();
        if (isset($data['primary-image']))
            $service->primary_image = $data['primary-image'];
        if (isset($data['background-image']))
            $service->images = $data['background-image'];
        $service->status = $data['status'];
        $service->type = Taxonomy::TYPE_SERVICE['no'];

        foreach ((new LaravelLocalization())->getSupportedLanguagesKeys() as $key)
            $service->translateOrNew($key)->title = $data['title-' . $key];

        $service->save();
        if (isset($data['services'])) {
            foreach ($data['services'] as $item) {
                $sub_service = new Taxonomy();
                $sub_service->primary_image = $item['primary-image'];

                $sub_service->status = 1;
                $sub_service->parent_id = $service->id;
                $sub_service->type = Taxonomy::TYPE_SERVICE['no'];
                foreach ((new LaravelLocalization())->getSupportedLanguagesKeys() as $key)
                    $sub_service->translateOrNew($key)->title = 'sub_service';
                foreach ((new LaravelLocalization())->getSupportedLanguagesKeys() as $key)
                    $sub_service->translateOrNew($key)->content = $item['content-' . $key];
                $sub_service->save();
            }
        }

        return $service;
    }

    public function deleteModel($data)
    {
        $service = $this->findOrFail($data['taxonomy_id']);
        foreach ($service->childs as $child)
            $child->delete();
        $service->delete();
    }
}
