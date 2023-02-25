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

        return $this->applyBeforeExecuteQuery($data)->orderBy('id','desc')->paginate(20);
    }

    public function services()
    {
        $data = $this->make([])->services()->active();
        return $this->applyBeforeExecuteQuery($data)->get()->pluck('title', 'id');
    }

    public function store($data)
    {
        $project = new Taxonomy();
        if (isset($data['primary-image'])) {
            $project->primary_image = explode(url(''), $data['primary-image'])[1];
        }
        $project->status = $data['status'];
        $project->type = Taxonomy::TYPE_PROJECTS['no'];
        $project->parent_id = $data['service_id'];
        if (isset($data['links']))
            $project->links = $data['links'];

        if (isset($data['images'])) {
            foreach ($data['images'] as $path)
                $paths_background[] = explode(url(''), $path)[1];
            $project->image_link = $this->setObject($data['image_link'], $paths_background);
        }


        foreach ((new LaravelLocalization())->getSupportedLanguagesKeys() as $key)
            $project->translateOrNew($key)->title = $data['title-' . $key];


        $project->save();

        return $project;
    }

    private function setObject($image_link, $images)
    {
        $images_links = [];
        for ($i = 0; $i < count($image_link); $i++) {
            $object = new \stdClass();
            $object->image = $images[$i];
            $object->link = $image_link[$i];
            array_push($images_links, $object);
        }
        return $images_links;
    }

    public function updateModel(array $data)
    {

        $project = $this->findOrFail($data['taxonomy_id']);

        if (isset($data['primary-image'])) {
            $project->primary_image = explode(url(''), $data['primary-image'])[1];
        }
        if (isset($data['links']))
            $project->links = $data['links'];
        else $project->links = [];

        if (isset($data['images'])) {
            foreach ($data['images'] as $path)
                $paths_background[] = explode(url(''), $path)[1];
            $project->image_link = $this->setObject($data['image_link'], $paths_background);
        }
        else $project->image_link = [];


        $project->parent_id = $data['service_id'];

        $project->status = $data['status'];


        foreach ((new LaravelLocalization())->getSupportedLanguagesKeys() as $key) {
            $project->translateOrNew($key)->title = $data['title-' . $key];

        }

        $project->save();

        return $project;
    }
}
