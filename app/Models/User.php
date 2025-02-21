<?php

namespace App\Models;


use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 *
 *
 * @property int $id
 * @property string $username
 * @property string $phone
 * @property string $token
 * @property string $status
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUsername($value)
 * @property string $starts_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereStartsAt($value)
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    protected $guarded = ['id'];

    public $timestamps = false;

    public const STATUS_ACTIVE = 'active';
    public const STATUS_INACTIVE = 'inactive';

}
