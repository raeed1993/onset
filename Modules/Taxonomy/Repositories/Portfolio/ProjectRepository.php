<?php

namespace Modules\Taxonomy\Repositories\Portfolio;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Mcamara\LaravelLocalization\LaravelLocalization;
use Modules\Taxonomy\Entities\Taxonomy;
use Modules\Taxonomy\Interfaces\Portfolio\ProjectInterface;
use Modules\Taxonomy\Repositories\RepositoriesAbstract;

class ProjectRepository extends RepositoriesAbstract implements ProjectInterface
{
    public function findOrFail($id, array $with = [])
    {
        $data = $this->make($with)
            ->where('id', $id)
            ->projects();

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
        $data = $this->make($with)->projects();

        return $this->applyBeforeExecuteQuery($data)->get();
    }

    public function services()
    {
        $data = $this->make([])->services()->active();
        return $this->applyBeforeExecuteQuery($data)->get()->pluck('title', 'id');
    }

    public function store($data)
    {
        $project = new Taxonomy();
        if (isset($data['primary-image']))
            $project->primary_image = $data['primary-image'];
        $project->status = $data['status'];
        $project->type = Taxonomy::TYPE_PROJECTS['no'];
        $project->parent_id = $data['service_id'];
        if (isset($data['links']))
            $project->links = $data['links'];

        if (isset($data['images']))
            $project->images = $data['images'];

        foreach ((new LaravelLocalization())->getSupportedLanguagesKeys() as $key)
            $project->translateOrNew($key)->title = $data['title-' . $key];


        $project->save();

        return $project;
    }

    public function updateModel(array $data)
    {

        $project = $this->findOrFail($data['taxonomy_id']);

        if (isset($data['primary-image']))
            $project->primary_image = $data['primary-image'];
        if (isset($data['links']))
            $project->links = $data['links'];
        else $project->links = [];

        if (isset($data['images']))
            $project->images = $data['images'];
        else $project->images = [];


        $project->parent_id = $data['service_id'];

        $project->status = $data['status'];


        foreach ((new LaravelLocalization())->getSupportedLanguagesKeys() as $key) {
            $project->translateOrNew($key)->title = $data['title-' . $key];

        }

        $project->save();

        return $project;
    }
}
