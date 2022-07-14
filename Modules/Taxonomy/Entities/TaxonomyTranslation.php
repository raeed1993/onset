<?php

namespace Modules\Taxonomy\Entities;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;


class TaxonomyTranslation extends Model
{
    use Sluggable;

    protected $table = 'taxonomy_translations';
    public $timestamps = false;
    protected $fillable = ['title', 'content', 'slug'];

    public function sluggable(): array
    {
        return ['slug' => ['source' => 'title']];
    }
}
