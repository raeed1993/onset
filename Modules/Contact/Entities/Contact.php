<?php

namespace Modules\Contact\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $phone_number
 * @property string $content
 * @property string $read_at
 * @property string $created_at
 * @property string $updated_at
 */
class Contact extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'email', 'phone_number', 'content'];
    protected $casts = [
        'read_at' => 'datetime'
    ];


}
