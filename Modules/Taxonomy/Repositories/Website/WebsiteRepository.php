<?php

namespace Modules\Taxonomy\Repositories\Website;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Cache;
use Mcamara\LaravelLocalization\LaravelLocalization;
use Modules\Taxonomy\Entities\Taxonomy;
use Modules\Taxonomy\Interfaces\Website\WebsiteInterface;
use Modules\Taxonomy\Repositories\RepositoriesAbstract;

class WebsiteRepository extends RepositoriesAbstract implements WebsiteInterface
{
    public function findOrFail($id, array $with = [])
    {
        $data = $this->make($with)
            ->meta()
            ->where('id', $id);

        $result = $this->applyBeforeExecuteQuery($data, true)->first();

        if (!empty($result)) {
            return $result;
        }

        throw (new ModelNotFoundException)->setModel(
            get_class($this->originalModel), $id
        );
    }

    public function findBySlug($slug, array $with = [])
    {
        $data = $this->make($with)
            ->join('taxonomy_translations', 'taxonomies.id', '=', 'taxonomy_translations.taxonomy_id')
            ->where('taxonomies.type', '=', self::TYPE_META['no'])
            ->where('taxonomy_translations.slug', $slug);

        $result = $this->applyBeforeExecuteQuery($data, true)->first();

        if (!empty($result)) {
            return $result;
        }

        throw (new ModelNotFoundException)->setModel(
            get_class($this->originalModel), $slug
        );
    }

    /**
     * {@inheritDoc}
     */
    public function all(array $with = [])
    {
        $data = $this->make($with)->meta();

        return $this->applyBeforeExecuteQuery($data)->get();
    }

    public function store($data)
    {
        return null;
    }

    public function updateModel(array $data)
    {
        return null;
    }

    public function update_pages($data)
    {
        if (Cache::has('meta_pages'))
            Cache::forget('meta_pages');
        foreach ($data['ids'] as $id) {
            $page = $this->findOrFail($id);
            $page->primary_image = $data[$page->translate('en')->slug . '-primary-image'];
            foreach ((new LaravelLocalization())->getSupportedLanguagesKeys() as $key) {
                $page->translateOrNew($key)->title = $data[$page->translate('en')->slug . '-title-' . $key];
                $page->translateOrNew($key)->content = $data[$page->translate('en')->slug . '-content-' . $key];
            }
            $page->save();
        }

    }
}
