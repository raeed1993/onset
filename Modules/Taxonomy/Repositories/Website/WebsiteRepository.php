<?php

namespace Modules\Taxonomy\Repositories\Website;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Cache;
use Mcamara\LaravelLocalization\LaravelLocalization;
use Modules\Taxonomy\Entities\Taxonomy;
use Modules\Taxonomy\Entities\TaxonomyTranslation;
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

    public function findSetting($id, array $with = [])
    {
        $data = $this->make($with)
            ->settings()
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
        $result = $this->findOrFail(TaxonomyTranslation::where('slug', $slug)->first()->taxonomy_id);

//        $data = $this->make($with)
//            ->join('taxonomy_translations', 'taxonomies.id', '=', 'taxonomy_translations.taxonomy_id')
//            ->where('taxonomies.type', '=', self::TYPE_META['no'])
//            ->where('taxonomy_translations.slug', $slug);
//
//        $result = $this->applyBeforeExecuteQuery($data, true)->first();

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

    public function links(array $with = [])
    {
        $data = $this->make($with)->settings();

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

    public function update_social($data)
    {
        if (Cache::has('meta_social'))
            Cache::forget('meta_social');
        foreach ($data['ids'] as $id) {
            $link = $this->findSetting($id);
            $link->links = $data[$link->translate('en')->slug . '-links'];
            if ($link->translate('en')->slug == 'location') {
                $link->translateOrNew('en')->content = $data[$link->translate('en')->slug . '-labels'][0];
            }

            $link->save();
        }

    }
}
