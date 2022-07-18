<?php

namespace Modules\Order\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $full_name
 * @property string $phone_number
 * @property string $email
 * @property string $project_name
 * @property string $about_project
 * @property string $logo_prefer
 * @property string $feature_project
 * @property int $camera_count
 * @property int $number_shooting_days
 * @property float $video_duration
 * @property bool $aerial_photography
 * @property bool $include_grafic_video
 * @property bool $include_voice_comment
 * @property string $link_like_video
 * @property string $note
 * @property string $type
 * @property string $type_logo
 * @property string $type_services
 * @property string $type_project
 * @property string $target_segment
 * @property string $read_at
 * @property string $created_at
 * @property string $updated_at
 */
class Order extends Model
{


    protected $fillable = [
        'full_name',
        'phone_number',
        'email',
        'project_name',
        'about_project',
        'logo_prefer',
        'feature_project',
        'services_products_project',
        'purpose_photography_video',
        'camera_count',
        'number_shooting_days',
        'video_duration',
        'aerial_photography',
        'include_grafic_video',
        'include_voice_comment',
        'link_like_video',
        'note',
        'type',
        'type_logo',
        'type_services',
        'type_project',
        'target_segment',
        'read_at',
    ];

}
