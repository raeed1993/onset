<?php

namespace Modules\Taxonomy\Repositories\Blog;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Mcamara\LaravelLocalization\LaravelLocalization;
use Modules\Taxonomy\Entities\Taxonomy;
use Modules\Taxonomy\Interfaces\Blog\BlogInterface;
use Modules\Taxonomy\Repositories\RepositoriesAbstract;

class BlogRepository extends RepositoriesAbstract implements BlogInterface
{
    public function findOrFail($id, array $with = [])
    {
        $data = $this->make($with)
            ->where('id', $id)
            ->blogs();

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
        $data = $this->make($with)->blogs();

        return $this->applyBeforeExecuteQuery($data)->orderBy('id','desc')->paginate(20);
    }

    public function store($data)
    {

        $blog = new Taxonomy();
        if (isset($data['primary-image'])) {
            $blog->primary_image = explode(url(''), $data['primary-image'])[1];
        }
        $blog->status = $data['status'];
        $blog->type = Taxonomy::TYPE_BLOG['no'];

        foreach ((new LaravelLocalization())->getSupportedLanguagesKeys() as $key) {
            $blog->translateOrNew($key)->title = $data['title-' . $key];
            $blog->translateOrNew($key)->content = $data['content-' . $key];
        }

        $blog->save();

        return $blog;
    }

    public function updateModel(array $data)
    {

        $blog = $this->findOrFail($data['taxonomy_id']);
        if (isset($data['primary-image'])) {
            $blog->primary_image = explode(url(''), $data['primary-image'])[1];
        }

        $blog->status = $data['status'];


        foreach ((new LaravelLocalization())->getSupportedLanguagesKeys() as $key) {
            $blog->translateOrNew($key)->title = $data['title-' . $key];
            $blog->translateOrNew($key)->content = $data['content-' . $key];
        }

        $blog->save();

        return $blog;
    }

}
