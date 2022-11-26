<?php

namespace Modules\Taxonomy\Repositories\ClientBig;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Mcamara\LaravelLocalization\LaravelLocalization;
use Modules\Taxonomy\Entities\Taxonomy;
use Modules\Taxonomy\Interfaces\ClientBig\ClientBigInterface;
use Modules\Taxonomy\Repositories\RepositoriesAbstract;

class ClientBigRepository extends RepositoriesAbstract implements ClientBigInterface
{
    public function findOrFail($id, array $with = [])
    {
        $data = $this->make($with)
            ->where('id', $id)
            ->clientsBig();

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
        $data = $this->make($with)->clientsBig();

        return $this->applyBeforeExecuteQuery($data)->paginate(20);
    }


    public function store($data)
    {
        $client = new Taxonomy();
        if (isset($data['primary-image']))
            $client->primary_image = $data['primary-image'];
        if (isset($data['status']))
            $client->status = $data['status'];

        $client->type = Taxonomy::TYPE_CLIENT_BIG['no'];

//        foreach ((new LaravelLocalization())->getSupportedLanguagesKeys() as $key) {
//            $client->translateOrNew($key)->title = $data['title-' . $key];
//            if (isset($data['content-' . $key]))
//                $client->translateOrNew($key)->content = $data['content-' . $key];
//        }

        $client->save();

        return $client;
    }

    public function updateModel(array $data)
    {
        $client = $this->findOrFail($data['taxonomy_id']);
        if (isset($data['primary-image']))
            $client->primary_image = $data['primary-image'];

        if (isset($data['status']))
            $client->status = $data['status'];


//        foreach ((new LaravelLocalization())->getSupportedLanguagesKeys() as $key) {
//            $client->translateOrNew($key)->title = $data['title-' . $key];
//            if (isset($data['content-' . $key]))
//                $client->translateOrNew($key)->content = $data['content-' . $key];
//        }

        $client->save();

        return $client;
    }


}
