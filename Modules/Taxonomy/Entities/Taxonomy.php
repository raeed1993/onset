<?php

namespace Modules\Taxonomy\Entities;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property int $type
 * @property int $parent_id
 * @property bool $status
 * @property array $links
 * @property string $primary_image
 * @property array $images
 */
class Taxonomy extends Model
{
    use Translatable, SoftDeletes;

    public $translationForeignKey = 'taxonomy_id';
    public $translatedAttributes = ['title', 'content', 'slug'];
    protected $fillable = ['title', 'content', 'slug', 'type', 'parent_id', 'status', 'primary_image'];
    protected $append = ['option', 'projects_service'];

    protected $casts = [
        'images' => 'array',
        'links' => 'array',
    ];
    protected $appends = ['options'];
    const TYPE_SLIDER = [
        'no' => 1,
    ];

    const TYPE_SERVICE = [
        'no' => 2,

    ];

    const TYPE_CLIENT = [
        'no' => 3,
    ];

    const TYPE_BLOG = [
        'no' => 4,
    ];

    const TYPE_SETTING = [
        'no' => 5,

    ];
    const   TYPE_PROJECTS = [
        'no' => 6,

    ];
    const TYPE_META = [
        'no' => 7,
    ];

    public function scopeSliders($query)
    {
        return $query->where('type', '=', self::TYPE_SLIDER['no']);
    }

    public function scopeServices($query)
    {
        return $query->where('parent_id', null)->where('type', '=', self::TYPE_SERVICE['no']);
    }

    public function scopeClients($query)
    {
        return $query->where('type', '=', self::TYPE_CLIENT['no']);
    }

    public function scopeBlogs($query)
    {
        return $query->where('type', '=', self::TYPE_BLOG['no']);
    }

    public function scopeSettings($query)
    {
        return $query->where('type', '=', self::TYPE_SETTING['no']);
    }

    public function scopeProjects($query)
    {
        return $query->where('type', '=', self::TYPE_PROJECTS['no']);
    }

    public function scopeMeta($query)
    {
        return $query->where('type', '=', self::TYPE_META['no']);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function childs()
    {
        return $this->hasMany(Taxonomy::class, 'parent_id', 'id')->where('type', $this->type);
    }

    public function getProjectsServiceAttribute()
    {
        return $this->hasMany(Taxonomy::class, 'parent_id', 'id')->where('type', self::TYPE_PROJECTS['no']);
    }

    public function getOptionsAttribute()
    {
        switch ($this->type) {
            case 1:
                return $this::TYPE_SLIDER;
                break;
            case 2:
                return $this::TYPE_SERVICE;
                break;
            case 3:
                return $this::TYPE_CLIENT;
                break;
            case 4:
                return $this::TYPE_BLOG;
                break;
            case 5:
                return $this::TYPE_SETTING;
                break;
            case 6:
                return $this::TYPE_PROJECTS;
                break;
            case 7:
                return $this::TYPE_META;
                break;
        }
    }
}
