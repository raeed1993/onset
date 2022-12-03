<?php

namespace Modules\Taxonomy\Repositories\Slider;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Mcamara\LaravelLocalization\LaravelLocalization;
use Modules\Taxonomy\Entities\Taxonomy;
use Modules\Taxonomy\Interfaces\Slider\SliderInterface;
use Modules\Taxonomy\Repositories\RepositoriesAbstract;

class SliderRepository extends RepositoriesAbstract implements SliderInterface
{
    public function findOrFail($id, array $with = [])
    {
        $data = $this->make($with)
            ->where('id', $id)
            ->sliders();

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
        $data = $this->make($with)->sliders();

        return $this->applyBeforeExecuteQuery($data)->paginate(20);
    }

    public function store($data)
    {
        $slider = new Taxonomy();
        if (isset($data['primary_image']))
            $slider->primary_image = $data['primary_image'];
    //    $slider->status = $data['status'];
        $slider->type = Taxonomy::TYPE_SLIDER['no'];
        if (isset($data['link']) && $data['link'] != null)
            $slider->links = $data['link'];
        foreach ((new LaravelLocalization())->getSupportedLanguagesKeys() as $key) {
            $slider->translateOrNew($key)->title = $data['title-' . $key];
            $slider->translateOrNew($key)->content = $data['label-' . $key];
        }

        $slider->save();

        return $slider;
    }

    public function updateModel(array $data)
    {

        $slider = $this->findOrFail($data['taxonomy_id']);
        if (isset($data['link']) && $data['link'] != null)
            $slider->links = $data['link'];
        $slider->primary_image = $data['primary_image'];
        $slider->status = 1;
        $slider->type = Taxonomy::TYPE_SLIDER['no'];
        foreach ((new LaravelLocalization())->getSupportedLanguagesKeys() as $key) {
            if (isset($data['title-' . $key]))
                $slider->translateOrNew($key)->title = $data['title-' . $key];
            if (isset($data['label-' . $key]))
                $slider->translateOrNew($key)->content = $data['label-' . $key];
        }

        $slider->save();

        return true;
    }

}
