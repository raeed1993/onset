<?php

namespace Modules\Guest\Repositories;

use Illuminate\Support\Facades\Cache;
use Modules\Guest\Interfaces\GuestInterface;
use Modules\Taxonomy\Entities\Taxonomy;
use Modules\Taxonomy\Entities\TaxonomyTranslation;

class GuestRepository implements GuestInterface
{

    public function homePage()
    {
        $sliders = Taxonomy::sliders()->active()->orderBy('id', 'desc')->get();
        $blogs = $this->latestBlogs();
        $projects = Taxonomy::projects()->active()->orderBy('id', 'desc')->limit(6)->get();
        $services = Taxonomy::services()->active()->get();
        $clients = Taxonomy::clients()->active()->orderBy('id', 'desc')->get();
        $clientsBig = Taxonomy::clientsBig()->active()->orderBy('id', 'desc')->get();
        return [
            'sliders' => $sliders,
            'blogs' => $blogs,
            'projects' => $projects,
            'services' => $services,
            'clients' => $clients,
            'clientsBig' => $clientsBig
        ];
    }

    public function latestBlogs()
    {
        return Taxonomy::blogs()->active()->orderBy('id', 'desc')->limit(3)->get();
    }

    public function find($id)
    {
        return Taxonomy::find($id);
    }

    public function services()
    {
        return Taxonomy::services()->active()->get();
    }

    public function projects()
    {
        return Taxonomy::projects()->active()->orderBy('id', 'desc')->get();
    }

    public function blogs()
    {
        return Taxonomy::blogs()->active()->orderBy('id', 'desc')->get();
    }

    public static function layout()
    {
        $links = Cache::remember('meta_social', 60 * 60, function () {
            return Taxonomy::settings()->active()->get();
        });
        return $links;
    }

    public function findBySlug($slug)
    {
        $obj = TaxonomyTranslation::where('slug', $slug)->first();
        if (isset($obj))
            return $this->find($obj->taxonomy_id);
        return null;

    }
}
