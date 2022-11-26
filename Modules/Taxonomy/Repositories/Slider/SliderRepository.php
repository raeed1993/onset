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
        $data = $this->make($with)->active()->sliders();

        return $this->applyBeforeExecuteQuery($data)->paginate(20);
    }

    public function store($data)
    {
        $slider = new Taxonomy();
        if (isset($data['primary-image']))
            $slider->primary_image = $data['primary-image'];
        $slider->status = $data['status'];
        $slider->type = Taxonomy::TYPE_SLIDER['no'];

        foreach ((new LaravelLocalization())->getSupportedLanguagesKeys() as $key) {
            $slider->translateOrNew($key)->title = $data['title-' . $key];
            $slider->translateOrNew($key)->content = $data['content-' . $key];
        }

        $slider->save();

        return $slider;
    }

    public function updateModel(array $data)
    {

        $list = $this->all();

        foreach ($list as $itm)
            $itm->delete();


        if (isset($data['sliders'])) {
            foreach ($data['sliders'] as $item) {

                $slider = new Taxonomy();
                if (isset($item['link']) && $item['link'] != null)
                    $slider->links = $item['link'];
                $slider->primary_image = $item['primary_image'];
                $slider->status = 1;
                $slider->type = Taxonomy::TYPE_SLIDER['no'];
                foreach ((new LaravelLocalization())->getSupportedLanguagesKeys() as $key) {
                    if (isset($item['title-' . $key]))
                        $slider->translateOrNew($key)->title = $item['title-' . $key];
                    if (isset($item['label-' . $key]))
                        $slider->translateOrNew($key)->content = $item['label-' . $key];
                }

                $slider->save();
            }
        }

        return true;
    }

}
